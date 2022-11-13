@extends('layout')

@section('content')
<div class="container task mt-5">
    <div class="row d-flex justify-content-center ">
        <div class="col-md-6">
            <div class="card">
                <div class="d-flex justify-content-between mb-3">
                    <a href="/project" class="btn btn-primary new"><i class="fas fa-backward"></i> Back</a>
                    <a href="/task/1/create" class="btn btn-primary new"><i class="fa fa-plus"></i> New</a>
                </div>

                <div class="input-box">
                    <input type="text" class="form-control">
                    <i class="fa fa-search"></i>                    
                </div>
                
                <div class="list border-bottom">
                    <i class="fas fa-thumbtack"></i>
                    <div class="d-flex flex-column ml-3">
                        <a class="text-dark" style="text-decoration: none" href="/task/2/edit/1">Client communication policy</a> 
                        <small>created 12 Jan 2022</small>
                    </div>                   
                </div>
                <div class="list border-bottom">
                    <i class="fas fa-thumbtack"></i>
                    <div class="d-flex flex-column ml-3">
                        <a class="text-dark" style="text-decoration: none" href="/task/2/edit/2">Major activity done</a> 
                        <small>created 12 Jan 2022</small>
                    </div>                   
                </div>
                <div class="list">
                    <i class="fas fa-thumbtack"></i>
                    <div class="d-flex flex-column ml-3">
                        <span>Client communication policy</span> 
                        <small>created 12 Jan 2022</small>
                    </div>                   
                </div>
          </div>
      </div>
    </div>
</div>
@endsection