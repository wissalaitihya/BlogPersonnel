@extends('layouts.app') 

@section('title', 'Dashboard') 

@section('content')

    {{-- page header --}}
    <div>
        <h1>My Articles</h1>

        {{-- button to create new article --}}
        <a href="{{ route('admin.articles.create') }}">
            + New Article
        </a>
    </div>

    {{-- articles table --}}
    <table>

        {{-- table header --}}
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>

        {{-- table body --}}
        <tbody>

            {{-- loop through articles --}}
            @forelse($articles as $article)
                <tr>

                    {{-- title --}}
                    <td>{{ $article->title }}</td>

                    {{-- category --}}
                    <td>{{ $article->category->name }}</td>

                    {{-- status --}}
                    <td>
                        @if($article->status === 'published')
                            Published
                        @else
                            Draft
                        @endif
                    </td>

                    {{-- date --}}
                    <td>
                        {{ $article->created_at->format('d M Y') }}
                    </td>

                    {{-- actions --}}
                    <td>

                        {{-- edit link --}}
                        <a href="{{ route('admin.articles.edit', $article) }}">
                            Edit
                        </a>

                        {{-- delete form --}}
                        <form action="{{ route('admin.articles.destroy', $article) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit">
                                Delete
                            </button>
                        </form>

                    </td>

                </tr>

            @empty
                <tr>
                    <td colspan="5">No articles yet</td>
                </tr>
            @endforelse

        </tbody>

    </table>

@endsection