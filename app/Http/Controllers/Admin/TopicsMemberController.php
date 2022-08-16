<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CommunityTopics;
use App\Models\TopicsMember;
use App\Models\TopicSuggestion;
use App\Models\TopicPost;
use App\Models\TopicComment;
use Auth;
use App\Models\User;
use GuzzleHttp\Psr7\Header;
use JWTAuth;
use File;
use Storage;
use Validator;
use DataTables;
use App\Helper\Helper;
use Carbon\Carbon;
use App\Models\IsFollow;

class TopicsMemberController extends Controller
{
    function followtopic(Request $request)
    {
        $currentUser = Auth::user();
        if (!$currentUser) {
            return response()->json([
                'success' => false,
                'message' => "User ID Not Found",
            ], 200);
        }
        $currentUserId = $currentUser->id;

        $validation = Validator::make($request->all(), [
            'topic_id' => 'required',
            'is_follow' => 'required|in:0,1'
        ]);

        if ($validation->fails()) {
            $data['status'] = 0;
            $data['error'] = $validation->errors()->all();
            return response()->json($data);
        }

        $topic_id = $request->topic_id;
        $is_follow = $request->is_follow;


        $messages = TopicsMember::where('topic_id', $topic_id)->where('user_id', $currentUserId)->first();
        if ($messages != null &&  $messages != '') {

            $messages->is_follow    = $is_follow;
            $messages->updated_at   = Carbon::now();
            $messages->save();

            if ($is_follow == 1) {
                return response()->json([
                    'success' => true,
                    'message' => "Topics Followed Successfully",
                    'data' => $messages
                ], 201);
            } else {
                return response()->json([
                    'success' => true,
                    'message' => "Topics UnFollowed Successfully",
                    'data' => $messages
                ], 201);
            }
        } else {

            $data_insert = new TopicsMember;
            $data_insert->user_id     = $currentUserId;
            $data_insert->topic_id    = $topic_id;
            $data_insert->is_follow   = $is_follow;
            $data_insert->created_at  = Carbon::now();
            $data_insert->save();
            $insert_id = $data_insert->id;

            if ($insert_id && $is_follow == 1) {
                return response()->json([
                    'success' => true,
                    'message' => "Topics Followed Successfully",
                    'data' => $data_insert
                ], 201);
            } else {
                return response()->json([
                    'success' => true,
                    'message' => "Topics UnFollowed Successfully",
                    'data' => $data_insert
                ], 201);
            }
        }
    }

    function topicsuggestion(Request $request)
    {

        $currentUser = Auth::user();
        if (!$currentUser) {
            return response()->json([
                'success' => false,
                'message' => "User ID Not Found",
            ], 200);
        }
        $currentUserId = $currentUser->id;

        $validation = Validator::make($request->all(), [
            'topicname' => 'required',
            'suggestion' => 'required'
        ]);

        if ($validation->fails()) {
            $data['status'] = 0;
            $data['error'] = $validation->errors()->all();
            return response()->json($data);
        }

        $topicname = $request->topicname;
        $suggestion = $request->suggestion;


        // $messages = TopicSuggestion::where('topicname', $topicname)->first();
        // if ($messages != null &&  $messages != '') {

        //     $messages->suggestion    = $suggestion;
        //     $messages->updated_at   = Carbon::now();
        //     $messages->save();
        //         return response()->json([
        //             'success' => true,
        //             'message' => "Topics Suggestion Update Successfully",
        //             'data' => $messages
        //         ], 201);

        // } else {}

        $data_insert = new TopicSuggestion;
        $data_insert->topicname     = $topicname;
        $data_insert->suggestion    = $suggestion;
        $data_insert->user_id       = $currentUserId;
        $data_insert->created_at    = Carbon::now();
        $data_insert->save();
        $insert_id = $data_insert->id;

        if ($insert_id) {
            return response()->json([
                'success' => true,
                'message' => "Topics Suggestion Successfully",
                'data' => $data_insert
            ], 201);
        }
    }

    function topicpost(Request $request, $id = null)
    {
        $currentUser = Auth::user();
        if (!$currentUser) {
            return response()->json([
                'success' => false,
                'message' => "User ID Not Found",
            ], 200);
        }
        $currentUserId = $currentUser->id;

        $validation = Validator::make($request->all(), [
            'topic_id' => 'required',
        ]);

        if ($validation->fails()) {
            $data['status'] = 0;
            $data['error'] = $validation->errors()->all();
            return response()->json($data);
        }

        $topic_id = $request->topic_id;
        $post_message = $request->post_message;
        $post_image = $request->post_image;
        $tags = json_encode($request->tags);

        $userList = User::get()->toArray();
        if (isset($id) && $id != null && $id != '') {
            $messages = TopicPost::where('id', $id)->where('user_id', $currentUserId)->first();
            if ($messages != null &&  $messages != '') {

                if (isset($post_message) && $post_message != null &&  $post_message != '') {
                    $messages->post_message = $post_message;
                }
                if (isset($post_image) && $post_image != null &&  $post_image != '') {
                    $messages->post_image = $post_image;
                }
                if (isset($tags) && $tags != null &&  $tags != '') {
                    $messages->tags = $tags;
                }
                $messages->updated_at      = Carbon::now();
                $messages->save();

                if (!empty($messages)) {
                    $tags = json_decode($tags);
                    $messages['tags'] = $tags;
                    if(!empty($tags)) {
                        foreach($tags as $tagKey => $tagValue) {
                            $userID = $tagValue->userid; 
                            $tags[$tagKey]->user = array();
                            if(!empty($userList)) {
                                foreach($userList as $userKey => $userValue) {
                                    if($userValue['id'] == $userID) {
                                        $tags[$tagKey]->user = $userValue;
                                    }
                                }
                            }
                        }    
                    }
                }

                return response()->json([
                    'success' => true,
                    'message' => "Topic Post Updated Successfully",
                    'data' => $messages
                ], 201);
            } else {
                return response()->json([
                    'success' => true,
                    'message' => "Topic Post Not Found",
                    'data' => $messages
                ], 201);
            }
        } else {
            $data_insert = new TopicPost;
            $data_insert->user_id        = $currentUserId;
            $data_insert->topic_id        = $topic_id;
            $data_insert->post_message    = $post_message;
            $data_insert->tags            = $tags;
            $data_insert->post_image      = $post_image;
            $data_insert->created_at    = Carbon::now();
            $data_insert->save();
            $insert_id = $data_insert->id;

            if ($insert_id) {
                $tags = json_decode($tags);
                $data_insert['tags'] = $tags;
                if(!empty($tags)) {
                    foreach($tags as $tagKey => $tagValue) {
                        $userID = $tagValue->userid; 
                        $tags[$tagKey]->user = array();
                        if(!empty($userList)) {
                            foreach($userList as $userKey => $userValue) {
                                if($userValue['id'] == $userID) {
                                    $tags[$tagKey]->user = $userValue;
                                }
                            }
                        }
                    }    
                }
                return response()->json([
                    'success' => true,
                    'message' => "Topic Post Inserted Successfully",
                    'data' => $data_insert
                ], 201);
            }
        }
    }

    function topiccomment(Request $request, $id = null)
    {
        $currentUser = Auth::user();
        if (!$currentUser) {
            return response()->json([
                'success' => false,
                'message' => "User ID Not Found",
            ], 200);
        }
        $currentUserId = $currentUser->id;

        $validation = Validator::make($request->all(), [
            'topic_id' => 'required',
            'post_id' => 'required',

        ]);

        if ($validation->fails()) {
            $data['status'] = 0;
            $data['error'] = $validation->errors()->all();
            return response()->json($data);
        }

        $topic_id = $request->topic_id;
        $post_id = $request->post_id;
        $message = $request->message;
        $image = $request->image;
        $tags = json_encode($request->tags);
        $userList = User::get()->toArray();

        if (isset($id) && $id != null && $id != '') {
            $messages = TopicComment::where('id', $id)->where('user_id', $currentUserId)->first();
            if ($messages != null &&  $messages != '') {

                if (isset($message) && $message != null &&  $message != '') {
                    $messages->message = $message;
                }
                if (isset($image) && $image != null &&  $image != '') {
                    $messages->image = $image;
                }
                if (isset($tags) && $tags != null &&  $tags != '') {
                    $messages->tags = $tags;
                }
                $messages->updated_at      = Carbon::now();
                $messages->save();

                if (!empty($messages)) {
                    $tags = json_decode($tags);
                    $messages['tags'] = $tags;
                    if(!empty($tags)) {
                        foreach($tags as $tagKey => $tagValue) {
                            $userID = $tagValue->userid; 
                            $tags[$tagKey]->user = array();
                            if(!empty($userList)) {
                                foreach($userList as $userKey => $userValue) {
                                    if($userValue['id'] == $userID) {
                                        $tags[$tagKey]->user = $userValue;
                                    }
                                }
                            }
                        }    
                    }
                }
                
                return response()->json([
                    'success' => true,
                    'message' => "Topic Comment Updated Successfully",
                    'data' => $messages
                ], 201);
            } else {
                return response()->json([
                    'success' => true,
                    'message' => "Topic Comment Not Found",
                    'data' => $messages
                ], 201);
            }
        } else {
            $data_insert = new TopicComment;
            $data_insert->user_id         = $currentUserId;
            $data_insert->topic_id        = $topic_id;
            $data_insert->post_id         = $post_id;
            $data_insert->message         = $message;
            $data_insert->tags            = $tags;
            $data_insert->image           = $image;
            $data_insert->created_at      = Carbon::now();
            $data_insert->save();
            $insert_id = $data_insert->id;

            if ($insert_id) {
                $tags = json_decode($tags);
                $data_insert['tags'] = $tags;
                if(!empty($tags)) {
                    foreach($tags as $tagKey => $tagValue) {
                        $userID = $tagValue->userid; 
                        $tags[$tagKey]->user = array();
                        if(!empty($userList)) {
                            foreach($userList as $userKey => $userValue) {
                                if($userValue['id'] == $userID) {
                                    $tags[$tagKey]->user = $userValue;
                                }
                            }
                        }
                    }    
                }
                return response()->json([
                    'success' => true,
                    'message' => "Topic Comment Inserted Successfully",
                    'data' => $data_insert
                ], 201);
            }
        }
    }

    function topicpostlist(Request $request)
    {
        $currentUser = Auth::user();
        $currentUserId = $currentUser->id;
        if (!$currentUserId) {
            return response()->json([
                'success' => false,
                'message' => "User Not Found",
            ], 200);
        }

        $isFollowData = IsFollow::where('user_id', $currentUserId)->where('is_follow','1')->get()->toArray();
        $followingUserID = array();
        if(!empty($isFollowData)) {
            foreach($isFollowData as $key => $value) {
                $followingUserID[] = $value['to_user_id'];
            }
        }

        $topic_id = $request->topic_id;
        $messages = TopicPost::with(['users'])->where('topic_id', $topic_id)->get()->toArray();
        $userList = User::get()->toArray();
        if (!empty($messages)) {
            foreach ($messages as $key => $value) {
                $messages[$key]['is_following'] = 0;
                if(in_array($value['user_id'],$followingUserID)) {
                    $messages[$key]['is_following'] = 1;
                } 
                $tags = json_decode($value['tags']);
                if(!empty($tags)) {
                    foreach($tags as $tagKey => $tagValue) {
                        $userID = $tagValue->userid; 
                        $tags[$tagKey]->user = array();
                        if(!empty($userList)) {
                            foreach($userList as $userKey => $userValue) {
                                if($userValue['id'] == $userID) {
                                    $tags[$tagKey]->user = $userValue;
                                    $tags[$tagKey]->is_following = 0;
                                    if(in_array($userValue['id'],$followingUserID)) {
                                        $tags[$tagKey]->is_following = 1;
                                    }
                                }
                            }
                        }
                    }    
                }
                $messages[$key]['tags'] = $tags;
                $commentList = $this::topiccommentlistbypost($topic_id,$value['id'],$followingUserID);
                //echo '<pre>'; print_r($commentList); exit;
                $messages[$key]['comments'] = $commentList;
            }
        }

        return response()->json([
            'success' => true,
            'message' => "Topic Post List Get Successfully",
            'data' => $messages
        ], 201);
    }

    function topiccommentlistbypost($topic_id,$post_id,$followingUserID)
    {
        $messages = TopicComment::with(['users'])->where('topic_id', $topic_id)->where('post_id', $post_id)->get()->toArray();
        $userList = User::get()->toArray();
        if (!empty($messages)) {
            foreach ($messages as $key => $value) {
                $messages[$key]['is_following'] = 0;
                if(in_array($value['user_id'],$followingUserID)) {
                    $messages[$key]['is_following'] = 1;
                }
                $tags = json_decode($value['tags']);
                if(!empty($tags)) {
                    foreach($tags as $tagKey => $tagValue) {
                        $userID = $tagValue->userid; 
                        $tags[$tagKey]->user = array();
                        if(!empty($userList)) {
                            foreach($userList as $userKey => $userValue) {
                                if($userValue['id'] == $userID) {
                                    $tags[$tagKey]->user = $userValue;
                                    $tags[$tagKey]->is_following = 0;
                                    if(in_array($userValue['id'],$followingUserID)) {
                                        $tags[$tagKey]->is_following = 1;
                                    }
                                }
                            }
                        }
                    }    
                }
                $messages[$key]['tags'] = $tags;
            }
        }
        return $messages;
    }

    function topiccommentlist(Request $request)
    {
        $currentUser = Auth::user();
        $currentUserId = $currentUser->id;
        if (!$currentUserId) {
            return response()->json([
                'success' => false,
                'message' => "User Not Found",
            ], 200);
        }

        $topic_id = $request->topic_id;
        $post_id = $request->post_id;

        $messages = TopicComment::where('topic_id', $topic_id)->where('post_id', $post_id)->where('user_id', $currentUserId)->get()->toArray();
        $userList = User::get()->toArray();
        if (!empty($messages)) {
            foreach ($messages as $key => $value) {
                $tags = json_decode($value['tags']);
                if(!empty($tags)) {
                    foreach($tags as $tagKey => $tagValue) {
                        $userID = $tagValue->userid; 
                        $tags[$tagKey]->user = array();
                        if(!empty($userList)) {
                            foreach($userList as $userKey => $userValue) {
                                if($userValue['id'] == $userID) {
                                    $tags[$tagKey]->user = $userValue;
                                }
                            }
                        }
                    }    
                }
                $messages[$key]['tags'] = $tags;
            }
        }

        return response()->json([
            'success' => true,
            'message' => "Topic Post List Get Successfully",
            'data' => $messages
        ], 201);
    }
}
