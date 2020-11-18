@extends('layouts.frontend_template')
@section('title', 'Booking Invoice')
@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Invoice View</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Invoice View</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->
			
<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="invoice-content">
                    <div class="invoice-item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-logo">
                                   <h1 class="logo_font">Futlance</h1>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="invoice-details">
                                    <strong>Order:</strong> {{ $booking->booking_no }} <br>
                                    <strong>Issued:</strong> {{ date_format(date_create($booking->booking_date),"d-M-Y") }}
                                </p>
                            </div>
                        </div>
                    </div>
								
                    <!-- Invoice Item -->
                    <div class="invoice-item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-info">
                                    <strong class="customer-text">Invoice From</strong>
                                    <p class="invoice-details invoice-details-two">
                                        {{ $booking->court->name }} <br>
                                        {{ $booking->court->quarter->name }}<br>
                                        {{ $booking->court->quarter->city->name }} <br>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="invoice-info invoice-info2">
                                    <strong class="customer-text">Invoice To</strong>
                                    <p class="invoice-details">
                                        {{ $booking->user->name }} <br>
                                        {{ $booking->user->phone }} <br>
                                        {{ $booking->user->address }} <br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Item -->
								
                    <!-- Invoice Item -->
                    <div class="invoice-item">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="invoice-info">
                                    <strong class="customer-text">Payment Method</strong>
                                    <p class="invoice-details invoice-details-two">
                                        {{ $booking->paymentMethod->name }}<br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Item -->
								
                    <!-- Invoice Item -->
                    <div class="invoice-item invoice-table-wrap">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="invoice-table table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Court Name</th>
                                                <th class="text-center">Time</th>
                                                <th class="text-center">Pre-paid</th>
                                                <th class="text-right">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $booking->court->name }}</td>
                                                <td class="text-center">
                                                    <span >{{ date_format(date_create($booking->start_time),"H:i A") }} </span>
                                                    <span class="font-weight-bold text-dark" >to</span> <span >{{ date_format(date_create($booking->end_time),"H:i A") }}</span>
                                                </td>
                                                <td class="text-center">35%</td>
                                                <td class="text-right">{{ $booking->total_amount }} MMK</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4 ml-auto">
                                <div class="table-responsive">
                                    <table class="invoice-table-two table">
                                        <tbody>
                                            <tr>
                                                <th>Pre-Paid:</th>
                                                <td><span>{{ ($booking->total_amount * 0.3) }} MMK</span></td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <td><span>{{ $booking->total_amount }} MMK</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Item -->
								
                    <!-- Invoice Information -->
                    <div class="other-info">
                        <h4>From <span class="font-weight-bold">{{ $booking->court->name }}</span></h4>
                        <p class="text-muted mb-0">{{ $booking->comment }}</p>
                    </div>
                    <!-- /Invoice Information -->
								
                </div>
            </div>
        </div>

    </div>

</div>		
<!-- /Page Content -->
@endsection