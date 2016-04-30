@extends('admin::layouts.master')

@section('content-header')
	<h1>
		Requirements Administration ({!! $requirements->count() !!})
		&middot;
		<small>{!! link_to_route('admin.requirement.create', 'Add New') !!}</small>
	</h1>
@stop

@section('content')
	@foreach ($requirements as $article)
	<h3>
		<a class="btn-link" href="{{route('admin.requirement.show',$article->id)}}">
			{{$article->reference_number .' '. $article->title}}
		</a>
	</h3>
	@endforeach
	<div class="text-center">
		{!! pagination_links($requirements) !!}
	</div>
@stop
