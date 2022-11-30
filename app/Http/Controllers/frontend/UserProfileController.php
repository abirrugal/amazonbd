<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    function userProfile($user){
        if(auth()->user()){
            $data['user']  = auth()->user(); 
        }
       
       return view('frontend.user.profile',$data);
    }
    function userOrders($user){
        if(auth()->user()){
        $data['orders'] = Order::where('user_id', auth()->user()->id)->paginate(10);
        }
       return view('frontend.user.orders',$data);
    }

}
