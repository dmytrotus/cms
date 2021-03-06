@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
	<a href="{{route('categories.create')}}" class="btn btn-success">Add Category</a>
</div>

<div class="card card-default">
	<div class="card-header">Categories</div><span></span>
	


	<div class="card-body">
		@if($categories->count() > 0)
		<table class="table">
			<thead>
				<th>Name</th>
				<th>Posts count</th>
			</thead>
			<tbody>
				@foreach ($categories as $category)
				<tr>
					<td>
						{{$category->name}}
					</td>
					<td>
						{{ $category->posts->count() }}
					</td>
					<td>
					<a href="{{route('categories.edit', str_slug($category->id, '-') )}}" class="btn btn-info btn-sm">Edit</a>
					<button onclick="handleDelete({{$category->id}} )" class="btn btn-danger btn-sm">Delete</button>
					</td>
				@endforeach
				</tr>
			</tbody>
		</table>
		@else
		<h3 class="text">No Categories Yet</h3>
		@endif
		<form method="POST" action="" id="deleteCategoryForm">
		@csrf
		@method('DELETE')
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