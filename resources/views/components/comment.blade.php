@foreach ($post->comments as $comment)
    <div class="container border mt-5">
        <h4>{{ $comment->user->name }}</h4>
        <textarea disabled rows="3" cols="10" style="width: 100%">{{ $comment->body }}</textarea>
        <a href="/deletecomment/{{ $comment->id }}" class="btn btn-danger">Delete</a>
    </div>
@endforeach