<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Industries;
use App\Models\Industries_Info;
use App\Models\User;
use DataTables;
use Validator;
use Carbon\Carbon;
use Auth;

class IndustriesController extends Controller
{
    //
    function index()
    {
        $userList = User::select('id', 'name')->where('status','=',1)->get()->toArray();
        return view("Admin.Industries.index")->with(compact('userList'));
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
        $result['msg'] = "Oops ! Industries Not Inserted";
        $hiid = $request->input('hiid');
        $data = $request->all();

        $path = \Storage::disk('s3')->put('images/Industries', $request->logo);
        $path = \Storage::disk('s3')->url($path);
        
        $path2 = \Storage::disk('s3')->put('images/Industries', $request->banner_image);
        $path2 = \Storage::disk('s3')->url($path2);
        
        if ($hiid == '') {
            $data_insert = new Industries; 
            $data_insert->user_id = $data['username'];
            $data_insert->name = $data['name'];
            $data_insert->logo = $path;
            $data_insert->banner_image = $path2;
            $data_insert->progress_details = $data['progress_details'];
            $data_insert->total_hours = $data['total_hours'];
            $data_insert->is_featured = $data['is_featured'];
            $data_insert->status = $data['status'];
            $data_insert->save();
            $insert_id = $data_insert->id;
         
        } else {
            $update = Industries::where('id', $hiid)->first();
            $update->user_id = $data['username'];
            $update->name = $data['name'];
            if($request->logo != '')
            {
                $update->logo = $path;
            }else{
                $update->logo = $data['hiiid'];  
            };
            if($request->banner_image != '')
            {
                $update->banner_image = $path2;
            }else{
                $update->banner_image = $data['hibiid'];  
            };
            $update->progress_details = $data['progress_details'];
            $update->total_hours = $data['total_hours'];
            $update->is_featured = $data['is_featured'];
            $update->status = $data['status'];
            $update->save();
            $result['status'] = 1;
            $result['msg'] = "Industries updated Successfully";
        }


        if ($hiid == '') {
            $data_insert2 = new Industries_Info; 
            $data_insert2->industries_id = $data_insert->id;
            $data_insert2->website = $data['website'];
            $data_insert2->title = $data['title'];
            $data_insert2->email = $data['email'];
            $data_insert2->city = $data['city'];
            $data_insert2->founddate = $data['founddate'];
            $data_insert2->mvp = $data['mvp'];
            $data_insert2->sector = $data['sector'];
            $data_insert2->cto = $data['cto'];
            $data_insert2->problemsolveing = $data['problemsolveing'];
            $data_insert2->competitive_advantage = $data['competitive_advantage'];
            $data_insert2->description = $data['description'];
            $data_insert2->traction = $data['traction'];
            $data_insert2->annual_revenue = $data['annual_revenue'];
            $data_insert2->revenue = $data['revenue'];
            $data_insert2->socialmedia = $data['socialmedia'];
            $data_insert2->status = $data['status'];
            $data_insert2->save();
            $insert_id2 = $data_insert2->industries_id;


            if ($insert_id == $insert_id2) {
                $result['status'] = 1;
                $result['msg'] = "Industries inserted Successfully";
            }
        } else {
            $update2 = Industries_Info::where('industries_id', $hiid)->first();
            if($update2) {
                $update2->website = $data['website'];
                $update2->title = $data['title'];
                $update2->email = $data['email'];
                $update2->city = $data['city'];
                $update2->founddate = $data['founddate'];
                $update2->mvp = $data['mvp'];
                $update2->sector = $data['sector'];
                $update2->cto = $data['cto'];
                $update2->problemsolveing = $data['problemsolveing'];
                $update2->competitive_advantage = $data['competitive_advantage'];
                $update2->description = $data['description'];
                $update2->traction = $data['traction'];
                $update2->annual_revenue = $data['annual_revenue'];
                $update2->revenue = $data['revenue'];
                $update2->socialmedia = $data['socialmedia'];
                $update2->status = $data['status'];
                $update2->save();    
            } else {
                $data_insert2 = new Industries_Info; 
                $data_insert2->industries_id = $hiid;
                $data_insert2->website = $data['website'];
                $data_insert2->title = $data['title'];
                $data_insert2->email = $data['email'];
                $data_insert2->city = $data['city'];
                $data_insert2->founddate = $data['founddate'];
                $data_insert2->mvp = $data['mvp'];
                $data_insert2->sector = $data['sector'];
                $data_insert2->cto = $data['cto'];
                $data_insert2->problemsolveing = $data['problemsolveing'];
                $data_insert2->competitive_advantage = $data['competitive_advantage'];
                $data_insert2->description = $data['description'];
                $data_insert2->traction = $data['traction'];
                $data_insert2->annual_revenue = $data['annual_revenue'];
                $data_insert2->revenue = $data['revenue'];
                $data_insert2->socialmedia = $data['socialmedia'];
                $data_insert2->status = $data['status'];
                $data_insert2->save();
            }
            
            $result['status'] = 1;
            $result['msg'] = "Industries updated Successfully";
        }


        echo json_encode($result);
        exit();
    }




    function datatable(Request $request)
    {
        if ($request->ajax()) {

            $data = Industries::select('industries.*','users.username as username')
            ->leftJoin('users', 'users.id', '=', 'industries.user_id')
            ->where('industries.status','!=',-1)->get();
         
            return Datatables::of($data)

                ->addIndexColumn()
                
                ->addColumn('logo', function ($row) {
                    $logo = '<img id="" style="width: 100px; height: auto;" src="'.$row->logo.'">';
                    return $logo;
                })
                ->addColumn('banner_image', function ($row) {
                    $banner_image = '<img id="" style="width: 100px; height: auto;" src="'.$row->banner_image.'">';
                    return $banner_image;
                })
                ->addColumn('status', function ($row) {
                    $status = '<span class="badge badge-danger">Inactive</span>';
                    if($row->status == 1){
                        $status = '<span class="badge badge-success">Active</span>';
                    }
                    return $status;
                })

                ->addColumn('is_featured', function ($row) {
                    $is_featured = '<span class="badge badge-danger">NO</span>';
                    if($row->is_featured == 1){
                        $is_featured = '<span class="badge badge-success">YES</span>';
                    }
                    return $is_featured;
                })

                ->addColumn('action', function ($row) {
                    $action = '<button class="btn btn-danger btn-sm btn-icon icon-left" onclick="delete_industries(' . $row->id . ')"><i class="entypo-cancel"></i> Delete</button>&nbsp;';
                    $action .= '<button class="btn btn-info btn-sm btn-icon icon-left" onclick="edit_industries(' . $row->id . ')"><i class="entypo-pencil"></i> Edit</button>';
                    // $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>'
                    return $action;
                })

                ->rawColumns(['action','status','is_featured','logo','banner_image'])
                ->make(true);
        }
    }

    function delete(Request $request)
    {
        $delete['status'] = 0;
        $delete['msg'] = "Oops ! Industries not Deleted ";
        $d_id = $request->input('id');
        $industriesDetails = Industries::where('id',$d_id)->first();
        $industriesDetails->status            =  -1;
        $industriesDetails->updated_at        = Carbon::now();
        $industriesDetails->save();

        $industriesDetails2 = Industries_Info::where('industries_id',$d_id)->first();
        $industriesDetails2->status            =  -1;
        $industriesDetails2->updated_at        = Carbon::now();
        $industriesDetails2->save();

        if ($industriesDetails) {
            $delete['status'] = 1;
            $delete['msg'] = "Industries Deleted Successfully";
        }
        echo json_encode($delete);
        exit();
    }

    function edit(Request $request)
    {
        $edit = array();
        $edit['status'] = 0;
        $e_id = $request->input('id');
        $edtq =    Industries::where('id', $e_id)->first();
        $edtq2 =   Industries_Info::where('industries_id', $e_id)->first();

        if ($edtq) {
            $edit['status'] = 1;
            $edit['user'] = $edtq;
            $edit['user2'] = $edtq2;
        }
        echo json_encode($edit);
        exit();
    }

}
 