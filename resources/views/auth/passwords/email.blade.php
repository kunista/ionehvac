@extends('layouts.master')

@section('content')

    <h1>Reset Password</h1>
    <form method="POST" action="{{ route('password.email') }}">

        {{ csrf_field() }}
        <label for="email">E-Mail Address</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
        @include('modules.error-field', ['fieldName' => 'email'])

        <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
    </form>



@endsection
