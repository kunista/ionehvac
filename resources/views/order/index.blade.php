@extends('layouts.master')

@push('head')

@endpush

@section('title')
    Your orders
@endsection

@section('content')

    <h1>Your orders</h1>

    @if(count($orders) > 0)
        @foreach($orders as $order)
            <div>
                <h2>Order N: {{ $order['id'] }} with a subtotal of: ${{$order->subtotalFormatted()}}</h2>

            </div>

            <table class="table">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th class="column-spacer"></th>
                    <th></th>
                </tr>
                </thead>

                <tbody>

            @foreach ($order->products()->get() as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>${{ $item->priceFormatted() }}</td>
                <td class=""></td>

            </tr>
            @endforeach

                </tbody>
            </table>

        @endforeach
    @else
        <p>You don't have any orders yet
    @endif

@endsection
