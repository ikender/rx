@extends('layouts.template')

@section('title', 'Find a pharmacy location by address')
@section('description', 'Find a location for a pharmacy based on address')

@section('content')

<h1>Location finder</h1>
<p>Please click on the map to find your starting point (a pin will be set), then submit the form to find the locations closest to it.</p>
<p class="text-center"><small>(You can drag the map, or use the scroll wheel to adjust zoom)</small></p>

{!! Form::open(array('url' => 'results', 'method' => 'get')) !!}

{!! Form::geopointField('Starting Point (click on map)', 'lat_lon', null, ['map' => ['center' => [38.9252, -94.4165], 'zoom' => 8], 'layer' => 'bing', 'type' => 'AerialWithLabels']) !!}
{!! Form::selectField('Number of results', 'qty', $limit) !!}
<div class="col-sm-7 col-xs-6 col-sm-push-1">{!! Form::selectField('Distance', 'distance', $radii) !!}</div>
<div class="col-sm-4 col-xs-6">{!! Form::selectField('&nbsp;', 'distance_units', $distance_units) !!}</div>


{!! Form::submitField() !!}
{!! Form::close() !!}
@endsection