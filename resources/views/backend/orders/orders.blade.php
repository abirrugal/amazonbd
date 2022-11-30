@extends('backend.layouts.admin_layouts')


@section('title')
Customer's Orders.
@endsection

@section('main')


<ul class="nav nav-tabs my-4">
  <li class="nav-item">
    <a class="nav-link active" href="#">Uncompleted order</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{route('admin.products.new')}}">Completed order</a>
  </li>
</ul>


<div class="well">
    <h3 class="my-4">Orders List</h3>
  
    <div class="table-responsive">
    <table class="table table-bordered table-condensed">
    
    <thead>
    <tr>
    <th class="h5 p-3">Id</th>
    <th class="h5 p-3">Customer's Name</th>
    <th class="h5 p-3">Customer's Phone No</th>
    <th class="h5 p-3">Customer's City</th>
    <th class="h5 p-3">Action</th>
    </tr>
    </thead>
    
    <tbody>
    
    
    @foreach($orders as $order)

  
    <tr>
    <td class="card-title font-weight-bold">{{$order->id}}</td>
    <td class="card-title font-weight-bold">{{$order->customer_name}}</td>
    <td class="card-title font-weight-bold">{{$order->customer_phone_number}}</td>
    <td class="card-title font-weight-bold">{{$order->city}}</td>


    <td class="d-flex justify-content-center align-items-center">
        <a  href="{{route('admin.order.show', $order->id)}}" class=" btn btn-secondary text-white  btn-sm">Details</a>
        <div class="list-group-item border-0"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="{{"#".$order->city}}">
          Delevery
        </button>
      </div>
        <div class="list-group-item border-0  ps-0"><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="{{"#".$order->city."payment"}}">
          Payment
        </button>
      </div>


      <form class="d-inline "  action="{{route('admin.order.delete', $order->id)}}" method="POST">
      @csrf 
      @method('Delete')
      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Order?');">X</button>
      </form>

    
    </td>

    </tr>

             <!-- Modal Delevery Status-->
             <div class="modal fade" id="{{$order->city}}" tabindex="-1" aria-labelledby="{{$order->customer_name}}" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="{{$order->customer_name}}">Change Delivery Status</h5>
                    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
         
                  
              <form action="{{route('admin.order.delivery', $order->id  )}}" method="POST" >
                @csrf
                @method('PUT')
         
                  <div class="modal-body">
<div class="mb-3">
                    <h6 class="card-title mb-3 d-inline" >Delevery Status :</h6><h5 class="d-inline"> {{$order->operational_status}}</h5>
</div>
                    <select class="form-select" name="order_sts" id="">
                      <option value='pending' @if ($order->operational_status=== "pending")
                        selected
                      @endif>Panding</option>
                      <option value='Processing' @if ($order->operational_status=== "Processing")
                        selected
                      @endif>Processing</option>
                      <option value='Delivered' @if ($order->operational_status=== "Delivered")
                        selected
                      @endif>Delivered</option>
                      <option value='Order Completed' @if ($order->operational_status=== "Order Completed")
                        selected
                      @endif>Order Completed</option>
                    </select>
                  </div>
                        
    
                  <div class="modal-footer">
         
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
              </form>
         
         
                </div>
              </div>
            </div>



             <!-- Modal Payment Status-->
             <div class="modal fade" id="{{$order->city."payment"}}" tabindex="-1" aria-labelledby="{{$order->customer_name."payment"}}" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="{{$order->customer_name."payment"}}">Change Payment Status</h5>
                    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
         
                  
              <form action="{{route('admin.order.payment', $order->id  )}}" method="POST" >
                @csrf
                @method('PUT')
         
                  <div class="modal-body">
                    <div class="mb-3">
                      <h6 class="card-title mb-3 d-inline" >Payment Status :</h6><h5 class="d-inline"> {{$order->payment_status}}</h5>
                    </div>                    
                    <select class="form-select" name="order_sts" id="">
                      <option value='Panding' @if ($order->payment_status=== "Panding")
                        selected
                      @endif>Panding</option>
                      <option value='Paid' @if ($order->payment_status=== "Paid")
                        selected
                      @endif >Paid</option>
                    </select>
                  </div>
                        
    
                  <div class="modal-footer">
         
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
              </form>
         
         
                </div>
              </div>
            </div>


    @endforeach


    </tbody>
    
    </table>
    <div class="d-flex justify-content-center align-items-center mb-4 bg-secondary pt-3">
    {{$orders->links()}}
    </div>
    </div>
    </div>



@endsection