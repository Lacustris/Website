@if($pages > 1)
<div class="pagination">
	@if($page > 1)
	<div class="pagination__link pagination__link--left" data-target-page="{{ $page - 1 }}" data-action="pagination">
		<i class="fa fa-angle-double-left"></i>
	</div>
	@if($page > 2) 
	<div class="pagination__link pagination__link--number" data-target-page="{{ $page - 2 }}" data-action="pagination">
		{{ $page - 2}}
	</div>
	@endif
	<div class="pagination__link pagination__link--number" data-target-page="{{ $page - 1 }}" data-action="pagination">
		{{ $page - 1 }}
	</div>
	@endif
	<div class="pagination__link pagination__link--number pagination__link--current" data-target-page="{{ $page }}" data-action="pagination">
		{{ $page }}
	</div>
	@if($page < $pages)
	<div class="pagination__link pagination__link--number" data-target-page="{{ $page + 1 }}" data-action="pagination">
		{{ $page + 1 }}
	</div>
	@endif
	@if($page < $pages - 1)
	<div class="pagination__link pagination__link--number" data-target-page="{{ $page + 2 }}" data-action="pagination">
		{{ $page + 2 }}
	</div>
	@endif
	@if($page != $pages)
	<div class="pagination__link pagination__link--right" data-target-page="{{ $page + 1 }}" data-action="pagination">
		<i class="fa fa-angle-double-right"></i>
	</div>
	@endif
</div>
@endif
