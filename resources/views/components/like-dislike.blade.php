<a style="text-decoration: none" href="{{ url('like', ['post_id' => $post->id, 'type' => 'like']) }}"><button
    type="submit" class="btn btn-primary">Like</button></a>
<a style="text-decoration: none" href="{{ url('like', ['post_id' => $post->id, 'type' => 'dislike']) }}"><button
    type="submit" class="btn btn-primary">Dislike</button></a>