@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="flex-center position-ref full-height">
            <div class="container">
                <div class="row justify-content-center mb-3">
                    @auth
                        <form class="col-8">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Comment</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows=""></textarea>
                                <small id="emailHelp" class="form-text text-muted">No more than 2000 characters</small>
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
