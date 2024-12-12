@extends('layout')

@section('title', 'Contact Us - Coffee Shop')

@section('content')
<!-- Hero Section -->
<section class="hero-section text-center py-5" style="background: url('/images/contact-hero.jpg') no-repeat center center/cover; color: white;">
    <div class="container">
        <h1 class="display-4">Get in Touch</h1>
        <p class="lead">We'd love to hear from you. Whether it's feedback, questions, or just a hello!</p>
    </div>
</section>

<!-- Contact Form Section -->
<section id="contact-form" class="py-5">
    <div class="container">
        <h2 class="text-center">Contact Us</h2>
        <p class="text-center mb-4">Fill out the form below and we’ll get back to you as soon as possible.</p>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" action="/contact/send">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Your Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark w-100">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Contact Information Section -->
<section id="contact-info" class="py-5 bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4">
                <i class="fas fa-map-marker-alt fa-2x mb-3"></i>
                <h5>Visit Us</h5>
                <p>123 Coffee St, Bean City, CA 98765</p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-phone fa-2x mb-3"></i>
                <h5>Call Us</h5>
                <p>+1 (123) 456-7890</p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-envelope fa-2x mb-3"></i>
                <h5>Email Us</h5>
                <p>support@coffeeshop.com</p>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section id="map" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Find Us</h2>
        <div class="ratio ratio-16x9">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8354345095144!2d144.9537353153168!3d-37.81627937975162!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf577d3b396f44c0!2sCoffee%20Shop!5e0!3m2!1sen!2sus!4v1633040922177!5m2!1sen!2sus" 
                allowfullscreen="" 
                loading="lazy" 
                style="border:0;">
            </iframe>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="cta-section text-white py-5" style="background: #343a40;">
    <div class="container text-center">
        <h2>Let’s Stay Connected</h2>
        <p>Follow us on social media for the latest updates and promotions!</p>
        <div class="d-flex justify-content-center">
            <a href="#" class="btn btn-light mx-2"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="btn btn-light mx-2"><i class="fab fa-twitter"></i></a>
            <a href="#" class="btn btn-light mx-2"><i class="fab fa-instagram"></i></a>
            <a href="#" class="btn btn-light mx-2"><i class="fab fa-linkedin-in"></i></a>
        </div>
    </div>
</section>
@endsection
