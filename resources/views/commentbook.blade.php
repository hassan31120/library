<div class="card">
    <div class="card-header text-center">Comments</div>
    <div class="card-body">
        @include('partial.alerts')
        <form action="{{ route('comment', $book->id) }}" method="post">
            @csrf
            <div class="form-group m-3">
                <textarea class="form-control" name="comment" placeholder="Enter Your Comment Here"></textarea>
            </div>
            <div class="form-group m-3">
                <button type="submit" name="addcomment" class="btn btn-primary">Add Comment</button>
            </div>
        </form>
        <hr>
        @if (!empty($book->comments))
            @foreach ($book->comments as $comment)
                <div class="row">
                    <h3>{{ $comment->user->name }}</h3>
                    <span class="text-muted">{{ $comment->created_at->diffForHumans() }}</span>
                    <p>{{ $comment->comment }}</p>
                    <hr>
                </div>
            @endforeach
        @endif
    </div>
</div>
