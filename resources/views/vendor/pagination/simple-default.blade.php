@if ($paginator->hasPages())
<div class="pagination">
	@if (!$paginator->onFirstPage())
		<a class="pagination__link pagination__link--left" href="{{ $paginator->previousPageUrl() }}" rel="prev">
			<i class="fa fa-angle-double-left"></i>
		</a> 
	@endif

	@if ($paginator->hasMorePages())
		<a class="pagination__link pagination__link--right" href="{{ $paginator->nextPageUrl() }}" rel="next">
			<i class="fa fa-angle-double-right"></i>
		</a>
	@endif
</div>
@endif
