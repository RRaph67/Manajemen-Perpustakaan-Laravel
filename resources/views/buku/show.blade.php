@include('layout.header')
<!-- Header -->

<h3>Deatil Buku</h3>
<table>
    <tbody>
        <tr>
            <td width="150px">Judul Buku</td>
            <td width="2px">:</td>
            <td>{{ $buku->judul }}</td>
        </tr>
        <tr>
            <td width="150px">Pengarang</td>
            <td width="2px">:</td>
            <td>{{ $buku->pengarang }}</td>
        </tr>
        <tr>
            <td width="150px">Tahun Terbit</td>
            <td width="2px">:</td>
            <td>{{ $buku->tahun_terbit }}</td>
        </tr>
        <tr>
            <td width="150px">Penerbit</td>
            <td width="2px">:</td>
            <td>{{ $buku->penerbit->nama_penerbit }}</td>
        </tr>
        <tr>
            <td width="150px">Kategori</td>
            <td width="2px">:</td>
            <td>{{ $buku->kategori->nama_kategori }}</td>
        </tr>
    </tbody>
</table>

<!-- Footer -->
@include('layout.footer')