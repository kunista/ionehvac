
@extends('layouts.master')

@section('title')
    New product
@endsection

@section('content')
    <h1>Add a new product</h1>

    <form method='POST' action='/product'>

        {{ csrf_field() }}

        <div class='details'>* Required fields</div>

        <label for='name'>* Name</label>
        <input type='text' name='name' id='name' value='{{ old('name') }}' required autofocus placeholder="Please enter name of the product">
        @include('modules.error-field', ['fieldName' => 'name'])

        <label for='description'>* Description</label>
        <input type='text' name='description' id='description' value='{{ old('description') }}' required placeholder="Please enter a description">
        @include('modules.error-field', ['fieldName' => 'description'])

        <label for='price'>* Price </label>
        <input type='text' name='price' id='price' value='{{ old('price') }}' required placeholder="Please enter price of the product in $">
        @include('modules.error-field', ['fieldName' => 'price'])

        <input type='submit' value='Add product' class='btn btn-primary btn-small'>
    </form>

    @if(isset($name))
        <div class='confirmation success'>Your product {{ $name }} was added.</a>
    @endif
@endsection
