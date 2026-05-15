@include('layout.header')
<!-- Header -->

<h3>Edit Kategori</h3>
<form action="{{ route('kategori.update', $kategori->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="">Nama Kategori</label>
        <input type="text" name="nama_kategori" id="" value="{{ $kategori->nama_kategori }}">
    </div>
    <button class="tombol" type="submit">Update</button>
</form>

<!-- Footer -->
@include('layout.footer')