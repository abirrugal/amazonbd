

@extends('frontend.layouts.master')

@section('main')

<div class="container">
<ul class="nav nav-tabs my-4">
  <li class="nav-item">
    <a class="nav-link " href="{{route('frontend.user.profile', auth()->user()->name)}}">My Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="#">My Orders</a>
  </li>
</ul>
</div>


<div class="container">
<div class="well">
    <h3 class="my-4">Product's List</h3>
    <p>
    <a class="btn btn-success" href="{{route('admin.products.new')}}">Add Product</a>
    </p>
    <div class="table-responsive">
    <table class="table table-bordered table-condensed">
    <thead>
    <tr>
    <th class="h5 p-3">Order Id</th>
    <th class="h5 p-3">Customer name</th>
    <th class="h5 p-3">Customer Phone Number</th>
    <th class="h5 p-3">Total ammount</th>
    <th class="h5 p-3">Paid ammount</th>

    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
    <tr>
    <td class="card-title font-weight-bold"> {{$order->id}}</td>
    <td class="card-text font-weight-bold">{{$order->customer_name}} </td>
    <td class="card-title font-weight-bold">{{$order->customer_phone_number}} </td>
    <td class="card-text font-weight-bold">BDT {{$order->total_amount}} </td>
    <td class="card-text font-weight-bold">BDT {{$order->total_amount}} </td>

    </tr>
    @endforeach
    </tbody>
    </table>
    <div class="d-flex justify-content-center align-items-center mb-4 bg-secondary pt-3">
    {{$orders->links()}}
    </div>
    </div>
    </div>
</div>


  @endsection