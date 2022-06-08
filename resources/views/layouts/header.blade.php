<header class="header">
    <div class="container">
        <div class="header-content">
            <a class="header-title" href="{{ route('home') }}">
                <h2 class="app-name">{{ config('app.name') }}</h2>
            </a>
            
            <nav class="header-nav">
                <a href="{{ route('create') }}"><img class="icon" src="/icons/edit.png" alt="edit"></a>
            </nav>
        </div>
    </div>
</header>