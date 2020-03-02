@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-sm-4">
               @include('users.card', ['user' => Auth::user()] )
            </aside>
            <div class="col-sm-8">
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
                    
                    <img src="{{ asset('/storage/img/'.$item->file_name) }}">
                    
                    
                    @if (count($items) > 0)
                        @include('items.items', ['items' => $items])
                    @endif
            </div>
        </div>
   @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>MyKitchen</h1>
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection