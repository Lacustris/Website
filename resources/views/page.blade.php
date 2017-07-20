@extends('layouts.master')

@section('contents')

<h1>{{ $page->title() }}</h1>

<section>
{!! $page->contents() !!}
</section>

@endsection
