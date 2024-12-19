<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pemesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        h1, h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Laporan Pesanan</h1>
    <h2>From {{ $start_date }} to {{ $end_date }}</h2>
    <table>
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
            @foreach($orders as $order)
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
</body>
</html>
