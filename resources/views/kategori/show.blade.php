@include('layout.header')
<!-- Header -->

<h3>Detail Kategori</h3>
<table>
    <tbody>
        <tr>
            <td width="150px">Nama Kategori</td>
            <td width="2px">:</td>
            <td>{{ $kategori->nama_kategori }}</td>
        </tr>
    </tbody>
</table>

<!-- Footer -->
@include('layout.footer')