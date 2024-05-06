@extends('layouts.app')

@section('content')    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Order</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('orders.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="customer">Customer:</label>
                                <input type="text" class="form-control" id="customer" name="customer" required>
                            </div>

                            <div class="form-group">
                                <label for="product">Product:</label>
                                <select class="form-control" id="product" name="product" required>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="need_by">Need-By Date:</label>
                                <input type="date" class="form-control" id="need_by" name="need_by" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
@endsection
