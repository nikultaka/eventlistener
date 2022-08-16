<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\CommunityCategory;
use DataTables;
use Validator;
use Carbon\Carbon;
use Auth;   

class CommunityCategoryController extends Controller
{

    function list() {
        $currentUser = Auth::user();
        $currentUserId = $currentUser->id;
        if (!$currentUserId) {
            return response()->json([
                'success' => false,
                'message' => "User Not Found",
            ], 200);
        }      

        $community_category = CommunityCategory::select('id', 'name')->where('status','1')->get()->toArray();

        return response()->json([
            'success' => true,
            'message' => "Community Category info get Successfully",
            'data' => $community_category
        ], 201);
        
    }
}
 