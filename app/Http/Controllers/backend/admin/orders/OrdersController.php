<?php
namespace App\Http\Controllers\backend\admin\orders;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class OrdersController extends Controller
{
    public function orders(){

        $data['orders'] = Order::with('orderProducts')->paginate(10);
   
        return view('backend.orders.orders', $data);
    }


//Show Orders

public function orderShow($id){
    $order = Order::with('orderProducts','customer')->findOrFail($id);
    
    return view('backend.orders.show',['order'=>$order]);
}


//Delete Order

public function orderDelete(Request $request , $id){

$order = Order::find($id);

$order->delete();

session()->flash('type','success');
session()->flash('message','Order deleted success');
return redirect()->back();

}

 

// Delever Order Status 
public function DeleverOrderSts(Request $request,$id){

   
    if($request->order_sts !==null && $request->order_sts !== '' && $request->order_sts !=='Order Completed'){
        $order = Order::find($id);
        $order->operational_status = $request->order_sts;
        $order->save();
        session()->flash('type','success');
        session()->flash('message','Payment Status changed success');
        return redirect()->back();
    }else if($request->order_sts ==='Order Completed'){
        $order = Order::find($id);   

      

        foreach ($order->orderProducts as $orderProduct) {

          
            $total_quantity = $orderProduct->quantity + $orderProduct->product->sale_amount;

        
            $orderProduct->product()->update(
                [
                    'sale_amount' => $total_quantity,
                ]
            );

           $remaining = $orderProduct->product->stock_amount - $total_quantity;

            $orderProduct->product()->update(
                [
                    'remaining_amount' => $remaining,
                ]
            );

                
        }


$order->operational_status = $request->order_sts;
$order->save();
      session()->flash('type','success');
        session()->flash('message','Payment Status changed success');
        return redirect()->back();  
    }
    
}

// Payment Order Status
public function PaymentOrderSts(Request $request,$id){

    $order = Order::find($id);
    if($request->order_sts !==null && $request->order_sts !== ''){
        $order->payment_status = $request->order_sts;
        $order->save();
        session()->flash('type','success');
        session()->flash('message','Payment Status changed success');
        return redirect()->back();
    }

    
}

}
