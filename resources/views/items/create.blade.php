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
        
        <div class="col-6">
            <h2>画像登録</h2>
            <form action="{{ url('create') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" class="form-control" name="image_file">
                <hr>
                <button class="btn btn-success">登録</button>
            </form>
        </div>
    </div>

@endsection