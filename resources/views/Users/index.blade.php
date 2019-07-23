@extends('layouts.app')

@section('content')



<div class="card card-default">
	<div class="card-header">Users</div>
	<div class="card-body">
		@if($users->count() > 0)

		<table class="table">
			<thead>
				<th>Image</th>
				<th>Name</th>
				<th>Email</th>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr>
					<td>
						<img src="{{ url('/') }}/public/storage/{{ $user->image }}" width="120px" height="60px" alt="">
					</td>
					<td>
						<a href="#">{{ $user->name }}</a>
					</td>
					<td>
						{{ $user->email }}
					</td>
					<td>
						
						<button class="btn btn-success">Make Admin</button>
						
					</td>
					
					
				</tr>
				@endforeach
			</tbody>
		</table>
		@else
		<h3 class="text">No Users Yet</h3>
		@endif
	</div>

@endsection