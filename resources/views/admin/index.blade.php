@extends('admin.master')
@section('content')
    <div class="d-flex justify-content-center min-vh-100">
        <div class="container">
            <div class="row">
                <!-- Total User Card -->
                <div class="col-12 col-md-4 mb-4">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <h2 class="card-title font-weight-bold">Total Users</h2>
                            <p class="display-4 text-primary">{{ $totalUser }}</p>
                        </div>
                    </div>
                </div>
                <!-- Total Currency Card -->
                <div class="col-12 col-md-4 mb-4">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <h2 class="card-title font-weight-bold">Total Currency</h2>
                            <p class="display-4 text-success">{{ $totalCurrency }}</p>
                        </div>
                    </div>
                </div>
                <!-- Total Transaction Card -->
                <div class="col-12 col-md-4 mb-4">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <h2 class="card-title font-weight-bold">Total Transaction</h2>
                            <p class="display-4 text-danger">{{ $totalTransaction }}</p>
                        </div>
                    </div>
                </div>
                <!-- Total Testimonial Card -->
                <div class="col-12 col-md-4 mb-4">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <h2 class="card-title font-weight-bold">Total Testimonial</h2>
                            <p class="display-4 text-info">{{ $totalTestimonial }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection