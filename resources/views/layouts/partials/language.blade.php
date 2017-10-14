@if(\App::getLocale() == 'en')
	<a href="/language/nl">
		<i class="fa fa-language"></i>
		{{ __('general.showDutch') }}
	</a>
@else
	<a href="/language/en">
		<i class="fa fa-language"></i>
		{{ __('general.showEnglish') }}
	</a>
@endif
