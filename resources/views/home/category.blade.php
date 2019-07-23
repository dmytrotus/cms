@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <a href="/categories" class="btn btn-info">Categories</a>
                <div class="card-header">Add name</div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="store-name">
                        @CSRF
                    <input type="text" placeholder="Name" class="form-control">
                    <button class="btn btn-success mt-3">Save Category to The Database</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
