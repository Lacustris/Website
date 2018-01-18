@extends ('layouts.admin')

@section('title')

{{ __( 'admin.competitionAdmin' ) }}

@stop

@section('contents')

<h1>{{ __( 'admin.competitionAdmin' ) }}</h1>

<a href="/admin/competitions/create" class="btn btn-default">{{ __( 'admin.new' ) }}</a>

<div class="admin-group headings">
	<div class="row">
		<div class="col-md-1">
			ID
		</div>

		<div class="col-md-3">
			{{ __( 'admin.competitionTitle' ) }}
		</div>

		<div class="col-md-3">
			{{ __( 'admin.competitionDateTime' ) }}
		</div>

		<div class="col-md-3">
			{{ __( 'admin.competitionOrganisation' ) }} / {{ __('admin.competitionLocation' ) }}
		</div>

		<div class="col-md-2">
			{{ __( 'admin.crud' ) }}
		</div>
	</div>
</div>

@foreach($competitions as $item)

<div class="admin-group">

	@include('admin.competitions.competitionItem', [ 'competition' => $item ])

</div>

@endforeach

@endsection
