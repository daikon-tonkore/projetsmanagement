@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('users.card', ['user' => $user])
        </aside>
        <div class="col-sm-8">
            @include('users.navtabs', ['user' => $user])
            @if (Auth::id() == $user->id)
            
                {!! Form::open(['route' => 'upload', 'method' => 'post','files' => true]) !!}
                    <div class="form-group">
                        {!! Form::label('file', '画像投稿', ['class' => 'control-label']) !!}
                        {!! Form::file('file') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                        {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                    </div>
                {!! Form::close() !!}
                
            @endif
            @if (count($messages) > 0)
                @include('messages.messages', ['messages' => $messages])
            @endif
        </div>
    </div>
@endsection