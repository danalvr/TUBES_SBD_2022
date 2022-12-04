@extends('dashboard.layouts.main')
@section('container')
<!-- general form elements -->
<div class="card card-secondary">
    <div class="card-header">
        <h3 class="card-title">Add new book</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="/book-stock" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title" value="{{ old('title') }}" required>
                <div class="invalid-feedback">
                    @error('title')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="price">Price (Rp)</label>
                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="price" value="{{ old('price') }}" required>
                <div class="invalid-feedback">
                    @error('price')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="publisher">Publisher</label>
                <input type="text" name="publisher" class="form-control @error('publisher') is-invalid @enderror" id="publisher" placeholder="Publisher" value="{{ old('publisher') }}" required>
                <div class="invalid-feedback">
                    @error('publisher')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" name="author" class="form-control" @error('author') is-invalid @enderror id="author" placeholder="Author" value="{{ old('author') }}" required>
                <div class="invalid-feedback">
                    @error('author')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="stock">Stock Amount</label>
                <input type="number" name="stock_amount" class="form-control" @error('stock') is-invalid @enderror id="stock" placeholder="stock" value="{{ old('stock_amount') }}" required>
                <div class="invalid-feedback">
                    @error('stock')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="publication-year">Publication Year</label>
                <input type="date" name="publication_year" class="form-control @error('publication_year') is-invalid @enderror" id="publication-year" placeholder="Publication year" value="{{ old('publication_year') }}" required>
                <div class="invalid-feedback">
                    @error('publication_year')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <input name="supplier_id" type="hidden" value="2">
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
        <button type="submit" class="btn btn-secondary">Submit</button>
        </div>
    </form>
</div>
<!-- /.card -->
@endsection