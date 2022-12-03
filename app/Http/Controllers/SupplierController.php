<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = DB::select('select * from books');

        return view('dashboard.supplier.index', [
            'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:50',
            'price' => 'required',
            'publisher' => 'required',
            'author' => 'required',
            'stock_amount' => 'required',
            'supplier_id' => 'required',
            'publication_year' => 'required',
        ]);

        Book::create($validatedData);

        return redirect('/book-stock')->with('success', 'New book has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = DB::table('books')->where('id', $id)->first();
        return view('dashboard.supplier.edit', [
            'book' => $book,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:50',
            'price' => 'required',
            'publisher' => 'required',
            'author' => 'required',
            'stock_amount' => 'required',
            'supplier_id' => 'required',
            'publication_year' => 'required',
        ]);
        DB::table('books')
        ->where('id', $id)
        ->update($validatedData);
        return redirect('/book-stock')->with('success', 'New book has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('books')->where('id', '=', $id)->delete();
        return redirect('/book-stock')->with('success', 'The book has been deleted!');
    }
}
