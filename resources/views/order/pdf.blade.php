<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Orders PDF</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 5px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h1 class="text-2xl font-bold text-gray-800">Simple ERP <span class="text-sm text-gray-500 font-normal">by Sultan Faaiz</span></h1>
    <h2>Order List</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Client</th>
                <th>Item Name</th>
                <th>Price</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $index => $order)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $order->client->name }}</td>
                <td>{{ $order->item_name }}</td>
                <td>Rp{{ number_format($order->item_price, 0, ',', '.') }}</td>
                <td>{{ $order->created_at->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>