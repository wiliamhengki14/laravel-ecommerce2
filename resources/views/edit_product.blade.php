<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit {{ $product->name }}</title>
</head>
<body>
    <h1>Form Edit Produk</h1>
    <form action="{{ route('update_product', $product) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <label for="name">Nama Produk : </label> <br>
        <input type="text" name="name" id="name" required value="{{ $product->name }}"> <br> <br>
        <label for="price">Harga Produk : </label> <br>
        <input type="number" name="price" id="price" required value="{{ $product->price }}"> <br> <br>
        <label for="description">Deskripsi Produk : </label> <br>
        <input type="text" name="description" id="description" required value="{{ $product->description }}"> <br> <br>
        <label for="stock">Stok Produk : </label> <br>
        <input type="number" name="stock" id="stock" required value="{{ $product->stock }}"> <br> <br>
        <label for="image">Gambar Produk : </label> <br>
        <img src="{{ url('storage/'. $product->image) }}" alt="{{ $product->image }}" style="width: 200px; height: 200px"> <br>
        <input type="file" name="image" id="image"> <br> <br>
        <button type="submit">Update</button>
    </form>
    <br>
    <a href="{{ route('show_product', $product) }}">Kembali</a>
</body>
</html>