@extends('layouts.app')

@section('content')

    <h1 class="mt-4 pb-4 border-bottom">新規タスク作成ページ</h1>
    
        {!! Form::model($task, ['route' => 'tasks.store']) !!} 
        
            <div class="form-group form-inline row">
                <div class="mt-4 col-1">
                    <strong> No.</strong>
                </div>
                <div class="mt-4 col-2 border-bottom border-dark">
                    <p>{{ $task->id }}</p>
                </div>
                <div class="mt-4 ml-10 col-2">
                    <strong>{!! Form::label('phase', 'Phase') !!}</strong>
                </div>
                <div class="mt-4 col-3">
                    @php
                        $phase_name_loop = [
                            ''      => '選択してください' ,
                            '公務員' => '公務員' ,
                            '医師'   => '医師' ,
                            '弁護士' => '弁護士' ,
                        ];
                    @endphp
                    {{ Form::select('phase', $phase_name_loop, old('phase'), ['class' => 'my_class']) }}
                </div>
                <div class="mt-4 col-1">
                    <strong> Date</strong>
                </div>
                <div class="mt-4 col-sm-2 border-bottom border-dark">
                    <p>作成日を自動記載</p>
                </div>
            </div>
            
            <div class="form-group row">
                <div class="mt-4 col-sm-8">
                    <strong>{!! Form::label('ccompany_name', 'Company Name') !!}</strong>
                    {!! Form::text('company_name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="mt-4 col-sm-4">
                    <strong>{!! Form::label('area', 'Area') !!}</strong>
                    {!! Form::text('area', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            
            <div class="form-group row">
                <div class="mt-4 col-sm-4">
                    <strong>{!! Form::label('received_date', 'Received Date') !!}</strong>
                    {!! Form::text('received_date', null, ['class' => 'form-control']) !!}
                </div>
                <div class="mt-4 col-sm-4">
                    <strong>{!! Form::label('due_date', 'Due Date') !!}</strong>
                    {!! Form::text('due_date', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group row">
                <div class="mt-4 col-sm-8">
                    <strong>{!! Form::label('category', 'Category') !!}</strong>
                    {!! Form::text('category', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            
            <div class="form-group row">
                <div class="mt-4 col-sm-10">
                    <strong>{!! Form::label('status', 'Status') !!}</strong>
                    {!! Form::textarea('status', null, ['class' => 'form-control', 'rows' => '4']) !!}
                </div>
            </div>
            
            <div class="form-group row">
                <div class="mt-4 col-sm-4">
                    <strong>{!! Form::label('status_person_in_charge', 'PIC') !!}</strong>
                    {!! Form::text('status_person_in_charge', null, ['class' => 'form-control']) !!}
                </div>
                <div class="mt-4 col-sm-4">
                    <strong>{!! Form::label('status_date', 'Current Date') !!}</strong>
                    {!! Form::text('status_date', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            
            <div class="form-group row">
                <div class="mt-4 col-sm-10">
                    <strong>{!! Form::label('next', 'Next') !!}</strong>
                    {!! Form::textarea('next', null, ['class' => 'form-control', 'rows' => '4']) !!}
                </div>
            </div>
            
            <div class="form-group row">
                <div class="mt-4 col-sm-4">
                    <strong>{!! Form::label('next_person_in_charge', 'PIC') !!}</strong>
                    {!! Form::text('next_person_in_charge', null, ['class' => 'form-control']) !!}
                </div>
                <div class="mt-4 col-sm-4">
                    <strong>{!! Form::label('next_date', 'Next Date') !!}</strong>
                    {!! Form::text('next_date', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            
            <div class="mt-4 mb-4">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>
            
        {!! Form::close() !!}

@endsection