@extends('layout')

@section('content')
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-5 col-sm-12 col-xs-12"> 
            <div class="card card-create p-3 p-md-4">    
                <h6 class="bold mb-4" id="head1">EDIT TASK in blablabla PROJECT</h6>
                <form>
                	<div class="form-group">
                		<label>Name</label>
                		<input type="text" name="name" class="form-control">
                	</div>
                	<div class="d-flex justify-content-between mt-4">
                		<a href="/" class="btn btn-secondary col-6 col-md-4">Back</a>
                		<button type="submit" class="btn btn-submit text-white btn-sm col-6 col-md-4 p-2 px-0 py-md-2">Ubah</button>
                	</div>
                </form>
           	</div>
        </div>
    </div>
</div>
@endsection