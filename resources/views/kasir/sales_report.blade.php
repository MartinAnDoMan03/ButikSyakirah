@extends('layouts.layout')

@section('title', 'Sales Report')

@section('content')
    <h1>Sales Report</h1>

    <!-- Form for Selecting Date Range -->
     <div class="form-report">
    <form action="{{ url('generate-sales-report') }}" method="GET">
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
    </div>

    <!-- Display Report -->
    @if(isset($orders) && count($orders) > 0)
        <h2>Report from {{ $start_date }} to {{ $end_date }}</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->{'OrderID'} }}</td>
                        <td>{{ $order->{'CustomerName'} }}</td>
                        <td>{{ number_format($order->{'Price'}, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Total Sales -->
        <h3>Total Sales: {{ number_format($total_sales, 0, ',', '.') }}</h3>

        <!-- Print to PDF Button -->
        <form action="{{ url('generate-sales-report') }}" method="GET">
            @csrf
            <input type="hidden" name="start_date" value="{{ $start_date }}">
            <input type="hidden" name="end_date" value="{{ $end_date }}">
            <input type="hidden" name="print_pdf" value="1">
            <button type="submit">Print to PDF</button>
        </form>
    @else
        <p class="no-sales-messege">No sales found in the specified date range.</p>
    @endif
@endsection
