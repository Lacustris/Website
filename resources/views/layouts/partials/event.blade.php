<div class="event event--agenda">

	<div class="event__date">
		{{ $event->startDate() }}
	</div>
	<div class="event__overview">
		<div class="event__time">
			{{ $event->startTime() }}
		</div>
		<div class="event__name">
			<a href="/event/{{ $event->id }}">{{ $event->name() }}</a>
		</div>
	</div>
	
</div>
