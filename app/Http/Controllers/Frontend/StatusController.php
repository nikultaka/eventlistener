<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Status;
use Auth;
use Validator;
use Carbon\Carbon;

class StatusController extends Controller
{
    //
    public function index()
    {
        $topic = Status::where([['user_id', '=', Auth::user()->id], ['is_active', '=', 1], ['is_delete', '=', 0]])->orderBy('id', 'ASC')->get();
        return view('Frontend/status/status',compact(['topic']));
    }

    public function highlight_submit(Request $request)
    {
        $rules = [
            'highlight_title' => 'required',
            'highlight_desc' => 'required',
            'highlight_date' => 'required',
        ];
        $customs = [
            'highlight_title.required' => 'The Highlight Title field is required.',
            'highlight_desc.required' => 'The Highlight Desc field is required.',
            'highlight_date.required' => 'The Highlight Date field is required.',
        ];
        $validation = Validator::make($request->all(), $rules, $customs);

        if ($validation->fails()) {
            $data['status'] = false;
            $data['msg'] = $validation->errors()->first();
            echo json_encode($data);
            exit();
        }

        $data = $request->input();
        $data_insert = new Status;
        $data_insert->user_id = Auth::user()->id;
        $data_insert->highlight_title = $data['highlight_title'];
        $data_insert->highlight_desc = $data['highlight_desc'];
        $data_insert->highlight_date = $data['highlight_date'];
        $data_insert->save();
        $insert_id = $data_insert->id;
        if ($insert_id) {
            $result['status'] = 1;
            $result['msg'] = "Highlight Save Successfully";
            $result['id'] = $insert_id;
        }
        echo json_encode($result);
        exit();
    }
    public function gethighlightDetails(Request $request)
    {
        $topic = Status::where([['user_id', '=', Auth::user()->id],['id', '=', $request->id],['is_active', '=', 1],['is_delete', '=', 0]])->select('id','highlight_title','highlight_desc','highlight_date')->first();
        if(!empty($topic)){
            $result['status'] = 1;
            $result['data'] =  $topic;
        }else{
            $result['status'] = 0;
            $result['msg'] = "No Highlight detail's found.";
        }

        echo json_encode($result);
        exit();
    }
    public function highlight_update(Request $request)
    {
        $rules = [
            'highlight_id' => 'required',
            'highlight_title' => 'required',
            'highlight_desc' => 'required',
            'highlight_date' => 'required',
        ];
        $customs = [
            'highlight_id.required' => 'The Highlight Id field is required.',
            'highlight_title.required' => 'The Highlight Title field is required.',
            'highlight_desc.required' => 'The Highlight Desc field is required.',
            'highlight_date.required' => 'The Highlight Date field is required.',
        ];
        $validation = Validator::make($request->all(), $rules, $customs);

        if ($validation->fails()) {
            $data['status'] = false;
            $data['msg'] = $validation->errors()->first();
            echo json_encode($data);
            exit();
        }

        $data = $request->input();
        $data_insert = Status::where('id',$data['highlight_id'])->first();
        $data_insert->highlight_title = $data['highlight_title'];
        $data_insert->highlight_desc = $data['highlight_desc'];
        $data_insert->highlight_date = $data['highlight_date'];
        $data_insert->updated_at        = Carbon::now();
        $data_insert->save();

        if ($data_insert) {
            $result['status'] = 1;
            $result['msg'] = "Highlight Updated Successfully";
        }
      
        echo json_encode($result);
        exit();
    }
    public function highlight_delete(Request $request)
    {
        $data = $request->input();
     
        $data_insert = Status::where('id',$data['id'])->first();
        $data_insert->is_delete        = 1;
        $data_insert->updated_at        = Carbon::now();
        $data_insert->save();

        $topic = Status::where([['user_id', '=', Auth::user()->id],['is_active', '=', 1],['is_delete', '=', 0]])->select('id','highlight_title','highlight_desc','highlight_date')->get();
        
        if ($data_insert) {
            $result['status'] = 1;
            $result['data'] = $topic;
            $result['msg'] = "Highlight Deleted Successfully";
        }
      
        echo json_encode($result);
        exit();
    }
}