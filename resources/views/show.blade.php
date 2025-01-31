@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                @isset($article)
                    @isset($article->image)<img width="50%" src="{{ asset('storage/images/' . $article->image) }}" alt="alternative text">@endisset
                    <h2>{{ $article->title }}</h2>
                    {{--                <p>created: {{ $article->created_at->format('Y') }}</p>--}}
                    @isset($article->category)
                        <p>Category: <span class="badge badge-secondary">{{ $article->category->name }}</span></p>
                    @endisset
                    @if(count($article->tags) > 0)
                        <p>Tags:
                            @foreach($article->tags->pluck('name') as $name)
                                <span class="badge badge-secondary">{{ $name }}</span>
                            @endforeach
                        </p>
                    @endif
                    <p>{{ $article->text }}</p>
                @else
                    <p>No data from article</p>
                @endisset
            </div>
        </div>
    </div>
@endsection
