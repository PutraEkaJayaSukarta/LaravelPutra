<!-- resources/views/excel_preview.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Preview Excel</title>
</head>
<body>
    <h1>Preview Data Excel</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Gudang</th>
                <th>Kategori Barang</th>
                <th>Nama Barang</th>
                <th>Satuan Barang</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Tanggal Stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barangs as $barang)
                <tr>
                    <td>{{ $barang->id }}</td>
                    <td>{{ $barang->nama_gudang }}</td>
                    <td>{{ $barang->kategori_barang }}</td>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->satuan_barang }}</td>
                    <td>{{ $barang->harga_beli }}</td>
                    <td>{{ $barang->harga_jual }}</td>
                    <td>{{ $barang->tanggal_stock }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('export-excel') }}">Download Excel</a>
</body>
</html>
