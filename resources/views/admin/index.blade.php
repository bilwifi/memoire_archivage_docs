@extends('layouts.master')
@section('content')
<div class="card bg-transparent" style=" margin-top: 10%;">
  {{-- <div class="card-header">
    Quote
  </div> --}}

  <div class="card-body">
    <div class="row">
    	<div class="col-sm-4">
    		<div class="card text-center text-white bg-primary mb-3" style="max-width: 18rem;">
			  {{-- <div class="card-header">Header</div> --}}
			  <div class="card-body">
			    <button type="button" class="addModal btn btn-primary" data-toggle="modal" data-target="#exampleModal" >
			    	<h5 class="card-title " ><i class="fas fa-plus-circle fa-2x"></i></h5>
			    	<h5 class="card-text">NOUVEAU DOCUMENT</h5>
			    </button>
			  </div>
			</div>
    	</div>
    	<div class="col-sm-4">
    		<div class="card text-center text-white bg-primary mb-3" style="max-width: 18rem;">
			  {{-- <div class="card-header">Header</div> --}}
			  <div class="card-body">
			    <a href="{{ route('admin.show_document') }}" class="btn btn-primary">
			    	<h5 class="card-title " ><i class=" fas fa-archive fa-2x"></i></h5>
			    	<h5 class="card-text">ARCHIVES DOCUMENTS</h5>
			    </a>
			  </div>
			</div>
    	</div>
    	<div class="col-sm-4">
    		<div class="card text-center text-white bg-primary mb-3" style="max-width: 18rem;">
			  {{-- <div class="card-header">Header</div> --}}
			  <div class="card-body">
			    <a href="{{ route('admin.show_agents') }}" class="btn btn-primary">
			    	<h5 class="card-title " ><i class=" fas fa-user fa-2x"></i></h5>
			    	<h5 class="card-text">AGENTS</h5>
			    </a>
			  </div>
			</div>
    	</div>
    	
    </div>
  </div>

</div>
@include('partials.includes.formulaires._add_document_modal')

@endsection