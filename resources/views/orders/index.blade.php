@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Production Schedule</h1>
                    </div>

                    <div class="card-body">
                        <table class="table width-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer</th>
                                    <th>Need-By Date</th>
                                    <th>Approximate Time</th>
                                    <th>Orders</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->customer->name }}</td>
                                        <td>{{ $order->need_by }}</td>
                                        <td>{{ $order->approximate_time }}</td>
                                        <td>
                                            Order #{{ $order->id }} ({{ $order->created_at }})
                                            <ul>
                                                @foreach ($order->orderItems as $orderItem)
                                                    <li>{{ $orderItem->product->name }} - Quantity:
                                                        {{ $orderItem->quantity }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
