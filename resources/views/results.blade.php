@extends('layouts.template')

@section('title', 'Pharmacy locations by address and distance')
@section('description', 'Pharmacy locations based on distance from an address')

@section('content')

<h1>Location finder results</h1>
<p>Here are the results matching your query.</p>

@forelse ($results as $result)
<p class="col-xs-12">
  {{ $result->name }}<br />
  {{ $result->address }}<br />
  {{ $result->city }}, {{ $result->state }} {{ $result->zip }}<br />
  Distance: {{ $result->distance }} {{ $distance_name }}
</p>

@empty
<p>no results</p>

@endforelse

@endsection