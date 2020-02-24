@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
           @include('users.card', ['user' => $user])
         </aside>
         <div class="col-sm-8">
             @include('users.navtabs', ['user' => $user])
             @if (Auth::id() == $user->id)
                 {!! Form::open(['route' => 'items.store']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Item Name:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                
                    <div class="form-group">
                        {!! Form::label('description', 'Description') !!}
                        {!! Form::text('description', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                         {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                    </div>
                 {!! Form::close() !!}
             @endif
             @if (count($items) > 0)
                 @include('items.items', ['items' => $items]) 
             @endif
         </div>
    </div>
@endsection