@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">
	<a href="{{route('posts.create')}}" class="btn btn-success">Add Post</a>
</div>

<div class="card card-default">
	<div class="card-header">Posts</div>
	<div class="card-body">
		@if($posts->count() > 0)

		<table class="table">
			<thead>
				<th>Image</th>
				<th>Title</th>
				<th>Category</th>
			</thead>
			<tbody>
				@foreach($posts as $post)
				<tr>
					<td>
						<img src="{{ url('/') }}/public/storage/{{ $post->image }}" width="120px" height="60px" alt="">
					</td>
					<td>
						<a href="{{ $post->slug }}">{{ $post->title }}</a>
					</td>
					<td>
						{{ $post->category->name }}
					</td>
					<td>
					@if($post->trashed())
					<form action="{{ route ('restore-posts', $post->id) }}" method="POST">
						@csrf
						@method('PUT')
					
						<button type="submit" class="btn btn-warning">
						Відновити
						</button>
					</td>
					</form>
					@else
					<td>
						<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info">Редагувати</a>
					</td>
					@endif

					<td>
						<form action="{{ route('posts.destroy', $post->id) }}" method="POST">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-sm btn-danger">
							{{ $post->trashed() ? 'Delete':'Move to trash'}}
							
							</button>
						</form>
						
					</td>
					
				</tr>
				@endforeach
			</tbody>
		</table>
		@else
		<h3 class="text">No Posts Yet</h3>
		@endif
	</div>

@endsection