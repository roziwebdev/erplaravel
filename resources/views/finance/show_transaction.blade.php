@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Transaksi</h2>
    <a href="{{ route('finance.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $transaction->description }}</h5>
            <p class="card-text"><strong>Jumlah:</strong> {{ number_format($transaction->amount, 2) }}</p>
            <p class="card-text"><strong>Tanggal:</strong> {{ $transaction->transaction_date }}</p>
        </div>
    </div>

    <h4 class="mt-4">Jurnal Entri</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Akun</th>
                <th>Tipe</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaction->journalEntries as $entry)
                <tr>
                    <td>{{ $entry->account->name }}</td>
                    <td>{{ ucfirst($entry->entry_type) }}</td>
                    <td>{{ number_format($entry->amount, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
