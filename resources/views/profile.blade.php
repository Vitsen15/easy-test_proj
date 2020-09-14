@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card align-self-start">
                <div class="card-header">
                    User info
                </div>
                <div class="card-body">
                    <p class="card-text">Name: {{ auth()->user()->name }}</p>
                    <p class="card-text">Email: {{ auth()->user()->email }}</p>
                    <p class="card-text">Registration date: {{ auth()->user()->created_at->format('Y-m-d') }}</p>
                </div>
            </div>

            <div class="col-md-8">
                <h1 class="mb-3">User comments:</h1>
                @foreach ($posts as $post)
                    <div class="card mb-2">
                        <div class="card-header">Commented {{ $post->created_at->diffForHumans() }}</div>

                        <div class="card-body">
                            {{ $post->text }}
                        </div>
                    </div>
                @endforeach

                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
