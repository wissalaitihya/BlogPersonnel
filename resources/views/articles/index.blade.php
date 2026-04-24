@extends('layouts.app')
@section('title','Home')
@section('content')
<div>
  <h1>
  @isset($category)
    Articles in: {{ $category->name }}
  @else
    Latest Articles
  @endisset
  </h1>
</div>

<div>
    <a href="{{ route('articles.index') }}">All</a>
    @foreach(\App\Models\Category::all() as $cat)
        <a href="{{ route('articles.index', ['category' => $cat->slug]) }}">
            {{ $cat->name }}
        </a>
    @endforeach
</div>
@forelse($articles as $article)
<div>
    <p>{{ $article->category->name }}</p>
    <h2>
        <a href="{{ route('articles.show', $article) }}">
            {{ $article->title }}
        </a>
    </h2>
    <p>
    {{ $article->excerpt ?? \Str::limit($article->content, 200) }}
</p>
<p> {{ $article->published_at?->format('d M Y') }}</p>
<a href="{{ route('articles.show', $article) }}">Read More</a>
</div>
@empty
<p>No articles found</p>
@endforelse
@endsection