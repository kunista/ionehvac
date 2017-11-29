@extends('layouts.master')

@push('head')
<link href='/css/product/show.css' rel='stylesheet'>
@endpush

@section('title')
    {{ $product->name }}
@endsection

@section('content')

    <h2>{{ $product['name'] }}</h2>
    <p> {{ $product['description'] }}</p>
    <p>Price: ${{ $product['price'] }}</p>
    <a href='/product/{{ $product['id'] }}/edit'>Edit</a> |
    <a href='/product/{{ $product['id'] }}/delete'>Delete</a>

@endsection
