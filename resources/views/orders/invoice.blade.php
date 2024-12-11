<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delivery Challan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            border: 2px solid black;
            background-color: #ffec4c;
        }
        h1 {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin: 0;
        }
        .header {
            text-align: center;
            margin-top: 10px;
        }
        .header p {
            margin: 4px;
            font-size: 12px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .table th, .table td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        .details, .total {
            margin-top: 10px;
            font-size: 14px;
        }
        .total {
            text-align: right;
        }
        .image {
            text-align: right;
        }
        .notes {
            font-size: 12px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">

        <div class="image">
            @if($orderImageBase64)
                <img src="{{ $orderImageBase64 }}" alt="Order Image" height="50px;" width="50px;">
            @endif
        </div>

        <h1>Delivery Challan</h1>
        <div class="header">
            <p><strong>E Vennela Tailoring</strong></p>
            <p>Anand Complex, Ground Floor & Cellar, Behind Hotel Fortune Murali Park, Labbipet, Vijayawada - 10</p>
            <p>Phone: 0866-2495557, 0866-2974557, 9505974429</p>
        </div>
        
        <div class="details">
            <p><strong>Booking Date:</strong> {{ $order->order_booking_date }}</p>
            <p><strong>Delivery Date:</strong> {{ $order->order_delivery_date }}</p>
        </div>
        
        <div class="details">
            <p><strong>Name:</strong> {{ $order->name }}</p>
            <p><strong>Phone:</strong> {{ $order->mobile_number }}</p>
        </div>
        
        <table class="table">
            <tr>
                <th>S.No</th>
                <th>Particulars</th>
                <th>Qty</th>
                <th>Rate</th>
                <th>Lining Cost</th>
                <th>Extra Cost</th>
                <th>Total</th>
            </tr>
            @php
                $grandTotal = 0;
            @endphp
            @if(!empty($items))
                @foreach ($items as $index => $item)
                @php
                    $itemTotal = ($item['itemquantity'] ?? 0) * ($item['rate'] ?? 0) + 
                                 ($item['liningCost'] ?? 0) + 
                                 ($item['extraCost'] ?? 0);
                    $grandTotal += $itemTotal;
                @endphp
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item['itemName'] ?? 'N/A' }}</td>
                    <td>{{ $item['itemquantity'] ?? 'N/A' }}</td>
                    <td>{{ $item['rate'] ?? 'N/A' }}</td>
                    <td>{{ $item['liningCost'] ?? 'N/A' }}</td>
                    <td>{{ $item['extraCost'] ?? 'N/A' }}</td>
                    <td>{{ $itemTotal }}</td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7">No items available</td>
                </tr>
            @endif
        </table>

        <div class="total">
            <p><strong>Total Amount: </strong> {{ $grandTotal }}</p>
        </div>

        <div>
            <h4>ONLINE SALES</h4>
            <a href="https://www.evennela.com/">www.evennela.com</a>
        </div>
        
        <div class="notes">
            <p><strong>Note:</strong> 1. Kindly bring this bill at the time of delivery.</p>
            <p>2. After 30 days we are not held responsible for your materials (ITEMS).</p>
        </div>
    </div>
</body>
</html>
