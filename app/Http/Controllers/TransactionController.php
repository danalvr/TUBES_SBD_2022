<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction = DB::table('transactions')
            ->join('books', 'transactions.book_id', '=', 'books.id')
            ->join('customers', 'transactions.customer_id', '=', 'customers.id')
            ->select('books.*', 'customers.*', 'transactions.*')
            ->get();

        return view('dashboard.cashier.index', [
            'transactions' => $transaction
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = DB::select('select * from books');
        $transactionCount = count(DB::table('transactions')->get());
        $transactionCode = "TA513D" . ($transactionCount + 1);
        $customerId = count(DB::table('customers')->get()) + 1;
 
        return view('dashboard.cashier.create', [
            'transactionCode' => $transactionCode,
            'books' => $books,
            'customerId' => $customerId
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedDataCustomer = $request->validate([
            'customer_name' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
        ]);

        $validatedDataTransaction = $request->validate([
            'book_id' => 'required',
            'customer_id' => 'required',
            'cashier_id' => 'required',
            'transaction_code' => 'required',
            'quantity' => 'required',
        ]);

        Customer::create($validatedDataCustomer);
        Transaction::create($validatedDataTransaction);

        return redirect('/transaction')->with('success', 'New Transaction has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit($transaction_code)
    {
        $books = DB::select('select * from books');
        $transaction = DB::table('transactions')
        ->join('books', 'transactions.book_id', '=', 'books.id')
        ->join('customers', 'transactions.customer_id', '=', 'customers.id')
        ->select('books.*', 'customers.*', 'transactions.*')
        ->where('transaction_code', $transaction_code)
        ->first();

        // dd($transaction);

        return view('dashboard.cashier.edit', [
            'transaction' => $transaction,
            'books' => $books
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update($transaction_code, Request $request)
    {
        $validatedDataCustomer = $request->validate([
            'customer_name' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
        ]);

        $validatedDataTransaction = $request->validate([
            'book_id' => 'required',
            'customer_id' => 'required',
            'cashier_id' => 'required',
            'transaction_code' => 'required',
            'quantity' => 'required',
        ]);

        $customerId = $request->customer_id;

        DB::table('customers')
        ->where('id', $customerId)
        ->update($validatedDataCustomer);

        DB::table('transactions')
        ->where('transaction_code', $transaction_code)
        ->update($validatedDataTransaction);

        return redirect('/transaction')->with('success', 'The Transaction has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy($transaction_code, Request $request)
    {
        DB::table('transactions')->where('transaction_code', '=', $transaction_code)->delete();
        DB::table('customers')->where('id', '=', $request->customer_id)->delete();
        return redirect('/transaction')->with('success', 'The transaction has been deleted!');
    }
}
