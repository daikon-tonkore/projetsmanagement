@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('users.card', ['user' => $user])
        </aside>
        <div class="col-sm-8">
            @include('users.navtabs', ['user' => $user])
            {!! link_to_route('tasks.create', 'New Task', [], ['class' => 'btn btn-primary btn-sm']) !!}

            <div class="mt-4 row">
                <div class="col-12">
                    @foreach ($tasks as $task)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Company Name</th>
                                    <th>Due Date</th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $task->id }}</td>
                                    <td>{{ $task->company_name }}</td>
                                    <td>{{ $task->due_date }}</td>
                                </tr>
                            </tbody>
                        </table>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection