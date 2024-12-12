@extends('layout')

@section('title', 'About Us - Coffee Shop')

@section('content')
<!-- Hero Section -->
<section class="hero-section text-center py-5" style="background: url('/images/about-hero.jpg') no-repeat center center/cover; color: white;">
    <div class="container">
        <h1 class="display-4">About Coffee Shop</h1>
        <p class="lead">Discover our journey and passion for coffee.</p>
    </div>
</section>

<!-- Our Story Section -->
<section id="our-story" class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2>Our Story</h2>
                <p>
                    Coffee Shop began with a simple idea: to bring people together over a perfect cup of coffee. 
                    Founded in 2010, we’ve grown from a small neighborhood café into a beloved destination for coffee lovers. 
                    Our mission is to serve the highest quality coffee, sourced ethically from the best farms around the world.
                </p>
                <p>
                    We believe every cup tells a story, from the hands that picked the beans to the moments shared by our customers.
                    Our dedication to excellence and innovation has made us a leader in the coffee industry.
                </p>
            </div>
            <div class="col-md-6">
                <img src="/images/our-story.jpg" alt="Our Story" class="img-fluid rounded">
            </div>
        </div>
    </div>
</section>

<!-- Our Mission and Vision Section -->
<section id="mission-vision" class="py-5 bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-6">
                <h3>Our Mission</h3>
                <p>
                    To deliver an exceptional coffee experience while fostering a sense of community and sustainability. 
                    We aim to create a welcoming space where everyone feels at home.
                </p>
            </div>
            <div class="col-md-6">
                <h3>Our Vision</h3>
                <p>
                    To be recognized globally as a leader in quality coffee, sustainability, and innovation, while maintaining our commitment to ethical sourcing and community support.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Meet the Team Section -->
<section id="team" class="py-5">
    <div class="container">
        <h2 class="text-center">Meet Our Team</h2>
        <p class="text-center mb-5">The passionate people behind our success.</p>
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="/images/jad.jpg" alt="Team Member" class="rounded-circle mb-0"  height="150px">
                <h5>Jad</h5>
                <p>Founder & CEO</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="/images/razan.jpg" alt="Team Member" class="rounded-circle mb-3" width="150">
                <h5>Razan</h5>
                <p>Head Barista</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="/images/mhmd.jpg" alt="Team Member" class="rounded-circle mb-3" width="150">
                <h5>Mohammad</h5>
                <p>Operations Manager</p>
            </div>
        </div>
    </div>
</section>

<!-- Sustainability Section -->
<section id="sustainability" class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2>Our Commitment to Sustainability</h2>
                <p>
                    At Coffee Shop, we take sustainability seriously. From sourcing our beans from environmentally friendly farms 
                    to using compostable cups and packaging, we are committed to reducing our carbon footprint.
                </p>
                <p>
                    We believe in giving back to the planet and supporting the communities that make our coffee possible.
                    Join us in making a positive impact, one cup at a time.
                </p>
            </div>
            <div class="col-md-6">
                <img src="/images/sustainability.jpg" alt="Sustainability" class="img-fluid rounded">
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section id="cta" class="text-white py-5" style="background: #343a40;">
    <div class="container text-center">
        <h2>Join Our Coffee Lovers Club</h2>
        <p>Get exclusive updates, discounts, and rewards by signing up for our newsletter.</p>
        <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Sign Up Now</a>
    </div>
</section>

@endsection
