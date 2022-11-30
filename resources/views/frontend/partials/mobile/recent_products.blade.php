<div class="category_title  mb-3 ms-3 d-inline">Recently Arrived
</div> <a href="{{route('frontend.product.recent')}}" class="text-decoration-none"> <span class="card border-0 d-inline ms-3">Shop Now</span></a> <div class="border-btm mb-3 mt-2"></div>


<div class="container-fluid">
<div class="product-container ">
@foreach ($recent_products as $recent_product)
<div class="col">
    <div class=" shadow-sm h-100 mb-3">
        <div class="d-flex justify-content-center">
                <a href="{{route('frontend.product.show',$recent_product['slug'])}}"> <img class=" img-fluid rounded product_img" src="{{$recent_product['image']}}" alt="{{$recent_product['slug']}}"> </a>

        </div>

        <div class="card-body">
            <p class="card-text text-start product-title mb-2"> <a class=" text-decoration-none" href="{{route('frontend.product.show',$recent_product['slug'])}}"> {{ Illuminate\Support\Str::limit($recent_product['title'], 40) }}  </a> </p>

            <p class="item-price ">
                @if($recent_product['sale_price'] !== null && $recent_product['sale_price'] > 0)  <span> <span id="currency">৳</span>{{number_format($recent_product['sale_price']) }} </span> <br>  <strike><span id="currency" class="text-muted">৳</span> {{number_format($recent_product['price'])}}</strike> @else  <span> <span id="currency">৳</span>{{number_format($recent_product['price'])}}<span>
                @endif
            </p>

            {{-- <div class="d-flex flex-column  cart_div">

                <form class="d-inline" data-route="{{route('cart.store')}}" id="add_cart" method="POST">
                    @csrf

                    <input type="hidden" name="product_id" class="product_id_show" value="{{$recent_product['id']}}">

                    <button class="btn btn-sm  btn-outline-secondary mt-2  d-block " type="submit">Add to cart</button>
                </form>

                <form action="{{route('buy_now', $recent_product['id'])}}" class=" d-inline" method="POST">
                  @csrf
                <button class="btn btn-sm  btn-outline-secondary mt-2 " type="submit">Buy now</button>                   
             </form>
            </div> --}}
        </div>
    </div>
</div> 


@endforeach
</div>
</div>