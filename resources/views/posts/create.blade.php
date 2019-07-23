@extends('layouts.app')

@section('content')

<div class="card card-default">
	<div class="card-header">
		{{ isset ($post) ? 'Edit Post' : 'Create Post'}}
	</div>
	<div class="card-body">
		@include('partials.errors')
		<form action="{{ isset ($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST" enctype="multipart/form-data">
			@csrf
			@if(isset($post))
			@method('PUT')
			@endif
			<div class="form-group">
			<label for="Title" >Title</label>
			<input type="text" class="form-control" name="title" value="{{ isset ($post) ? $post->title : ''}}">
			</div>
			<div class="form-group">
			<label for="Description" >Description</label>
			<textarea name="description" id="description" cols="5" rows="5" class="form-control">{{ isset ($post) ? $post->description : ''}}</textarea>
			</div> 

			<!-- <div class="form-group">
			<label for="Content" >Content</label>
			<input id="content" type="hidden" name="content" value="{{ isset ($post) ? $post->content : ''}}">
			<trix-editor input="content"></trix-editor>
			</div> -->
			<a href="admin/gallery" class="mb-2 btn btn-info">Add Media</a>
			<textarea id="summernote" name="content" id="editor">
			{!! isset ($post) ? $post->content : ''!!}
			</textarea>

			<!-- markup
			<textarea id="summernote" id="editor" name="content">{!! isset ($post) ? $post->content : ''!!}</textarea> -->
	

			
			
			<div class="form-group">
			<label for="published_at" >Published at</label>
			<input id="published_at" type="text" class="form-control" name="published_at" value="{{ isset ($post) ? $post->published_at : ''}}">
			</div>

			<!-- <div class="form-group">
					    <label for="files" class="btn btn-info">Add image</label>
					    <input id="files" style="visibility:hidden;" type="file" name="image">
					    </div> -->

			@if(isset($post))
			<div class="form-group">
				<img src="{{ url('/') }}/public/storage/{{ $post->image }}" style="width: 100%">
			</div>

			@endif

		    <div class="form-group">
		    <label for="image">Add image</label>
		    <input type="file" class="form-control" name="image" id="image">
		    </div>

		    <div class="form-group">
		    	<label for="category" class="">Category</label>
		    	<select name="category" id="category" class="form-control">


				@foreach($categories as $category)
					<option value="{{ $category->id }}"
						@if(isset($post))
						@if($category->id === $post->category_id)
						selected
						@endif
						@endif
						>
						{{ $category->name }}
					</option>
				@endforeach
		    	</select>
		    </div>

		    @if($tags->count() > 0) <!-- Якщо тегів більше 0 то тільки тоді показувати -->

		    <div class="form-group">
		    	<label for="tags" class="">Tags</label>
		    	<select name="tags[]" id="tags" class="form-control tags-selector" multiple>
		    	@foreach($tags as $tag)
				<option value="{{ $tag->id }}"
					@if(isset($post))
					@if($post->hasTag($tag->id))
					selected
					@endif
					@endif
					>
					{{ $tag->name }}
				</option>
				@endforeach
		    	</select>				
		    </div>
		    @endif


			

			<div class="form-group">
				<button type="submit" class="btn btn-success">
				{{ isset ($post) ? 'Update Post' : 'Create Post'}} 	
				</button>
			</div>
	
			

			

		</form>

@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.0/trix.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<!-- <link href="{{asset('summernote/summernote.css')}}"> -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.0/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
	flatpickr ('#published_at', {
	enableTime:true
	})

	$(document).ready(function() {
    $('.tags-selector').select2();
	});

</script>


 <!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script> -->
<!--  <script src="{{asset('summernote/summernote.js')}}"></script> -->
 <script type="text/javascript">
 	$(document).ready(function() {
  $('#summernote').summernote();
 });
 </script>


<!-- dependencies (Summernote depends on Bootstrap & jQuery) -->
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
<!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script> -->

<script src="{{asset('summernote/summernote.js')}}"></script>




@endsection