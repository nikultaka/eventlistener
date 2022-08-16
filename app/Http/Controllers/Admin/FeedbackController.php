<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Models\Feedback;
use App\Models\FeedbackSubject;
use DataTables;
use Validator;
use Carbon\Carbon;


class FeedbackController extends Controller
{

    function postfeedback(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'subject_id' => 'required',
            'feedback' => 'required',
        ]);

        if ($validation->fails()) {
            $data['status'] = 0;
            $data['error'] = $validation->errors()->all();
            return response()->json($data);
        }
        $req = $request->all();
        $data_insert = new Feedback;
        $data_insert->feedback_subject_id          = $req['subject_id'];
        $data_insert->feedback                     = $req['feedback'];
        $data_insert->created_at                   = Carbon::now();
        $data_insert->save();
        $insert_id = $data_insert->id;
        if ($insert_id) {
            return response()->json([
                'success' => true,
                'message' => "Topic Comment Inserted Successfully",
                'data' => $data_insert
            ], 201);
        }
    }

    function listfeedback()
    {
        $feedbackData = Feedback::select('*')->get()->toArray();
    
        $final_array1 = array();
        $final_array = array();
        if (!empty($feedbackData)) {
            foreach ($feedbackData as $key => $value) {
                $tempAry = [];
                $id_array = json_decode($value['feedback_subject_id']);
                $value['feedback_subject_id'] = $id_array;
                if (!empty($id_array)) {
                    $subject_names = array();
                    foreach ($id_array as $item) {
                        $feedbackSubjectData = FeedbackSubject::select('feedback_subject_name')->where('status', '=', 1)->where('id', '=', $item)->get()->toArray();
                        if (!empty($feedbackSubjectData)) {
                            array_push($subject_names, trim($feedbackSubjectData[0]['feedback_subject_name']));
                        }
                    }
                    $value['feedback_subject_name'] = $subject_names;
                    array_push($tempAry, $value);
                    array_push($final_array, $tempAry[0]);
                }
            }
        }
        if (!empty($final_array)) {
            return response()->json([
                'success' => true,
                'message' => "Feedback List Get Successfully",
                'data' => $final_array
            ], 201);
        }else{
            return response()->json([
                'success' => false,
                'message' => "Feedback Not Found",
                'data' => $final_array1
            ], 200);
        }


    }


    function listsubject()
    {
        $feedbacksubjectData1 = array();
        $feedbacksubjectData = FeedbackSubject::select('*')->where('status', '=', 1)->get()->toArray();

        if (!empty($feedbacksubjectData)) {
            return response()->json([
                'success' => true,
                'message' => "Feedback Subject List Get Successfully",
                'data' => $feedbacksubjectData
            ], 201);
        }else{
            return response()->json([
                'success' => false,
                'message' => "Feedback Subject List Not Found",
                'data' => $feedbacksubjectData1
            ], 200);
        }
    }
}
