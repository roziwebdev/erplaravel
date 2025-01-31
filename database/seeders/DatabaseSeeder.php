<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

    //INVENTORY
    DB::table('products')->insert([
        ['name' => 'Product A', 'description' => 'Description of Product A', 'price' => 1000, 'stock_quantity' => 50],
        ['name' => 'Product B', 'description' => 'Description of Product B', 'price' => 2000, 'stock_quantity' => 30],
    ]);
    DB::table('inventory_transactions')->insert([
        ['product_id' => 1, 'quantity' => 10, 'transaction_type' => 'inbound', 'date' => now(), 'description' => 'Restock'],
        ['product_id' => 2, 'quantity' => 5, 'transaction_type' => 'outbound', 'date' => now(), 'description' => 'Sale'],
    ]);


    // FINANCE
    DB::table('accounts')->insert([
        ['name' => 'Cash', 'type' => 'Asset', 'balance' => 10000],
        ['name' => 'Bank', 'type' => 'Asset', 'balance' => 50000],
        ['name' => 'Accounts Receivable', 'type' => 'Asset', 'balance' => 20000],
        ['name' => 'Accounts Payable', 'type' => 'Liability', 'balance' => 30000],
    ]);

    DB::table('transactions')->insert([
        ['account_id' => 1, 'amount' => 1500, 'transaction_type' => 'debit', 'date' => now(), 'description' => 'Deposit'],
        ['account_id' => 2, 'amount' => 2500, 'transaction_type' => 'credit', 'date' => now(), 'description' => 'Payment for Order'],
    ]);

    DB::table('journal_entries')->insert([
        ['transaction_id' => 1, 'entry_type' => 'debit', 'amount' => 1500, 'account_id' => 1],
        ['transaction_id' => 1, 'entry_type' => 'credit', 'amount' => 1500, 'account_id' => 2],
        ['transaction_id' => 2, 'entry_type' => 'debit', 'amount' => 2500, 'account_id' => 2],
        ['transaction_id' => 2, 'entry_type' => 'credit', 'amount' => 2500, 'account_id' => 4],
    ]);

    //SALES
    DB::table('customers')->insert([
        ['name' => 'John Doe', 'contact_info' => 'johndoe@example.com'],
        ['name' => 'Jane Smith', 'contact_info' => 'janesmith@example.com'],
    ]);
    DB::table('sales_orders')->insert([
        ['customer_id' => 1, 'order_date' => now(), 'status' => 'completed'],
        ['customer_id' => 2, 'order_date' => now(), 'status' => 'pending'],
    ]);
    DB::table('sales_order_items')->insert([
        ['sales_order_id' => 1, 'product_id' => 1, 'quantity' => 2, 'price' => 5000, 'total' => 10000],
        ['sales_order_id' => 2, 'product_id' => 2, 'quantity' => 1, 'price' => 3000, 'total' => 3000],
    ]);
    DB::table('invoices')->insert([
        ['sales_order_id' => 1, 'invoice_date' => now(), 'due_date' => now()->addDays(30), 'amount' => 10000, 'status' => 'unpaid'],
        ['sales_order_id' => 2, 'invoice_date' => now(), 'due_date' => now()->addDays(30), 'amount' => 3000, 'status' => 'unpaid'],
    ]);


    //HR
    DB::table('positions')->insert([
        ['title' => 'Manager', 'description' => 'Manages the team'],
        ['title' => 'Staff', 'description' => 'Works on the tasks'],
    ]);
    DB::table('employees')->insert([
        ['name' => 'Alice Johnson', 'dob' => '1990-02-15', 'position_id' => 1, 'salary' => 50000, 'status' => 'active'],
        ['name' => 'Bob Brown', 'dob' => '1985-03-20', 'position_id' => 2, 'salary' => 30000, 'status' => 'active'],
    ]);
    DB::table('attendances')->insert([
        ['employee_id' => 1, 'date' => now(), 'status' => 'present'],
        ['employee_id' => 2, 'date' => now(), 'status' => 'absent'],
    ]);
    DB::table('payrolls')->insert([
        ['employee_id' => 1, 'pay_date' => now(), 'gross_salary' => 50000, 'deductions' => 5000, 'net_salary' => 45000],
        ['employee_id' => 2, 'pay_date' => now(), 'gross_salary' => 30000, 'deductions' => 3000, 'net_salary' => 27000],
    ]);

    //PURCHASING
    DB::table('suppliers')->insert([
        ['name' => 'Supplier A', 'contact_person' => 'John Supplier', 'email' => 'supplierA@example.com', 'phone' => '123456789', 'address' => 'Supplier A Address'],
        ['name' => 'Supplier B', 'contact_person' => 'Jane Supplier', 'email' => 'supplierB@example.com', 'phone' => '987654321', 'address' => 'Supplier B Address'],
    ]);
    DB::table('purchase_orders')->insert([
        ['supplier_id' => 1, 'order_date' => now(), 'status' => 'pending'],
        ['supplier_id' => 2, 'order_date' => now(), 'status' => 'completed'],
    ]);
    DB::table('purchase_order_items')->insert([
        ['purchase_order_id' => 1, 'product_id' => 1, 'quantity' => 20, 'price' => 1000, 'total' => 20000],
        ['purchase_order_id' => 2, 'product_id' => 2, 'quantity' => 15, 'price' => 2000, 'total' => 30000],
    ]);
    DB::table('goods_receipts')->insert([
        ['purchase_order_id' => 1, 'received_date' => now(), 'quantity_received' => 20, 'status' => 'complete'],
        ['purchase_order_id' => 2, 'received_date' => now(), 'quantity_received' => 15, 'status' => 'complete'],
    ]);
    DB::table('purchase_invoices')->insert([
        ['purchase_order_id' => 1, 'invoice_date' => now(), 'due_date' => now()->addDays(30), 'amount' => 20000, 'status' => 'unpaid'],
        ['purchase_order_id' => 2, 'invoice_date' => now(), 'due_date' => now()->addDays(30), 'amount' => 30000, 'status' => 'unpaid'],
    ]);
    DB::table('payments_to_suppliers')->insert([
        ['purchase_invoice_id' => 1, 'payment_date' => now(), 'amount' => 20000, 'payment_method' => 'bank transfer'],
        ['purchase_invoice_id' => 2, 'payment_date' => now(), 'amount' => 30000, 'payment_method' => 'cash'],
    ]);




    }
}
