
{{-- Feature Products Section  --}}

<div class="category_title  mb-3 ms-3 d-inline">Recently Arrived
</div> <a href="{{route('frontend.product.recent')}}" class="text-decoration-none"> <span class="card border-0 d-inline ms-3">Shop Now</span></a> <div class="border-btm mb-3 mt-2"></div>



<div class="container-fluid" id="product_container">
	<div class="row">
		<div class="col-md-12">
			{{-- <h2>Features <b>Products</b></h2> --}}
				<div id="carouselExampleIndicators3" class="carousel slide" data-bs-ride="carousel" data-bs-interval="0">

			<!-- Carousel indicators -->
			{{-- <div class="carousel-indicators">
				<button type="button" data-bs-target="#carouselExampleIndicators3" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
				<button type="button" data-bs-target="#carouselExampleIndicators3" data-bs-slide-to="1" aria-label="Slide 2"></button>
				<button type="button" data-bs-target="#carouselExampleIndicators3" data-bs-slide-to="2" aria-label="Slide 3"></button>
			  </div>  
			<!-- Wrapper for carousel items --> --}}
			<div class="carousel-inner">


				<div class="carousel-item active">
					<div class="row">

@foreach ($recent_products as $key=>$recent_product)
@if($key<4)	
<div class="col-sm-3">
	<div class="col d-flex justify-content-center">
				
	<div class="thumb-wrapper">

		{{-- Products images  --}}

			<div class="img-box">
				<div class="d-flex justify-content-center">

					<a href="{{route('frontend.product.show',$recent_product['slug'])}}"> <img class=" img-fluid rounded product_img" src=" {{$recent_product['image']}}" alt="{{$recent_product['slug']}}"> </a>
			   
			</div>
			</div>

		{{-- Products contents --}}

			<div class="thumb-content">
{{-- Title  --}}
<p class="card-text text-start product-title "> <a class=" text-decoration-none" href="{{route('frontend.product.show',$recent_product['slug'])}}"> {{ Illuminate\Support\Str::limit($recent_product['title'], 40) }} </a> </p>

{{-- Price  --}}
<p class="item-price ">
	@if($recent_product['sale_price'] !== null && $recent_product['sale_price'] > 0)  <span> <span id="currency">৳</span>{{number_format($recent_product['sale_price']) }} </span> <br>  <strike><span id="currency" class="text-muted">৳</span> {{number_format($recent_product['price'])}}</strike> @else  <span> <span id="currency">৳</span>{{number_format($recent_product['price'])}}<span>
	@endif
</p>

{{-- Add to cart and buy now  --}}


</div>

</div>		
		
		
</div>
</div>
@endif
@endforeach
						
			
	</div>
</div>


				<div class="carousel-item">
					<div class="row">

						@foreach ($recent_products as $key=>$recent_product)

						@if($key>3 && $key<8)
					
						<div class="col-sm-3">
							
							<div class="thumb-wrapper">

							{{-- Products images  --}}

								<div class="img-box">
									<div class="d-flex justify-content-center">
                  
										<a href="{{route('frontend.product.show',$recent_product['slug'])}}"> <img class=" img-fluid rounded product_img" src=" {{$recent_product['image']}}" alt="{{$recent_product['slug']}}"> </a>
								   
								</div>
								</div>

							{{-- Products contents --}}

								<div class="thumb-content">
{{-- Title  --}}
<p class="card-text text-start product-title "> <a class=" text-decoration-none" href="{{route('frontend.product.show',$recent_product['slug'])}}"> {{ Illuminate\Support\Str::limit($recent_product['title'], 40) }} </a> </p>

{{-- Price  --}}
<p class="item-price ">
	@if($recent_product['sale_price'] !== null && $recent_product['sale_price'] > 0)  <span> <span id="currency">৳</span>{{number_format($recent_product['sale_price']) }} </span> <br>  <strike><span id="currency" class="text-muted">৳</span> {{number_format($recent_product['price'])}}</strike> @else  <span> <span id="currency">৳</span>{{number_format($recent_product['price'])}}<span>
	@endif
</p>

{{-- Add to cart and buy now  --}}


					</div>				
						</div>
						</div>
						@endif

						@endforeach

			
									
					</div>
				</div><!--C item end-->

				<div class="carousel-item">
					<div class="row">

						@foreach ($recent_products as $key=>$recent_product)

						@if($key>7 && $key<12)
					
						<div class="col-sm-3">
							
							<div class="thumb-wrapper">

							{{-- Products images  --}}

								<div class="img-box">
									<div class="d-flex justify-content-center">
                  
										<a href="{{route('frontend.product.show',$recent_product['slug'])}}"> <img class=" img-fluid rounded product_img" src=" {{$recent_product['image']}}" alt="{{$recent_product['slug']}}"> </a>
								   
								</div>
								</div>

							{{-- Products contents --}}

								<div class="thumb-content">
{{-- Title  --}}
<p class="card-text text-start product-title "> <a class=" text-decoration-none" href="{{route('frontend.product.show',$recent_product['slug'])}}"> {{ Illuminate\Support\Str::limit($recent_product['title'], 40) }} </a> </p>

{{-- Price  --}}
<p class="item-price ">
	@if($recent_product['sale_price'] !== null && $recent_product['sale_price'] > 0)  <span> <span id="currency">৳</span>{{number_format($recent_product['sale_price']) }} </span> <br>  <strike><span id="currency" class="text-muted">৳</span> {{number_format($recent_product['price'])}}</strike> @else  <span> <span id="currency">৳</span>{{number_format($recent_product['price'])}}<span>
	@endif
</p>

{{-- Add to cart and buy now  --}}


					</div>				
						</div>
						</div>
						@endif

						@endforeach

			
									
					</div>
				</div><!--C item end-->

			</div>
			
	     <!-- Carousel controls -->
		 <a class="carousel-control-prev text-dark text-decoration-none z-index-1000" data-bs-target="#carouselExampleIndicators3" data-bs-slide="prev">
            <i class="fas fa-chevron-left h2"></i>
        </a>

        <a class="carousel-control-next text-dark text-decoration-none z-index-1000" data-bs-target="#carouselExampleIndicators3" data-bs-slide="next">
            <i class="fas fa-chevron-right h2"></i>
        </a>
		
	</div>		
	</div>
</div>
</div>
