@extends('frontend.layouts.master') @section('main')
<div class="container-fluid">
    <div class="row">
        <div class=" mt-3">
            <div class="col-lg-12 mt-3">

                <div class="album py-1 bg-light">
                    <div class="container-fluid-md">

                        <div class="card category_title text-center mb-3"> <span class="mb-2"> Recently Arrived Products </span>
                            <div class="border-bottom mb-3"></div>  
                            
                            @include('frontend.partials.ftp_products_tamplate')
                            <hr>
                          
                        </div>
                    </div>
                    @if($products)  
                    <div class="d-flex justify-content-center align-items-center mb-4 bg-secondary pt-3">
                    {!!$products->render()!!}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endsection