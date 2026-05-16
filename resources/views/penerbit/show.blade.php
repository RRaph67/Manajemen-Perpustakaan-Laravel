@include('layout.header')
<!-- Header -->

<h3>Detail Penerbit</h3>
<table>
    <tbody>
        <tr>
            <td width="150px">Nama Penerbit</td>
            <td width="2px">:</td>
            <td>{{ $penerbit->nama_penerbit }}</td>
        </tr>
    </tbody>
</table>

<!-- Footer -->
@include('layout.footer')