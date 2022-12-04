@extends('dashboard.layouts.main')
@section('container')
@if (session()->has('success'))
    <div class="alert alert-success col-lg" role="alert">
        {{ session('success') }}
    </div>
@endif
<div class="card">
    <div class="card-header">
      <h1 class="card-title col-md-9 font-weight-bold text-secondary" style="font-size: 40px">Data Transaction Customers</h1>
      <a href="/transaction/create" class="card-title col-md-3">
        <p class="btn btn-success" style="font-size: 20px">
            <i class="fas fa-plus"></i>
            Add Transaction
        </p>
      </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Transaction Code</th>
          <th>Title</th>
          <th>Author</th>
          <th>Publisher</th>
          <th>Customer</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Total</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $transaction->transaction_code }}</td>
                <td>{{ $transaction->title }}</td>
                <td>{{ $transaction->author }}</td>
                <td>{{ $transaction->publisher }}</td>
                <td>{{ $transaction->customer_name }}</td>
                <td>{{ $transaction->quantity }}</td>
                <td>{{ $transaction->price }}</td>
                <td>{{ $transaction->quantity * $transaction->price }}</td>
                <td>
                    <div class="container d-flex justify-content-center">
                        <div class="row">
                            <div class="col-md-6">
                                <a class="btn btn-outline-warning" href="/transaction/{{ $transaction->transaction_code }}/edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <form action="/transaction/{{ $transaction->transaction_code }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                  </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
    
@endsection