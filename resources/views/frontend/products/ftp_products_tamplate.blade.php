{{-- Sm to Md Screen  --}}
<div class="d-md-none">
    @if($products) @foreach ($products as $product)

       <div class="card mb-3">
           <div class="row g-0">
             <div class="col-4 ">
               <a href="{{route('frontend.product.show',$product->slug)}}"> <img class=" img-fluid rounded product_img" src=" {{$product->image}}" alt="{{$product->slug}}"> </a>
             </div>
             <div class="col-8 ">
               <div class="card-body">
                   <p class="card-text text-start"> <a class=" text-decoration-none h6" href="{{route('frontend.product.show',$product->slug)}}"> {{$product->title}}  </a> </p>
                   <p class="price-title-home text-start mb-3">

                       @if($product->sale_price !== null && $product->sale_price > 0) Price (BDT) :<strike> {{$product->price}}</strike> <br> BDT {{number_format($product->sale_price) }} @else Price (BDT) : {{number_format($product->price)}}
                       @endif
                   </p>                              

               </div>
             </div>
           </div>
         </div>

       @endforeach @endif
</div>


{{-- Large Screen --}}

       <div class="product-container d-none d-md-grid">

       @if($products) @foreach ($products as $product)

                           <div class="col d-flex justify-content-center">
           <div class=" shadow-sm h-100 mb-3">
               <div class="d-flex ">
                  
                       <a href="{{route('frontend.product.show', product->slug)}}"> <img class=" img-fluid rounded product_img" src=" {{$product->image}}" alt="{{$product->slug}}"> </a>
                  
               </div>
               <div class="card-body">
                   <p class="card-text text-start product-title "> <a class=" text-decoration-none" href="{{route('frontend.product.show',$product->slug)}}"> {{$product->title}}  </a> </p>

                   <p class="item-price">
                    @if($product->sale_price !== null && $product->sale_price > 0)  <span> <span id="currency">৳</span>{{number_format($product->sale_price) }} </span> <br>  <strike><span id="currency" class="text-muted">৳</span> {{number_format($product->price)}}</strike> @else  <span> <span id="currency">৳</span>{{number_format($product->price)}}<span>
                    @endif
                </p>
                   {{-- <div class="d-flex flex-row cart_div">

                       <form class="d-inline" data-route="{{route('cart.store')}}" id="add_cart" method="POST">
                           @csrf

                           <input type="hidden" name="product_id" class="product_id_show" value="{{$product['id']}}">

                           <button class="btn btn-sm  btn-outline-secondary mt-2  d-block " type="submit">Add to cart</button>
                       </form>
                       <form action="{{route('buy_now', $product['id'])}}" class="ms-3" method="POST">
                           @csrf
                           <button class="btn btn-sm  btn-outline-secondary mt-2 ms-1 d-block" type="submit">Buy now</button>
                       </form>
                   </div> --}}
               </div>
           </div>
       </div>

       @endforeach @endif
   </div>
