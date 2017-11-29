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
            <p>By {{ $product['description'] }}</p>
            <a href='/product/{{ $product['id'] }}'>View</a> |
            <a href='/product/{{ $product['id'] }}/edit'>Edit</a> |
            <a href='/product/{{ $product['id'] }}/delete'>Delete</a>
        </div>
    @endforeach

@endsection
