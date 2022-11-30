<?php
namespace App\Http\Controllers\backend\admin;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
 
    public function index(){
        
      $data['total_products'] =  Product::select('stock_amount')->sum('stock_amount');
      $data['total_sales'] = Product::select('sale_amount')->sum('sale_amount');
      $data['total_remaining'] =$data['total_products'] - $data['total_sales'] ;
      $data['todays_order'] = Order::whereDate('created_at', Carbon::today())->get()->count();
      $data['total_order'] = Order::get()->count();
      $data['completed_order'] = Order::where('operational_status','Order Completed')->get()->count();
      $data['total_user'] = User::get()->count();
      $data['registered_user'] = User::where('role_as','user')->get()->count();
      $data['admin'] = User::where('role_as','admin')->get()->count();

        return view('backend.index',$data);
    }
    
}
