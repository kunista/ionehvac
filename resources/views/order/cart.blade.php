@extends('layouts.master')

@push('head')
<link href='/css/cart/cart.css' rel='stylesheet'>
@endpush

@section('title')
    Your cart
@endsection

@section('content')

    <div>
        <h1>Your Cart</h1>

        <hr>

        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if (session()->has('error_message'))
            <div class="alert alert-danger">
                {{ session()->get('error_message') }}
            </div>
        @endif

        @if (sizeof(Cart::content()) > 0)

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
                @foreach (Cart::content() as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>${{ number_format($item->subtotal, 2) }}</td>
                        <td class=""></td>
                        <td>
                            <form action="{{ url('cart', [$item->rowId]) }}" method="POST" class="side-by-side">
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" class="btn btn-danger btn-sm" value="Remove">
                            </form>
                        </td>
                    </tr>

                @endforeach


                <tr class="border-bottom">
                    <td style="padding: 40px;"></td>
                    <td class="small-caps table-bg" style="text-align: right">Your Total</td>
                    <td class="table-bg">${{ Cart::subtotal() }}</td>
                    <td class="column-spacer"></td>
                    <td></td>
                </tr>

                </tbody>
            </table>

            <a href="{{ url('/product') }}" class="btn btn-primary btn-small">Continue Shopping</a>

            <form method='POST' action='/order'>

                {{ csrf_field() }}

                <input type='submit' value='Place an order' class='btn btn-primary btn-small'>
            </form>

            <div style="float:right">
                <form action="{{ url('/emptyCart') }}" method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-danger btn-small" value="Empty Cart">
                </form>
            </div>

        @else

            <h3>You have no items in your shopping cart</h3>
            <a href="{{ url('/product') }}" class="btn btn-primary btn-small">Continue Shopping</a>

        @endif

        <div class="spacer"></div>

    </div> <!-- end container -->

@endsection