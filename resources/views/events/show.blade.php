@extends ('layouts.master')

@section('title')
	{{$event->name}}
@stop

@section('contents')

<h1>{{ $event->name }}</h1>
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
<!--<div class="row">
	<div class="col-sm-3 col-md-2 event__descriptor">
		{{ __('events.location') }}
	</div>
	<div class="col-sm-9 col-md-10">
		
	</div>
</div>-->

<hr>

<p>{{ $event->description }}</p>

@endsection