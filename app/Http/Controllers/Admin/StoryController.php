<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Story;
use DataTables;
use Validator;
use Carbon\Carbon;
use Auth;
use App\Models\Storyview;
use App\Models\User;


class StoryController extends Controller
{
    //
    function index()
    {
        
        $userList = User::select('id', 'name')->where('status','=',1)->get()->toArray();
        return view("Admin.story.index")->with(compact('userList'));

    }

    function add(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validation->fails()) {

            $data['status'] = 0;
            $data['error'] = $validation->errors()->all();
            echo json_encode($data);
            exit();
        }
        $result = array();
        $result['status'] = 0;
        $result['msg'] = "Oops ! Story Not Inserted";
        $hsid = $request->input('hsid');
        $data = $request->all();    

        if ($hsid == '') {
            $data_insert = new Story;
            $data_insert->user_id = $data['username'];
            $data_insert->name = $data['name'];
            $data_insert->status = $data['status'];
            $data_insert->save();
            $insert_id = $data_insert->id;

            if ($insert_id) {
                $result['status'] = 1;
                $result['msg'] = "Story inserted Successfully";
                $result['id'] = $insert_id;
            }
        } else {

            $update = Story::where('id', $hsid)->first();
            $update->user_id = $data['username'];
            $update->name = $data['name'];
            $update->status = $data['status'];
            $update->save();
            $result['status'] = 1;
            $result['msg'] = "Story updated Successfully";
        }

        echo json_encode($result);
        exit();
    }

    function datatable(Request $request)
    {
        if ($request->ajax()) {

            $data = Story::select('story.*','users.name as username')
            ->leftJoin('users', 'users.id', '=', 'story.user_id')
            ->where('story.status','!=',-1)->get();


            return Datatables::of($data)

                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    $status = '<span class="badge badge-danger">Inactive</span>';
                    if($row->status == 1){
                        $status = '<span class="badge badge-success">Active</span>';
                    }
                    return $status;
                })

                ->addColumn('action', function ($row) {
                    $action = '<button class="btn btn-danger btn-sm btn-icon icon-left" onclick="delete_story(' . $row->id . ')"><i class="entypo-cancel"></i> Delete</button>&nbsp;';
                    $action .= '<button class="btn btn-info btn-sm btn-icon icon-left" onclick="edit_story(' . $row->id . ')"><i class="entypo-pencil"></i> Edit</button>&nbsp;';
                    $action .= '<button class="btn btn-warning btn-sm btn-icon icon-left" onclick="snaps(' . $row->id . ')"><i class="entypo-camera"></i> Snaps</button>';
                    // $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>'
                    return $action;
                })

                ->rawColumns(['action','status'])
                ->make(true);
        }
    }

    function delete(Request $request)
    {
        $delete['status'] = 0;
        $delete['msg'] = "Oops ! Story not Deleted ";
        $d_id = $request->input('id');
        $storyDetails = Story::where('id',$d_id)->first();
        $storyDetails->status            =  -1;
        $storyDetails->updated_at        = Carbon::now();
        $storyDetails->save();

        if ($storyDetails) {
            $delete['status'] = 1;
            $delete['msg'] = "Story Deleted Successfully";
        }
        echo json_encode($delete);
        exit();
    }

    function edit(Request $request)
    {
        $edit = array();
        $edit['status'] = 0;
        $e_id = $request->input('id');
        $edtq =    Story::where('id', $e_id)->first();

        if ($edtq) {
            $edit['status'] = 1;
            $edit['user'] = $edtq;
        }
        echo json_encode($edit);
        exit();
    }

    function list() {
        $currentUser = Auth::user();
        $currentUserId = $currentUser->id;
        if (!$currentUserId) {
            return response()->json([
                'success' => false,
                'message' => "User Not Found",
            ], 200);
        }      

        $story = Story::with(['snaps','user'])->where('status','1')->get()->toArray();

        if(!empty($story)) {
            foreach($story as $key => $value) {
                if(!empty($value['snaps'])) {
                    foreach($value['snaps'] as $snapKey => $snapValue) {
                        if($snapValue['mediatype'] == '0') {
                            $story[$key]['snaps'][$snapKey]['mimeType'] = 'image';     
                        } else {
                            $story[$key]['snaps'][$snapKey]['mimeType'] = 'video'; 
                        }
                    }
                }
            }
        }

        //echo '<pre>'; print_r($story); exit;

        return response()->json([
            'success' => true,
            'message' => "Story info get Successfully",
            'data' => $story
        ], 201);
        
    }

    function viewed(Request $request) {
        $input = $request->all();
        $rules = array(
            'story_id' => "required",
            'snap_id' => "required",
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()]);
        } else {
            $currentUser = Auth::user();
            $currentUserId = $currentUser->id;
            if (!$currentUserId) {
                return response()->json([
                    'success' => false,
                    'message' => "User Not Found",
                ], 200);
            }      

            $story = Story::where('id',$request->only('story_id'))->first();
            if(!$story) {
                return response()->json([
                    'success' => false,
                    'message' => "story Not Found",
                ], 200);
            } else {
                $story->updated_at = date("Y-m-d H:i:s");
                $story->lastviewd = date("Y-m-d H:i:s");
                $story->save();
                $storyView = new Storyview;
                $storyView->user_id = $currentUserId;
                $storyView->story_id = $request->story_id;
                $storyView->snap_id = $request->snap_id;
                $storyView->save();
                return response()->json([  
                    'success' => true,
                    'message' => "Storyview added Successfully",
                    'data' => $storyView
                ], 201);        
            }
                
        }
        
    }
}
 