<?php

namespace App\Http\Controllers;

use App\Models\Industries;
use App\Models\User;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function notificationlist()
    {
        $industriesList = Industries::select('name', 'created_at')->where('status', '=', 1)->limit(10)->get();
        $userList = User::select('name', 'created_at')->where('status', '=', 1)->limit(10)->get();

        $user_string  = '';
        $totalusers = count($userList);
        $totalindustries = count($industriesList);
        $totalcount = $totalusers+$totalindustries;

        
        if ($totalusers > 0) {
            $user_string .= '&nbsp;<center><span style="font-size:18px;"><strong> New Users Registered </strong></span></center>&nbsp;';
            foreach ($userList as $user) {
                $date = $user->created_at;
                $timestamp = strtotime($date);
                $date = date("d F Y", $timestamp);
                $user_string .= '
        <li class="unread notification-success">
        <a href="#">
        <i class="entypo-user pull-right mr-2"></i>
            <span class="line">
                <strong>' . $user->name . ' Is Registered</strong>
            </span>
            <span class="line small">
                At ' . $date . '
            </span>
        </a>
    </li>';
            }
        }

        if ($totalindustries > 0) {
            $user_string .= '&nbsp;<center><span style="font-size:18px;"><strong> New Company Registered </strong></span></center>&nbsp;';
            foreach ($industriesList as $industries) {
                $date = $industries->created_at;
                $timestamp = strtotime($date);
                $date = date("d F Y", $timestamp);
                $user_string .= '
        <li class="unread notification-success">
        <a href="#">
        <i class="entypo-user pull-right mr-2"></i>
            <span class="line">
                <strong>' . $industries->name . ' Is Registered</strong>
            </span>
            <span class="line small">
                At ' . $date . '
            </span>
        </a>
    </li>';
            }
        }

        $result['status'] = 1;
        $result['user_string'] = $user_string;
        $result['count'] = $totalcount;

        echo json_encode($result);
        exit();
    }
}
