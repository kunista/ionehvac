@extends('layouts.master')

@section('title')
    Delete Product
@endsection

@section('content')

    <h1>Delete product {{ $product->name }} </h1>

    <form method='POST' action='/product/{{ $product->id }}/destroy'>

        {{ method_field('delete') }}

        {{ csrf_field() }}

        <div class="confirmation"> Are you sure you want to delete product {{ $product->name }} ?
        </div>
            <input type='submit' value='Yes' class='btn btn-primary btn-small'>
            <a class="btn btn-default btn-close" href="/product">Cancel</a>
        </div>
    </form>

@endsection
