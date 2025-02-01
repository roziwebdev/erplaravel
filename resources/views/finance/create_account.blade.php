@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Akun Baru</h2>
    <a href="{{ route('finance.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <form action="{{ route('finance.storeAccount') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Akun</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Tipe Akun</label>
            <select class="form-control" id="type" name="type" required>
                <option value="asset">Aset</option>
                <option value="liability">Liabilitas</option>
                <option value="equity">Ekuitas</option>
                <option value="revenue">Pendapatan</option>
                <option value="expense">Beban</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="balance" class="form-label">Saldo Awal</label>
            <input type="number" class="form-control" id="balance" name="balance" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
