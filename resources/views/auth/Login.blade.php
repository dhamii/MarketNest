@extends('layout.app')

@section('title', $pageTitle)

@section('content')

<form action="{{route('user.login.post')}}" method="POST">
    @csrf
    <input type="text" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button>Login</button>

</form>
@endsection