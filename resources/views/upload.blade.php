@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header text-center">Upload Book</div>
        <div class="card-body">
            @include('partial.alerts')
            <form action="{{ route('upload.save') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group m-3">
                    <input type="text" name="title" id="title" placeholder="Enter Title" class="form-control" />
                </div>
                <div class="form-group m-3">
                    <input type="text" name="author" id="author" placeholder="Enter Author" class="form-control" />
                </div>
                <div class="form-group m-3">
                    <textarea name="info" class="form-control" id="info" placeholder="Some info on Book"></textarea>
                </div>
                <div class="form-group m-3">
                    <select class="form-control" name="category">
                        @if (count($allcategories) > 0)
                            @foreach ($allcategories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group m-3">
                    <label for="image"> Image </label>
                    <input type="file" name="image" id="image" class="form-control" />
                </div>
                <div class="form-group m-3">
                    <label for="book"> Book </label>
                    <input type="file" name="book" id="book" class="form-control" />
                </div>
                <div class="form-group m-3">
                    <button type="submit" name="uplaod" class="btn btn-primary btn-block">Upload Book</button>
                </div>

            </form>
        </div>
    </div>
</div>


@endsection
