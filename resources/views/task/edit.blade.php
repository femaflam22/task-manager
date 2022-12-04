@extends('layout')

@section('content')
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-5 col-sm-12 col-xs-12"> 
            <div class="card card-create p-3 p-md-4">    
                <h6 class="bold mb-4" id="head1">EDIT TASK in {{$dataProject['name']}} PROJECT</h6>
                <form method="POST" action="/task/{{$dataProject['id']}}/update/{{$task['id']}}">
                    @csrf
                    <!-- karena method di tag form cuman bisa get/post. buat timpa method="post" dari tag form pake @method('PATCH') kenapa patch karena di web.php routenya pake patch buat update data -->
                    @method('PATCH')
                	<div class="form-group">
                		<label>Name</label>
                        <!-- value fungsinya untuk menampilkan/mengisi inputnya. kenapa diisi dari task? karena kan ini edit, jd harus ditampilin data lamanya dulu kan, dan data lama nya itu ada di variable task compactnya -->
                		<input type="text" name="name" class="form-control" value="{{$task['name']}}">
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