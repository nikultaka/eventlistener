<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CommunityTopics;
use App\Models\TopicsMember;
use App\Models\TopicPost;
use App\Models\TopicComment;
use Auth;
use App\Models\User;
use GuzzleHttp\Psr7\Header;
use JWTAuth;
use Validator;
use DataTables;
use App\Helper\Helper;
use Carbon\Carbon;

class CommunityTopicsController extends Controller
{

    function index()
    {
        return view('Admin/communitytopics/index');
    }

    function add(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validation->fails()) {

            $data['status'] = 0;
            $data['error'] = $validation->errors()->all();
            echo json_encode($data);
            exit();
        }
        $result = array();
        $result['status'] = 0;
        $result['msg'] = "Oops ! Community Topics Not Inserted";
        $hctid = $request->input('hctid');
        $data = $request->input();

        if ($hctid == '') {
            $data_insert = new CommunityTopics;
            $data_insert->name              = $data['name'];
            $data_insert->host              = '@pyrium';
            $data_insert->text_color        = $data['text_color'];
            $data_insert->background_color  = $data['background_color'];
            $data_insert->is_verify         = $data['is_verify'];
            $data_insert->save();
            $insert_id = $data_insert->id;
            if ($insert_id) {
                $result['status'] = 1;
                $result['msg'] = "Community Topics inserted Successfully";
                $result['id'] = $insert_id;
            }
        } else {
            $update = CommunityTopics::where('id', $hctid)->first();
            $update->name               = $data['name'];
            $update->host               = '@pyrium';
            $update->text_color         = $data['text_color'];
            $update->background_color   = $data['background_color'];
            $update->is_verify          = $data['is_verify'];
            $update->save();
            $result['status'] = 1;
            $result['msg'] = "Community Topics updated Successfully";
        }

        echo json_encode($result);
        exit();
    }

    function datatable(Request $request)
    {
        if ($request->ajax()) {

            $data = CommunityTopics::select('*')->get();

            return Datatables::of($data)

                ->addIndexColumn()
                ->addColumn('text_color', function ($row) {
                    $text = '<span style="background-color:#fff; color:#000; font-size:15px;" class="badge"><b>' . $row->text_color . '</b></span>';
                    if ($row->text_color != '' && $row->text_color != null) {
                        $text = '<span style="color:' . $row->text_color . '; background-color:#fff; font-size:15px;" class="badge"><b>' . $row->text_color . '</b></span>';
                    }
                    return $text;
                })
                ->addColumn('background_color', function ($row) {
                    $background = '<span style="background-color:#fff; color:#000; font-size:15px;" class="badge">' . $row->background_color . '</span>';
                    if ($row->background_color != '' && $row->background_color != null) {
                        $background = '<span style="background-color:' . $row->background_color . '; color:#fff; font-size:15px;" class="badge">' . $row->background_color . '</span>';
                    }
                    return $background;
                })
                ->addColumn('is_verify', function ($row) {
                    $status = '<span class="badge badge-danger">No</span>';
                    if ($row->is_verify == 1) {
                        $status = '<span class="badge badge-success">Yes</span>';
                    }
                    return $status;
                })

                ->addColumn('action', function ($row) {
                    $action = '<button class="btn btn-danger btn-sm btn-icon icon-left" onclick="delete_communitytopics(' . $row->id . ')"><i class="entypo-cancel"></i> Delete</button>&nbsp;';
                    $action .= '<button class="btn btn-info btn-sm btn-icon icon-left" onclick="edit_communitytopics(' . $row->id . ')"><i class="entypo-pencil"></i> Edit</button>&nbsp';
                    $action .= '<button class="btn btn-success btn-sm btn-icon icon-left" onclick="Postandcommentlistmodel(' . $row->id . ')"><i class="entypo-docs"></i> View Posts & Comments</button>';
                    return $action;
                })

                ->rawColumns(['action', 'is_verify', 'text_color', 'background_color'])
                ->make(true);
        }
    }

    function delete(Request $request)
    {
        $delete['status'] = 0;
        $delete['msg'] = "Oops ! Community Topics not Deleted ";
        $d_id = $request->input('id');
        $CommunitytopicsDetails = CommunityTopics::where('id', $d_id)->first();
        if (!empty($CommunitytopicsDetails)) {
            $CommunitytopicsDetails->delete();
            if ($CommunitytopicsDetails) {
                $delete['status'] = 1;
                $delete['msg'] = "Community Topics Deleted Successfully";
            }
        }
        echo json_encode($delete);
        exit();
    }

    function edit(Request $request)
    {
        $edit = array();
        $edit['status'] = 0;
        $e_id =  $request->input('id');
        $edtq =  CommunityTopics::where('id', $e_id)->first();

        if ($edtq) {
            $edit['status'] = 1;
            $edit['user'] = $edtq;
        }
        echo json_encode($edit);
        exit();
    }

    function CommunityTopics(Request $request)
    {
        $currentUser = Auth::user();
        if (!$currentUser) {
            return response()->json([
                'success' => false,
                'message' => "User ID Not Found",
            ], 200);
        }
        $currentUserId = $currentUser->id;

        if (isset($request->search) && $request->search != '') {
            $topics = CommunityTopics::with(['topicsmember'])
                ->where('name', 'like', "%{$request->search}%")
                ->orWhere('host', 'like', "%{$request->search}%")
                ->get()->toArray();
        } else {
            $topics = CommunityTopics::with(['topicsmember'])->get()->toArray();
        }
        $topicData = array();
        $followingTopics = array();
        if (!empty($topics)) {
            foreach ($topics as $key => $value) {
                $topics[$key]['members'] = count($value['topicsmember']);
                $topics[$key]['isFollowing'] = 0;
                if (!empty($value['topicsmember'])) {
                    foreach ($value['topicsmember'] as $memberKey => $memberValue) {
                        if ($memberValue['user_id'] == $currentUserId && $memberValue['is_follow'] == '1') {
                            $topics[$key]['isFollowing'] = 1;
                        }
                        if ($memberValue['user_id'] == $currentUserId) {
                            $followingTopics[] = $topics[$key];
                        }
                    }
                }
                $topics[$key]['host'] = '@pyrium';
            }
        }
        $topicData[0]['topicTitle'] = 'Trending Topics';
        $topicData[0]['topics'] = $topics;

        $topicData[1]['topicTitle'] = 'Your Previously Engaged Topics';
        $topicData[1]['topics'] = $followingTopics;
        return response()->json([
            'success' => true,
            'message' => "Community Topics info get Successfully",
            'data' => $topicData
        ], 201);
    }

    function Postlist(Request $request)
    {
        $id = $request->input('id');
        if ($request->ajax()) {
            $data = TopicPost::select('*')->where('topic_id',$id)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('post_message', function ($row) {
                    if($row->post_message != '' && $row->post_message != null){
                        $post_message = '<p>'. $row->post_message .'</p>';
                    }else{
                        $post_message = '<p> null </p>';
                    }
                    return $post_message;
                })
                ->addColumn('action', function ($row) {
                    $action = '<button class="btn btn-success btn-sm btn-icon icon-left" onclick="commentlistmodel(' . $row->id . ','. $row->topic_id  .')"><i class="entypo-chat"></i>View Comments</button>';
                    return $action;
                })
                ->rawColumns(['action','post_image','post_message'])
                ->make(true);
        }
    }

    function commentlist(Request $request)
    {
        $postid = $request->input('postid');
        $topicid = $request->input('topicid');

        if ($request->ajax()) {
            $data = TopicComment::select('*')->where('topic_id',$topicid)->where('post_id',$postid)->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('comment_message', function ($row) {
                    if($row->comment_message != '' && $row->comment_message != null){
                        $comment_message = '<p>'. $row->comment_message .'</p>';
                    }else{
                        $comment_message = '<p> null </p>';
                    }
                    return $comment_message;
                })
                // ->addColumn('action', function ($row) {
                //     $action = '<button class="btn btn-success btn-sm btn-icon icon-left" onclick="commentlistmodel(' . $row->id . ','. $row->topic_id  .')"><i class="entypo-chat"></i>View Comments</button>';
                //     return $action;
                // })
                ->rawColumns(['comment_message'])
                ->make(true);
        }
    }

}
