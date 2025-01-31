@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h2>Article</h2>
                    <div>
                        <a class="btn btn-warning" href="{{ route('articles.edit', $article) }}">Edit</a>
                        <form class="d-inline-block" action="{{ route('articles.destroy', $article) }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger d-inline-block" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('admin.includes.alerts')

                @isset($article->image)<img class="card-img" src="{{ asset('storage/images/' . $article->image) }}" alt="alternative text">@endisset
                <h1>{{ $article->title }}</h1>
                @isset($article->category->name)<p>Category: <span class="badge badge-primary">{{ $article->category->name }}</span></p>@endisset
                @if(count($article->tags) > 0)
                    <p>Tags:
                        @foreach($article->tags as $tag)
                            <span class="badge badge-secondary">{{ $tag->name }}</span>
                        @endforeach
                    </p>
                @endif
                <p>{{ $article->text }}</p>
            </div>
        </div>
    </div>
@endsection
