@extends('layout.app')

@section('title', 'Register')


@section('content')
    <form action="{{route('user.register.post')}}" method="POST">
        @csrf
        <input type="text" name="firstName" placeholder="First Name">
        <input type="text" name="lastName" placeholder="Surname">
        <input type="text" name="email" placeholder="Email">
        <input type="text" name="phoneNo" placeholder="Phone Number">
        <input type="password" name="password" placeholder="Password">
        <button>Register</button>
    </form>
@endsection