@extends('layouts.layoutpekerja')

@section('title', 'Data Pesanan')

@section('content')
<div class="container2">
  <h1>Data Pesanan</h1>
  <table>
    <thead>
      <tr>
        <th>ID Customer</th>
        <th>Nama Customer</th>
        <th>Detail Ukuran</th>
        <th>Nama Penjahit</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      {{-- @foreach($Orders as $pesanan) --}}
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td> 
            <div class="form-group">

            </div>
        <td>
          {{-- <a href="{{ route('edit_detail', $pesanan->id) }}"><button class="edit">Edit</button></a>
          <form action="{{ route('hapus_pesanan', $pesanan->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button class="delete" type="submit">Hapus</button>
          </form> --}}
        </td>
      </tr>
      {{-- @endforeach --}}
    </tbody>
  </table>
  <a ><button>Kembali</button></a>
</div>
@endsection
