@extends('layouts.app')

@section('content')

    <h1>ITEMS</h1>
    
    @if (count($items) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ItemID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{!! link_to_route('items.show', $item->id, ['id' => $item->id]) !!}</td>
                    <td>{{ $item->content }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
    {{ $items->links('pagination::bootstrap-4') }}
    
    {!! link_to_route('items.create', '新規アイテムの投稿', [], ['class' => 'btn btn-primary']) !!}

@endsection