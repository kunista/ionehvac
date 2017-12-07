@extends('layouts.master')

@section('title')
    Edit product {{ $product->name }}
@endsection

@section('content')

    <h1>Edit product {{ $product->name }} </h1>

    <form method='POST' action='/product/{{ $product->id }}'>

        {{ method_field('put') }}

        {{ csrf_field() }}

        <div class='details'>* Required fields</div>

        <label for='title'>* Name</label>
        <input type='text' name='name' id='name' value='{{ old('name', $product->name) }}' >
        @include('modules.error-field', ['fieldName' => 'name'])

        <label for='description'>* Description</label>
        <input type='text' name='description' id='description' value='{{ old('description', $product->description) }}'>
        @include('modules.error-field', ['fieldName' => 'description'])

        <label for='price'>* Price ($)</label>
        <input type='text' name='price' id='price' value='{{ old('price', $product->price) }}'>
        @include('modules.error-field', ['fieldName' => 'price'])
        
        <input type='submit' value='Save changes' class='btn btn-primary btn-small'>
    </form>

@endsection
