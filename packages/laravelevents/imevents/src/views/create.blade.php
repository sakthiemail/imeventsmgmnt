@extends('layouts.app')

@section('title', '| Add User')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> Add Event</h1>
    <hr>

    {{-- @include ('errors.list') --}}

    {{ Form::open(array('url' => 'imevent/store')) }}

    <div class="form-group">
        {{ Form::label('invitees', 'Event Invitees') }}
        {{ Form::text('title', '', array('class' => 'form-control')) }}
    </div>


    <div class="form-group">
        {{ Form::label('title', 'Event Subject') }}
        {{ Form::text('title', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Event Description') }}
        {{ Form::text('description', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('start_date', 'Event Start Date') }}
        {{ Form::text('start_date', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('end_date', 'Event End Date') }}
        {{ Form::text('end_date', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('location', 'Event Location') }}
        {{ Form::text('Location', '', array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection