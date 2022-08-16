<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Snaps;
use DataTables;
use Validator;
use Carbon\Carbon;


class SnapsController extends Controller
{

    function add(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'storyimage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'browse_file' => 'mimes:mp4,mkv,flv,mov|max:20048',
        ]);

        if ($validation->fails()) {

            $data['status'] = 0;
            $data['error'] = $validation->errors()->all();
            echo json_encode($data);
            exit();
        }
        $result = array();
        $result['status'] = 0;
        $result['msg'] = "Oops ! Snap Not Inserted";
        $hssid = $request->input('hssid');
        $data = $request->all();

        if ($request->storyimage) {
           
            $path = \Storage::disk('s3')->put('images/Snaps', $request->storyimage);
            $path = \Storage::disk('s3')->url($path);
            $mediatype = 0;

        } else if ($request->browse_file) {  
            // print_r('video_b');
            $path = \Storage::disk('s3')->put('images/SnapsVideo', $request->browse_file);
            $path = \Storage::disk('s3')->url($path);
   
            $mediatype = 1;

        } else if ($request->embadedcode) {
         

            $path = $data['embadedcode'];
            $mediatype = 2;
        } else {


        }
      




        if ($hssid == '') {
            $data_insert = new Snaps;
            $data_insert->story_id = $data['hstoryid'];
            $data_insert->media = $path;
            $data_insert->mediatype = $mediatype;
            $data_insert->save();
            $insert_id = $data_insert->id;

            if ($insert_id) {
                $result['status'] = 1;
                $result['msg'] = "Snaps inserted Successfully";
                $result['id'] = $insert_id;
            }
        } else {

            $update = Snaps::where('id', $hssid)->first();
            // $update->storyimage = $imagepath;
            $update->story_id = $data['hstoryid'];
            $update->media = $path;
            $update->mediatype = $mediatype;;
            $update->save();
            $result['status'] = 1;
            $result['msg'] = "Snaps updated Successfully";
        }

        echo json_encode($result);
        exit();
    }

    function datatable(Request $request)
    {
        if ($request->ajax()) {

            $hstoryid = $request->input('story_id');
            $data = Snaps::select('mediatype','id','media')->where('story_id', '=', $hstoryid)->get();

            return Datatables::of($data)

                ->addIndexColumn()
                ->addColumn('mediatype', function ($row) {
                    if ($row->mediatype == 0) {
                        $mediatype = '<span class="badge badge-success">Image</span>';
                    } else if ($row->mediatype == 1) {
                        $mediatype = '<span style="background-color: #ef8f00; color:#ffff;" class="badge">Internal Video</span>';
                    } else if ($row->mediatype == 2) {
                        $mediatype = '<span class="badge badge-info">External Video</span>';
                    }
                    return $mediatype;
                })
                ->addColumn('media', function ($row) {
                    if ($row->mediatype == 1) {
                        $media = '<video id="" controls style="width: 200px; height: auto;" src="' . $row->media . '">';
                    }
                    else if ($row->mediatype == 2) {
                        $media = '<span>"' . $row->media . '"</span>';
                    } else {
                        $media = '<img id="" style="width: 100px; height: auto;" src="' . $row->media . '">';
                    }
                    return $media;
                })
                ->addColumn('action', function ($row) {
                    $action = '<button class="btn btn-danger btn-sm btn-icon icon-left" onclick="delete_snaps(' . $row->id . ')"><i class="entypo-cancel"></i> Delete</button>&nbsp;';
                    // $action .= '<button class="btn btn-info btn-sm btn-icon icon-left" onclick="edit_snaps(' . $row->id . ')"><i class="entypo-pencil"></i> Edit</button>&nbsp;';
                    // $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>'
                    return $action;
                })

                ->rawColumns(['mediatype','media','action'])
                ->make(true);   
        }
    }

    function delete(Request $request)
    {
        $delete['status'] = 0;
        $delete['msg'] = "Oops ! Snaps not Deleted ";
        $d_id = $request->input('id');

        $snapsDetails = Snaps::where('id', $d_id)->delete();

        if ($snapsDetails) {
            $delete['status'] = 1;
            $delete['msg'] = "Snaps Deleted Successfully";
        }
        echo json_encode($delete);
        exit();
    }

    function edit(Request $request)
    {
        $edit = array();
        $edit['status'] = 0;
        $e_id = $request->input('id');
        $edtq =    Snaps::where('id', $e_id)->first();

        if ($edtq) {
            $edit['status'] = 1;
            $edit['user'] = $edtq;
        }
        echo json_encode($edit);
        exit();
    }
}
