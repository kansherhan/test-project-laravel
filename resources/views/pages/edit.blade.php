@extends('main-template')

@php
    $hasPost = isset($post);

    $title = $hasPost ? 'Редактировать пост' : 'Создать пост';
@endphp

@section('title', $title)

@section('content')
    <div class="edit">
        <div class="container">
            <div class="edit-content">
                <h1 class="edit-title">{{ $title }}</h1>

                <form class="form" action="{{ route('store') }}" method="post" enctype='multipart/form-data'>
                    @csrf

                    @if ($hasPost)
                        <input type="hidden" name="id" value="{{ $post->id }}">
                    @endif

                    <div class="form-input-group">
                        <label for="title">Названия</label>
                        <input class="form-input" name="title" id="title" type="text" value="{{ $hasPost ? $post->title : '' }}" placeholder="Названия" required>

                        @error('title')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-input-group">
                        <label for="author">Автор поста</label>
                        <input class="form-input" name="author" id="author" type="text" value="{{ $hasPost ? $post->author : '' }}" placeholder="Автор поста" required>
                    
                        @error('author')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-input-group form-input-file">
                        <label for="image_url">{{ $hasPost ? 'Изменить картинку' : 'Прикрепите файл' }}</label>
                        <input type="file" name="image_url" id="image_url" accept=".jpg, .jpeg, .png">
                    </div>

                    <div class="form-input-group">
                        <label for="content">Контент</label>
                        <textarea class="form-input-textarea" name="content" id="content" placeholder="Контент" required>{{ $hasPost ? $post->content : '' }}</textarea>
                    
                        @error('content')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-input-group">
                        <input class="form-input-submit" type="submit" value="Отправить">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
