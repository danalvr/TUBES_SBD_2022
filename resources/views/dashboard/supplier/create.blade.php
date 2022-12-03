@extends('dashboard.layouts.main')
@section('container')
<!-- general form elements -->
<div class="card card-secondary">
    <div class="card-header">
        <h3 class="card-title">Add new book</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
        <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Title" required>
            </div>
            <div class="form-group">
                <label for="price">Price (Rp)</label>
                <input type="number" class="form-control" id="price" placeholder="price" required>
            </div>
            <div class="form-group">
                <label for="publisher">Publisher</label>
                <input type="text" class="form-control" id="publisher" placeholder="Publisher" required>
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" id="author" placeholder="Author" required>
            </div>
            <div class="form-group">
                <label for="stock">Stock Amount</label>
                <input type="number" class="form-control" id="stock" placeholder="stock" required>
            </div>
            <div class="form-group">
                <label for="publication-year">Publication Year</label>
                <input type="date" class="form-control" id="publication-year" placeholder="Publication year" required>
            </div>
            <input type="hidden" value="2">
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
        <button type="submit" class="btn btn-secondary">Submit</button>
        </div>
    </form>
</div>
<!-- /.card -->
@endsection