@extends('layout')

@section('title', 'New District')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Dsitrict Edit
            </div>
            {{ Form::open(array('url' => '/store')) }}

            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('town_name', 'Town name') }}
                {{ Form::text('town_name', null,  array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('population', 'Population') }}
                {{ Form::number('population', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('surface', 'Surface') }}
                {{ Form::number('surface', null ,array('class' => 'form-control', 'step' => '0.0001')) }}
            </div>

            {{ Form::submit('Create district!', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
        </div>
    </div>
@stop