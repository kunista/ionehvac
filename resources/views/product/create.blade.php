
@extends('layouts.master')

@section('title')
    New product
@endsection

@section('content')
    <h1>Add a new product</h1>

    <form method='POST' action='/product'>

        {{ csrf_field() }}

        <div class='details'>* Required fields</div>

        <label for='title'>* Name</label>
        <input type='text' name='name' id='name' value='{{ old('name', 'Frigidaire FG7MQ') }}'>
        @include('modules.error-field', ['fieldName' => 'name'])

        <label for='description'>* Description</label>
        <input type='text' name='description' id='description' value='{{ old('description', "By The Frigidaire FG7MQ is an iQ Drive modulating gas furnace which analyzes the temperature every 60 seconds and adjusts itself accordingly. The unit's iQ Drive controller offers fully programmable comfort along with as well as maintenance and troubleshooting diagnostics.") }}'>
        @include('modules.error-field', ['fieldName' => 'description'])

        <label for='price'>* Price </label>
        <input type='text' name='price' id='price' value='{{ old('price', '100') }}'>
        @include('modules.error-field', ['fieldName' => 'price'])

        <input type='submit' value='Add product' class='btn btn-primary btn-small'>
    </form>

    @if(isset($name))
        <div class='confirmation success'>Your product {{ $name }} was added.</a>
    @endif
@endsection
