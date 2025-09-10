@extends('layouts.app')

@section('title', 'Explore')

@section('content')
    <div class="container">
        @forelse($posts as $post)
            <div class="card">
                <div class="card-body">
                    {{ Str::limit($post->body, 50) }}
                    <a href="#" class="btn btn-sm btn-outline-primary">View</a>
                </div>
                <div class="card-footer">
                    {{ $post->created_at->diffForHumans() }}
                </div>
            </div>
        @empty
            <div class="card">
                <div class="card-body">
                    <p class="text-secondary">No Content Available Yet!</p>
                </div>
            </div>
        @endforelse
    </div>
@endsection