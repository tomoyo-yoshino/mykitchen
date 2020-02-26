@extends('layouts.app')

@section('content')

    <h1>Users</h1>
    @include('users.users', ['users' => $users])
@endsection