<div class="event event--agenda">

	<div class="event__date">
		{{ $event->startDate() }}
	</div>
	<div class="event__overview">
		<div class="event__time">
			{{ $event->startTime() }}
		</div>
		<div class="event__name">
			{{ $event->name }}
		</div>
	</div>
	
</div>
