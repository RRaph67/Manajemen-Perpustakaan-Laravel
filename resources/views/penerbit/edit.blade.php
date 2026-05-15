@include('layout.header')
<!-- Header -->

<h3>Edit Penerbit</h3>
<form action="{{ route('penerbit.update', $penerbit->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="">Nama Penerbit</label>
        <input type="text" name="nama_penerbit" id="" value="{{ $penerbit->nama_penerbit }}">
    </div>
    <button class="tombol" type="submit">Update</button>
</form>

<!-- Footer -->
@include('layout.footer')