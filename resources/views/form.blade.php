@extends('layouts.template')

@section('title', 'Find a pharmacy location by address')
@section('description', 'Find a location for a pharmacy based on address')

@section('content')

<h1>Location finder</h1>
<p>Please click on the map to find your starting point (a pin will be set), then submit the form to find the locations closest to it.</p>
<p class="text-center"><small>(You can drag the map, or use the scroll wheel to adjust zoom)</small></p>

{!! Form::open(array('url' => 'results')) !!}

{!! Form::geopointField('Starting Point (click on map)', 'lat_lon', null, ['map' => ['center' => [38.9252, -94.4165], 'zoom' => 8], 'layer' => 'bing', 'type' => 'AerialWithLabels']) !!}
{!! Form::selectField('Number of results', 'qty', [5 => 5, 10 => 10, 25 => 25, 50 => 50]) !!}

{!! Form::submitField() !!}
{!! Form::close() !!}
@endsection