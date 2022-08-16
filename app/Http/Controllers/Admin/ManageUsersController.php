<?php

namespace App\Helpers;

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Hash;
use Validator;
use Carbon\Carbon;
use DataTables;
use App\Helper\Helper;
use DB;
use App\Models\Category;
use App\Models\UserAssignProduct;


class ManageUsersController extends Controller
{
    public function index(Request $request)
    {
        return view('Admin.user.index');
    }

    public function add(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'username' => 'required',

            // 'email' => 'required',
            // 'password' => 'required',
            'phone' => 'required',
            'status' => 'required',

        ]);
        $update_id = $request->input('userHdnID');
        if (empty($update_id)) {
            $validation->password = 'required';
            $validation->email   = 'required|email|unique:users';
            $validation->profile_pic   = 'image|mimes:jpeg,png,jpg,gif,svg';
        }
        if ($validation->fails()) {
            $data['status'] = 0;
            $data['error'] = $validation->errors()->all();
            echo json_encode($data);
            exit();
        }

        $userData = $request->all();
        $result['status'] = 0;
        $result['msg'] = "Something went wrong please try again";

        if ($request->profile_pic) {
            $path = \Storage::disk('s3')->put('images/profile_pic', $request->profile_pic);
            $path = \Storage::disk('s3')->url($path);
        }

        $insertData = new User;
        if ($update_id == '' && $update_id == null) {
            $insertData->name           = $userData['firstname'] . ' ' . $userData['lastname'];
            $insertData->firstname      = $userData['firstname'];
            $insertData->lastname       = $userData['lastname'];
            $insertData->username       = $userData['username'];
            $insertData->dob            = $userData['dob'];
            if (isset($request->profile_pic) && $request->profile_pic != null && $request->profile_pic != '') {
                $insertData->profile_pic    = $path;
            } else {
                $insertData->profile_pic    = 'https://pyrium.s3.amazonaws.com/images/profile_pic/bip6DSdCWAvfB3K4ISdfaQUoVaNzuzTG9rpCAZGY.webp';
            }
            $insertData->email          = $userData['email'];
            $insertData->password       = Hash::make($userData['password']);
            $insertData->phone          = $userData['phone'];
            $insertData->type           = $userData['type'];
            $insertData->status         = $userData['status'];
            $insertData->created_at     = Carbon::now()->timestamp;
            $insertData->save();
            $insert_id = $insertData->id;
        } else {
            $updateDetails = User::where('id', $update_id)->first();
            $updateDetails->name           = $userData['firstname'] . ' ' . $userData['lastname'];
            $updateDetails->firstname      = $userData['firstname'];
            $updateDetails->lastname       = $userData['lastname'];
            $updateDetails->username       = $userData['username'];
            $updateDetails->dob            = $userData['dob'];
            if ($request->profile_pic != '') {
                $updateDetails->profile_pic = $path;
            } else {
                $updateDetails->profile_pic = $userData['hidprofile_pic'];
            }
            // $updateDetails->email          = $userData['email'];
            $updateDetails->password       = !empty($userData['password']) ? Hash::make($userData['password']) : $updateDetails->password;
            $updateDetails->phone          = $userData['phone'];
            $updateDetails->type           = $userData['type'];
            $updateDetails->status         = $userData['status'];
            $updateDetails->updated_at     = Carbon::now()->timestamp;
            $updateDetails->save();
            $result['status'] = 1;
            $result['msg'] = "User Data Update Successfully!";
        }

        $insertData2 = new UserInfo;
        if ($update_id == '' && $update_id == null) {
            $insertData2->user_id                                    = $insertData->id;
            $insertData2->networth                                   = $userData['networth'];
            $insertData2->grossincome                                = $userData['grossincome'];
            $insertData2->service_utilized                           = $userData['service_utilized'];
            $insertData2->is_accredited_investor                     = $userData['is_accredited_investor'];
            $insertData2->is_experience_in_financial_and_business    = $userData['is_experience_in_financial_and_business'];
            $insertData2->is_accurate_and_complete_answers           = $userData['is_accurate_and_complete_answers'];
            $insertData2->is_seasoned_investor                       = $userData['is_seasoned_investor'];
            $insertData2->status                                     = $userData['status'];
            $insertData2->created_at                                 = Carbon::now()->timestamp;
            $insertData2->save();
            $insert_id = $insertData2->user_id;
            if ($insert_id > 0) {
                $result['status'] = 1;
                $result['msg'] = "User created Successfully";
            }
        } else {

            $updateDetails2 = UserInfo::where('user_id', $update_id)->first();

            if (!$updateDetails2) {
                $updateDetails2 = new UserInfo;
                $updateDetails2->user_id                                    = $update_id;
                $updateDetails2->networth                                   = $userData['networth'];
                $updateDetails2->grossincome                                = $userData['grossincome'];
                $updateDetails2->service_utilized                           = $userData['service_utilized'];
                $updateDetails2->is_accredited_investor                     = $userData['is_accredited_investor'];
                $updateDetails2->is_experience_in_financial_and_business    = $userData['is_experience_in_financial_and_business'];
                $updateDetails2->is_accurate_and_complete_answers           = $userData['is_accurate_and_complete_answers'];
                $updateDetails2->is_seasoned_investor                       = $userData['is_seasoned_investor'];
                $updateDetails2->status                                     = $userData['status'];
                $updateDetails2->created_at                                 = Carbon::now()->timestamp;
                $updateDetails2->save();
            } else {
                $updateDetails2->networth                                   = $userData['networth'];
                $updateDetails2->grossincome                                = $userData['grossincome'];
                $updateDetails2->service_utilized                           = $userData['service_utilized'];
                $updateDetails2->is_accredited_investor                     = $userData['is_accredited_investor'];
                $updateDetails2->is_experience_in_financial_and_business    = $userData['is_experience_in_financial_and_business'];
                $updateDetails2->is_accurate_and_complete_answers           = $userData['is_accurate_and_complete_answers'];
                $updateDetails2->is_seasoned_investor                       = $userData['is_seasoned_investor'];
                $updateDetails2->status                                     = $userData['status'];
                $updateDetails2->updated_at     = Carbon::now()->timestamp;
                $updateDetails2->save();
                $result['status'] = 1;
                $result['msg'] = "User Data Update Successfully!";
            }
        }

        echo json_encode($result);
        exit;
    }

    public function emailExistOrNot(Request $request)
    {
        $allData = $request->all();
        $user_email = $allData['email'];
        $hid = $request->input('userHdnID');
        $find_user = User::where('email', '=', $user_email)->where('status', '!=', '-1');
        if ($hid > 0) {
            $find_user->where('id', '!=', $hid);
        }
        $result = $find_user->count();

        if (isset($allData['forgot']) && $allData['forgot'] == 1 && $allData['forgot'] != '') {
            if ($result > 0) {
                echo json_encode(TRUE);
            } else {
                echo json_encode(FALSE);
            }
        } else {
            if ($result > 0) {
                echo json_encode(FALSE);
            } else {
                echo json_encode(TRUE);
            }
        }
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data =  User::where('status', '!=', -1)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    $status = '<span class="badge badge-danger">Inactive</span>';
                    if ($row->status == 1) {
                        $status = '<span class="badge badge-success">Active</span>';
                    }
                    return $status;
                })
                ->addColumn('profile_pic', function ($row) {
                    $image = $row->profile_pic;
                    $pathFragments = explode('/', $image);
                    $end = end($pathFragments);
                    if ($end == 1) {
                        $profile_pic = '<img id="" style="width: 80px; height: auto;" src="https://pyrium.s3.amazonaws.com/images/profile_pic/bip6DSdCWAvfB3K4ISdfaQUoVaNzuzTG9rpCAZGY.webp">';
                    } else {
                        $profile_pic = '<img id="" style="width: 80px; height: auto;" src="' . $row->profile_pic . '">';
                    }


                    return $profile_pic;
                })
                ->addColumn('type', function ($row) {
                    if ($row->type == 1) {
                        $type = '<span style="background-color: #ff9800; color: #fff;"  class="badge">Invester</span>';
                    } else {
                        $type = '<span style="background-color: #009688; color: #fff;" class="badge">Industrie</span>';
                    }
                    return $type;
                })
                ->addColumn('action', function ($row) {
                    // $action = '<input type="button" value="Delete" class="btn btn-sm btn-danger deleteUser" data-id="'. $row->id .'" ">';
                    $action = '<button type="button" class="btn btn-danger btn-sm btn-icon icon-left deleteUser" data-id="' . $row->id . '"><i class="entypo-cancel"></i> Delete</button>&nbsp;';
                    // $action .= '<button type="button" class="btn btn-info btn-sm btn-icon icon-left editUser" data-id="'. $row->id . '"><i class="entypo-pencil"></i> Edit </button>&nbsp;';
                    $action .= '<button type="button" class="btn btn-info btn-sm btn-icon icon-left viewUser" data-id="' . $row->id . '"><i class="entypo-eye"></i> View</button>&nbsp;';
                    return $action;
                })

                ->rawColumns(['action', 'status', 'profile_pic', 'type'])
                ->make(true);
        }
    }

    public function edit(Request $request)
    {
        $edit_id = $request->input('id');
        $responsearray = array();
        $responsearray['status'] = 0;
        $result['msg'] = "Oops ! User Not found !";

        if ($edit_id != '' && $edit_id != null) {
            $edit_sql = User::where('id', $edit_id)->first();
            $edit_sql2 = UserInfo::where('user_id', $edit_id)->first();

            if ($edit_sql) {
                $responsearray['status'] = 1;
                $result['msg'] = "User found successfully";
                $responsearray['userData'] = $edit_sql;
                $responsearray['userData2'] = $edit_sql2;
            }
        }
        echo json_encode($responsearray);
        exit;
    }

    public function delete(Request $request)
    {
        $delete_id = $request->input('id');
        $result['status'] = 0;
        $result['msg'] = "Oops ! User Not Deleted !";
        if ($delete_id != '' && $delete_id != null) {
            $userDetails = User::where('id', $delete_id)->first();
            $userDetails->status            =  -1;
            $userDetails->updated_at        = Carbon::now();
            $userDetails->save();

            $userDetails2 = UserInfo::where('user_id', $delete_id)->first();
            $userDetails2->status            =  -1;
            $userDetails2->updated_at        = Carbon::now();
            $userDetails2->save();

            if ($userDetails) {
                $result['status'] = 1;
                $result['msg'] = "User deleted successfully";
            }
        }
        echo json_encode($result);
        exit;
    }

    public function view(Request $request)
    {
        $id = $request->input('id');
        $responsearray = array();
        $responsearray['status'] = 0;
        $result['msg'] = "Oops ! User Not found !";

        if ($id != '' && $id != null) {
            $view_sql = User::where('id', $id)->first();
            $view_sql2 = UserInfo::where('user_id', $id)->first();
            // echo '<pre>';
            // print_r($view_sql2);
            // die;
            $userview_string = '';

            if ($view_sql) {


                if (isset($view_sql['status']) && $view_sql['status'] == 1) {
                    $status = "Active";
                } else {
                    $status = "InActive";
                }

                if (isset($view_sql2['is_seasoned_investor']) && $view_sql2['is_seasoned_investor'] == 1) {
                    $is_seasoned_investor = "Yes";
                } else {
                    $is_seasoned_investor = "No";
                }

                if (isset($view_sql2['is_accredited_investor']) && $view_sql2['is_accredited_investor'] == 1) {
                    $is_accredited_investor = "Yes";
                } else {
                    $is_accredited_investor = "No";
                }

                if (isset($view_sql2['is_experience_in_financial_and_business']) && $view_sql2['is_experience_in_financial_and_business'] == 1) {
                    $is_experience_in_financial_and_business = "Yes";
                } else {
                    $is_experience_in_financial_and_business = "No";
                }

                if (isset($view_sql2['is_accurate_and_complete_answers']) && $view_sql2['is_accurate_and_complete_answers'] == 1) {
                    $is_accurate_and_complete_answers = "Yes";
                } else {
                    $is_accurate_and_complete_answers = "No";
                }

                $date = '';
                if (isset($view_sql['dob']) && $view_sql['dob'] != ''  && $view_sql['dob'] !=null) {
                $date = $view_sql['dob'];
                $timestamp = strtotime($date);
                $date = date("d F Y", $timestamp);
                }

                $createDate = '';
                if (isset($view_sql['created_at']) && $view_sql['created_at'] != ''  && $view_sql['created_at'] !=null) {
                $createDate = $view_sql['created_at'];
                $timestamp = strtotime($createDate);
                $createDate = date("d F Y", $timestamp);
                }

                $profile_pic = '';
                if (isset($view_sql['profile_pic'])) {
                    $image = $view_sql['profile_pic'];
                    $pathFragments = explode('/', $image);
                    $end = end($pathFragments);
                    if ($end == 1) {
                        $profile_pic = 'https://pyrium.s3.amazonaws.com/images/profile_pic/bip6DSdCWAvfB3K4ISdfaQUoVaNzuzTG9rpCAZGY.webp';
                    } else {
                        $profile_pic = $image;
                    }
                }



                $userview_string .= '
                <div class="col-md-3">
                     <div class="justify-content-center" id="project-container" >
                        <div class="circular_image">
                            <img src="'.$profile_pic.'">
                        </div>
                     </div>
                 </div>
                 <div class="col-md-9">
                     <label>Name</label>
                     <input class="form-control" id="view_name" value="' . $view_sql['name'] . '" readonly>
                 </div>
                 <div class="col-md-9">
                     <label>Email</label>
                     <input class="form-control" id="view_email" value="' . $view_sql['email'] . '" readonly>
                 </div>
                 <div class="col-md-9">
                     <label>Phone Number</label>
                     <input class="form-control" id="view_number" value="' . $view_sql['phone'] . '" readonly>
                 </div>
                 <div class="col-md-4">
                     <label>Username</label>
                     <input class="form-control" id="view_username" value="' . $view_sql['username'] . '" readonly>
                 </div>
                 <div class="col-md-4">
                     <label>Date Of Birth</label>
                     <input class="form-control" id="view_dob" value="' . $date . '" readonly>
                 </div>
                 <div class="col-md-4">
                     <label>Created At</label>
                     <input class="form-control" id="view_created_at" value="' . $createDate . '" readonly>
                 </div>
                 <div class="col-md-4">
                     <label>Status</label>
                     <input class="form-control" id="view_status" value="' . $status . '" readonly>
                 </div>
                 <div class="col-md-4">
                     <label>Networth</label>
                     <input class="form-control" id="view_networth" value="' . $view_sql2['networth'] . '" readonly>
                 </div>
                 <div class="col-md-4">
                     <label>Gross Income</label>
                     <input class="form-control" id="view_grossincome" value="' . $view_sql2['grossincome'] . '" readonly>
                 </div>
                 <div class="col-md-6">
                     <label>is Accredited Investor ?</label>
                     <input class="form-control" id="view_is_accredited_investor" value="' . $is_accredited_investor . '" readonly>
                 </div>
                 <div class="col-md-6">
                     <label>Is Experience In Financial And Business ?</label>
                     <input class="form-control" id="view_is_experience_in_financial_and_business" value="' . $is_experience_in_financial_and_business . '" readonly>
                 </div>
                 <div class="col-md-6">
                     <label>Is Accurate And Complete Answers ?</label>
                     <input class="form-control" id="view_is_accurate_and_complete_answers" value="' . $is_accurate_and_complete_answers . '" readonly>
                 </div>
                 <div class="col-md-6">
                     <label>Is Seasoned Investor ?</label>
                     <input class="form-control" id="view_is_seasoned_investor" value="' . $is_seasoned_investor . '" readonly>
                 </div>
                 <div class="col-md-12">
                     <label>Service Utilized</label>
                     <input class="form-control" id="view_service_utilized" value="' . $view_sql2['service_utilized'] . '" readonly>
                 </div>';

                $responsearray['status'] = 1;
                $responsearray['msg'] = "User found successfully";
                $responsearray['userview_string'] = $userview_string;
            }
        }
        echo json_encode($responsearray);
        exit;
    }
}
