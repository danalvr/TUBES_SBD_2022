@extends('dashboard.layouts.main')
@section('container')
<!-- general form elements -->
<div class="card card-secondary">
    <div class="card-header">
        <h3 class="card-title">Add new Transaction</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="/transaction" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="transaction_code">Transaction Code</label>
                <input type="text" class="form-control" readonly value="{{ $transactionCode }}">
                <input type="hidden" name="transaction_code" value="{{ $transactionCode }}">
            </div>
            <div class="form-group">
                <label for="customer_name">Customer Name</label>
                <input type="text" name="customer_name" class="form-control @error('customer_name') is-invalid @enderror" id="customer_name" placeholder="Customer Name" value="{{ old('customer_name') }}" required>
                <div class="invalid-feedback">
                    @error('customer_name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Address" value="{{ old('address') }}" required>
                <div class="invalid-feedback">
                    @error('address')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone number</label>
                <input type="number" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" placeholder="Phone number" value="{{ old('phone_number') }}" required>
                <div class="invalid-feedback">
                    @error('phone_number')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="custom-control custom-radio">
                  <input class="custom-control-input @error('gender') is-invalid @enderror" type="radio" id="customRadio1" name="gender" value="{{ old('gender', 1) }}" required>
                  <label for="customRadio1" class="custom-control-label">Male</label>
                </div>
                <div class="custom-control custom-radio">
                  <input class="custom-control-input @error('gender') is-invalid @enderror" type="radio" id="customRadio2" name="gender" value="{{ old('gender', 0) }}" required>
                  <label for="customRadio2" class="custom-control-label">Female</label>
                </div>
                <div class="invalid-feedback">
                    @error('gender')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Select</label>
                <select class="form-control" name="book_id">
                  <option selected disabled>-- Choose The book --</option>
                  @foreach ($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                  @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" id="quantity" placeholder="Quantity" value="{{ old('quantity') }}" required>
                <div class="invalid-feedback">
                    @error('quantity')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <input name="cashier_id" type="hidden" value="3">
            <input name="customer_id" type="hidden" value="{{ $customerId }}">
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
        <button type="submit" class="btn btn-secondary">Submit</button>
        </div>
    </form>
</div>
<!-- /.card -->
@endsection