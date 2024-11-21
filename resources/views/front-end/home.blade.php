@extends('front-end.layouts.layout')
@section('content')
<!-- home page slider -->
<div class="homepage-slider">
    <!-- single home slider -->
    <div class="single-homepage-slider homepage-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <p class="subtitle">Nourish & Sustain</p>
                            <h1>Empowering Communities with Nutritious Food</h1>
                            <div class="hero-btns">
                                <a href="shop.html" class="boxed-btn">Our Initiatives</a>
                                <a href="contact.html" class="bordered-btn">Get Involved</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single home slider -->
    <div class="single-homepage-slider homepage-bg-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <p class="subtitle">Daily Support</p>
                            <h1>Join Our Mission to End Hunger</h1>
                            <div class="hero-btns">
                                <a href="" class="boxed-btn">Support Us</a>
                                <a href="" class="bordered-btn">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single home slider -->
    <div class="single-homepage-slider homepage-bg-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-right">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <p class="subtitle">Together We Can</p>
                            <h1>Make a Difference This Season</h1>
                            <div class="hero-btns">
                                <a href="" class="boxed-btn">Learn More</a>
                                <a href="" class="bordered-btn">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end home page slider -->

<!-- features list section -->
<div class="list-section pt-80 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <div class="list-box d-flex align-items-center">
                    <div class="list-icon">
                        <i class="fas fa-hand-holding-heart"></i>
                    </div>
                    <div class="content">
                        <h3>Community Support</h3>
                        <p>Helping hands for those in need</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <div class="list-box d-flex align-items-center">
                    <div class="list-icon">
                        <i class="fas fa-seedling"></i>
                    </div>
                    <div class="content">
                        <h3>Sustainable Practices</h3>
                        <p>Promoting eco-friendly solutions</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="list-box d-flex justify-content-start align-items-center">
                    <div class="list-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <div class="content">
                        <h3>Global Reach</h3>
                        <p>Impacting lives worldwide</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end features list section -->

<!-- product section -->
<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">    
                    <h3><span class="orange-text">Our</span> Programs</h3>
                    <p>Explore our initiatives to alleviate food scarcity and promote nutrition.</p>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($foodItems as $item)
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="single-product.html"><img src="{{ asset('home/assets/img/fooditem.png') }}" alt="{{ $item->name }}"></a>
                        </div>
                        <h3>{{ $item->name }}</h3>
                        <p class="product-price"><span>Per {{ $item->unit }}</span> {{ $settings->currency }}{{ number_format($item->price, 2) }}</p>
                        <a href="{{ route('order.create', $item->id) }}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Order Now</a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination Links -->
        <div class="row">
            <div class="col-lg-12 text-center">
                {{ $foodItems->links() }}
            </div>
        </div>
    </div>
</div>
<!-- end product section -->

<!-- testimonial-section -->
<div class="testimonail-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 text-center">
                <div class="testimonial-sliders">
                    <div class="single-testimonial-slider">
                        <div class="client-avater">
                            <img src="assets/img/avaters/avatar1.png" alt="">
                        </div>
                        <div class="client-meta">
                            <h3>Saira Hakim <span>Community Leader</span></h3>
                            <p class="testimonial-body">
                                "Thanks to {{ config('app.name') }}, our community has access to nutritious food and resources."
                            </p>
                            <div class="last-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial-slider">
                        <div class="client-avater">
                            <img src="assets/img/avaters/avatar2.png" alt="">
                        </div>
                        <div class="client-meta">
                            <h3>David Niph <span>Volunteer</span></h3>
                            <p class="testimonial-body">
                                "Being part of {{ config('app.name') }} has been a rewarding experience, seeing the impact firsthand."
                            </p>
                            <div class="last-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial-slider">
                        <div class="client-avater">
                            <img src="assets/img/avaters/avatar3.png" alt="">
                        </div>
                        <div class="client-meta">
                            <h3>Jacob Sikim <span>Beneficiary</span></h3>
                            <p class="testimonial-body">
                                "The support from {{ config('app.name') }} has been life-changing for my family."
                            </p>
                            <div class="last-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end testimonial-section -->

<!-- advertisement section -->
<div class="abt-section mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="abt-bg">
                    <a href="https://www.youtube.com/watch?v=DBLlFWYcIGQ" class="video-play-btn popup-youtube"><i class="fas fa-play"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="abt-text">
                    <p class="top-sub">Since Year 1999</p>
                    <h2>We are <span class="orange-text">{{ config('app.name') }}</span></h2>
                    <p>Dedicated to alleviating food scarcity and promoting sustainable practices worldwide.</p>
                    <p>Join us in our mission to create a world where everyone has access to nutritious food.</p>
                    <a href="about.html" class="boxed-btn mt-4">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end advertisement section -->

<!-- shop banner -->
<section class="shop-banner">
    <div class="container">
        <h3>Join Our December Campaign! <br> Make a <span class="orange-text">Difference...</span></h3>
        <div class="sale-percent"><span>Impact! <br> Upto</span>50% <span>more lives</span></div>
        <a href="shop.html" class="cart-btn btn-lg">Get Involved</a>
    </div>
</section>
<!-- end shop banner -->

<!-- logo carousel -->
<div class="logo-carousel-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="logo-carousel-inner">
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/1.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/2.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/3.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/4.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end logo carousel -->
@endsection