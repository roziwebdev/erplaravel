<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\Finance\Account;
use App\Models\Finance\JournalEntry;
use App\Models\Finance\Transaction;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function index()
    {
        $accounts = Account::all();
        $transactions = Transaction::latest()->paginate(10);

        return view('finance.index', compact('accounts', 'transactions'));
    }

    /**
     * 2. Menampilkan form untuk menambah akun baru
     */
    public function createAccount()
    {
        return view('finance.create_account');
    }

    /**
     * 3. Menyimpan akun baru
     */
    public function storeAccount(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:asset,liability,equity,revenue,expense',
            'balance' => 'required|numeric'
        ]);

        Account::create($request->all());

        return redirect()->route('finance.index')->with('success', 'Akun berhasil ditambahkan.');
    }

    /**
     * 4. Menampilkan form untuk menambah transaksi baru
     */
    public function createTransaction()
    {
        $accounts = Account::all();
        return view('finance.create_transaction', data: compact('accounts'));
    }

    /**
     * 5. Menyimpan transaksi baru dengan jurnal entri debit dan kredit
     */
    public function storeTransaction(Request $request)
{
    $request->validate([
        'account_debit_id' => 'required|exists:accounts,id',
        'account_credit_id' => 'required|exists:accounts,id|different:account_debit_id',
        'amount' => 'required|numeric|min:1',
        'description' => 'nullable|string'
    ]);

    // Simpan transaksi utama
    $transaction = Transaction::create([
        'amount' => $request->amount,
        'description' => $request->description,
        'transaction_date' => now()
    ]);

    // Ambil akun debit & kredit
    $debitAccount = Account::findOrFail($request->account_debit_id);
    $creditAccount = Account::findOrFail($request->account_credit_id);

    // Update balance di akun terkait
    $debitAccount->balance += $request->amount;
    $creditAccount->balance -= $request->amount;

    // Simpan perubahan saldo akun
    $debitAccount->save();
    $creditAccount->save();

    // Jurnal Entri: Debit
    JournalEntry::create([
        'transaction_id' => $transaction->id,
        'account_id' => $debitAccount->id,
        'entry_type' => 'debit',
        'amount' => $request->amount
    ]);

    // Jurnal Entri: Kredit
    JournalEntry::create([
        'transaction_id' => $transaction->id,
        'account_id' => $creditAccount->id,
        'entry_type' => 'credit',
        'amount' => $request->amount
    ]);

    return redirect()->route('finance.index')->with('success', 'Transaksi berhasil ditambahkan dan saldo akun diperbarui.');
}

    /**
     * 6. Menampilkan detail transaksi & jurnal entri terkait
     */
    public function showTransaction($id)
    {
        $transaction = Transaction::with('journalEntries.account')->findOrFail($id);
        return view('finance.show_transaction', compact('transaction'));
    }

    /**
     * 7. Menghapus transaksi dan jurnal entri terkait
     */
    public function deleteTransaction($id)
    {
        $transaction = Transaction::findOrFail($id);

        // Hapus jurnal entri
        JournalEntry::where('transaction_id', $id)->delete();

        // Hapus transaksi
        $transaction->delete();

        return redirect()->route('finance.index')->with('success', 'Transaksi berhasil dihapus.');
    }

    /**
     * 8. Generate laporan neraca keuangan (Balance Sheet)
     */
    public function generateBalanceSheet()
    {
        $assets = Account::where('type', 'asset')->get();
        $liabilities = Account::where('type', 'liability')->get();
        $equities = Account::where('type', 'equity')->get();

        return view('finance.balance_sheet', compact('assets', 'liabilities', 'equities'));
    }
}
