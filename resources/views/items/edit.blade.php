@extends('layouts.app')

@section('content')

    <h1>id: {{ $item->id }} のItem編集ページ</h1>
    
    <div class="row">
        <div class="col-6">
            {!! Form::model($item, ['route' => ['items.update', $item->id], 'method' => 'put']) !!}
        
                <div class="form-group">
                    {!! Form::label('name', 'ItemName:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::text('description', null, ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                
            {!! Form::close() !!}
        
        </div>
    </div>

@endsection