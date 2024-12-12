@extends('layout')

@section('title', 'Our Products - Coffee Shop')

@section('content')
<!-- Hero Section -->
<section class="hero-section text-center py-5" style="background: url('/images/products-hero.jpg'); background-size: cover;">
    <div class="container">
        <h1 class="text-white">Welcome to Our Coffee Shop</h1>
    </div>
</section>

<!-- Products Section -->
<section class="products-section py-5">
    <div class="container">
        <h2 class="text-center mb-4">Our Products</h2>

        <!-- Filter and Search -->
        <div class="row mb-4">
            <div class="col-md-6">
                <form method="GET" action="{{ route('products') }}">
                    <input type="text" class="form-control" name="search" placeholder="Search products..." value="{{ request('search') }}">
                </form>
            </div>
            <div class="col-md-3">
                <form method="GET" action="{{ route('products') }}">
                    <select name="category" class="form-control">
                        <option value="">Select Category</option>
                        <option value="coffee" {{ request('category') == 'coffee' ? 'selected' : '' }}>Coffee</option>
                        <option value="tea" {{ request('category') == 'tea' ? 'selected' : '' }}>Tea</option>
                    </select>
                </form>
            </div>
            <div class="col-md-3">
                <form method="GET" action="{{ route('products') }}">
                    <select name="price" class="form-control">
                        <option value="">Sort by Price</option>
                        <option value="low" {{ request('price') == 'low' ? 'selected' : '' }}>Low to High</option>
                        <option value="high" {{ request('price') == 'high' ? 'selected' : '' }}>High to Low</option>
                    </select>
                </form>
            </div>
        </div>

        <!-- Product Grid -->
        <div class="row">
            @foreach ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="product-card h-100">
                    <img src="{{ $product->image_url }}" class="img-fluid" alt="{{ $product->name }}">
                    <h4>{{ $product->name }}</h4>
                    <p>{{ $product->description }}</p>
                    <p>${{ number_format($product->price, 2) }}</p>
                    @if(Auth::check())
                    <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="number" name="quantity" class="form-control" value="1" min="1">
                        <button type="submit" class="btn btn-primary w-100 mt-2">Add to Cart</button>
                    </form>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-primary w-100 mt-2">Login to Add to Cart</a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="row">
            <div class="col-md-12">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</section>

<!-- Additional CSS for Styling -->
<style>
    .product-card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        text-align: center;
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 15px;
        background-color: #fff;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        height: 100%;
    }

    .product-card img {
        max-height: 150px;
        object-fit: cover;
        margin-bottom: 15px;
        border-radius: 10px;
    }

    .product-card h4 {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .product-card p {
        font-size: 14px;
        margin-bottom: 10px;
    }

    .product-card .form-control {
        max-width: 80px;
        margin: 0 auto;
    }
</style>

<!-- JavaScript for Form Submission -->
<script>
    document.addEventListener('submit', function (event) {
        if (event.target.classList.contains('add-to-cart-form')) {
            event.preventDefault();

            const form = event.target;
            const formData = new FormData(form);
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;

            if (!csrfToken) {
                alert('CSRF token is missing!');
                return;
            }

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': csrfToken,
                },
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Product added to cart successfully!');
                    } else {
                        alert('Failed to add product to cart.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while adding the product to cart.');
                });
        }
    });
</script>
@endsection