<!-- resources/views/welcome.blade.php -->
@extends('layouts.layoutpekerja')

@section('title', 'Butik Syakirah') <!-- Menentukan title di halaman ini -->

@section('content')
  <section class="hero">
    <div class="hero-content">
      <h1>Butik Syakirah</h1>
      <p>Padang Sidempuan</p>
    </div>
  </section>

  <section id="about" class="about">
    <h2>ABOUT</h2>
  </section>

  <section class="cards">
    <div class="card" id="system">
      <h3>Data Pesanan</h3>
    </div>
    <div class="card" id="menu">
      <h3>Detail Ukuran</h3>
    </div>
  </section>
@endsection
