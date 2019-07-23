@extends('layouts.app')

@section('content')



<div class="card card-default">
	<div class="card-header">
		{{ isset ($tag) ? 'Edit Tag' : 'Create Tag'}}
	</div>
	<div class="card-body">
		@include('partials.errors')
		<form method="POST" action="{{ isset ($tag) ? route('tags.update', $tag->id) : route('tags.store')}}">
			@csrf
			@if(isset ($tag))
			@method('PUT')
			@endif
			<div class="form-group">
				<label for="name" class="">Name</label>
				<input type="text" name="name" class="form-control" value="{{ isset ($tag) ? $tag->name : ''}}">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success">
					{{ isset ($tag) ? 'Edit Tag' : 'Add Tag'}}
				</button>
			</div>
		</form>
		
		<ul class="list-group">
			List of Posts with this Tag
			@foreach($posts as $post)
			<li class="list-group-item"> $tag->posts->name() }}</li>
			@endforeach
		</ul>
		
	</div>
</div>

@endsection