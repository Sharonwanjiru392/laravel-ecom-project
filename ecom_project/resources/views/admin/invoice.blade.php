<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
        <h3>Customer name : {{ $data->name }}</h3>
        <h3>Address : {{ $data->rec_address }}</h3>
        <h3>Phone : {{ $data->phone }}</h3>
        <h2>Product Title : {{ $data->product->title }}</h2>
        <h2>Product Price : {{ $data->product->price }}</h2>
        <img src="products/{{ $data->product->image}}" width="200">
        <h2>Status : {{ $data->status }}</h2>
    </center>
</body>
</html>
