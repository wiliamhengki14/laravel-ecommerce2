<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product</title>
</head>
<body>
    <h1>Tambah Produk</h1>
    <form action="{{ route('store_product') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="name">Nama Produk : </label> <br>
        <input type="text" name="name" id="name" required placeholder="Nama Produk"> <br> <br>
        <label for="price">Harga Produk : </label> <br>
        <input type="number" name="price" id="price" required placeholder="Harga Produk"> <br> <br>
        <label for="description">Deskripsi Produk : </label> <br>
        <input type="text" name="description" id="description" required placeholder="Deskripsi Produk"> <br> <br>
        <label for="stock">Stok Produk : </label> <br>
        <input type="number" name="stock" id="stock" required placeholder="Stok Produk"> <br> <br>
        <label for="image">Stok Produk : </label> <br>
        <input type="file" name="image" id="image"> <br> <br>
        <button type="submit">Tambah</button>
    </form>
    <br>
    <a href="{{ route('index_product') }}">Kembali</a>
</body>
</html>