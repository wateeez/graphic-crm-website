@extends('layouts.app')

@section('content')
<section class="hero">
    <h1>Welcome to My Graphic Design Portfolio</h1>
    <p>Modern, creative designs for your brand</p>
    <a href="{{ route('portfolio') }}" class="btn">View Portfolio</a>
</section>

<section class="featured-projects">
    <h2>Featured Projects</h2>
    <div class="projects">
        @foreach($projects as $project)
            <div class="project-card">
                <img src="{{ asset('storage/'.$project->image) }}" alt="{{ $project->title }}">
                <h3>{{ $project->title }}</h3>
                <p>{{ $project->description }}</p>
            </div>
        @endforeach
    </div>
</section>
@endsection
