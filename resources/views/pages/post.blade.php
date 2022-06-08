@extends('main-template')

@section('title', $post->title)

@section('content')
    <div class="post">
        <div class="container">
            <div class="post-content">
                <div class="post-header">
                    <div class="post-header-info">
                        <div class="post-info">
                            <span class="post-username">{{ $post->author }}</span>
                            <span class="post-date">@datetime($post->updated_at)</span>
                        </div>
                        
                        <h1 class="post-title">{{ $post->title }}</h1>
                    </div>

                    <div class="post-header-buttons">
                        <a class="post-button" href="{{ route('post.edit', $post->id) }}">
                            <img class="post-button-image" src="/icons/edit.png" alt="edit">
                        </a>

                        <a class="post-button" href="{{ route('post.delete', $post->id) }}">
                            <img class="post-button-image" src="/icons/trash-bin.png" alt="edit">
                        </a>
                    </div>
                </div>

                @if (isset($post->image_url))
                    <img class="post-image" src="{{ asset('/storage/' . $post->image_url) }}" alt="image">
                @endif

                <div class="post-context">{{ $post->content }}</div>

                <hr>

                <form class="form" action="{{ route('comment.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <p class="h2 edit-title">Добавить комментарии:</p>

                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                
                    <div class="form-input-group">
                        <label for="author">Наш имя</label>
                        <input class="form-input" name="author" id="author" type="text" value="" placeholder="Наш имя" required>
                
                        @error('author')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>
                
                    <div class="form-input-group form-input-file">
                        <label for="image_url">Прикрепите файл</label>
                        <input type="file" name="image_url" id="image_url" accept=".jpg, .jpeg, .png">
                    </div>
                
                    <div class="form-input-group">
                        <label for="content">Комментарии</label>
                        <input class="form-input" name="content" id="content" type="text" value="" placeholder="Комментарии" required>
                
                        @error('content')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>
                
                    <div class="form-input-group">
                        <input class="form-input-submit" type="submit" value="Отправить">
                    </div>
                </form>

                @if ($comments['has'])
                    <hr>

                    <div class="post-comments">
                        <p class="post-comment-title h2">Комментарии:</p>

                        <div class="post-comments-items">
                            @foreach ($comments['items'] as $comment)
                                <div class="post-comments-item">
                                    <div class="post-comments-info">
                                        <div>
                                            <span class="post-comments-author">{{ $comment->author }}</span>
                                            <span class="post-comments-date">@datetime($post->updated_at)</span>
                                        </div>

                                        <div>
                                            <a class="post-button" href="{{ route('comment.delete', [$post->id, $comment->id]) }}">
                                                <img class="post-button-image" src="/icons/trash-bin.png" alt="edit">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="post-comments-content">{{ $comment->content }}</div>

                                    @if (isset($comment->image_url))
                                        <img class="post-comments-image" src="{{ asset('/storage/' . $comment->image_url) }}" alt="image">
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
