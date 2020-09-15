@can('delete posts')
    <a href="#" data-href="{{ route('drop-comment', $post->id) }}" data-comment-id="{{ $post->id }}" type="button"
        class="close trigger-delete" aria-label="Close" data-toggle="modal" data-target="#deleteCommentModal">
        <span aria-hidden="true">&times;</span>
    </a>
@endcan
