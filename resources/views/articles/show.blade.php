@extends('layouts.app')
@section('content')
<article class="article-detail">
    <h1 class="article-title">{{ $article->title }}</h1>
    <div class="article-info">{{ $article->created_at }}</div>
    <div class="article-body">{!! nl2br(e($article->body)) !!}</div>
    <div class="article-control">
        <a href="{{ route('articles.index') }}">戻る</a>
        @can('update', $article)
        <a href="{{ route('articles.edit', $article) }}">編集</a>
        @elsecan('delete', $article)
        <form onsubmit="return confirm('本当に削除するの？')" action="{{ route('articles.destroy', $article) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">削除</button>
        </form>
        @endcan
    </div>
</article>
@endsection()