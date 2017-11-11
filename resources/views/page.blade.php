@extends('layouts.master')

@section('title')
{{ $page->title() }}
@stop

@section('contents')

<h1>{{ $page->title() }}</h1>

<section>
{!! $page->contents() !!}
</section>

@endsection
