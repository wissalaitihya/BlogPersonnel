@extends('layouts.app')
@section('title', $article->title)
@section('content')
 {{-- Back link --}}
<a href="{{ route('articles.index') }}">Back to Articles</a>
{{-- Category + Date --}}
<article>
    <div>
        <span>{{ $article->category->name }}</span>
        <span>{{ $article->published_at?->format('d M Y') }}</span>
    </div>
    {{-- Title --}}
    <h1>{{ $article->title }}</h1>
    {{-- Full content --}}
    <div>
        {!! nl2br(e($article->content)) !!}
    </div>
</article>
@endsection