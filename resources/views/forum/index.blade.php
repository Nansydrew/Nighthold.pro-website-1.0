@section('sidebar')
    <div class="Breadcrumbs"> <span class="Breadcrumb"> <a href="{{ route('forums.index') }}" class="Breadcrumb-content is-active">
<span class="Breadcrumb-divider Home"> <i class="Icon"></i> </span> @lang('navbar.Navbar-forums') </a> </span> </div>
@endsection

@section('og')
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ route('forums.index') }}" />
    <meta property="og:title" content="@yield('title') {{ config('app.name_forum', __('forum.title')) }}" />
    <meta property="og:image" content="{{ asset('/forum/static/images/social-thumbs/wow.png') }}" />
    <meta property="og:description" content="@lang('forum.description')" />
@endsection

<x-forum-layout>
    <section class="Community">
        <header class="Community-header">
            <div class="Community-wrapper">
                <div class="Welcome">
                    <div class="Welcome-logo--container">
                        <img class="Welcome-logo" src="{{ asset('/forum/static/images/logos/game-logo-wow.png') }}"/>
                    </div>
                </div>
            </div>
        </header>
        <div id="main-outlet" class="wrap" role="main">
        <div class="list-controls">
            <div class="container">
                <section class="navigation-container ember-view">
                    <ul class="nav nav-pills ember-view">
                        <li title="Все темы по категориям" id="ember33" class="active ember-view">
                            <a href="{{ route('forums.index') }}" class="active">Категории</a>
                        </li>
                        <li title="Новые темы за последние несколько дней" id="ember37" class="ember-view">
                            <a href="{{ route('forums.new') }}" class="">Новые</a>
                        </li>
                        <li title="Темы с недавними сообщениями" id="ember41" class="ember-view">
                            <a href="{{ route('forums.latest') }}" class="">Последние</a>
                        </li>
                        </ul>
                </section>
            </div>
        </div>
        </div>
        @foreach($thread as $category)
            @if($category->visible == "PUBLISHED")
                <div class="ForumCategory ">
                    <header class="ForumCategory-header">
                        <h1 class="ForumCategory-heading">{{$category->name}}</h1>
                        @if($category->sort == 1)
                            <button class="Community-button--search" id="toggle-search-field" data-trigger="toggle.search.field" type="button"><span class="Button-content"><i class="Icon"></i></span></button><form action="{{ route('forum.search') }}" class="Form Form--search" data-search-all="true" id="forum-search-form">
                            <div class="Form-group">
                                <div class="Input Input--iconPrefix Input--search">
                                    <input name="q" placeholder="Поиск по всем форумам" type="search" autocomplete='off' />
                                    <i class="Icon Icon--prefix Icon--search"></i>
                                    <div class="Input-border"></div>
                                </div>
                            </div>
                        </form>
                        @endif
                    </header>
                    <div class="ForumCards ">
                        @foreach ($category->forums as $forum)
                            <a href="{{ route('forum.show', [$forum->id])}}" class="ForumCard ForumCard--content  ">
                                <i class="ForumCard-icon" style="background-image: url('{{ asset('/storage/' . Utils::Images($forum->icons)) }}')"></i>
                                <div class="ForumCard-details">
                                    <h1 class="ForumCard-heading">{!! $forum->name !!}</h1>
                                    <span class="ForumCard-description">{!! $forum->category_description !!}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </section>
</x-forum-layout>
