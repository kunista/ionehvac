@extends('layouts.master')

@push('head')
<link href='/css/product/delete.css' rel='stylesheet'>
@endpush

@section('title')
    Delete Product
@endsection

@section('content')

    <h1>Delete product {{ $product->name }} </h1>

    <form method='POST' action='/product/{{ $product->id }}/destroy'>

        {{ method_field('delete') }}

        {{ csrf_field() }}

        <div class="details"> Are you sure you want to delete product {{ $product->name }} ?
        </div>
            <input type='submit' value='Yes' class='btn btn-primary btn-small'>
            <p class='cancel'>
                <a href="/product">Cancel</a>
            </p>
        </div>
    </form>

@endsection
