@extends('frontend.layouts.master') @section('main')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 d-lg-block border-end mt-3">
            <div class="p-3 pb-2 fw-bolder border-bottom">Department</div>
            @foreach ($category->child_category as $subcategories)
            <div class="px-3 py-2"> <a class="text-decoration-none text-dark h6 mb-3" href="{{route('frontend.product.products_list',$subcategories->slug)}}"> {{$subcategories->name}} </a></div>
            @endforeach
        </div>
        <div class="col-lg-10 mt-3">
            <div class="d-flex flex-row h4 text-center mb-2 ">{{$category->name}} </div>
            <div class="d-flex flex-row justify-content-center fs-5 text-center mb-3 "> Shop By Category </div>
            <div class="border-bottom mb-3"></div>
            <div class="product-container">
                @foreach ($category->child_category as $subcategories)
                <div class="col">
                    <div class="card shadow-sm d-flex justify-content-center">

                        <p class="card-text "> <a class=" text-decoration-none menu_title d-flex justify-content-center align-items-center p-2 pt-3" href="{{route('frontend.product.products_list',$subcategories->slug)}}"> {{$subcategories->name}}  </a> </p>
                        <div class="d-flex justify-content-center align-items-center">
                                <a href="{{route('frontend.product.products_list',$subcategories->slug)}}"> <img class=" img-fluid rounded title_img" src=" {{$subcategories->banner}}" alt="{{$subcategories->slug}}"> </a>

                        </div>

                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="">

                                    <a href="{{route('frontend.product.products_list',$subcategories->slug)}}"> <button type="button" class=" btn btn-sm btn-outline-secondary">Shop now</button></a>

                                </div>

                                {{-- <button type="button" class="d-sm-none btn btn-sm btn-outline-secondary">Buy now</button> --}}

                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
            {{-- Products --}}
            <div class="card p-2 mb-3 "> <span class="mb-2 alert alert-primary text-dark ">Products from {{$category->name}} </span>
                <div class="border-bottom mb-3"></div>
         @include('frontend.partials.product_list_view')
                <hr>
            </div>

              @if($products && $products->render())  
            <div class="d-flex justify-content-center align-items-center mb-4 bg-secondary py-3">
            {!!$products->render()!!}
            </div>
            @endif
           

        </div>
    </div>
</div>

@endsection @section('before_body') @endsection