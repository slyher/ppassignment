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
            Dsitrict List
        </div>
        @if (\Session::has('msg'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('msg') !!}</li>
                </ul>
            </div>
        @endif
        <table>
            <tr>
                <th>@sortablelink('name')</th>
                <th>@sortablelink('town_name')</th>
                <th>@sortablelink('population')</th>
                <th>@sortablelink('surface') km^2</th>
                <th>action</th>
            </tr>
            @if(count($districts))
                @foreach($districts as $district)
                    <tr>
                        <td>{{$district['name']}}</td>
                        <td>{{$district['town_name']}}</td>
                        <td>{{$district['population']}}</td>
                        <td>{{$district['surface']}}</td>
                        <td><a href="/{{$district['id']}}">Edit</a> , <a href="/delete/{{$district['id']}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>
</div>
</body>
</html>
