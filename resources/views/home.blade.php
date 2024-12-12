@extends('layout')

@section('title', 'Home - Coffee Shop')

@section('content')
<!-- Hero Section -->
<section class="hero-section text-center">
    <div>
        <h1>Welcome to Coffee Shop</h1>
        <p>Your daily dose of freshness!</p>
        <a href="{{ ('products') }}" class="btn btn-light btn-lg mt-3">Shop Now</a>
    </div>
</section>

<!-- Best Sellers Section -->
<section id="products" class="best-seller py-5">
    <div class="container">
        <h2 class="text-center mb-4">Best Sellers</h2>
        <div class="row">
            <!-- Product 1 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="/images/espresso.jpg" class="card-img-top" alt="Espresso">
                    <div class="card-body">
                        <h5 class="card-title">Espresso</h5>
                        <p class="card-text">Rich and bold espresso shot.</p>
                        <a href="#" class="btn btn-dark">Add to Cart</a>
                    </div>
                </div>
            </div>
            <!-- Product 2 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="/images/latte.jpg" class="card-img-top" alt="Latte">
                    <div class="card-body">
                        <h5 class="card-title">Latte</h5>
                        <p class="card-text">Creamy and smooth latte.</p>
                        <a href="#" class="btn btn-dark">Add to Cart</a>
                    </div>
                </div>
            </div>
            <!-- Product 3 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="/images/cappuccino.jpg" class="card-img-top" alt="Cappuccino">
                    <div class="card-body">
                        <h5 class="card-title">Cappuccino</h5>
                        <p class="card-text">Perfect blend of coffee and frothy milk.</p>
                        <a href="#" class="btn btn-dark">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Us Section -->
<section id="about" class="py-5 bg-light">
    <div class="container d-flex align-items-center">
        <div class="row">
            <div class="col-md-6">
                <img src="/images/about.jpg" alt="About Us" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h2 class="text-center">About Us</h2>
                <p>
                    At Coffee Shop, we believe in delivering an exceptional coffee experience. Our beans are ethically sourced from the best plantations worldwide, roasted to perfection, and brewed with love. Whether you're here to grab your morning cup or to savor a leisurely afternoon coffee, we're here to serve you with passion and dedication. 
                </p>
                <p>
                    We take pride in our community, where coffee lovers come together to share stories, ideas, and experiences. Thank you for making us a part of your day!
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="cta-section text-white py-5" style="background: #6c757d;">
    <div class="container d-flex align-items-center">
        <div class="row">
            <div class="col-md-6">
                <h2>Join Our Loyalty Program</h2>
                <p>Sign up to enjoy exclusive discounts, personalized offers, and earn points on every purchase.</p>
                <a href="{{ ('login') }}" class="btn btn-light">Sign Up</a>
            </div>
            <div class="col-md-6">
                <img src="/images/loyalty-program.jpg" alt="Loyalty Program" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="py-5">
    <div class="container">
        <h2 class="text-center">What Our Customers Say</h2>
        <div class="row">
            <!-- Testimonial 1 -->
            <div class="col-md-4">
                <blockquote class="blockquote">
                    <p>"Amazing coffee and great service!"</p>
                    <footer class="blockquote-footer">John Doe</footer>
                </blockquote>
            </div>
            <!-- Testimonial 2 -->
            <div class="col-md-4">
                <blockquote class="blockquote">
                    <p>"The best coffee shop in town, hands down."</p>
                    <footer class="blockquote-footer">Jane Smith</footer>
                </blockquote>
            </div>
            <!-- Testimonial 3 -->
            <div class="col-md-4">
                <blockquote class="blockquote">
                    <p>"A must-visit for all coffee lovers."</p>
                    <footer class="blockquote-footer">Emily Johnson</footer>
                </blockquote>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center">Our Services</h2>
        <div class="row">
            <div class="col-md-4">
                <h5>In-House Brewing</h5>
                <p>Experience freshly brewed coffee in a cozy ambiance.</p>
            </div>
            <div class="col-md-4">
                <h5>Online Ordering</h5>
                <p>Order your favorite coffee and snacks online for pickup or delivery.</p>
            </div>
            <div class="col-md-4">
                <h5>Corporate Catering</h5>
                <p>We cater to your office events with premium coffee and snacks.</p>
            </div>
        </div>
    </div>
</section>

@endsection
