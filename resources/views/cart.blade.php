@extends('layout')

@section('title', 'Cart - Coffee Shop')

@section('content')
<section class="cart-section py-5">
    <div class="container">
        <h2 class="text-center mb-4">Your Cart</h2>
        
        @if($cartItems->isEmpty())
            <p class="text-center">Your cart is empty. <a href="{{ route('products') }}">Shop now!</a></p>
        @else
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody id="cartItems">
                        @foreach ($cartItems as $item)
                        <tr data-id="{{ $item->id }}">
                            <td>{{ $item->product->name }}</td>
                            <td>${{ number_format($item->product->price, 2) }}</td>
                            <td>
                                <input type="number" class="form-control quantity-input" value="{{ $item->quantity }}" min="1">
                            </td>
                            <td class="item-subtotal">${{ number_format($item->product->price * $item->quantity, 2) }}</td>
                            <td>
                                <button class="btn btn-danger btn-sm remove-item yellow">Remove</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-end mt-3">
                <h4>Total: $<span id="cartTotal">{{ number_format($totalPrice, 2) }}</span></h4>
                <button class="btn btn-dark mt-2">Proceed to Checkout</button>
            </div>
        @endif
    </div>
</section>

<script>
    document.querySelectorAll('.quantity-input').forEach(input => {
        input.addEventListener('change', async (e) => {
            const row = e.target.closest('tr');
            const itemId = row.dataset.id;
            const newQuantity = e.target.value;

            try {
                const response = await fetch(`/cart/update/${itemId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ quantity: newQuantity })
                });
                const data = await response.json();
                row.querySelector('.item-subtotal').innerText = `$${data.totalPrice.toFixed(2)}`;
                document.getElementById('cartTotal').innerText = `$${data.totalPrice.toFixed(2)}`;
            } catch (error) {
                console.error('Error updating cart:', error);
            }
        });
    });

    document.querySelectorAll('.remove-item').forEach(button => {
        button.addEventListener('click', async (e) => {
            const row = e.target.closest('tr');
            const itemId = row.dataset.id;

            try {
                const response = await fetch(`/cart/remove/${itemId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                });
                const data = await response.json();

                if (data.success) {
                    row.remove();
                    document.getElementById('cartTotal').innerText = `$${data.totalPrice.toFixed(2)}`;
                }
            } catch (error) {
                console.error('Error removing item:', error);
            }
        });
    });
</script>
@endsection
