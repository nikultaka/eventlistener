<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\FeedbackSubject;
use Auth;
use Helper;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $url = SITE_API_URL . 'getuserprofile';
        $param = array(
        );
        $user = Auth::user();
        $feedbackSubject = FeedbackSubject::all();
        return view('Frontend/user/profile', compact('user', 'feedbackSubject'));
    }

    public function save_profile(Request $request)
    {
        $result = array();
        $msg = '';
        if (!empty($request->current_password) && !empty($request->new_password)) {
            $url = SITE_API_URL . 'updatePassword';
            $param = array(
                'current_password' => "$request->current_password",
                'new_password' => "$request->new_password",
            );
            $response_arr = Helper::callApi($url, $param, 'post');
            if (!isset($response_arr->success)) {
                $result['status'] = isset($response_arr->success);
                $result['msg'] = isset($response_arr->message);
                echo json_encode($result);
                exit();
            } else {
                $msg = isset($response_arr->message);
            }
        }

        $url = SITE_API_URL . 'updateProfile';
        $param = array(
            'firstname' => "$request->first_name",
            'lastname' => "$request->last_name",
            'phone' => "$request->phone",
            'dob' => "$request->date_of_birth",
            "pic" => "",
            "grossincome" => "",
            "networth" => "",
            "service_utilized" => "",
            "is_accredited_investor" => "",
            "is_experience_in_financial_and_business" => "",
            "is_accurate_and_complete_answers" => "",
            "is_seasoned_investor" => "",
        );
        $response_arr = Helper::callApi($url, $param, 'post');
        if (isset($response_arr->success)) {
            $result['status'] = isset($response_arr->success);
            $result['msg'] = isset($response_arr->message) . "\n" . $msg;
            $result['reload'] = true;
        } else {
            $result['status'] = isset($response_arr->success);
            $result['msg'] = isset($response_arr->message);
        }
        echo json_encode($result);
        exit();
    }

    public function feedback(Request $request)
    {
        $result = array();
        $feedback = new Feedback;
        $feedback->feedback_subject_id = $request->feedsubjects;
        $feedback->feedback = $request->feedback;
        if ($request->has('agree')) {
        }
        $feedback->save();
        $insert_id = $feedback->id;
        if ($insert_id) {
            $result['status'] = true;
            $result['msg'] = "Feedback Submited";
        } else {
            $result['status'] = false;
            $result['msg'] = "Something wants wrong.";
        }
        echo json_encode($result);
        exit();

    }
}
