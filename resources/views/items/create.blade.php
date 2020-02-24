@extends('layouts.app')

@section('content')

    <h1>New Post</h1>
    
    <div class="row">
        <div class="col-6">
            {!! Form::model($item, ['route' => 'items.store']) !!}
            
                <div class="form-group">
                    {!! Form::label('name', 'Item Name:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::text('description', null, ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('POST', ['class' => 'btn btn-primary']) !!}
                
            {!! Form::close() !!}
        </div>
    </div>

@endsection