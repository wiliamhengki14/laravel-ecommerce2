<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $product->name }}</title>
</head>
<body>
    <h1>Data Produk {{ $product->name }}</h1>
    <p>Nama : {{ $product->name }}</p>
    <p>Harga : {{ $product->price }}</p>
    <p>Deskripsi : {{ $product->description }}</p>
    <p>Stok : {{ $product->stock }}</p>
    <p>Gambar</p>
    <img src="{{ url('storage/'. $product->image) }}" alt="{{ $product->image }}" style="width: 200px; height: 200px"> <br>
    <br>
    <br>
    <form action="{{ route('edit_product', $product) }}" method="get">
        @csrf
        <button type="submit">Edit Produk</button>
    </form>
    <br>
    <form action="{{ route('delete_product', $product) }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" onclick="return confirm('Yakin Hapus Barang {{ $product->name }}')">Hapus Produk</button>
    </form>
    <br>
    <a href="{{ route('index_product') }}">Kembali</a>
</body>
</html>