@extends('categories.allcats-layout')

@section('content')


<div class="card card-default">
	<div class="card-header">Categories</div><span></span>
	


	<div class="card-body">
		
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