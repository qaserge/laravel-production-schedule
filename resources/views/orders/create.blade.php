@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Create Order</h1>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('orders.store') }}">
                            @csrf

                            <table class="table">
                                <tbody>
                                    <div class="form-group">
                                        <tr>
                                            <td><label for="customer">Customer:</label></td>
                                            <td><input type="text" class="form-control" id="customer" name="customer"
                                                    required></td>
                                        </tr>
                                    </div>
                                    <div class="form-group">
                                        <tr>
                                            <td><label for="products">Products:</label></td>
                                            <td>
                                                @foreach ($products as $product)
                                                    <div>
                                                        <input type="checkbox" id="product_{{ $product->id }}"
                                                            name="products[]" value="{{ $product->id }}">
                                                        <label
                                                            for="product_{{ $product->id }}">{{ $product->name }}</label>
                                                        <input type="number" id="quantity_{{ $product->id }}"
                                                            name="quantities[{{ $product->id }}]" value="0"
                                                            min="0">
                                                    </div>
                                                @endforeach
                                            </td>
                                        </tr>
                                    </div>
                                    <div class="form-group">
                                        <tr>
                                            <td><label for="need_by">Need-By Date:</label></td>
                                            <td><input type="date" class="form-control" id="need_by" name="need_by"
                                                    required></td>
                                        </tr>
                                    </div>
                                </tbody>
                            </table>

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
