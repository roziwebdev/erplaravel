@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Keuangan</h2>

    <a href="{{ route('finance.createAccount') }}" class="btn btn-primary">Tambah Akun</a>
    <a href="{{ route('finance.createTransaction') }}" class="btn btn-success">Tambah Transaksi</a>
    <a href="{{ route('finance.generateBalanceSheet') }}" class="btn btn-info">Laporan Neraca</a>

    <h4 class="mt-4">Daftar Akun</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Tipe</th>
                <th>Saldo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accounts as $account)
                <tr>
                    <td>{{ $account->name }}</td>
                    <td>{{ ucfirst($account->type) }}</td>
                    <td>{{ number_format($account->balance, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4 class="mt-4">Daftar Transaksi</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Deskripsi</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->description }}</td>
                    <td>{{ number_format($transaction->amount, 2) }}</td>
                    <td>{{ $transaction->transaction_date }}</td>
                    <td>
                        <a href="{{ route('finance.showTransaction', $transaction->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <form action="{{ route('finance.deleteTransaction', $transaction->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus transaksi ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
