<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Events;
use DataTables;
use Validator;
use Carbon\Carbon;
use Auth;


class EventController extends Controller
{
    //
    function index()
    {
        return view('Admin/event/index');
    }

    function add(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'type_of_card' => 'in:0,1',
            'is_blog' => 'in:0,1',
            'subcategory' => 'required',
        ]);

        if ($validation->fails()) {

            $data['status'] = 0;
            $data['error'] = $validation->errors()->all();
            echo json_encode($data);
            exit();
        }
        $result = array();
        $result['status'] = 0;
        $result['msg'] = "Oops ! Discover Not Inserted";
        $hdid = $request->input('hdid');
        $data = $request->input();

        if ($hdid == '') {
            $data_insert = new Discover;
            $data_insert->name = $data['name'];
            $data_insert->description = $data['description'];
            $data_insert->category_id = $data['category'];
            $data_insert->subcategory_id = $data['subcategory'];
            $data_insert->is_featured = $data['is_featured'];
            $data_insert->type_of_card = $data['type_of_card'];
            $data_insert->is_blog = $data['is_blog'];
            $data_insert->text_color = $data['text_color'];
            $data_insert->background_color = $data['background_color'];
            $data_insert->status = $data['status'];
            $data_insert->save();
            $insert_id = $data_insert->id;
            if ($insert_id) {
                $result['status'] = 1;
                $result['msg'] = "Discover inserted Successfully";
                $result['id'] = $insert_id;
            }
        } else {
            //echo '<pre>'; print_r($data); exit;
            $update = Discover::where('id', $hdid)->first();
            $update->name = $data['name'];
            $update->description = $data['description'];
            $update->category_id = $data['category'];
            $update->subcategory_id = $data['subcategory'];
            $update->is_featured = $data['is_featured'];
            $update->type_of_card = $data['type_of_card'];
            $update->is_blog = $data['is_blog'];
            $update->text_color = $data['text_color'];
            $update->background_color = $data['background_color'];
            $update->status = $data['status'];
            if(!$update->save()) {
                //echo "sdsd"; die;
            }
            $result['status'] = 1;
            $result['msg'] = "Discover updated Successfully";
        }

        echo json_encode($result);
        exit();
    }

    function datatable(Request $request)
    {
        if ($request->ajax()) {

          $calenderId  = 'nikulpanchal0011@gmail.com';
          $apiKey      = 'AIzaSyCcLTTDtC2wPIXLiRT62igEOvD8_xVhzmw';


          // $data = array("application_name" => "Application1");
          $apiurl ='https://www.googleapis.com/calendar/v3/calendars/'.$calenderId.'/events?key='.$apiKey;
          // $data_array = json_encode( $data );
          $curl    = curl_init();
          curl_setopt( $curl, CURLOPT_URL, $apiurl );
          curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
          // curl_setopt( $curl, CURLOPT_POSTFIELDS, $data_array );
          curl_setopt( $curl, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json' ) );
          $result = curl_exec( $curl );
          $eventData = json_decode( $result, true )['items'];

          // echo "<pre>";
          // print_r( $eventData );
          // die;
          // curl_close( $curl );




            // $data = Events::select('*')->get();

            return Datatables::of($eventData)

                ->addIndexColumn()
                // ->addColumn('status', function ($row) {
                //     $status = '<span class="badge badge-danger">Inactive</span>';
                //     if ($row->status == 1) {
                //         $status = '<span class="badge badge-success">Active</span>';
                //     }
                //     return $status;
                // })
                ->addColumn('time', function ($row) {
                   $time = $row['created'];
                   $newDate = date('d-m-Y', strtotime($time));
                   return $newDate;
                })

                ->addColumn('action', function ($row) use($calenderId) {
                    // echo "<pre>";
                    // print_r($calenderId);
                    // die;
                 
                    $action = '<button class="btn btn-danger btn-sm btn-icon icon-left" onclick="delete_discover(' . $row['id'] . ')"><i class="entypo-cancel"></i> Delete</button>&nbsp;';
                    $action .= '<button class="btn btn-info btn-sm btn-icon icon-left" onclick="edit_discover(' . $row['id'] . ')"><i class="entypo-pencil"></i> Edit</button>';
                    // $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>'
                    return $action;
                })

                // ->rawColumns(['action', 'is_featured', 'status'])
                ->rawColumns(['time','action'])

                ->make(true);
        }
    }

    function delete(Request $request)
    {
        $delete['status'] = 0;
        $delete['msg'] = "Oops ! Discover not Deleted ";
        $d_id = $request->input('id');
        $discoverDetails = Discover::where('id', $d_id)->first();
        $discoverDetails->status            =  -1;
        $discoverDetails->updated_at        = Carbon::now();
        $discoverDetails->save();

        if ($discoverDetails) {
            $delete['status'] = 1;
            $delete['msg'] = "Discover Deleted Successfully";
        }
        echo json_encode($delete);
        exit();
    }

    function edit(Request $request)
    {
        $edit = array();
        $edit['status'] = 0;
        $e_id = $request->input('id');
        $edtq =    Discover::where('id', $e_id)->first();

        if ($edtq) {
            $edit['status'] = 1;
            $edit['user'] = $edtq;
        }
        echo json_encode($edit);
        exit();
    }


    function list(Request $request)
    {
        $credentials = $request->only('filter_type', 'cat_id');
        $validator = Validator::make($credentials, [
            'filter_type' => 'required',
            'cat_id' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()]);
        }
        $currentUser = Auth::user();
        $currentUserId = $currentUser->id;
        if (!$currentUserId) {
            return response()->json([
                'success' => false,
                'message' => "User Not Found",
            ], 200);
        }

        $filterType = $request->filter_type;
        $catID = $request->cat_id;

        if ($filterType == '1' && $catID > 0) {
            $discover = Discover::with(['category', 'subcategory'])->where('status', '1')->where('category_id', $catID)->get()->toArray();
        } else if ($filterType == '2') {
            $discover = Discover::with(['category', 'subcategory'])->where('status', '1')->where('is_featured', '1')->get()->toArray();
        } else if ($filterType == '3') {
            $discover = Discover::with(['category', 'subcategory'])->where('status', '1')->orderBy('created_at', 'DESC')->get()->toArray();
        } else if ($filterType == '4') {
            $searchString = '';
            if (isset($request->search_text) && $request->search_text != '') {
                $searchString = $request->search_text;
                $discover = Discover::with(['category', 'subcategory'])
                    ->select('discovers.*')
                    ->join('category', 'category.id', '=', 'discovers.category_id')
                    ->join('subcategorys', 'subcategorys.id', '=', 'discovers.subcategory_id')
                    //->where('status','1')    
                    ->orWhere('category.name', 'like', "%{$searchString}%")
                    ->orWhere('subcategorys.name', 'like', "%{$searchString}%")
                    ->orWhere('discovers.name', 'like', "%{$searchString}%")
                    ->orWhere('discovers.description', 'like', "%{$searchString}%");
                $discover = $discover->get()->toArray();
            } else {
                $discover = Discover::with(['category', 'subcategory'])->where('status', '1')->get()->toArray();
            }
        } else {
            $discover = Discover::with(['category', 'subcategory'])->where('status', '1')->get()->toArray();
        }




        // echo '<pre>';
        // print_r($discover);
        // die;

        $discoverData = array();

        if (!empty($discover)) {
            foreach ($discover as $key => $value) {
                $value['progress'] = 0;
                $value['is_company_profile'] = 0;
                $value['tagTitle'] = "Completed";
                $value['timeLength'] = 12;
                $value['userDidStart'] = 1;

                if ($value['type_of_card'] == 1) {
                    $discoverData['primaryCards'][] = $value;
                } else {
                    $discoverData['secondaryCards'][] = $value;
                }
            }
        }

        return response()->json([
            'success' => true,
            'message' => "Discover info get Successfully",
            'data' => $discoverData
        ], 201);
    }

    function subcategory_id(Request $request)
    {
        $subcategory = array();
        $subcategory['status'] = 0;
        $id = $request->input('id');

        $subcategoryList = SubCategory::select('id', 'name')->where('category_id', '=', $id)->where('status', '=', 1)->orderBy('name', 'ASC')->get()->toArray();

        if ($subcategoryList) {
            $subcategory['status'] = 1;
            $subcategory['subcategory'] = $subcategoryList;
        }
        echo json_encode($subcategory);
        exit();
    }

    function editsubcategory_id(Request $request)
    {
        $subcategory = array();
        $subcategory['status'] = 0;
        $id = $request->input('id');

        $subcategoryList = SubCategory::select('id', 'name')->where('id', '=', $id)->where('status', '=', 1)->first();

        if ($subcategoryList) {
            $subcategory['status'] = 1;
            $subcategory['subcategory'] = $subcategoryList;
        }
        echo json_encode($subcategory);
        exit();
    }
}
