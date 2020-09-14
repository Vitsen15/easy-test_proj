@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="flex-center position-ref full-height">
            <div class="container">
                <div class="row justify-content-center mb-3">
                    @auth
                        <form action="{{ route('add-comment') }}" class="col-8">
                            <div class="form-group">
                                <label for="commentText">Comment</label>
                                <textarea class="form-control" name="comment" id="commentText" rows="4"></textarea>
                                <small id="commentHelp" class="form-text text-muted">No more than 2000 characters</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Comment</button>
                        </form>
                    @endauth
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @foreach ($posts as $post)
                            <div class="card mb-2">
                                <div class="card-header">Commented {{ $post->created_at->diffForHumans() }} by {{ $post->user->name }}</div>

                                <div class="card-body">
                                    {{ $post->text }}
                                </div>
                            </div>
                        @endforeach

                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    @endsection
