<ul class="list-unstyled">
    @foreach ($messages as $message)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($message->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $message->user->name, ['id' => $message->user->id]) !!} <span class="text-muted">posted at {{ $message->created_at }}</span>
                </div>
                <div>
                    <p class="mb-0">{!! nl2br(e($message->content)) !!}</p>
                </div>
                <div>
                    @if (Auth::id() == $message->user_id)
                        {!! Form::open(['route' => ['messages.destroy', $message->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $messages->links('pagination::bootstrap-4') }}