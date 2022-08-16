<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Category;
use DataTables;
use Validator;
use Carbon\Carbon;
use Auth;


class CategoryController extends Controller
{
    //
    function index()
    {
        return view('Admin/category/index');  
    }

    function add(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
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
        $result['msg'] = "Oops ! Category Not Inserted";
        $hcid = $request->input('hcid');
        $data = $request->input();
        if ($hcid == '') {
            $data_insert = new Category;
            $data_insert->name = $data['name'];
            $data_insert->status = $data['status'];
            $data_insert->save();
            $insert_id = $data_insert->id;
            if ($insert_id) {
                $result['status'] = 1;
                $result['msg'] = "Category inserted Successfully";
                $result['id'] = $insert_id;
            }
        } else {
            $update = Category::where('id', $hcid)->first();
            $update->name = $data['name'];
            $update->status = $data['status'];
            $update->save();
            $result['status'] = 1;
            $result['msg'] = "Category updated Successfully";
        }

        echo json_encode($result);
        exit();
    }

    function datatable(Request $request)
    {
        if ($request->ajax()) {

            $data = Category::select('id', 'name', 'status')->where('status','!=',-1)->orderBy('id','asc')->get();

            return Datatables::of($data)

                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    $status = '<span class="badge badge-danger">Inactive</span>';
                    if($row->status == 1){
                        $status = '<span class="badge badge-success">Active</span>';
                    }
                    return $status;
                })

                ->addColumn('action', function ($row) {
                    $action = '<button class="btn btn-danger btn-sm btn-icon icon-left" onclick="delete_category(' . $row->id . ')"><i class="entypo-cancel"></i> Delete</button>&nbsp;';
                    $action .= '<button class="btn btn-info btn-sm btn-icon icon-left" onclick="edit_category(' . $row->id . ')"><i class="entypo-pencil"></i> Edit</button>';
                    // $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>'
                    return $action;
                })

                ->rawColumns(['action','status'])
                ->make(true);
        }
    }

    function delete(Request $request)
    {
        $delete['status'] = 0;
        $delete['msg'] = "Oops ! Category not Deleted ";
        $d_id = $request->input('id');
        $categoryDetails = Category::where('id',$d_id)->first();
        $categoryDetails->status            =  -1;
        $categoryDetails->updated_at        = Carbon::now();
        $categoryDetails->save();

        if ($categoryDetails) {
            $delete['status'] = 1;
            $delete['msg'] = "Category Deleted Successfully";
        }
        echo json_encode($delete);
        exit();
    }

    function edit(Request $request)
    {
        $edit = array();
        $edit['status'] = 0;
        $e_id = $request->input('id');
        $edtq =    Category::where('id', $e_id)->first();

        if ($edtq) {
            $edit['status'] = 1;
            $edit['user'] = $edtq;
        }
        echo json_encode($edit);
        exit();
    }

    function list(Request $request) {
        $currentUser = Auth::user();
        $currentUserId = $currentUser->id;
        if (!$currentUserId) {
            return response()->json([
                'success' => false,
                'message' => "User Not Found",
            ], 200);
        }    

        $category = Category::where('status','1')->orderBy('id','asc')->get()->toArray();

        return response()->json([
            'success' => true,
            'message' => "Category info get Successfully",
            'data' => $category
        ], 201);      
            
    }
}
 