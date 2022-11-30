<?php

namespace App\Http\Controllers\backend\admin\customers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class Customers_Controller extends Controller
{
    public function customers(){
        $data['customers'] = User::paginate(10);
        return view('backend.customers.index',$data);
    }

    public function changeRole(Request $request, $id){
        

        $user = User::find($id);
        if($request->user_role !==null && $request->user_role !== ''){
            $user->role_as = $request->user_role;
            $user->save();
            session()->flash('type','success');
            session()->flash('message','Payment Status changed success');
            return redirect()->back();
        }
    }
}
