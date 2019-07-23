@extends('categories.allcats-layout')

@section('content')


<div class="card card-default">
	<div class="card-header">Posts for Category {{$category->name}}</div><span></span>
	


	<div class="card-body">
		@if($posts->count() > 0)

		<table class="table">
			<thead>
				<th>Image</th>
				<th>Title</th>
				
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
	{{ $posts->links() }}
		
		<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span id="textModal"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-primary">Yes</button>
      </div>
    </div>
  </div>
</div>
<!-- //Modal -->	
		</form>

	</div>
</div>

@endsection

@section('scripts')


	<script type="text/javascript">
		function handleDelete(id){
		var form = document.getElementById('deleteCategoryForm')
		form.action = '/categories/' + id
			//console.log ('видал',id);
		$('#deleteModal').modal('show')
		console.log (form)

		$('span#textModal').text(name)
		}

	</script>


@endsection