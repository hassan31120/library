@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div>

    <div class="card">
        <div class="card-header">

            <h3 class="text-center">Add new category</h3>

            <a href="{{route('categories.index')}}" class="btn btn-primary float-right">All Categories </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @include('partial.alerts')

            <form action="{{route('categories.store')}}" method="post">
                @csrf

                <div class="form-group">
                    <input type="text" name="name" id="name" class="form-control" placeholder="enter category name">
                </div>
                <div class="form-group">
                    <input type="submit" name="add" value="add category" class="btn btn-primary btn-block"></button>
                </div>

            </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->


</div>
@endsection
