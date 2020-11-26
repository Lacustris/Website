@extends ('layouts.master')

@section('title')
	{{$event->name()}}
@stop

@section('contents')

<h1>{{ $event->name() }}</h1>
<div class="row event">
	<div class="col-sm-3 col-md-2 event__descriptor">
		{{ __('events.start') }}
	</div>
	<div class="col-sm-9 col-md-10">
		{{ $event->startDate() }} {{ __('events.at') }} {{ $event->startTime() }}
	</div>
</div>
<div class="row">
	<div class="col-sm-3 col-md-2 event__descriptor">
		{{ __('events.end') }}
	</div>
	<div class="col-sm-9 col-md-10">
		{{ $event->endDate() }} {{ __('events.at') }} {{ $event->endTime() }}
	</div>
</div>
@if(isset($event->competition))
<div class="row">
	<div class="col-sm-3 col-md-2 event__descriptor">
		{{ __('events.location') }}
	</div>
	<div class="col-sm-9 col-md-10">
		{{ $event->competition->location }}
	</div>
</div>
<div class="row">
	<div class="col-sm-3 col-md-2 event__descriptor">
		{{ __('competitions.organisation') }}
	</div>
	<div class="col-sm-9 col-md-10">
		{{ $event->competition->organisation }}
	</div>
</div>
<div class="row">
	<div class="col-sm-3 col-md-2 event__descriptor">
		{{ __('competitions.participate') }}
	</div>
	<div class="col-sm-9 col-md-10">
		{!! $event->competition->link() !!}
	</div>
</div>
@endif
@if(Auth::check() && $event->registerable())
<div class="row">
<div class="col-sm-3 col-md-2 event__descriptor">
		{{ __('events.participants') }}
	</div>
	<div class="col-sm-5 col-md-5"{{ count($event->participants) > 0 ? ' data-action=participants data-eventid='.$event->id : '' }}>
		{!! count($event->participants) != 0 ? '<a href="#">' . __( 'events.showParticipants' ) . '</a>' : __( 'events.noParticipants' ) !!}
	</div>
	<div class="col-sm-4 col-md-5">
		<a href="/event/join/{{ $event->id }}">{{ $event->me() ? __( 'events.dontParticipate' ) : __( 'events.participate' ) }}</a>
	</div>
</div>
@endif

<hr>

<p>{!! $event->description() !!}</p>

@include('layouts.dialogs.info')

@endsection
