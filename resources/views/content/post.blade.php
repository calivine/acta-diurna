<!-- This will insert line breaks in the HTML -->

<p class="post__date">{{ $post_date }} </p>
<p>{!! nl2br(e($post_body)) !!}</p>
