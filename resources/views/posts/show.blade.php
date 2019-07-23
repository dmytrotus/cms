@extends('layouts.app')

@section('content')

<div class="card card-default">
	<div class="card-header">
		Show Post
	</div>
	<div class="card-body">
		@include('partials.errors')
			</ul>
		</div>
		
			
			<div class="form-group">
			<label for="Title" >Title</label>
			
			<li class="list-group-item">
            {{$post->title}}
            </li>
			</div>
			<div class="form-group">
			<label for="Description" >Description</label>
			<li class="list-group-item">
			{/{$post->description}}
			</li>
			</div> 

			<div class="form-group">
			<label for="Content" >Content</label>
			<li class="list-group-item">
			{/{$post->content}}
			</li>
			<trix-editor input="content"></trix-editor>
			</div> 
			
			
			<!-- <div class="form-group">
					    <label for="files" class="btn btn-info">Add image</label>
					    <input id="files" style="visibility:hidden;" type="file" name="image">
					    </div> -->

			
			<div class="form-group">
				<img src="{{ url('/') }}/public/storage/{/{ $post->image }}" style="width: 100%">
			</div>

			

		    <div class="form-group">
		    <label for="image">Add image</label>
		    <input type="file" class="form-control" name="image" id="image">
		    </div>


			

			
	
			

			

		

@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.0/trix.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.0/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
	flatpickr ('#published_at', {
	enableTime:true
	})
</script>
@endsection