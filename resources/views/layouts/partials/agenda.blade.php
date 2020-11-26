@if(count($events) > 0)

@foreach($events as $event)
@include('layouts.partials.event', [ 'event' => $event ] )
@endforeach

@else

{{ __( 'events.noUpcoming' ) }}

@endif

<hr>

<a href="/calendar">{{ __( 'events.viewCal' ) }}</a>
