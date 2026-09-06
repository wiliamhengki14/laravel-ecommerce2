<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produk</title>
</head>
<body>
    <h1>Produk</h1>
    <a href="{{ route('create_product') }}">Tambah Produk + </a> <br>
    <hr>
    @foreach ($products as $product)
        <p>Nama Produk : {{ $product->name }}</p>
        <p>Harga Produk : {{ $product->price }}</p>
        <p>Gambar Produk</p>
        <img src="{{ url('storage/'. $product->image) }}" alt="{{ $product->image }}" style="height: 200px; width: 200px">
        <br> <br>
        <form action="{{ route('show_product', $product) }}" method="get">
            @csrf
            <button type="submit">Tampilkan Produk</button>
        </form>
        <hr>
    @endforeach
</body>
</html>