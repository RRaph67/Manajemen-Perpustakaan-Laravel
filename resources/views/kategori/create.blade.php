@include('layout.header')
<!-- Header -->

<h3>Tambah Kategori</h3>
<form action="{{ route('kategori.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="">Nama Kategori</label>
        <input type="text" name="nama_kategori" id="">
    </div>
    <button class="tombol" type="submit">Tambah</button>
</form>

<!-- Footer -->
@include('layout.footer')