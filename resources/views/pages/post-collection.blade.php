@extends('main-template')

@php($hasPosts = count($posts) > 0)

@section('title', 'Список постов')

@section('content')
    <div class="post-collection">
        <div class="container">
            <div class="post-collection-content">
                @if ($hasPosts)
                    <h2 class="post-collection-title">Список постов</h2>

                    <div class="post-collection-items">
                        @foreach ($posts as $post)
                            <div class="post-collection-item-content">
                                <div class="post-collection-item-info">
                                    <div class="post-collection-item-user">
                                        <span class="post-collection-item-username">{{ $post->author }}</span>
                                        <span class="post-collection-item-date">@datetime($post->updated_at)</span>
                                    </div>

                                    <a class="post-collection-item-title" href="{{ route('post.page', $post->id) }}">
                                        <h2>{{ $post->title }}</h2>
                                    </a>

                                    <div class="content">{{ mb_substr($post->content, 0, 300) }}...</div>
                                </div>
                                
                                @if (isset($post->image_url))
                                    <img class="post-collection-item-image" src="{{ asset('/storage/' . $post->image_url) }}" alt="image">
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <h2 class="h2" style="text-align: center">Добавьте постыв новых!</h2>
                @endif
            </div>
        </div>
    </div>
@endsection
