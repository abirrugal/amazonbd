
@extends('frontend.layouts.master') @section('main')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 d-lg-block border-end mt-3">
     
                <div class="p-3 pb-2 fw-bolder border-bottom">Department</div>

               <a href="{{route('frontend.product.sub_list',$sub_category->parent_category->slug)}}" class="text-decoration-none text-dark fw-bold btn-sm mx-0 px-0 my-2"><i class="fas fa-chevron-left"></i> {{$sub_category->parent_category->name}}</a> 

<div class="fw-bold my-2">{{$sub_category->name}}</div>

                @foreach ($child_categories as $child_category)
                
                <div class="px-3 py-2"><a class="text-decoration-none text-dark h6 mb-3" href="{{route('frontend.product.products_list_child',$child_category->slug)}}"> {{$child_category->name}} </a></div>

                @endforeach
        </div>
        <div class="col-lg-10 mt-3">
            <div class="album py-1 bg-light">
                <div class="container-fluid-md">

        <div class="card category_title text-center mb-3"> <span class="mb-2"> {{$sub_category->name}} </span>
        <div class="border-bottom mb-3"></div>
 
           {{-- Products --}}
@include('frontend.partials.product_list_view')
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