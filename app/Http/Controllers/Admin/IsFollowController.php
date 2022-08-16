<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\IsFollow;
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

class IsFollowController extends Controller
{


    function followuser(Request $request, $id = null)
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
            'to_user_id' => 'required',
            'is_follow' => 'required|in:0,1',
        ]);

        if ($validation->fails()) {
            $data['status'] = 0;
            $data['error'] = $validation->errors()->all();
            return response()->json($data);
        }

        $to_user_id = $request->to_user_id;
        $is_follow = $request->is_follow;

        $messages = IsFollow::where('user_id', $currentUserId)->where('to_user_id', $to_user_id)->first();
            if ($messages != null &&  $messages != '') {

                $messages->to_user_id    = $to_user_id;
                $messages->is_follow     = $is_follow;
                $messages->user_id       = $currentUserId;
                $messages->updated_at    = Carbon::now();
                $messages->save();
            
                    if ($is_follow == 1) {
                        return response()->json([
                            'success' => true,
                            'message' => "User Followed Successfully",
                            'data' => $messages
                        ], 201);
                    } else {
                        return response()->json([
                            'success' => true,
                            'message' => "User UnFollowed Successfully",
                            'data' => $messages
                        ], 201);
                    }
                
        } else {
            $data_insert = new IsFollow;
            $data_insert->user_id         = $currentUserId;
            $data_insert->to_user_id      = $to_user_id;
            $data_insert->is_follow       = $is_follow;
            $data_insert->created_at      = Carbon::now();
            $data_insert->save();
            $insert_id = $data_insert->id;

            if ($insert_id) {
                if ($is_follow == 1) {
                    return response()->json([
                        'success' => true,
                        'message' => "User Followed Successfully",
                        'data' => $data_insert
                    ], 201);
                } else {
                    return response()->json([
                        'success' => true,
                        'message' => "User UnFollowed Successfully",
                        'data' => $data_insert
                    ], 201);
                }
            }
        }

    }


}
