@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="flex-center position-ref full-height">
            <div class="container">
                <div class="row justify-content-center mb-3">
                    @auth
                        <form method="POST" action="{{ route('add-comment') }}" class="col-8">
                            @csrf
                            <div class="form-group">
                                <label for="commentText">Comment</label>
                                <textarea class="form-control" name="comment" id="commentText" rows="4"></textarea>
                                <small id="commentHelp" class="form-text text-muted">No more than 1000 characters</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Comment</button>

                            @if (Session::get('message') !== null)
                                <div class="alert alert-success mt-4">
                                    <p>{{ Session::get('message') }}</p>
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger mt-4">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </form>
                    @endauth
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @foreach ($posts as $post)
                            <div class="card mb-2">
                                <div class="card-header">Commented {{ $post->created_at->diffForHumans() }} by
                                    @role('admin')
                                        <a href="{{ route('user-profile', $post->user->id) }}">{{ $post->user->name }}</a>
                                    @else
                                        <span>{{ $post->user->name }}</span>
                                    @endrole

                                    @include('snippets.modal.delete-comment-button')
                                </div>

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
