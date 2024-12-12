@extends('layout')

@section('title', 'Dashboard - Coffee Shop')

@section('content')
<section class="dashboard py-5">
    <div class="container">
        <h2 class="text-center mb-4">Admin Dashboard</h2>

        <!-- Orders Overview -->
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>All Orders</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Order Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->customer_name }}</td>
                                <td>{{ $order->product_name }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>${{ $order->total_price }}</td>
                                <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <span class="badge {{ $order->status === 'Completed' ? 'bg-success' : 'bg-warning' }}">
                                        {{ $order->status }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="row">
            <!-- Sales Trend Chart -->
            <div class="col-md-6">
                <h4>Sales Trends</h4>
                <canvas id="salesTrendChart"></canvas>
            </div>

            <!-- Product Popularity Chart -->
            <div class="col-md-6">
                <h4>Product Popularity</h4>
                <canvas id="productPopularityChart"></canvas>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Sales Trend Chart
    const salesTrendCtx = document.getElementById('salesTrendChart').getContext('2d');
    const salesTrendChart = new Chart(salesTrendCtx, {
        type: 'line',
        data: {
            labels: {!! json_encode($salesData['dates']) !!}, // Pass dates array from controller
            datasets: [{
                label: 'Sales ($)',
                data: {!! json_encode($salesData['totals']) !!}, // Pass sales totals array from controller
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                fill: false,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
            },
        },
    });

    // Product Popularity Chart
    const productPopularityCtx = document.getElementById('productPopularityChart').getContext('2d');
    const productPopularityChart = new Chart(productPopularityCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($productData['names']) !!}, // Pass product names array from controller
            datasets: [{
                label: 'Units Sold',
                data: {!! json_encode($productData['quantities']) !!}, // Pass product quantities array from controller
                backgroundColor: 'rgba(153, 102, 255, 0.6)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
            },
        },
    });
});
</script>

@endsection
