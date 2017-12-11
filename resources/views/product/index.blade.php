@extends('layouts.master')

@push('head')
    <link href='/css/product/product.css' rel='stylesheet'>
@endpush

@section('title')
    All products
@endsection

@section('content')




    <h1>All products</h1>

    @foreach($products as $product)
        <div class='product cf'>
            <h2>{{ $product['name'] }}</h2>
            <p> {{ $product['description'] }}</p>
            @if ($user and $user->isAdmin())
                <a href='/product/{{ $product['id'] }}'>View</a> |
                <a href='/product/{{ $product['id'] }}/edit'>Edit</a> |
                <a href='/product/{{ $product['id'] }}/delete'>Delete</a>

            @else

                <a href='/product/{{ $product['id'] }}'>View</a>
                <form method='POST' action='/cart'>

                    {{ csrf_field() }}

                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <input type="submit" class="btn btn-success btn-lg" value="Add to Cart">
                </form>

            @endif

        </div>
    @endforeach

@endsection
