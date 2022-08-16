<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\SubCategory;
use App\Models\Category;
use DataTables;
use Validator;
use Carbon\Carbon;


class SubCategoryController extends Controller
{
    //
    function index()
    {
        $categoryList = Category::select('id', 'name')->where('status','=',1)->get()->toArray();


        return view('Admin/subcategory/index')->with(compact('categoryList'));
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
        $result['msg'] = "Oops ! SubCategory Not Inserted";
        $hscid = $request->input('hscid');
        $data = $request->input();

        if ($hscid == '') {
            $data_insert = new SubCategory;
            $data_insert->category_id = $data['category'];
            $data_insert->name = $data['name'];
            $data_insert->status = $data['status'];
            $data_insert->save();
            $insert_id = $data_insert->id;
            if ($insert_id) {
                $result['status'] = 1;
                $result['msg'] = "SubCategory inserted Successfully";
                $result['id'] = $insert_id;
            }
        } else {
            $update = SubCategory::where('id', $hscid)->first();
            $update->category_id = $data['category'];
            $update->name = $data['name'];
            $update->status = $data['status'];
            $update->save();
            $result['status'] = 1;
            $result['msg'] = "SubCategory updated Successfully";
        }

        echo json_encode($result);
        exit();
    }

    function datatable(Request $request)
    {
        if ($request->ajax()) {

            $data = SubCategory::select('subcategorys.*', 'category.name as category_name')
            ->leftJoin('category', 'category.id', '=', 'subcategorys.category_id')
            ->where('subcategorys.status','!=',-1)->get();

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
                    $action = '<button class="btn btn-danger btn-sm btn-icon icon-left" onclick="delete_subcategory(' . $row->id . ')"><i class="entypo-cancel"></i> Delete</button>&nbsp;';
                    $action .= '<button class="btn btn-info btn-sm btn-icon icon-left" onclick="edit_subcategory(' . $row->id . ')"><i class="entypo-pencil"></i> Edit</button>';
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
        $delete['msg'] = "Oops ! SubCategory not Deleted ";
        $d_id = $request->input('id');
        $subcategoryDetails = SubCategory::where('id',$d_id)->first();
        $subcategoryDetails->status            =  -1;
        $subcategoryDetails->updated_at        = Carbon::now();
        $subcategoryDetails->save();

        if ($subcategoryDetails) {
            $delete['status'] = 1;
            $delete['msg'] = "SubCategory Deleted Successfully";
        }
        echo json_encode($delete);
        exit();
    }

    function edit(Request $request)
    {
        $edit = array();
        $edit['status'] = 0;
        $e_id = $request->input('id');
        $edtq =    SubCategory::where('id', $e_id)->first();

        if ($edtq) {
            $edit['status'] = 1;
            $edit['user'] = $edtq;
        }
        echo json_encode($edit);
        exit();
    }
}
 