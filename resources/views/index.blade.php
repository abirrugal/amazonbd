@extends('frontend.layouts.master') @section('main')
<main>
    @include('frontend.partials.slider')

    <div class="album pb-2 pt-5 pt-lg-0">


        <div class="category_title  mb-2 ms-3 ">Shop By Category
        </div><div class="border-btm mb-4"></div>
            
        <div class="container-fluid mb-3">
            {{-- <p class="sub-title-text">latest items from our catalog</p> --}}

            @php $count = 0; @endphp {{--
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3"> --}}
                <div class="product-container">
                    @foreach ($categories as $category) @php if($count == 10) break; $count++; @endphp
                    <div class="colj">
                        <div class="card shadow-sm d-flex justify-content-center h-100">
                            <p class="card-text"> <a class=" text-decoration-none menu_title d-flex justify-content-center align-items-center p-2 pt-3" href="{{route('frontend.product.sub_list',$category->slug)}}"> {{$category->name}}  </a> </p>
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="px-3 py-1">
                                    <a href="{{route('frontend.product.sub_list',$category->slug)}}"> <img class=" img-fluid rounded" src=" {{$category->banner}}" alt="{{$category->slug}}"> </a>

                                </div>
                            </div>

                            <div class="card-body">


                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="">

                                        <a href="{{route('frontend.product.sub_list',$category->slug)}}"><button type="button" class=" btn btn-sm btn-outline-secondary">Shop now</button></a>

                                    </div>

                                    {{-- <button type="button" class="d-sm-none btn btn-sm btn-outline-secondary">Buy now</button> --}}

                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach

                </div>

            </div>
        </div>


{{-- Top Products Slider  --}}
<div class="d-none d-lg-block">
			@include('frontend.partials.top_selling_products_slide');
</div>

{{-- Features Products Slider  --}}
<div class="d-none d-lg-block">
			@include('frontend.partials.feature_products_slide')
</div>


{{-- Recent Products Slider  --}}	
<div class="d-none d-lg-block">
			@include('frontend.partials.recently_arrived_products_slide')
</div>



{{-- Top products for mobile screen  --}}
<div class="d-lg-none">
    @include('frontend.partials.mobile.top_selling_products')
    </div>

{{-- Features products for mobile screen  --}}
<div class="d-lg-none">
    @include('frontend.partials.mobile.feature_products')
    </div>

{{-- Recent Products For Mobile Screen--}}
<div class="d-lg-none">
    @include('frontend.partials.mobile.recent_products')
</div>

    </div>

        <!-- Features -->

        <section id="services">

            <div class="container-fluid">
                <div class="category_title  mb-2 ms-3">Our Services</div>
                <div class="border-btm mb-3"></div>


                <div class="row">
                    <div class="col-md-6 col-lg-4 mb-4">

                        <div class="card shadow-sm bg-violet h-100">

                            <i class="fa fa-truck pt-3" aria-hidden="true"></i>

                            <div class="card-body">
                                <h5 class="card-title text-center text-white">
                                    Convenient & Quick</h5>
                                <div class="card-text text-white text-dim-white">
                                    We provide our product without any delay. We carry your product with utmost care to ensure the best experience for you.
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card shadow-sm bg-blue">
                            <i class="fas fa-apple-alt pt-3" aria-hidden="true"></i> {{-- <i class="fas fa-apple-alt"></i> --}}
                            <div class="card-body">
                                <h5 class="card-title text-center text-white">Freshly Picked

                                </h5>
                                <div class="card-text text-dim-white">
                                    Do not worry about the quality of our product. You can trustfully pick your necessary groceries from our inventory of fresh items. The produces you get from us are directly imported from the field.
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6 col-lg-4 mb-4">

                        <div class="card shadow-sm bg-violet h-100">

                            <i class="fa fa-cart-arrow-down pt-3" aria-hidden="true"></i>
                            <div class="card-body">
                                <h5 class="card-title text-center text-white">
                                    A wide range of Products</h5>
                                <div class="card-text text-dim-white">

                                    Our products are categorized perfectly to help you find your required item. Get their information by a single tap. Never go into a crowdy market again.

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
        <!-- feature END -->
</main>

@endsection @section('before_body') @endsection