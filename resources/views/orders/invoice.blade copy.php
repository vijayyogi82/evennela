<!DOCTYPE html>
<html>
<head>
    <title>Order Invoice</title>
    <style>
    </style>
</head>
<body>
    <h1>Order Invoice</h1>
    <p><strong>Order No:</strong> {{ $order->order_no }}</p>
    <p><strong>User Name:</strong> {{ $user->name }}</p>
    <p><strong>Order Date:</strong> {{ $order->order_booking_date }}</p>
    <p><strong>Delivery Date:</strong> {{ $order->order_delivery_date }}</p>
    <p><strong>Item Name:</strong> {{ $order->item_name }}</p>
    <p><strong>Quantity:</strong> {{ $order->order_quantity }}</p>
</body>
</html>
