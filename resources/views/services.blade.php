@extends('layout')

@section('title', 'Our Services - Coffee Shop')

@section('content')
<!-- Hero Section -->
<section class="hero-section text-center py-5" style="background: url('/images/services-hero.jpg') no-repeat center center/cover; color: white;">
    <div class="container">
        <h1 class="display-4">Our Services</h1>
        <p class="lead">Experience exceptional coffee and more.</p>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">What We Offer</h2>
        <div class="row">
            <!-- Service 1 -->
            <div class="col-md-4 text-center">
                <div class="service-box p-4">
                    <i class="fas fa-mug-hot fa-3x mb-3"></i>
                    <h5>Premium Coffee</h5>
                    <p>Sourced from the finest beans around the world, our coffee is freshly brewed to perfection.</p>
                </div>
            </div>
            <!-- Service 2 -->
            <div class="col-md-4 text-center">
                <div class="service-box p-4">
                    <i class="fas fa-utensils fa-3x mb-3"></i>
                    <h5>Delicious Pastries</h5>
                    <p>Pair your coffee with a selection of freshly baked pastries and treats.</p>
                </div>
            </div>
            <!-- Service 3 -->
            <div class="col-md-4 text-center">
                <div class="service-box p-4">
                    <i class="fas fa-laptop fa-3x mb-3"></i>
                    <h5>Cozy Workspace</h5>
                    <p>Enjoy a comfortable environment for working or studying, with free Wi-Fi and ample seating.</p>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <!-- Service 4 -->
            <div class="col-md-4 text-center">
                <div class="service-box p-4">
                    <i class="fas fa-calendar-alt fa-3x mb-3"></i>
                    <h5>Event Hosting</h5>
                    <p>Host your private events, meetings, or celebrations in our spacious café.</p>
                </div>
            </div>
            <!-- Service 5 -->
            <div class="col-md-4 text-center">
                <div class="service-box p-4">
                    <i class="fas fa-seedling fa-3x mb-3"></i>
                    <h5>Sustainable Practices</h5>
                    <p>We care about the planet and ensure that our operations are eco-friendly.</p>
                </div>
            </div>
            <!-- Service 6 -->
            <div class="col-md-4 text-center">
                <div class="service-box p-4">
                    <i class="fas fa-shopping-bag fa-3x mb-3"></i>
                    <h5>Takeaway & Delivery</h5>
                    <p>Enjoy our offerings in the comfort of your home with our takeaway and delivery options.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section id="why-choose-us" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">Why Choose Us?</h2>
        <div class="row">
            <div class="col-md-6">
                <h5>Exceptional Quality</h5>
                <p>We prioritize quality in everything we do, from sourcing beans to serving customers.</p>
                <h5>Passionate Team</h5>
                <p>Our baristas and staff are passionate about delivering the best experience for you.</p>
            </div>
            <div class="col-md-6">
                <img src="/images/why-choose-us.jpg" alt="Why Choose Us" class="img-fluid rounded">
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="cta-section text-white py-5" style="background: #6c757d;">
    <div class="container text-center">
        <h2>Experience Our Services Today!</h2>
        <p>Visit us or place your order online to enjoy the best coffee experience.</p>
        <a href="{{ ('products') }}" class="btn btn-light">Order Now</a>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="py-5">
    <div class="container">
        <h2 class="text-center">What Our Customers Say</h2>
        <div class="row">
            <!-- Testimonial 1 -->
            <div class="col-md-6">
                <blockquote class="blockquote">
                    <p>Best coffee in town! I love the cozy atmosphere and friendly staff.</p>
                    <footer class="blockquote-footer">Jane Smith</footer>
                </blockquote>
            </div>
            <!-- Testimonial 2 -->
            <div class="col-md-6">
                <blockquote class="blockquote">
                    <p>Perfect place for a quick meeting. Their pastries are to die for!</p>
                    <footer class="blockquote-footer">Mike Johnson</footer>
                </blockquote>
            </div>
        </div>
    </div>
</section>
@endsection
