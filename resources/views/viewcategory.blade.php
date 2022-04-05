@extends('layouts.app')
 @section('content')
 <div class="card">
 <div class="card-header ">{{$category->name}}</div>
 <div class="card-body">
   @if (count($books) > 0)
      @foreach($books as $book)
        <div class="row">
           <div class="col-md-3">
              <img src="{{asset('storage/thumbnails/'.$book->image)}}" class="img-responsive img-thumbnail"/>
            </div>
            <div class="col-md-9 text-center">
               <h2>{{$book->title}}</h2>
               <p>{{$book->info}}</p>
               <br/>
               Author : {{$book->author}} <br/>
                <a href="{{asset('storage/books/'.$book->bookfile)}}" class="btn btn-primary">Download</a>
                <a href="{{route('book',$book->id)}}" class="btn btn-info">More Info</a>
            </div>
        </div>
        <hr>
       @endforeach
    @endif
 </div>
 </div>
 @endsection
