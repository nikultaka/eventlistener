<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
// use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\CardInfo;
use JWTAuth;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // Login user
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        //valid credential
        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()]);
        }
        try {
            $currentUser_email =  $credentials['email'];
            $check_user = User::where('email', $currentUser_email)->where('status', '!=', '-1')->first();
            if ($check_user == null && $check_user == '') {
                return response()->json([
                    'success' => false,
                    'message' => "Invalid email Id",
                ], 200);
            }
            if ($check_user->status == 0) {
                return response()->json([
                    'success' => false,
                    'message' => "User Is block by Admin.",
                ], 200);
            }
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Login credentials are invalid.',
                ], 200);
            }
        } catch (JWTException $e) {
            return $credentials;
            return response()->json([
                'success' => false,
                'message' => 'Could not create token.',
            ], 200);
        }
        $currentUser = Auth::user();
        //Token created, return with success response and jwt token
        $currentUser->token = $token;
        if ($currentUser->email_verified_at == null) {
            $currentUser->is_email_verified = 0;
        } else {
            $currentUser->is_email_verified = 1;
        }
        return response()->json([
            'success' => true,
            'message' => "User LoggedIn Successfully",
            //'token' => $token,
            'data' => $currentUser
        ], 201);
    }

    /**
     * Registration Req
     */
    public function register(Request $request)
    {
        $req = $request->all();

        $validator = Validator::make($req, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required|min:10|max:10',
            'dob' => 'required|date_format:Y-m-d',
            'username' => 'required|unique:users',
            'type' => 'required', //1=Invester , 2=Industrie

            'accrediate_investor_options'  => 'required',
            'invest_stock'  => 'required',
            'answer_all_question'  => 'required',
            'mnemonics'  => 'required',
            'wallet_address'  => 'required',
            'private_key'  => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()]);
        }

        //$deploycontract = $this->deploycontract();
        //$createAccount = $this->createAccount($deploycontract);

        $deploycontract = '';
        $createAccount = '';
        
        $path = \Storage::disk('s3')->put('images/UserPictures', $request->profile_pic);
        $path = \Storage::disk('s3')->url($path);

        $find_user = User::where('email', $req['email'])->count();
        if ($find_user == 0) {
            $user = User::create([
                'name' => $request->firstname . ' ' . $request->lastname,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'username' => $request->username,
                'type' =>  $request->type,
                'dob' => $request->dob,
                'profile_pic' => $path,
                'deploy_id' => $deploycontract,
                'smart_contract_data' => $createAccount,
                'status' => 1
            ]);

            if (!empty($user)) {
                $userinfo = UserInfo::create([
                    'user_id' => $user->id,
                    'networth' => $request->networth,
                    'grossincome' => $request->grossincome,
                    'service_utilized' => $request->service_utilized,
                    //'is_accredited_investor' => $request->is_accredited_investor,
                    //'is_experience_in_financial_and_business' => $request->is_experience_in_financial_and_business,
                    //'is_accurate_and_complete_answers' => $request->is_accurate_and_complete_answers,
                    'accrediate_investor_options' => $request->accrediate_investor_options,
                    'is_seasoned_investor' => $request->is_seasoned_investor,
                    'answer_all_question' => $request->answer_all_question,
                    'wallet_address' => $request->wallet_address,
                    'invest_stock' => $request->invest_stock,
                    'mnemonics' => $request->mnemonics,
                    'private_key' => $request->private_key,
                    'id_card_pic' => $request->id_card_pic,
                    'kyc_checked' => $request->kyc_checked,
                    'ckeck_kyc_link' => $request->ckeck_kyc_link,
                    'accreditation_number' => $request->accreditation_number,
                    'status' => 1
                ]);

                $cardinfo = CardInfo::create([
                    'user_id' => $user->id,
                    'firstname' => $request->card_firstname,
                    'lastname' => $request->card_lastname,
                    'middlename' => $request->card_middlename,
                    'nationality' => $request->card_nationality,
                    'address1' => $request->card_address1,
                    'address2' => $request->card_address2,
                    'state' => $request->card_state,
                    'city' => $request->card_city,
                    'zipcode' => $request->card_zipcode,
                    'id_issued_date' => $request->card_id_issued_date,
                    'id_expiration_date' => $request->card_id_expiration_date,
                    'id_card_type' => $request->card_id_card_type,
                    'id_number' => $request->card_id_number,
                    'ssn' => $request->card_ssn,
                    'dob' => $request->card_dob,
                    'gender' => $request->card_gender,
                    'selfie_pic' => $request->card_selfie_pic,
                ]);
            }

            if (isset($user) && isset($userinfo) && isset($cardinfo)) {
                $user['info'] = $userinfo;
                $user['cardinfo'] = $cardinfo;
                $userallinfo = $user;
            }

            if ($userallinfo) {
                $userEmail = User::where('email', '=', $request->email)->first();
                $userToken = JWTAuth::fromUser($userEmail);
                $user->token = $userToken;
                return response()->json([
                    'success' => true,
                    'message' => "You have registered successfully.",
                    'data' => $userallinfo
                ], 201);
            }
        } else {
            return response()->json([
                'success' => true,
                'message' => "The email address you entered has already been registered.",
            ], 201);
        }

        return response()->json([
            'success' => true,
            'message' => "Something went wrong please try again",
        ], 400);
    }

    public function updateProfile(Request $request)
    {
        $credentials = $request->only('name', 'firstname', 'lastname', 'phone', 'dob', 'pic', 'type', 'user_id', 'picture', 'networth', 'grossincome', 'service_utilized', 'is_accredited_investor', 'is_experience_in_financial_and_business', 'is_accurate_and_complete_answers', 'is_seasoned_investor');

        //valid credential
        $validator = Validator::make($credentials, [
            //'name' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'dob' => 'required|date_format:Y-m-d',
            'phone' => 'required',
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()]);
        }
        $currentUser = Auth::user();

        if (!$currentUser) {
            return response()->json([
                'success' => false,
                'message' => "User ID Not Found",
            ], 200);
        }

        $currentUserId = $currentUser->id;
        if (!$currentUserId) {
            return response()->json([
                'success' => false,
                'message' => "User Not Found",
            ], 200);
        }

        $user = User::where('id',  $currentUserId)->first();
        $userData = $user;
        $user->name = $credentials['firstname'] . ' ' . $credentials['lastname'];
        $user->firstname = $credentials['firstname'];
        $user->lastname = $credentials['lastname'];
        $user->phone = $credentials['phone'];
        $user->dob = $credentials['dob'];
        $user->profile_pic = $credentials['pic'];


        $userinfo = UserInfo::where('user_id',  $currentUserId)->first();
        $isUpdate = 1;
        if (!$userinfo) {
            $isUpdate = 0;
            $userinfo = new UserInfo();
            $userinfo->user_id = $currentUserId;
        }

        if (isset($request['networth'])) {
            $userinfo->networth = $credentials['networth'];
        }

        if (isset($request['grossincome'])) {
            $userinfo->grossincome = $credentials['grossincome'];
        }

        if (isset($request['service_utilized'])) {
            $userinfo->service_utilized = $credentials['service_utilized'];
        }

        if (isset($request['is_accredited_investor'])) {
            $userinfo->is_accredited_investor = $credentials['is_accredited_investor'];
        }

        if (isset($request['is_experience_in_financial_and_business'])) {
            $userinfo->is_experience_in_financial_and_business = $credentials['is_experience_in_financial_and_business'];
        }

        if (isset($request['is_accurate_and_complete_answers'])) {
            $userinfo->is_accurate_and_complete_answers = $credentials['is_accurate_and_complete_answers'];
        }

        if (isset($request['is_seasoned_investor'])) {
            $userinfo->is_seasoned_investor = $credentials['is_seasoned_investor'];
        }

        if (isset($request['status'])) {
            $userinfo->status = $credentials['status'];
        }

        $user = $user->update();
        if ($isUpdate == 0) {
            $userinfo = $userinfo->save();
        } else {
            $userinfo = $userinfo->update();
        }

        $userinfo = UserInfo::where('user_id',  $currentUserId)->first();

        if (isset($userData) && isset($userinfo)) {
            $userData['info'] = $userinfo;
            $userallinfo = $userData;
        }

        if ($userallinfo) {
            return response()->json([
                'success' => true,
                'message' => "Profile Updated Successfully",
                'data' => $userallinfo
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Profile Not Updated",
            ], 200);
        }
    }

    public function updatePassword(Request $request)
    {
        $credentials = $request->only('current_password', 'new_password');
        $validator = Validator::make($credentials, [
            'current_password' => 'required',
            'new_password' => 'required'
        ]);


        //Send failed response if request is not valid
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
        $user = User::where('id',  $currentUserId)->first();
        if (Hash::check($credentials['current_password'], $user->password)) {
            if (strlen($credentials['new_password']) < 6) {
                return response()->json([
                    'success' => false,
                    'message' => "New Password must be 6 charecters long",
                ], 200);
            }
            $user->password =  Hash::make($credentials['new_password']);
            if ($user->update()) {
                return response()->json([
                    'success' => true,
                    'message' => "Password Updated Successfully",
                ], 201);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => "Current password is invalid",
            ], 200);
        }
    }

    public function logout(Request $request)
    {
        $token = JWTAuth::getToken();
        if ($token) {
            JWTAuth::setToken($token)->invalidate();
            return response()->json([
                'success' => true,
                'message' => "User successfully signed out",
            ], 201);
        }
        return response()->json([
            'success' => true,
            'message' => "Something went wrong please try again",
        ], 400);
    }

    public function forgot_password(Request $request)
    {
        $input = $request->all();
        $rules = array(
            'email' => "required|email",
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()]);
        } else {
            try {
                $user = User::where('email', '=', $request->only('email'))->first();
                if ($user === null) {
                    return response()->json([
                        'success' => false,
                        'message' => "User not exist",
                    ], 200);
                } else {
                    $response = Password::sendResetLink($request->only('email'));
                    return response()->json([
                        'success' => true,
                        'message' => "Reset password link sent to your emailid",
                    ], 201);
                }
            } catch (\Swift_TransportException $ex) {
                return response()->json([
                    'success' => false,
                    'message' => $ex->getMessage(),
                ], 200);
            } catch (Exception $ex) {
                return response()->json([
                    'success' => false,
                    'message' => $ex->getMessage(),
                ], 200);
            }
        }
    }

    public function userProfile(Request $request)
    {
        $currentUser = Auth::user();
        $currentUserId = $currentUser->id;
        if (!$currentUserId) {
            return response()->json([
                'success' => false,
                'message' => "User Not Found",
            ], 200);
        }

        $user = User::where('id',  $currentUserId)->first();
        $userinfo = UserInfo::where('user_id',  $currentUserId)->first();

        if (isset($user) && isset($userinfo)) {
            $user['info'] = $userinfo;
            $userallinfo = $user;
        }
        if ($userallinfo) {
            return response()->json([
                'success' => true,
                'message' => "Profile info get Successfully",
                'data' => $userallinfo
            ], 201);
        }
    }

    public function userlist()
    {
        $user = User::Select('*')->get();
        return response()->json([
            'success' => true,
            'message' => "User List Get Successfully",
            'data' => $user
        ], 201);
    }

    public function deploycontract()
    {

        $curl = curl_init();
        $host = env('HOST');

        curl_setopt_array($curl, array(
            CURLOPT_URL => $host . '/deploy_contract',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
                                       "name":"testing",
                                       "privateKey":"1362f9800a0403cf829f9a5b0eddeacf0ea97420638ab1b89690a45d7b8260fb"
                                   }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        $response = json_decode($response);
        if (isset($response->data) && $response->data != '' && $response->data != null) {
            $contractIdArray = (array) $response->data;
            $contractId = $contractIdArray['contract ID '];
        }

        curl_close($curl);
        return $contractId;

    }

    public function createAccount($contractId)
    {

        $curl = curl_init();
        $host = env('HOST');

        curl_setopt_array($curl, array(
            CURLOPT_URL => $host . '/create',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
                                       "id":"'.$contractId.'"
                                   }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
}
