@extends('backend.layouts.admin_layouts')
@section('title')
    Dashboard
@endsection

@section('main')
<div class="row">
    <div class="category_title  mb-2 ms-3 ">Product Information
    </div><div class="border-btm mb-2"></div>
<div class="col-xl-3 col-sm-6 col-12 my-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between px-md-1">
                <div class="align-self-center">
                    <i class="far fa-comment-alt text-warning fa-3x"></i>
                </div>
                <div class="text-end">                  
                    <p class="mb-0 title_font">Total stock</p>
                    <h3>{{$total_products}}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-sm-6 col-12 my-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between px-md-1">
                <div class="align-self-center">
                    <i class="far fa-comment-alt text-warning fa-3x"></i>
                </div>
                <div class="text-end">                  
                    <p class="mb-0 title_font">Total sales</p>
                    <h3>{{$total_sales}}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-sm-6 col-12 my-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between px-md-1">
                <div class="align-self-center">
                    <i class="far fa-comment-alt text-warning fa-3x"></i>
                </div>
                <div class="text-end">                  
                    <p class="mb-0 title_font">Total Remaining</p>
                    <h3>{{$total_remaining}}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="row">
    <div class="category_title  mb-2 ms-3 ">Order Information
    </div><div class="border-btm mb-2"></div>
<div class="col-xl-3 col-sm-6 col-12 my-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between px-md-1">
                <div class="align-self-center">
                    <i class="far fa-comment-alt text-warning fa-3x"></i>
                </div>
                <div class="text-end">                  
                    <p class="mb-0 title_font">Total Order</p>
                    <h3>{{$total_order}}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-sm-6 col-12 my-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between px-md-1">
                <div class="align-self-center">
                    <i class="far fa-comment-alt text-warning fa-3x"></i>
                </div>
                <div class="text-end">                  
                    <p class="mb-0 title_font">Todays order</p>
                    <h3>{{$todays_order}}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-sm-6 col-12 my-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between px-md-1">
                <div class="align-self-center">
                    <i class="far fa-comment-alt text-warning fa-3x"></i>
                </div>
                <div class="text-end">                  
                    <p class="mb-0 title_font">Completed order</p>
                    <h3>{{$completed_order}}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="row">
    <div class="category_title  mb-2 ms-3 ">User Information
    </div><div class="border-btm mb-2"></div>

<div class="col-xl-3 col-sm-6 col-12 my-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between px-md-1">
                <div class="align-self-center">
                    <i class="far fa-comment-alt text-warning fa-3x"></i>
                </div>
                <div class="text-end">                  
                    <p class="mb-0 title_font">Total user</p>
                    <h3>{{$total_user}}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-sm-6 col-12 my-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between px-md-1">
                <div class="align-self-center">
                    <i class="far fa-comment-alt text-warning fa-3x"></i>
                </div>
                <div class="text-end">                  
                    <p class="mb-0 title_font">Admin</p>
                    <h3>{{$admin}}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-sm-6 col-12 my-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between px-md-1">
                <div class="align-self-center">
                    <i class="far fa-comment-alt text-warning fa-3x"></i>
                </div>
                <div class="text-end">                  
                    <p class="mb-0 title_font">Customer</p>
                    <h3>{{$registered_user}}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<style>
    .title_font{
        font-size: 18px;
    }
</style>

@endsection