@extends('dashboard.layouts.main')
@section('container')
<div class="card">
    <div class="card-header">
      <h1 class="card-title col-md-9 font-weight-bold text-secondary" style="font-size: 40px">Data Stock of Books</h1>
      <a href="/book-stock/create" class="card-title col-md-3">
        <p class="btn btn-success" style="font-size: 20px">
            <i class="fas fa-plus"></i>
            Add Book
        </p>
      </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Title</th>
          <th>Author</th>
          <th>Publication years</th>
          <th>Publisher</th>
          <th>Stock</th>
          <th>Price</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->publication_year }}</td>
                <td>{{ $book->publisher }}</td>
                <td>{{ $book->stock_amount }}</td>
                <td>{{ $book->price }}</td>
                <td>
                    <div class="container d-flex justify-content-center">
                        <div class="row">
                            <div class="col-md-6">
                                <a class="btn btn-outline-warning" href="/book-stock/{{ $book->id }}/edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <form action="/book-stock/{{ $book->id }}" method="post">
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