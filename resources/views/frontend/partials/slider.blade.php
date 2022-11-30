<div class="container-lg my-3 d-none d-lg-block">
    {{-- <div id="myCarousel" class="carousel slide" data-ride="carousel"> --}}
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <!-- Carousel indicators -->
        {{-- <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-bs-slide-to="1"></li>
            <li data-target="#myCarousel" data-bs-slide-to="2"></li>
        </ol> --}}

        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
          </div>

        <!-- Wrapper for carousel items -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://res.cloudinary.com/websiteblogs-herokuapp-com/image/upload/v1620754799/slide/4rth_ok4ebt.jpg" alt="First Slide">
            </div>
            <div class="carousel-item">
                <img src="https://res.cloudinary.com/websiteblogs-herokuapp-com/image/upload/v1620754798/slide/first_sbfnkv.jpg" alt="Second Slide">
            </div>
            <div class="carousel-item">
                <img src="https://res.cloudinary.com/websiteblogs-herokuapp-com/image/upload/v1620754798/slide/5th_wbu5oq.jpg" alt="Third Slide">
            </div>
            <div class="carousel-item">
                <img src="https://res.cloudinary.com/websiteblogs-herokuapp-com/image/upload/v1620754798/slide/3rd_bnwwh2.jpg" alt="Third Slide">
            </div>
            <div class="carousel-item">
                <img src="https://res.cloudinary.com/websiteblogs-herokuapp-com/image/upload/v1620754798/slide/2nd_iiltbb.jpg" alt="Third Slide">
            </div>
        </div>
        <!-- Carousel controls -->
        <a class="carousel-control-prev text-dark text-decoration-none z-index-1000" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            {{-- <span class="carousel-control-prev-icon text-dark"></span> --}}
            <i class="fas fa-chevron-left h2"></i>
        </a>

        {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button> --}}

        <a class="carousel-control-next text-dark text-decoration-none z-index-1000" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            {{-- <span class="carousel-control-next-icon  "></span> --}}
            <i class="fas fa-chevron-right h2"></i>
        </a>

        {{-- <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button> --}}


    </div>
</div>