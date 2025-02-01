@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Transaksi Baru</h2>
    <a href="{{ route('finance.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <form action="{{ route('finance.storeTransaction') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="account_debit_id" class="form-label">Akun Debit</label>
            <select class="form-control" name="account_debit_id" required>
                @foreach ($accounts as $account)
                    <option value="{{ $account->id }}">{{ $account->name }} {{ $account->id }}({{ ucfirst($account->type) }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="account_credit_id" class="form-label">Akun Kredit</label>
            <select class="form-control" name="account_credit_id" required>
                @foreach ($accounts as $account)
                    <option value="{{ $account->id }}">{{ $account->name }} {{ $account->id }}({{ ucfirst($account->type) }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Jumlah</label>
            <input type="number" class="form-control" name="amount" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <input type="text" class="form-control" name="description">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
    </form>
</div>
@endsection
