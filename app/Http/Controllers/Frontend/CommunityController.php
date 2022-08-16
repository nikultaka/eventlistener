<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Discussion;
use App\Models\DiscussionTopics;
use Auth;
use Validator;
use Carbon\Carbon;
use Helper;

class CommunityController extends Controller
{
    public function index()
    {
        $data = Question::leftJoin("users", function ($join) {
            $join->on("users.id", "=", "questions.userid");
        })->select('questions.*','users.profile_pic','users.name')->orderBy('questions.id', 'DESC')->get();
        $discussion = Discussion::leftJoin("users", function ($join) {
            $join->on("users.id", "=", "discussions.user_id");
        })->where([['discussions.user_id', '=', Auth::user()->id],['discussions.is_post', '=', 1],['discussions.is_active', '=', 1],['discussions.is_delete', '=', 0]])->orderBy('id', 'DESC')->select('discussions.*','users.profile_pic','users.name')->get();
        
        $topic = DiscussionTopics::where([['user_id', '=', Auth::user()->id], ['is_active', '=', 1], ['is_delete', '=', 0]])->orderBy('id', 'ASC')->get();
        // echo "<pre>";
        // print_r($discussion);
        // die;
        return view('Frontend/community/community', compact(['data', 'discussion','topic']));
    }

    public function addanswer(Request $request){
        $rules = [
            'question_id'  => 'required',
            'answer' => 'required',
        ];
        $customs = [
            'question_id.required' => 'The Question ID field is required.',
            'answer.required' => 'The Answer field is required.',
        ];
        $validation = Validator::make($request->all(), $rules, $customs);

        if ($validation->fails()) {
            $data['status'] = false;
            $data['msg'] = $validation->errors()->first();
            echo json_encode($data);
            exit();
        }

        $data = $request->input();
        $data_insert = new Answer;
        $data_insert->userid = Auth::user()->id;
        $data_insert->questions_id = $data['question_id'];
        $data_insert->answers = $data['answer'];
        $data_insert->save();
        $insert_id = $data_insert->id;
        $last_data = Answer::leftJoin("users", function ($join) {
            $join->on("users.id", "=", "answers.userid");
        })->where([['answers.questions_id', '=', $data['question_id']],['answers.is_active', '=', 1],['answers.is_delete', '=', 0]])->select('answers.*','users.profile_pic','users.name')->get();
        foreach($last_data as $val){
            $val->ago = Helper::time_elapsed_string($val->created_at);
        }
        if ($insert_id) {
            $result['status'] = 1;
            $result['data'] = $last_data;
            $result['msg'] = "Answer add Successfully";
            $result['id'] = $insert_id;
        }
        echo json_encode($result);
        exit();
    }


    public function getAnswer(Request $request)
    {
        $answer = Answer::leftJoin("users", function ($join) {
            $join->on("users.id", "=", "answers.userid");
        })->where([['answers.questions_id', '=', $request->input('id')],['answers.is_active', '=', 1],['answers.is_delete', '=', 0]])->select('answers.*','users.profile_pic','users.name')->get();
        foreach($answer as $val){
            $val->ago = Helper::time_elapsed_string($val->created_at);
        }
        if(!$answer->isEmpty()){
            $result['status'] = 1;
            $result['data'] =  $answer;
        }else{
            $result['status'] = 0;
        }
        echo json_encode($result);
        exit();
    }

    public function getComment(Request $request)
    {
        $comment = Discussion::leftJoin("users", function ($join) {
            $join->on("users.id", "=", "discussions.user_id");
        })->where([['discussions.discussion_id', '=', $request->input('id')],['discussions.is_comment', '=', 1],['discussions.is_active', '=', 1],['discussions.is_delete', '=', 0]])->select('discussions.*','users.profile_pic','users.name')->get();
        foreach($comment as $val){
            $val->ago = Helper::time_elapsed_string($val->created_at);
        }
        if(!$comment->isEmpty()){
            $result['status'] = 1;
            $result['data'] =  $comment;
        }else{
            $result['status'] = 0;
        }
        echo json_encode($result);
        exit();
    }

    public function addcomment(Request $request){
        $rules = [
            'comment_id'  => 'required',
            'desc' => 'required',
        ];
        $customs = [
            'comment_id.required' => 'The Comment ID field is required.',
            'desc.required' => 'The Comment field is required.',
        ];
        $validation = Validator::make($request->all(), $rules, $customs);

        if ($validation->fails()) {
            $data['status'] = false;
            $data['msg'] = $validation->errors()->first();
            echo json_encode($data);
            exit();
        }
      

        $data = $request->input();

        $post_data =  $topic = Discussion::where([['id', '=',$data['comment_id'] ],['is_active', '=', 1],['is_delete', '=', 0]])->first();

        $post_id = 0;
        if($post_data->is_post == 1 && $post_data->is_comment == 0){
            $post_id = $post_data->id;
        }elseif ($post_data->is_post == 0 && $post_data->is_comment == 1) {
            $post_id = $post_data->post_id;
        }
     
        $data_insert = new Discussion;
        $data_insert->user_id = Auth::user()->id;
        $data_insert->comment_desc = $data['desc'];
        $data_insert->discussion_id = $data['comment_id'];
        $data_insert->post_id = $post_id;
        $data_insert->is_post = 0;
        $data_insert->is_comment = 1;
        $data_insert->save();
        $insert_id = $data_insert->id;


        $comment = Discussion::leftJoin("users", function ($join) {
            $join->on("users.id", "=", "discussions.user_id");
        })->where([['discussions.discussion_id', '=',$data['comment_id']],['discussions.is_comment', '=', 1],['discussions.is_active', '=', 1],['discussions.is_delete', '=', 0]])->select('discussions.*','users.profile_pic','users.name')->get();
        foreach($comment as $val){
            $val->ago = Helper::time_elapsed_string($val->created_at);
        }

        if ($insert_id) {
            $result['status'] = 1;
            $result['data'] = $comment;
            $result['msg'] = "comment add Successfully";
            $result['id'] = $insert_id;
        }
        echo json_encode($result);
        exit();
        
    }

    public function addpost(Request $request){
        $rules = [
            'desc' => 'required',
        ];
        $customs = [
            'desc.required' => 'The Comment field is required.',
        ];
        $validation = Validator::make($request->all(), $rules, $customs);

        if ($validation->fails()) {
            $data['status'] = false;
            $data['msg'] = $validation->errors()->first();
            echo json_encode($data);
            exit();
        }

        $data = $request->input();
        $data_insert = new Discussion;
        $data_insert->user_id = Auth::user()->id;
        $data_insert->post_desc = $data['desc'];
        $data_insert->is_post = 1;
        $data_insert->is_comment = 0;
        $data_insert->save();
        $insert_id = $data_insert->id;

        $discussion = Discussion::leftJoin("users", function ($join) {
            $join->on("users.id", "=", "discussions.user_id");
        })->where([['discussions.id', '=',$insert_id],['discussions.is_post', '=', 1],['discussions.is_active', '=', 1],['discussions.is_delete', '=', 0]])->orderBy('id', 'DESC')->select('discussions.*','users.profile_pic','users.name')->get();
        foreach($discussion as $val){
            $val->ago = Helper::time_elapsed_string($val->created_at);
        }


        if ($insert_id) {
            $result['status'] = 1;
            $result['data'] = $discussion;
            $result['msg'] = "Post add Successfully";
            $result['id'] = $insert_id;
        }
        echo json_encode($result);
        exit();
        
    }

    public function discussion_submit(Request $request)
    {
        $rules = [
            'discussion_title' => 'required',
            'discussion_desc' => 'required',
        ];
        $customs = [
            'discussion_title.required' => 'The Discussion Title field is required.',
            'discussion_desc.required' => 'The Discussion Desc field is required.',
        ];
        $validation = Validator::make($request->all(), $rules, $customs);

        if ($validation->fails()) {
            $data['status'] = false;
            $data['msg'] = $validation->errors()->first();
            echo json_encode($data);
            exit();
        }

        $data = $request->input();
        $data_insert = new DiscussionTopics;
        $data_insert->user_id = Auth::user()->id;
        $data_insert->topic_title = $data['discussion_title'];
        $data_insert->topic_desc = $data['discussion_desc'];
        $data_insert->save();
        $insert_id = $data_insert->id;
        if ($insert_id) {
            $result['status'] = 1;
            $result['msg'] = "Discussion Topics Save Successfully";
            $result['id'] = $insert_id;
        }
        echo json_encode($result);
        exit();
    }

    public function getTopicDetails(Request $request)
    {
        $topic = DiscussionTopics::where([['user_id', '=', Auth::user()->id],['id', '=', $request->id],['is_active', '=', 1],['is_delete', '=', 0]])->select('id','topic_title','topic_desc')->first();
        if(!empty($topic)){
            $result['status'] = 1;
            $result['data'] =  $topic;
        }else{
            $result['status'] = 0;
            $result['msg'] = "No topic detail's found.";
        }

        echo json_encode($result);
        exit();
    }

    public function discussion_update(Request $request)
    {
        $rules = [
            'discussion_id' => 'required',
            'discussion_title' => 'required',
            'discussion_desc' => 'required',
        ];
        $customs = [
            'discussion_id.required' => 'The Discussion Id field is required.',
            'discussion_title.required' => 'The Discussion Title field is required.',
            'discussion_desc.required' => 'The Discussion Desc field is required.',
        ];
        $validation = Validator::make($request->all(), $rules, $customs);

        if ($validation->fails()) {
            $data['status'] = false;
            $data['msg'] = $validation->errors()->first();
            echo json_encode($data);
            exit();
        }

        $data = $request->input();
     
        $discussionTopics = DiscussionTopics::where('id',$data['discussion_id'])->first();
        $discussionTopics->topic_title = $data['discussion_title'];
        $discussionTopics->topic_desc = $data['discussion_desc'];
        $discussionTopics->updated_at        = Carbon::now();
        $discussionTopics->save();

        if ($discussionTopics) {
            $result['status'] = 1;
            $result['msg'] = "Discussion Topics Updated Successfully";
        }
      
        echo json_encode($result);
        exit();
    }

    public function discussion_delete(Request $request)
    {
       
        $data = $request->input();
     
        $discussionTopics = DiscussionTopics::where('id',$data['id'])->first();
        $discussionTopics->is_delete        = 1;
        $discussionTopics->updated_at        = Carbon::now();
        $discussionTopics->save();

        $topic = DiscussionTopics::where([['user_id', '=', Auth::user()->id],['is_active', '=', 1],['is_delete', '=', 0]])->select('id','topic_title','topic_desc')->get();
        
        if ($discussionTopics) {
            $result['status'] = 1;
            $result['data'] = $topic;
            $result['msg'] = "Discussion Topics Deleted Successfully";
        }
      
        echo json_encode($result);
        exit();
    }
    
    
    
}