<!DOCTYPE html>
<html>
<head>
    <title>Sales Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Sales Report</h1>
    <p>Report from {{ $start_date }} to {{ $end_date }}</p>
    <table>
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
                    <td>{{ number_format($order->Price, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h3>Total Sales: {{ number_format($total_sales, 0, ',', '.') }}</h3>
</body>
</html>
