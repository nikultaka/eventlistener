<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Messages;
use App\Models\Notifications;
use DataTables;
use Validator;
use Carbon\Carbon;
use Auth;
use App\Models\User;
use App\Models\CommunityCategory;
use App\Models\MessageConversationStatus;
use App\Models\MessageConversation;
use Pusher\Pusher;



class MessagesController extends Controller
{
    //
    function index()
    {

        $userList = User::select('id', 'name')->where('status', '=', 1)->get()->toArray();
        $communitycategoryList = CommunityCategory::select('id', 'name')->where('status', '=', 1)->get()->toArray();
        $parentList = Messages::select('id', 'message_text')->where('status', '=', 1)->get()->toArray();
        return view("Admin.messages.index")->with(compact('userList', 'communitycategoryList', 'parentList'));
    }

    function add(Request $request)
    {
        $validation = Validator::make($request->all(), [
            // 'name' => 'required',
        ]);

        if ($validation->fails()) {

            $data['status'] = 0;
            $data['error'] = $validation->errors()->all();
            echo json_encode($data);
            exit();
        }
        $result = array();
        $result['status'] = 0;
        $result['msg'] = "Oops ! Messages Not Inserted";
        $hmid = $request->input('hmid');
        $data = $request->all();

        if ($hmid == '') {
            $data_insert = new Messages;
            $data_insert->user_id = $data['user_id'];
            $data_insert->parent_id = $data['parent_id'];
            $data_insert->community_category_id = $data['communitycategory_id'];
            $data_insert->message_type = $data['message_type'];
            $data_insert->message_text = $data['message_text'];
            $data_insert->is_read = $data['is_read'];
            $data_insert->is_verified = $data['is_verified'];
            $data_insert->is_follow = $data['is_follow'];
            $data_insert->status = $data['status'];
            $data_insert->save();
            $insert_id = $data_insert->id;

            if ($insert_id) {
                $result['status'] = 1;
                $result['msg'] = "Messages inserted Successfully";
                $result['id'] = $insert_id;
            }
        } else {

            $update = Messages::where('id', $hmid)->first();
            $update->user_id = $data['user_id'];
            $update->parent_id = $data['parent_id'];
            $update->community_category_id = $data['communitycategory_id'];
            $update->message_type = $data['message_type'];
            $update->message_text = $data['message_text'];
            $update->is_read = $data['is_read'];
            $update->is_verified = $data['is_verified'];
            $update->is_follow = $data['is_follow'];
            $update->status = $data['status'];
            $update->save();
            $result['status'] = 1;
            $result['msg'] = "Messages updated Successfully";
        }

        echo json_encode($result);
        exit();
    }

    function datatable(Request $request)
    {
        if ($request->ajax()) {

            $data = Messages::select('messages.*', 'users.name as username', 'community_categorys.name as communitycategory_name')
                ->leftJoin('users', 'users.id', '=', 'messages.user_id')
                ->leftJoin('community_categorys', 'community_categorys.id', '=', 'messages.community_category_id')
                ->where('messages.status', '!=', -1)->get();


            return Datatables::of($data)

                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    $status = '<span class="badge badge-danger">Inactive</span>';
                    if ($row->status == 1) {
                        $status = '<span class="badge badge-success">Active</span>';
                    }
                    return $status;
                })

                ->addColumn('is_read', function ($row) {
                    $is_read = '<span style="background-color: #ff9800; color: #fff;" class="badge">NO</span>';
                    if ($row->is_read == 1) {
                        $is_read = '<span style="background-color: #009688; color: #fff;" class="badge">YES</span>';
                    }
                    return $is_read;
                })
                ->addColumn('is_verified', function ($row) {
                    $is_verified = '<span style="background-color: #ff9800; color: #fff;" class="badge">NO</span>';
                    if ($row->is_verified == 1) {
                        $is_verified = '<span style="background-color: #009688; color: #fff;" class="badge">YES</span>';
                    }
                    return $is_verified;
                })
                ->addColumn('is_follow', function ($row) {
                    $is_follow = '<span style="background-color: #ff9800; color: #fff;" class="badge">NO</span>';
                    if ($row->is_follow == 1) {
                        $is_follow = '<span  style="background-color: #009688; color: #fff;" class="badge">YES</span>';
                    }
                    return $is_follow;
                })

                ->addColumn('action', function ($row) {
                    $action = '<button class="btn btn-danger btn-sm btn-icon icon-left" onclick="delete_messages(' . $row->id . ')"><i class="entypo-cancel"></i> Delete</button>&nbsp;';
                    $action .= '<button class="btn btn-info btn-sm btn-icon icon-left" onclick="edit_messages(' . $row->id . ')"><i class="entypo-pencil"></i> Edit</button>&nbsp;';
                    // $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>'
                    return $action;
                })

                ->rawColumns(['action', 'status', 'is_read', 'is_verified', 'is_follow'])
                ->make(true);
        }
    }

    function delete(Request $request)
    {
        $delete['status'] = 0;
        $delete['msg'] = "Oops ! Messages not Deleted ";
        $d_id = $request->input('id');
        $messagesDetails = Messages::where('id', $d_id)->first();
        $messagesDetails->status            =  -1;
        $messagesDetails->updated_at        = Carbon::now();
        $messagesDetails->save();

        if ($messagesDetails) {
            $delete['status'] = 1;
            $delete['msg'] = "Messages Deleted Successfully";
        }
        echo json_encode($delete);
        exit();
    }

    function edit(Request $request)
    {
        $edit = array();
        $edit['status'] = 0;
        $e_id = $request->input('id');
        $edtq = Messages::where('id', $e_id)->first();

        if ($edtq) {
            $edit['status'] = 1;
            $edit['user'] = $edtq;
        }
        echo json_encode($edit);
        exit();
    }

    function list(Request $request)
    {
        $currentUser = Auth::user();
        $currentUserId = $currentUser->id;
        if (!$currentUserId) {
            return response()->json([
                'success' => false,
                'message' => "User Not Found",
            ], 200);
        }

        if (isset($request->category) && $request->category != '' && isset($request->search) && $request->search != '') {
            $messages = Messages::with(['category', 'comments', 'user'])
                ->whereHas('comments', function ($q) use ($request) {
                    $q->where('message_text', 'like', '%' . $request->search . '%');
                })
                ->where('type', '1')
                ->where('status', '1')
                ->where('parent_id', '0')
                ->where('community_category_id', $request->category)
                ->orWhere('message_text', 'like', '%' . $request->search . '%')
                ->get()->toArray();
        } else if (isset($request->category) && $request->category != '') {
            $messages = Messages::with(['category', 'comments', 'user'])
                ->where('type', '1')
                ->where('status', '1')
                ->where('parent_id', '0')
                ->where('community_category_id', $request->category)->get()->toArray();
        } else {
            $messages = Messages::with(['category', 'comments', 'user'])
                ->where('type', '1')
                ->where('status', '1')
                ->where('parent_id', '0')->get()->toArray();
        }

        if (!empty($messages)) {
            foreach ($messages as $key => $value) {
                $messages[$key]['reaction_count'] = count($value['comments']);
            }
        }

        return response()->json([
            'success' => true,
            'message' => "Messages info get Successfully",
            'data' => $messages
        ], 201);
    }


    function messagesold(Request $request)
    {
        $currentUser = Auth::user();
        $currentUserId = $currentUser->id;
        if (!$currentUserId) {
            return response()->json([
                'success' => false,
                'message' => "User Not Found",
            ], 200);
        }
        $page = $request->page;
        $perPage = 20;
        $messages = Messages::with(['category', 'comments', 'user'])
            ->where('type', '2')
            ->where('status', '1')
            ->where('parent_id', '0');

        $total = $messages->count();
        $messages->offset(($page - 1) * $perPage)->limit($perPage);
        $messages = $messages->get()->toArray();

        $unReadMessageslist = Messages::where('is_read', 0)->where('type', '2')
            ->get();
        $unReadMessagesCount = $unReadMessageslist->count();

        return response()->json([
            'success' => true,
            'message' => "Messages info get Successfully",
            'data' => $messages,
            'unread_count' => $unReadMessagesCount,
            'total' => $total,
            'page' => $page,
            'last_page' => ceil($total / $perPage)
        ], 201);
    }


    function updateStatus(Request $request)
    {
        $currentUser = Auth::user();
        $currentUserId = $currentUser->id;
        if (!$currentUserId) {
            return response()->json([
                'success' => false,
                'message' => "User Not Found",
            ], 200);
        }

        $validation = Validator::make($request->all(), [
            'message_id' => 'required'
        ]);

        if ($validation->fails()) {
            $data['status'] = 0;
            $data['error'] = $validation->errors()->all();
            return response()->json($data);
        }

        $messageID = $request->message_id;
        $messages = MessageConversation::where('id', $messageID)->first();
        if ($messages === null) {
            $data['status'] = 0;
            $data['error'] = "Message not found";
            return response()->json($data);
        }
        $message = MessageConversation::where('id', $messageID);
        $result = $message->update(['is_read' => 1]);
        $message = $message->first();

        return response()->json([
            'success' => true,
            'message' => "Messages status updated Successfully",
            'data' => $message
        ], 201);
    }


    function updateNotificationStatus(Request $request)
    {
        $currentUser = Auth::user();
        $currentUserId = $currentUser->id;
        if (!$currentUserId) {
            return response()->json([
                'success' => false,
                'message' => "User Not Found",
            ], 200);
        }

        $validation = Validator::make($request->all(), [
            'notification_id' => 'required'
        ]);

        if ($validation->fails()) {
            $data['status'] = 0;
            $data['error'] = $validation->errors()->all();
            return response()->json($data);
        }

        $notificationID = $request->notification_id;
        $messages = Notifications::where('id', $notificationID)->first();
        if ($messages === null) {
            return response()->json([
                'success' => 0,
                'message' => "Notification not found"
            ]);
        }
        $notification = Notifications::where('id', $notificationID);
        $result = $notification->update(['is_read' => 1]);
        $notification = $notification->first();

        return response()->json([
            'success' => true,
            'message' => "Notification status updated Successfully",
            'data' => $notification
        ], 201);
    }


    function notification(Request $request)
    {
        $currentUser = Auth::user();
        $currentUserId = $currentUser->id;
        if (!$currentUserId) {
            return response()->json([
                'success' => false,
                'message' => "User Not Found",
            ], 200);
        }

        $messages = Notifications::with(['user'])->get()->toArray();

        $unReadMessageslist = Notifications::where('is_read', 0)->get();
        $unReadMessagesCount = $unReadMessageslist->count();

        return response()->json([
            'success' => true,
            'message' => "Notifications info get Successfully",
            'data' => $messages,
            'unread_count' => $unReadMessagesCount
        ], 201);
    }

    function postConversation(Request $request)
    {
        try {
            $currentUser = Auth::user();
            $currentUserId = $currentUser->id;
            if (!$currentUserId) {
                return response()->json([
                    'success' => false,
                    'message' => "User Not Found",
                ], 200);
            }

            $credentials = $request->only('message_id', 'msg','to_user_id','channel_name','event_name');
            $validator = Validator::make($credentials, [
                'message_id' => 'exists:App\Models\MessageConversation,id',
                'msg' => 'required',
                'to_user_id'=> 'exists:App\Models\User,id',
                //'channel_name' => 'required',
                'event_name' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->messages()]);
            }  

            if($request->to_user_id == $currentUserId) {
                return response()->json([
                    'success' => false,
                    'message' => "sender and receiver should not be same",
                ], 200);   
            }      

            if(isset($request->message_id) && $request->message_id>0) {
                $messageData = MessageConversation::where('id', '=', $request->message_id)->first();
                $message = MessageConversation::create(['user_id' => $currentUserId, 'parent_id' => $request->message_id,'to_user_id'=>$request->to_user_id,'message' => $request->msg]);    
            } else {
                $message = MessageConversation::create(['user_id' => $currentUserId, 'to_user_id'=>$request->to_user_id,'message' => $request->msg]);
            }    

            $options = array(
                'cluster' => env("PUSHER_APP_CLUSTER"),
                'encrypted' => true
            ); 

            $pusher = new Pusher(
                env("PUSHER_APP_KEY"),
                env("PUSHER_APP_SECRET"),
                env("PUSHER_APP_ID"),
                $options
            );

            $channelName = 'test';
            if(isset($request->channel_name) && $request->channel_name!='') {
                $channelName = $request->channel_name;
            }

            $message = MessageConversation::with(['sender', 'receiver'])->where('id',$message['id']);
            $message = $message->get()->first();
            $pusher->trigger($channelName,$request->event_name,$message);
            
            return response()->json([
                'success' => true,
                'message' => "conversation added successfully",
                'data' => $message
            ], 201);
        } catch (Exception $ex) {
            return response()->json([
                'success' => true,
                'message' => "Something went wrong please try again",
            ], 400);
        }
    }

    function conversationStatus(Request $request)
    {
        try {
            $currentUser = Auth::user();
            $currentUserId = $currentUser->id;
            if (!$currentUserId) {
                return response()->json([
                    'success' => false,
                    'message' => "User Not Found",
                ], 200);
            }

            $credentials = $request->only('message_id', 'is_typing','to_user_id','channel_name','event_name');
            $validator = Validator::make($credentials, [
                'message_id' => 'required',
                'is_typing' => 'required',
                'to_user_id'=> 'required',
                'channel_name'=> 'required',
                'event_name'=> 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->messages()]);
            }
            /*$messageData = MessageConversationStatus::where('message_id', '=', $request->message_id)->where('user_id', '=', $currentUserId)->first();
            if (!$messageData) {
                $message = MessageConversationStatus::create();
            } else {
                $messageStatus = MessageConversationStatus::where('id', $messageData->id);
                $result = $messageStatus->update(['is_typing' => $request->is_typing]);
                $message = $messageStatus->first();
            }*/

            $message = ['user_id' => $currentUserId,'to_user_id'=>$request->to_user_id, 'message_id' => $request->message_id, 'is_typing' => $request->is_typing,'channel_name'=>$request->channel_name,'event_name'=>$request->event_name];

            $options = array(
                'cluster' => env("PUSHER_APP_CLUSTER"),
                'encrypted' => true
            ); 

            $pusher = new Pusher(
                env("PUSHER_APP_KEY"),
                env("PUSHER_APP_SECRET"),
                env("PUSHER_APP_ID"),
                $options
            );

            $channelName = 'test';
            if(isset($request->channel_name) && $request->channel_name!='') {
                $channelName = $request->channel_name;
            }
            $pusher->trigger($channelName,$request->event_name,$message);

            return response()->json([    
                'success' => true,
                'message' => "conversation status added successfully",
                'data' => $message
            ], 201);
        } catch (Exception $ex) {
            return response()->json([
                'success' => true,
                'message' => "Something went wrong please try again",
            ], 400);
        }
    }

    function messageconversation(Request $request)
    {
        $id = Auth::user()->id;
        if (isset($id) && $id != '' && $id != null) {
            $page = 1;
            $perPage = 20;
            if(isset($request->page)) {
                $page = $request->page;    
            }
            if(isset($request->perpage)) {
                $perPage = $request->perpage;    
            }
            $total = 0;
            $message = array();
            if(isset($request->message_id)) {
                $message = MessageConversation::with(['sender', 'receiver'])->where('id', $request->message_id)->orWhere('parent_id', $request->message_id);    
            } else {
                $message = MessageConversation::with(['sender', 'receiver'])->where('id', -1)->orWhere('parent_id', -1);    
            }
            
            if ($page != null && $page != '') {
                $total = $message->count();
                $message->offset(($page - 1) * $perPage)->limit($perPage);
            }
            $message->orderBy('id','desc');
            $message = $message->get()->toArray();



            return response()->json([
                'success' => true,
                'message' => "Message info get Successfully",
                'data' => $message,
                'total' => $total,
                'page' => $page,
                'last_page' => ceil($total / $perPage)
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => "User not found.",
            ], 400);
        }
    }


    function messages(Request $request)
    {
        $currentUser = Auth::user();
        $currentUserId = $currentUser->id;
        if (!$currentUserId) {
            return response()->json([
                'success' => false,
                'message' => "User Not Found",
            ], 200);
        }

        $messages = MessageConversation::with(['sender','receiver'])
            ->where(function ($query) use ($currentUserId) {
                $query->where('user_id', '=', $currentUserId)
                      ->orWhere('to_user_id', '=', $currentUserId);
            })
            ->orderBy('id','desc');

        $messages = $messages->get()->toArray();   
        //echo '<pre>'; print_r($messages); exit;
        $finalData = array();
        $userIDData = array();
        if(!empty($messages)) {
            foreach($messages as $key => $value) {
                if(!in_array($value['user_id'],$userIDData) || !in_array($value['to_user_id'],$userIDData)) {
                    $userIDData[] = $value['user_id'];
                    $userIDData[] = $value['to_user_id'];
                    $finalData[] = $value;
                }
            }    
        }

        if(!empty($finalData)) {
            foreach($finalData as $key => $value) {
                if(isset($value['receiver']) && $value['receiver']['id'] == $currentUserId) {
                    $finalData[$key]['receiver'] = $value['sender']; 
                    $finalData[$key]['sender'] = $value['receiver']; 
                }
            }
        }

        //echo '<pre>'; print_r($finalData); exit;
        

        $unReadMessageslist = MessageConversation::where('is_read', 0)->where('user_id',$currentUserId)->orWhere('to_user_id',$currentUserId)->get();
        $unReadMessagesCount = $unReadMessageslist->count();

        return response()->json([
            'success' => true,
            'message' => "Messages info get Successfully",
            'data' => $finalData,
            'unread_count'=>$unReadMessagesCount
        ], 201);
    }
}
