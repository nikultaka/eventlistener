<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Feedwall;
use App\Models\Category;
use DataTables;
use Validator;
use Carbon\Carbon;
use Auth;
use App\Models\Industries;    

class FeedwallController extends Controller
{
    //
    function index()
    {
        $categoryList = Category::select('id', 'name')->where('status','=',1)->get()->toArray();
        return view("Admin.feedwall.index")->with(compact('categoryList'));

    }

    function add(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'status' => 'required',
        ]);

        if ($validation->fails()) {

            $data['status'] = 0;
            $data['error'] = $validation->errors()->all();
            echo json_encode($data);
            exit();
        }
        $result = array();
        $result['status'] = 0;
        $result['msg'] = "Oops ! Feedwall Not Inserted";
        $hfwid = $request->input('hfwid');
        $data = $request->all();
        
      
        $path = \Storage::disk('s3')->put('images/Feedwall', $request->feedwallimage);
        $path = \Storage::disk('s3')->url($path);
        

        if ($hfwid == '') {
            $data_insert = new Feedwall;
            $data_insert->name = $data['name'];
            $data_insert->category_id = $data['category'];
            $data_insert->image = $path;
            $data_insert->status = $data['status'];
            $data_insert->save();
            $insert_id = $data_insert->id;

            if ($insert_id) {
                $result['status'] = 1;
                $result['msg'] = "Feedwall inserted Successfully";
                $result['id'] = $insert_id;
            }
        } else {

            $update = Feedwall::where('id', $hfwid)->first();
            $update->name = $data['name'];
            $update->category_id = $data['category'];
            if($request->image != '')
            {
                $update->image = $path;
            }else{
                $update->image = $data['hifid'];  
            }
            $update->status = $data['status'];
            $update->save();
            $result['status'] = 1;
            $result['msg'] = "Feedwall updated Successfully";
        }

        echo json_encode($result);
        exit();
    }

    function datatable(Request $request)
    {
        if ($request->ajax()) {

            $data = Feedwall::select('feedwall.*', 'category.name as category_name')
            ->leftJoin('category', 'category.id', '=', 'feedwall.category_id')
            ->where('feedwall.status','!=',-1)->get();

            return Datatables::of($data)

                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    $status = '<span class="badge badge-danger">Inactive</span>';
                    if($row->status == 1){
                        $status = '<span class="badge badge-success">Active</span>';
                    }
                    return $status;
                })
                ->addColumn('image', function ($row) {
                    $image = '<img id="" style="width: 100px; height: auto;" src="'.$row->image.'">';
                    return $image;
                })
                ->addColumn('action', function ($row) {
                    $action = '<button class="btn btn-danger btn-sm btn-icon icon-left" onclick="delete_feedwall(' . $row->id . ')"><i class="entypo-cancel"></i> Delete</button>&nbsp;';
                    $action .= '<button class="btn btn-info btn-sm btn-icon icon-left" onclick="edit_feedwall(' . $row->id . ')"><i class="entypo-pencil"></i> Edit</button>';
                    // $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>'
                    return $action;
                })

                ->rawColumns(['action','image','status'])
                ->make(true);
        }
    }

    function delete(Request $request)
    {
        $delete['status'] = 0;
        $delete['msg'] = "Oops ! Feedwall not Deleted ";
        $d_id = $request->input('id');
        $feedwallDetails = Feedwall::where('id',$d_id)->first();
        $feedwallDetails->status            =  -1;
        $feedwallDetails->updated_at        = Carbon::now();
        $feedwallDetails->save();

        if ($feedwallDetails) {
            $delete['status'] = 1;
            $delete['msg'] = "Feedwall Deleted Successfully";
        }
        echo json_encode($delete);
        exit();
    }

    function edit(Request $request)
    {
        $edit = array();
        $edit['status'] = 0;
        $e_id = $request->input('id');
        $edtq =    Feedwall::where('id', $e_id)->first();

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

        $feedwall = Industries::with(['users','investment'])->where('is_featured','1')->get()->toArray();
        //echo '<pre>'; print_r($feedwall); exit;
        if(!empty($feedwall)) {
            foreach($feedwall as $key => $value) {
                if(isset($value['investment']) && !empty($value['investment'])) {
                    $feedwall[$key]['type'] = 'INVESTED';    
                } else {
                    $feedwall[$key]['type'] = 'FEATURED';
                }
            }
        }

        return response()->json([
            'success' => true,
            'message' => "Feedwall info get Successfully",
            'data' => $feedwall
        ], 201);
        
    }
}
 