@extends('layout')

@section('title', 'District List')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Dsitrict List
            </div>
            <div><a href="{{url('/new')}}">
                    <button>New District</button>
                </a></div>
            @if (\Session::has('msg'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('msg') !!}</li>
                    </ul>
                </div>
            @endif
            {{--        {{ Form::open(array('url' => '','method' => 'get)) }}--}}
            {{--        <table>--}}
            {{--            <tr>--}}
            {{--                <td>Search</td>--}}
            {{--                <td>{{ Form::text('search', $search,  array('class' => 'form-control'))}}</td>--}}
            {{--                <td>{{ Form::submit('Filter!', array('class' => 'btn btn-primary')) }}</td>--}}
            {{--            </tr>--}}
            {{--        </table>--}}
            {{--        {{ Form::close() }}--}}
            <table class="table  table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">@sortablelink('name')</th>
                    <th scope="col">@sortablelink('town_name')</th>
                    <th scope="col">@sortablelink('population')</th>
                    <th scope="col">@sortablelink('surface') km^2</th>
                    <th>action</th>
                </tr>
                </thead>
                @if(count($districts))
                    @foreach($districts as $district)
                        <tr>
                            <td scope="row">{{$district['name']}}</td>
                            <td>{{$district['town_name']}}</td>
                            <td>{{$district['population']}}</td>
                            <td>{{$district['surface']}}</td>
                            <td><a href="/{{$district['id']}}">Edit</a> , <a
                                        href="/delete/{{$district['id']}}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </div>
@stop
