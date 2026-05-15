@include('layout.header')
<!-- Header -->

<h3>Tambah Penerbit</h3>
<form action="{{ route('penerbit.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="">Nama Penerbit</label>
        <input type="text" name="nama_penerbit" id="">
    </div>
    <button class="tombol" type="submit">Tambah</button>
</form>

<!-- Footer -->
@include('layout.footer')