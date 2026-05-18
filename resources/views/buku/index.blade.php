@include('layout.header')
<!-- Header -->

<h3>Buku</h3>
<div class="" style="display: flex; justify-content:space-between; align-items:center;">
    <a href="{{route('buku.create')}}" class="tombol">Tambah</a>
    <form action="{{ route('buku.index') }}" method="get">
        <input type="text" name="q" id="" style="padding: 5px; margin-right: 8px;" placeholder="Cari Buku...">
        <button type="submit" class="tombol">Cari</button>
    </form>
</div>
<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Cover</th>
            <th>Judul Buku</th>
            <th>Pengarang</th>
            <th>Tahun</th>
            <th>Penerbit</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($allBuku as $key => $r)
        <tr>
            <td>{{ $key + $allBuku->firstItem() }}</td>
            <td>
                @if ($r->cover)
                <img src="{{ asset('storage/'.$r->cover) }}" alt="Cover" width="80">
                @endif
            </td>
            <td>{{ $r->judul }}</td>
            <td>{{ $r->pengarang }}</td>
            <td>{{ $r->tahun_terbit }}</td>
            <td>{{ $r->penerbit->nama_penerbit }}</td>
            <td>{{ $r->kategori->nama_kategori }}</td>
            <td>
                <form action="{{route('buku.destroy', $r->id)}}" method="POST">
                    <a href="{{ route('buku.show', $r->id) }}" class="tombol">Detail</a>
                    <a href="{{ route('buku.edit', $r->id) }}" class="tombol">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button class="tombol" type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="" style="margin-bottom: 10px; display:flex; justify-content: center;">
    {{ $allBuku->links('vendor.pagination.customPaginate') }}
</div>

<!-- Footer -->
@include('layout.footer')