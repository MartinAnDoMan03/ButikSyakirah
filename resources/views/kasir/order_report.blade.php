@extends('layouts.layout')

@section('title', 'Order Report')

@section('content')
    <h1>Order Report</h1>

    <!-- Form for Selecting Date Range -->
    <form action="{{ url('generate-order-report') }}" method="GET">
        @csrf
        <div>
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date" required>
        </div>
        <div>
            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date" required>
        </div>
        <button type="submit">Generate Report</button>
    </form>

    <!-- Display Report -->
    @if (isset($orders) && count($orders) > 0)
        <h2>Report from {{ $start_date }} to {{ $end_date }}</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Order Date</th>
                    <th>Completion Date</th>
                    <th>Status</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->{'Order ID'} }}</td>
                        <td>{{ $order->{'Customer Name'} }}</td>
                        <td>{{ $order->{'Order Date'} }}</td>
                        <td>{{ $order->{'Completion Date'} }}</td>
                        <td>{{ $order->{'Order Status'} }}</td>
                        <td>{{ number_format($order->{'Total Price'}, 0, ',', '.') }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Print to PDF Button -->
        <form action="{{ url('generate-order-report') }}" method="GET">
            @csrf
            <input type="hidden" name="start_date" value="{{ $start_date }}">
            <input type="hidden" name="end_date" value="{{ $end_date }}">
            <input type="hidden" name="print_pdf" value="1">
            <button type="submit">Print to PDF</button>
        </form>
    @else
        <p>No orders found in the specified date range.</p>
    @endif
@endsection
