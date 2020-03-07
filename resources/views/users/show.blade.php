@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
           @include('users.card', ['user' => $user])
         </aside>
         <div class="col-sm-8">
             @include('users.navtabs', ['user' => $user])
             @if (Auth::id() == $user->id)
                 
             @endif
             @if (count($items) > 0)
                 @include('items.items', ['items' => $items]) 
             @endif
         </div>
    </div>
@endsection