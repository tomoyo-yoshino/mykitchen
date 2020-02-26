<ul class="media-list">
    @foreach ($items as $item)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($item->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $item->user->name, ['id' => $item->user->id]) !!} <span class="text-muted">posted at {{ $item->created_at }}</span>
                </div>
                <div>
                    {{ $item->name }}
                </div>
                <div>
                    {{ $item->description }}
                </div>
                <div>
                    <p class="mb-0">{!! nl2br(e($item->content)) !!}</p>
                </div>
                <div>
                    @if (Auth::id() == $item->user_id)
                        {!! Form::open(['route' => ['items.destroy', $item->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $items->links('pagination::bootstrap-4') }}