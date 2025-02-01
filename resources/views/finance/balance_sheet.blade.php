@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Laporan Neraca</h2>
    <a href="{{ route('finance.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <h4>Aset</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Akun</th>
                <th>Saldo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($assets as $account)
                <tr>
                    <td>{{ $account->name }}</td>
                    <td>{{ number_format($account->balance, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Liabilitas</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Akun</th>
                <th>Saldo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($liabilities as $account)
                <tr>
                    <td>{{ $account->name }}</td>
                    <td>{{ number_format($account->balance, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Ekuitas</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Akun</th>
                <th>Saldo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($equities as $account)
                <tr>
                    <td>{{ $account->name }}</td>
                    <td>{{ number_format($account->balance, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
