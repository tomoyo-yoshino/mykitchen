@extends('layouts.app')

@section('content')

    <h1>id = {{ $item->id }} のアイテム詳細ページ</h1>
    
    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $item->id }}</td>
        </tr>
        <tr>
            <th>ItemName</th>
            <td>{{ $item->name }}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{ $item->description }}</td>
        </tr>
    </table>
    
    {!! link_to_route('items.edit', 'このアイテムを編集', ['id' => $item->id], ['class' => 'btn btn-light']) !!}

    {!! Form::model($item, ['route' => ['items.destroy', $item->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    
@endsection