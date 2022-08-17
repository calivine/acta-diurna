<!-- This will insert line breaks in the HTML -->
<article>
    <p class="post-date">{{ date_to_string($post_date) }} </p>
    <p>{!! nl2br(e($post_body)) !!}</p>
</article>

