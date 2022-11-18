@extends('layout')

@section('content')
<div class="container">
	<div class="row d-flex justify-content-center mt-5 ">
		<div class="col-md-8">
			<div class="card">
				<div class="d-flex justify-content-between align-items-center">
					<span class="font-weight-bold">My Projects</span>
					<div class="d-flex flex-row">
                        <a href="{{route('project.create')}}" class="btn btn-primary new"><i class="fa fa-plus"></i> New</a>
                    </div>
                </div>

                <div class="mt-3 inputs">
                    <i class="fa fa-search"></i>
                    <div class="d-flex">
                    	<input type="text" class="form-control " placeholder="Search Project...">
                    	<button class="btn btn-outline-none text-success py-0" style="padding-top: 0 !important;">Cari</button>
                    </div>
                </div>
				{{-- pesan berhasil tambah data --}}
				@if (session('success'))
					<div class="alert alert-success">
						{{ session('success') }}
					</div>
				@endif
				{{-- pesan berhasil ubah data --}}
				@if (session('success_edit'))
					<div class="alert alert-info">
						{{ session('success_edit') }}
					</div>
				@endif
				{{-- pesan berhasil ubah data --}}
				@if (session('deleted'))
					<div class="alert alert-danger">
						{{ session('deleted') }}
					</div>
				@endif

				@foreach ($projects as $project)
					<div class="mt-3">
						<div class="d-flex justify-content-between align-items-center">
							<div class="d-flex flex-row align-items-center">
								<span class="star"><i class="fa fa-star yellow"></i></span>
								<div class="d-flex flex-column">
									<a href="/task/1" class="text-dark" style="text-decoration: none">{{$project['name']}}</a>
									<div class="d-flex flex-row align-items-center time-text">
										<small>created {{$project['created_at']->format('j F, Y')}}</small>
										<span class="dots"></span>
										<small>5 tasks</small>
										<span class="dots"></span>
										{{-- {{route('project.edit', $project['id'])}} --}}
										<small><a href="/project/edit/{{$project['id']}}" style="text-decoration: underline;">Edit</a></small>
										<span class="dots"></span>
										<form action="{{route('project.destroy', $project['id'])}}" method="POST">
											@method('DELETE')
											@csrf
											<button type="submit" class="btn-outline-none btn" style="font-size: 0.7rem; padding: 0 !important; color: red">Hapus</button>
										</form>
									</div>
								</div>
							</div>
							<span class="content-text-1">{{$no++}}</span>
						</div>
					</div>
				@endforeach

               	{{-- <div class="mt-3">
               		<div class="d-flex justify-content-between align-items-center">
               			<div class="d-flex flex-row align-items-center">
               				<span class="star"><i class="fa fa-square blue"></i></span>
               				<div class="d-flex flex-column">
               					<a href="/task/2" class="text-dark" style="text-decoration: none">Developing</a>
               					<div class="d-flex flex-row align-items-center time-text">
               						<small>created 5 Jan 2022</small>
                  					<span class="dots"></span>
                  					<small>2 tasks</small>
                  					<span class="dots"></span>
                  					<small><a href="/project/edit/1" style="text-decoration: underline;">Edit</a></small>
                           		</div>
                           	</div>
                        </div>
                        <span class="content-text-2">2</span>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection