@extends ('layouts.master')

@section('title')
	{{ __('events.calendarTitle') }}
@stop

@section('contents')

<div class="calendar">
	<div class="calendar__header">
		<div class="calendar__navigation">
			<a href="{{ $previous }}"><i class="fa fa-angle-left"></i> {{ __('events.previousMonth') }}</a>
			<div class="calendar__date">
				{{ $date }}
			</div>
			<a href="{{ $next }}">{{ __('events.nextMonth') }} <i class="fa fa-angle-right"></i></a>
		</div>
		<div class="calendar__week calendar__week--heading">
			<div class="calendar__day calendar__day--heading">{{ __('events.sunday') }}</div>
			<div class="calendar__day calendar__day--heading">{{ __('events.monday') }}</div>
			<div class="calendar__day calendar__day--heading">{{ __('events.tuesday') }}</div>
			<div class="calendar__day calendar__day--heading">{{ __('events.wednesday') }}</div>
			<div class="calendar__day calendar__day--heading">{{ __('events.thursday') }}</div>
			<div class="calendar__day calendar__day--heading">{{ __('events.friday') }}</div>
			<div class="calendar__day calendar__day--heading">{{ __('events.saturday') }}</div>
		</div>
	</div>
	<div class="calendar__body">
		@foreach($weeks as $number => $week)
		<div class="calendar__week">
			@if( isset($lastMonth) && (reset($weeks) == $week) && (count($lastMonth) < 7))
			@foreach($lastMonth as $day => $events)
			<div class="calendar__day calendar__day--previous{{ $day < 1 ? ' calendar__day--empty' : '' }}">
				{{ $day }}<br>
				@if(is_array($events))
				@foreach($events as $event)
				<a href="/event/{{ $event->id }}" class="calendar__event">{{ $event->name }}</a>
				@endforeach
				@endif
			</div>
			@endforeach
			@endif
			@foreach($week as $day => $events)
			<div class="calendar__day{{ $day < 1 ? ' calendar__day--empty' : '' }}">
				{{ $day }}<br>
				@if(is_array($events))
				@foreach($events as $event)
				<a href="/event/{{ $event->id }}" class="calendar__event">{{ $event->name }}</a>
				@endforeach
				@endif
			</div>
			@endforeach
			@if( !isset($weeks[$number+1]) && count($week) < 7 )
			@foreach($nextMonth as $day => $events)
			<div class="calendar__day calendar__day--previous{{ $day < 1 ? ' calendar__day--empty' : '' }}">
				{{ $day }}<br>
				@if(is_array($events))
				@foreach($events as $event)
				<a href="/event/{{ $event->id }}" class="calendar__event">{{ $event->name }}</a>
				@endforeach
				@endif
			</div>
			@endforeach
			@endif
		</div>
		@endforeach
	</div>
</div>
@endsection
