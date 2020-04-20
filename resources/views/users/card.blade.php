<div class="card">
    <div class="card-body">
        <img class="rounded img-fluid" src="{{ Gravatar::src($user->email, 500) }}" alt="">
    </div>
    <div class="card-header">
        <h3 class="card-title">{{ $user->name }}</h3>
    </div>
    {!! link_to_route('users.edit', 'User Edit', ['id' => $user->id], ['class' => 'btn btn-primary btn-sm']) !!}
</div>
@include('user_follow.follow_button', ['user' => $user])