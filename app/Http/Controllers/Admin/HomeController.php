<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\UserNotification;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    protected $redirectTo = '/admin/login';


    /**
     * Show the Admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {


/*        dd(\Auth::user());*/

        return view('admin.home');
    }
    public function notificationCreate()
    {
        return view('admin.notifications');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function sendNotifications(Request $request)
    {
        $requests = $request->all();
        $message = $requests['message'];
        $users = User::select('id')->get();
        foreach($users as $user){
            sendNotification($user->id ,'user' , $user->id, 'advertising','advertising',$message);
        }
        Alert('ارسال اشعارات', ' تم ارسال الاشعارات بنجاح', 'success');
        return redirect()->route('notifications.view');
    }

}
