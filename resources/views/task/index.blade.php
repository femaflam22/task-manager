@extends('layout')

@section('content')
<div class="container task mt-5">
    <div class="row d-flex justify-content-center ">
        <div class="col-md-6">
            <div class="card">
                <div class="d-flex justify-content-between mb-3">
                    <a href="/project" class="btn btn-primary new"><i class="fas fa-backward"></i> Back</a>
                    <a href="/task/{{$dataProject['id']}}/create" class="btn btn-primary new"><i class="fa fa-plus"></i> New</a>
                </div>

                <!-- pengambilan pemberitahuan dari with dapat menggunakan session() atau Session::get() -->
                @if(session('addTask'))
                <div class="alert alert-success">
                    {{ session('addTask') }}
                </div>
                @endif

                @if(session('updateTask'))
                <div class="alert alert-success">
                    {{ session('updateTask') }}
                </div>
                @endif

                @if(session('deleteTask'))
                <div class="alert alert-warning">
                    {{ session('deleteTask') }}
                </div>
                @endif

                <div class="input-box">
                    <input type="text" class="form-control">
                    <i class="fa fa-search"></i>                    
                </div>
                
                <!-- karna task datanya banyak jd buat diaksesnya perlu perulangan. nama variable awalnya sama dengan nama compact untuk as nya apaaja untuk mewakilkan per satu baris data -->
                @foreach($dataTask as $task)
                <div class="list border-bottom">
                    <i class="fas fa-thumbtack"></i>
                    <div class="d-flex flex-column ml-3">
                        <!-- jumlah path dinamis menyesuaikan jumlah di route web.php nya. pengisiannya dengan kurawal dua kali -->
                        <a class="text-dark" style="text-decoration: none" href="/task/{{$dataProject['id']}}/edit/{{$task['id']}}">{{ $task['name'] }}</a> 
                        <!-- carbon itu package laravel untuk mengelola hal-hal yang berhubungan dengan date. nantinya format date yg angka diubah ke nama bulan 22 November 2022 -->
                        <small class="text-secondary">created {{ \Carbon\Carbon::parse($task['created_at'])->format('j F Y') }}</small>
                        <!-- buat fitur delete hrs selalu dibungkus pake form dan button type submit -->
                        <form method="POST" action="/task/{{$dataProject['id']}}/delete/{{$task['id']}}">
                            @csrf
                            <!-- menimpa method="post" agar postnya menjadi delete, menyesuaikan dengan method route di web.php nya -->
                            @method('DELETE')
                            <button type="submit" class="btn-outline-none btn" style="font-size: 0.7rem; padding: 0 !important; color: red">Delete</button>
                        </form>
                    </div>                   
                </div>
                @endforeach

          </div>
      </div>
    </div>
</div>
@endsection