@if($paginator->hasPages())
<div class="pagination">

	@if (!$paginator->onFirstPage())
	<a class="pagination__link pagination__link--left" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="{{ __('general.previous') }}">
		<i class="fa fa-angle-double-left" aria-hidden="true"></i>
	</a> 
	@endif

	@foreach($elements as $element)
	@if (is_array($element))
		@foreach ($element as $page => $url)
			@if ($page == $paginator->currentPage())
				<div class="pagination__link pagination__link--number pagination__link--current">
					{{ $page }}
				</div>
			@else
				<a class="pagination__link pagination__link--right" href="{{ $url }}">
					{{ $page }}
				</a>
			@endif
		@endforeach
	@endif
	@endforeach

	@if ($paginator->hasMorePages())
	<a class="pagination__link pagination__link--right" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="{{ __('general.next') }}">
		<i class="fa fa-angle-double-right"></i>
	</a>
	@endif

</div>
@endif
