<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>District List</title>

</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Dsitrict Edit
        </div>
        {{ Form::open(array('url' => '/update/'.$district['id'])) }}

        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', $district['name'], array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('town_name', 'Town name') }}
            {{ Form::text('town_name', $district['town_name'],  array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('population', 'Population') }}
            {{ Form::number('population', $district['population'], array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('surface', 'Surface') }}
            {{ Form::number('surface', $district['surface'] ,array('class' => 'form-control', 'step' => '0.0001')) }}
        </div>

        {{ Form::submit('Update district!', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
    </div>
</div>
</body>