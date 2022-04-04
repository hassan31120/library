
@if (session('message'))
<div class="alert alert-success">
    <h4>{{ session('message') }}</h4>
</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
