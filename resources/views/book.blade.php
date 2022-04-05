@if (!empty($book))
@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">Book name</div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{asset('storage/thumbnails/'.$book->image)}}" class="img-responsive img-thumbnail"/>
                </div>
                <!-- /.col-md-12 -->
                <div class="col-md-9 text-center">
                    <h2>{{$book->title}}</h2>
                    <p>{{$book->info}}</p>
                    <br/>
                    Author : {{$book->author}} <br/>
                    <a href="{{asset('storage/books/'.$book->bookfile)}}" class="btn btn-primary">Download</a>
                    <a href="" class="btn btn-info">More info</a>
                </div>
                <!-- /.col-md-9 -->
            </div>
        </div>
    </div>
<hr>
    @include('commentbook')
@endsection
@else
    Error No Book found
@endif
