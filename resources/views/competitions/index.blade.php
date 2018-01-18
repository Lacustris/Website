@extends('layouts.master')

@section('title')
{{ __('competitions.pageTitle') }}
@stop

@section('contents')
<table>
	<thead>
		<tr>
			<th>{{ __('competitions.date' ) }}</th>
			<th>{{ __('competitions.competition' ) }}</th>
			<th>{{ __('competitions.location' ) }}</th>
			<th>{{ __('competitions.organisation' ) }}</th>
			<th>{{ __('competitions.participate' ) }}</th>
		</tr>
	</thead>
	@foreach($competitions as $competition)
	<tr>
		<td>{{ $competition->event->startDate(true) }}</td>
		<td>{{ $competition->event->name }}</td>
		<td>{{ $competition->location }}</td>
		<td>{{ $competition->organisation }}</td>
		<td>{!! $competition->link() !!}</td>
	</tr>
	@endforeach
</table>
@endsection
