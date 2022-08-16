<?php

use App\Http\Controllers\ImageUploadController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', [App\Http\Controllers\Frontend\Auth\LoginController::class, 'index']);

Route::get('/login', [App\Http\Controllers\Frontend\Auth\LoginController::class, 'index'])->name('user-login');
Route::post('/login/proccess', [App\Http\Controllers\Frontend\Auth\LoginController::class, 'loginProccess'])->name('login-proccess');

Route::get('/user-logout', [App\Http\Controllers\Frontend\Auth\LoginController::class, 'logout'])->name('logout-user');

Route::group(['middleware' => ['Isuser']], function () {
    Route::get('/profile', [App\Http\Controllers\Frontend\UserController::class, 'index'])->name('user-profile');
    Route::post('/profile/save-profile', [App\Http\Controllers\Frontend\UserController::class, 'save_profile'])->name('user-profile-proccess');
    Route::post('/profile/feedback', [App\Http\Controllers\Frontend\UserController::class, 'feedback'])->name('user-feedback');

    Route::get('/campaigns', [App\Http\Controllers\Frontend\CampaignsController::class, 'index'])->name('campaigns');
    Route::get('/campaigns-creator', [App\Http\Controllers\Frontend\CampaignsController::class, 'campaigns_creator'])->name('campaigns-creator');
    Route::post('/campaigns-creator/submit', [App\Http\Controllers\Frontend\CampaignsController::class, 'campaigns_creator_submit'])->name('campaigns-creator-submit');
    Route::get('/campaigns-revisions', [App\Http\Controllers\Frontend\CampaignsController::class, 'campaigns_revisions'])->name('campaigns-revisions');
    Route::post('/campaigns-revisions/revision', [App\Http\Controllers\Frontend\CampaignsController::class, 'campaigns_revisions_submit'])->name('campaigns-revisions-submit');
        
    Route::get('/community', [App\Http\Controllers\Frontend\CommunityController::class, 'index'])->name('community');
    Route::post('/community/answer', [App\Http\Controllers\Frontend\CommunityController::class, 'addanswer'])->name('community-answer');
    Route::post('/community/getAnswer', [App\Http\Controllers\Frontend\CommunityController::class, 'getAnswer'])->name('community-getAnswer');
    
    Route::post('/community/comment', [App\Http\Controllers\Frontend\CommunityController::class, 'getComment'])->name('community-comment');
    Route::post('/community/addcomment', [App\Http\Controllers\Frontend\CommunityController::class, 'addcomment'])->name('community-addcomment');
    Route::post('/community/addpost', [App\Http\Controllers\Frontend\CommunityController::class, 'addpost'])->name('community-addpost');
    Route::post('/discussion/submit', [App\Http\Controllers\Frontend\CommunityController::class, 'discussion_submit'])->name('discussion-submit');
    Route::post('/discussion/gettopic', [App\Http\Controllers\Frontend\CommunityController::class, 'getTopicDetails'])->name('discussion-gettopic');
    Route::post('/discussion/update', [App\Http\Controllers\Frontend\CommunityController::class, 'discussion_update'])->name('discussion-update');
    Route::post('/discussion/delete', [App\Http\Controllers\Frontend\CommunityController::class, 'discussion_delete'])->name('discussion-delete');
   
    
    Route::get('/status', [App\Http\Controllers\Frontend\StatusController::class, 'index'])->name('status');
    Route::post('/status/submit', [App\Http\Controllers\Frontend\StatusController::class, 'highlight_submit'])->name('highlight-submit');
    Route::post('/status/gethighlight', [App\Http\Controllers\Frontend\StatusController::class, 'gethighlightDetails'])->name('highlight-gettopic');
    Route::post('/status/update', [App\Http\Controllers\Frontend\StatusController::class, 'highlight_update'])->name('highlight-update');
    Route::post('/status/delete', [App\Http\Controllers\Frontend\StatusController::class, 'highlight_delete'])->name('highlight-delete');
   
  


    Route::get('/campaigns-review', [App\Http\Controllers\Frontend\CampaignsController::class, 'campaigns_review'])->name('campaigns-review');
    Route::post('/campaigns-review/get-review', [App\Http\Controllers\Frontend\CampaignsController::class, 'get_review'])->name('campaigns-review-get');

    Route::get('/campaigns-confirmed', [App\Http\Controllers\Frontend\CampaignsController::class, 'index'])->name('campaigns-confirmed');
   
   
    Route::get('/campaigns-review-editor', [App\Http\Controllers\Frontend\CampaignsController::class, 'campaigns_review_editor'])->name('campaigns-review-editor');

});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/logout-admin', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout-admin');

Route::group(['prefix' => ADMIN], function () {

    Route::get('/', [App\Http\Controllers\Admin\Auth\LoginController::class, 'index'])->name('admin-login');
    Route::get('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'index']);
    Route::post('/login/proccess', [App\Http\Controllers\Admin\Auth\LoginController::class, 'loginProccess'])->name('admin-login-proccess');

    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin-dashboard');

        Route::post('/notificationlist', [App\Http\Controllers\HomeController::class, 'notificationlist'])->name('notificationlist');

        // manage user
        Route::get('/manage/users', [App\Http\Controllers\Admin\ManageUsersController::class, 'index'])->name('admin-manage-users');
        Route::post('/manage/users/save', [App\Http\Controllers\Admin\ManageUsersController::class, 'add'])->name('admin-manage-users-save');
        Route::post('/manage/users/dataTable', [App\Http\Controllers\Admin\ManageUsersController::class, 'datatable'])->name('admin-manage-users-datatable');
        Route::post('/manage/users/edit', [App\Http\Controllers\Admin\ManageUsersController::class, 'edit'])->name('admin-manage-users-edit');
        Route::post('/manage/users/delete', [App\Http\Controllers\Admin\ManageUsersController::class, 'delete'])->name('admin-manage-users-delete');
        Route::get('/email/exist/or/not', [App\Http\Controllers\Admin\ManageUsersController::class, 'emailExistOrNot'])->name('admin-email-exist-or-not');
        Route::post('/manage/users/view', [App\Http\Controllers\Admin\ManageUsersController::class, 'view'])->name('admin-manage-users-view');

        // role
        Route::get('/role', [App\Http\Controllers\Admin\RoleController::class, 'index'])->name('admin-role');
        Route::post('/role/add', [App\Http\Controllers\Admin\RoleController::class, 'add'])->name('admin-role-add');
        Route::post('/role/datatable', [App\Http\Controllers\Admin\RoleController::class, 'datatable'])->name('admin-role-datatable');
        Route::post('/role/delete', [App\Http\Controllers\Admin\RoleController::class, 'delete'])->name('admin-role-delete');
        Route::post('/role/edit', [App\Http\Controllers\Admin\RoleController::class, 'edit'])->name('admin-role-edit');

        // category
        Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin-category');
        Route::post('/category/add', [App\Http\Controllers\Admin\CategoryController::class, 'add'])->name('admin-category-add');
        Route::post('/category/datatable', [App\Http\Controllers\Admin\CategoryController::class, 'datatable'])->name('admin-category-datatable');
        Route::post('/category/delete', [App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('admin-category-delete');
        Route::post('/category/edit', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin-category-edit');

        // subcategory
        Route::get('/subsubcategory', [App\Http\Controllers\Admin\SubCategoryController::class, 'index'])->name('admin-subcategory');
        Route::post('/subcategory/add', [App\Http\Controllers\Admin\SubCategoryController::class, 'add'])->name('admin-subcategory-add');
        Route::post('/subcategory/datatable', [App\Http\Controllers\Admin\SubCategoryController::class, 'datatable'])->name('admin-subcategory-datatable');
        Route::post('/subcategory/delete', [App\Http\Controllers\Admin\SubCategoryController::class, 'delete'])->name('admin-subcategory-delete');
        Route::post('/subcategory/edit', [App\Http\Controllers\Admin\SubCategoryController::class, 'edit'])->name('admin-subcategory-edit');

        // feedwall
        Route::get('/feedwall', [App\Http\Controllers\Admin\FeedwallController::class, 'index'])->name('admin-feedwall');
        Route::post('/feedwall/add', [App\Http\Controllers\Admin\FeedwallController::class, 'add'])->name('admin-feedwall-add');
        Route::post('/feedwall/datatable', [App\Http\Controllers\Admin\FeedwallController::class, 'datatable'])->name('admin-feedwall-datatable');
        Route::post('/feedwall/delete', [App\Http\Controllers\Admin\FeedwallController::class, 'delete'])->name('admin-feedwall-delete');
        Route::post('/feedwall/edit', [App\Http\Controllers\Admin\FeedwallController::class, 'edit'])->name('admin-feedwall-edit');

        // story
        Route::get('/story', [App\Http\Controllers\Admin\StoryController::class, 'index'])->name('admin-story');
        Route::post('/story/add', [App\Http\Controllers\Admin\StoryController::class, 'add'])->name('admin-story-add');
        Route::post('/story/datatable', [App\Http\Controllers\Admin\StoryController::class, 'datatable'])->name('admin-story-datatable');
        Route::post('/story/delete', [App\Http\Controllers\Admin\StoryController::class, 'delete'])->name('admin-story-delete');
        Route::post('/story/edit', [App\Http\Controllers\Admin\StoryController::class, 'edit'])->name('admin-story-edit');

        // Snaps
        Route::post('/snaps/add', [App\Http\Controllers\Admin\SnapsController::class, 'add'])->name('admin-snaps-add');
        Route::post('/snaps/datatable', [App\Http\Controllers\Admin\SnapsController::class, 'datatable'])->name('admin-snaps-datatable');
        Route::post('/snaps/delete', [App\Http\Controllers\Admin\SnapsController::class, 'delete'])->name('admin-snaps-delete');
        Route::post('/snaps/edit', [App\Http\Controllers\Admin\SnapsController::class, 'edit'])->name('admin-snaps-edit');

        // industries
        Route::get('/industries', [App\Http\Controllers\Admin\IndustriesController::class, 'index'])->name('admin-industries');
        Route::post('/industries/add', [App\Http\Controllers\Admin\IndustriesController::class, 'add'])->name('admin-industries-add');
        Route::post('/industries/datatable', [App\Http\Controllers\Admin\IndustriesController::class, 'datatable'])->name('admin-industries-datatable');
        Route::post('/industries/delete', [App\Http\Controllers\Admin\IndustriesController::class, 'delete'])->name('admin-industries-delete');
        Route::post('/industries/edit', [App\Http\Controllers\Admin\IndustriesController::class, 'edit'])->name('admin-industries-edit');

        // discover
        Route::get('/discover', [App\Http\Controllers\Admin\DiscoverController::class, 'index'])->name('admin-discover');
        Route::post('/discover/add', [App\Http\Controllers\Admin\DiscoverController::class, 'add'])->name('admin-discover-add');
        Route::post('/discover/datatable', [App\Http\Controllers\Admin\DiscoverController::class, 'datatable'])->name('admin-discover-datatable');
        Route::post('/discover/delete', [App\Http\Controllers\Admin\DiscoverController::class, 'delete'])->name('admin-discover-delete');
        Route::post('/discover/edit', [App\Http\Controllers\Admin\DiscoverController::class, 'edit'])->name('admin-discover-edit');
        Route::post('/discover/subcategory_id', [App\Http\Controllers\Admin\DiscoverController::class, 'subcategory_id'])->name('admin-discover-subcategory_id');
        Route::post('/discover/editsubcategory_id', [App\Http\Controllers\Admin\DiscoverController::class, 'editsubcategory_id'])->name('admin-discover-editsubcategory_id');

        // messages
        Route::get('/messages', [App\Http\Controllers\Admin\MessagesController::class, 'index'])->name('admin-messages');
        Route::post('/messages/add', [App\Http\Controllers\Admin\MessagesController::class, 'add'])->name('admin-messages-add');
        Route::post('/messages/datatable', [App\Http\Controllers\Admin\MessagesController::class, 'datatable'])->name('admin-messages-datatable');
        Route::post('/messages/delete', [App\Http\Controllers\Admin\MessagesController::class, 'delete'])->name('admin-messages-delete');
        Route::post('/messages/edit', [App\Http\Controllers\Admin\MessagesController::class, 'edit'])->name('admin-messages-edit');

        // CommunityTopics
        Route::get('/communitytopics', [App\Http\Controllers\Admin\CommunityTopicsController::class, 'index'])->name('admin-communitytopics');
        Route::post('/communitytopics/add', [App\Http\Controllers\Admin\CommunityTopicsController::class, 'add'])->name('admin-communitytopics-add');
        Route::post('/communitytopics/datatable', [App\Http\Controllers\Admin\CommunityTopicsController::class, 'datatable'])->name('admin-communitytopics-datatable');
        Route::post('/communitytopics/delete', [App\Http\Controllers\Admin\CommunityTopicsController::class, 'delete'])->name('admin-communitytopics-delete');
        Route::post('/communitytopics/edit', [App\Http\Controllers\Admin\CommunityTopicsController::class, 'edit'])->name('admin-communitytopics-edit');
        Route::post('/communitytopics/post', [App\Http\Controllers\Admin\CommunityTopicsController::class, 'Postlist'])->name('admin-communitytopics-Postlist');
        Route::post('/communitytopics/comment', [App\Http\Controllers\Admin\CommunityTopicsController::class, 'commentlist'])->name('admin-communitytopics-commentlist');
    });
});

Route::get('image-upload', [ImageUploadController::class, 'imageUpload'])->name('image.upload');

Route::post('image-upload', [ImageUploadController::class, 'imageUploadPost'])->name('image.upload.post');