<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);
Route::post('/register', [App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('/forgot-password', [App\Http\Controllers\Api\AuthController::class,'forgot_password']);
Route::get('/user-list', [App\Http\Controllers\Api\AuthController::class, 'userlist']);


Route::group(['middleware' => ['jwt.verify']], function() {
    Route::post('/updateProfile', [App\Http\Controllers\Api\AuthController::class, 'updateProfile']);
    Route::post('/updatePassword', [App\Http\Controllers\Api\AuthController::class, 'updatePassword']);
    Route::get('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);Route::post('/updatePassword', [App\Http\Controllers\Api\AuthController::class, 'updatePassword']);    
    Route::get('/getuserprofile', [App\Http\Controllers\Api\AuthController::class, 'userProfile']);
    Route::get('/feedwall', [App\Http\Controllers\Admin\FeedwallController::class, 'list']);
    Route::get('/story', [App\Http\Controllers\Admin\StoryController::class, 'list']);
    Route::post('/viewdstory', [App\Http\Controllers\Admin\StoryController::class, 'viewed']);
    Route::get('/community_category', [App\Http\Controllers\Admin\CommunityCategoryController::class, 'list']);
    Route::post('/social-feeds', [App\Http\Controllers\Admin\MessagesController::class, 'list']);

    Route::post('/messages', [App\Http\Controllers\Admin\MessagesController::class, 'messages']);

    Route::post('/notifications', [App\Http\Controllers\Admin\MessagesController::class, 'notification']);

    Route::post('/discover', [App\Http\Controllers\Admin\DiscoverController::class, 'list']);
    Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'list']);

    Route::post('/update-message-status', [App\Http\Controllers\Admin\MessagesController::class, 'updateStatus']);

    Route::post('/update-notification-status', [App\Http\Controllers\Admin\MessagesController::class, 'updateNotificationStatus']);

    Route::post('/post-conversation', [App\Http\Controllers\Admin\MessagesController::class, 'postConversation']);
    Route::post('/conversation-status', [App\Http\Controllers\Admin\MessagesController::class, 'conversationStatus']);  

    Route::get('/messageconversation', [App\Http\Controllers\Admin\MessagesController::class, 'messageconversation']);


    //CommunityTopics
    Route::get('/communitytopics', [App\Http\Controllers\Admin\CommunityTopicsController::class, 'CommunityTopics']);

    
    //TopicsMember
    Route::post('/followtopic', [App\Http\Controllers\Admin\TopicsMemberController::class, 'followtopic']);
    Route::post('/topic-suggestion', [App\Http\Controllers\Admin\TopicsMemberController::class, 'topicsuggestion']);
    Route::post('/topic-post', [App\Http\Controllers\Admin\TopicsMemberController::class, 'topicpost']);
    Route::post('/topic-post/{id}', [App\Http\Controllers\Admin\TopicsMemberController::class, 'topicpost']);
    Route::post('/topic-comment', [App\Http\Controllers\Admin\TopicsMemberController::class, 'topiccomment']);
    Route::post('/topic-comment/{id}', [App\Http\Controllers\Admin\TopicsMemberController::class, 'topiccomment']);

    Route::post('/topic-postlist', [App\Http\Controllers\Admin\TopicsMemberController::class, 'topicpostlist']);
    Route::post('/topic-commentlist', [App\Http\Controllers\Admin\TopicsMemberController::class, 'topiccommentlist']);

    Route::post('/post-feedback', [App\Http\Controllers\Admin\FeedbackController::class, 'postfeedback']);
    Route::get('/list-feedback', [App\Http\Controllers\Admin\FeedbackController::class, 'listfeedback']);
    Route::get('/list-subject', [App\Http\Controllers\Admin\FeedbackController::class, 'listsubject']);


    //Is_Follow
    Route::post('/is-follow', [App\Http\Controllers\Admin\IsFollowController::class, 'followuser']);
});
