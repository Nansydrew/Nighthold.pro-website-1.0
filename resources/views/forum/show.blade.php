@section('title'){{ $category->name }} - @endsection

@section('og')
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ route('forum.show', [$category->id])}}" />
    <meta property="og:title" content="{{ $category->name }} - {{ config('app.name_forum') }}" />
    <meta property="og:image" content="{{ asset('/forum/static/images/social-thumbs/wow.png') }}" />
    <meta property="og:description" content="{{ $category->category_description }}" />
@endsection

@section('sidebar')
    <div class="Breadcrumbs"> <span class="Breadcrumb"> <a href="{{ route('forums.index') }}" class="Breadcrumb-content">
<span class="Breadcrumb-divider Home"> <i class="Icon"></i> </span>@lang('navbar.Navbar-forums')</a> </span>
        <span class="Breadcrumb"> <span class="Breadcrumb-divider"> <i class="Icon"></i> </span>
<a href="{{ route('forum.show', [$category->id])}}" class="Breadcrumb-content is-active"> {{ $category->name }} </a> </span>
    </div>
@endsection

<x-forum-layout>
    <section class="Forum" data-forum="{'id': '{{ $category->id }}'}">
        <header class="Forum-header">
            <div class="Container Container--content">
                <h1 class="Forum-heading">
                    <a class="Game-logo" href="/"></a>
                    {{ $category->name }}<button class="Forum-button Forum-button--searchButton" id="toggle-search-field" data-trigger="toggle.search.field" type="button"><span class="Button-content"><i class="Icon"></i></span></button>				</h1>
                <div class="Forum-controls">
                    <form action="{{ route('forum.search') }}" class="Form" id="forum-search-form">
                        <div class="Form-group">
                            <div class="Input Input--iconPrefix Input--search">
                                <input name="q" placeholder="@lang('forum.search_forum')" type="search" autocomplete="off" />
                                <input type="hidden" name="forum" value="{{ $category->id }}" />
                                <i class="Icon Icon--prefix Icon--search"></i>
                                <div class="Input-border"></div>
                            </div>
                        </div>
                    </form>
                    @guest
                        <button class="Forum-button Forum-button--new" id="toggle-create-topic" data-forum-button="true" data-trigger="create.topicpost.forum" type="button">
                            <span class="Overlay-element"></span>
                            <span class="Button-content"><i class="Icon"></i>@lang('forum.create_topic')</span></button>
                    @else
                        @auth
                            <button class="Forum-button Forum-button--new" id="toggle-create-topic" data-forum-button="true" data-trigger="create.topicpost.forum" type="button"><span class="Overlay-element"></span><span class="Button-content"><i class="Icon"></i>@lang('forum.create_topic')</span></button>
                        @else
                            <button class="Forum-button Forum-button--new" id="toggle-create-topic" disabled="disabled" data-toggle="tooltip" data-tooltip-content="Категория закрыта!" data-forum-button="true" data-trigger="create.topicpost.forum" type="button"><span class="Overlay-element" disabled="disabled" data-toggle="tooltip" data-tooltip-content="Категория закрыта!"></span><span class="Button-content"><i class="Icon"></i>@lang('forum.create_topic')</span></button>
                        @endauth
                    @endguest

                </div>
            </div>
            @guest
                <div class="Section Section--secondary is-hidden">
                    <div class="CreateTopic-container">
                        <div class="LoginPlaceholder" id="create-topic"> <header class="LoginPlaceholder-header"><h1 class="LoginPlaceholder-heading">Обсудить</h1><a class="TopicForm-button--close" data-trigger="create.topicpost.forum" data-forum-button="true"></a> </header> <div class="LoginPlaceholder-content"> <aside class="LoginPlaceholder-author"> <div class="Author" id="" data-topic-post-body-content="true"><div class="Author-avatar Author-avatar--default"></div><div class="Author-details"><span class="Author-name is-blank"></span> <span class="Author-posts is-blank"></span></div></div> <div class="Author-ignored is-hidden" data-topic-post-ignored-author="true"> <span class="Author-name"> </span><div class="Author-posts Author-posts--ignored">проигнорировано</div></div> </aside> <div class="LoginPlaceholder-details"> <div class="LogIn-message">Вам есть что сказать? Авторизуйтесь, чтобы создать тему.</div> <a class="LogIn-button" href="{{ route('login') }}"> <span class="LogIn-button-content" >Авторизация</span> </a> </div> </div> </div>				</div>
                </div>
            @else
               @include('forum.create.create')
            @endguest
        </header>

<div class="Forum-content" data-track="nexus.checkbox" id="forum-topics">

<div class="Forum-ForumTopicList ">
<div class="ForumCategory ">
<div class="ForumCards ">
@foreach($categories as $cat)
@foreach($cat->forums as $cats)
<a href="{{ route('forum.show', [$cats->id])}}" class="ForumCard ForumCard--content">
<i class="ForumCard-icon" style="background-image: url('{{ asset('/storage/' . Utils::Images($cats->icons)) }}')"></i>
<div class="ForumCard-details">
<h1 class="ForumCard-heading">{!! $cats->name !!}</h1>
<span class="ForumCard-description">{{$cats->category_description}}</span>
</div>
</a>
@endforeach
@endforeach
</div>
</div>
<br>
@if ($topics->isEmpty())
<div data-topics-container="featured">@lang('forum.no_topic_in_category')</div>
@endif

<div data-topics-container="sticky">
@foreach ($topics as $topic)

@if($topic->sticky == 1)
<a class="ForumTopic ForumTopic--sticky  ForumTopic--featured @if($topic->creator->role->id === 1)has-blizzard-post @endif @if($topic->creator->role->id === 5) has-mvp-post @endif @if($topic->locked) is-locked @endif @if(auth()->check() && $topic->hasUpdatesFor(auth()->user())) is-read @else @endif" href="{{ route('topic.show', [$topic])}}" data-forum-topic="{'id':{{ $topic->id }},'lastPosition':0,'isSticky':true,'isFeatured':true,'isLocked':@if($topic->locked) true @else false @endif,'isHidden':false,'isSpam':false}">
<span class="ForumTopic-type">
<i class="Icon"></i>
@if($topic->creator->role->id === 1)
<i class="BlizzIcon" data-toggle="tooltip" data-tooltip-content="@lang('forum.messages_gm')" data-original-title="" title=""></i>
@endif
@if($topic->creator->role->id === 5)
<i class="MvpIcon" data-toggle="tooltip" data-tooltip-content="@lang('forum.messages_cuf')"></i>
@endif
</span>
<div class="ForumTopic-details">
<span class="ForumTopic-heading">
<span class="ForumTopic-title--wrapper">

<span class="ForumTopic-timestamp on-mobile">
<span class="ForumTopic-timestamp--lastPost" href="{{ route('topic.show', [$topic])}}" >
</span>
</span>

<span class="ForumTopic-title" data-toggle="tooltip" data-tooltip-content="" data-original-title="" title="">
{{ $topic->title }}
</span>@if($topic->locked) <i class="statusIcon statusIcon-mobile" data-toggle="tooltip" data-tooltip-content="Закрыто" data-original-title="" title=""></i>@endif
</span>
@if($topic->locked)
<i class="statusIcon statusIcon-desktop" data-toggle="tooltip" data-tooltip-content="Закрыто" data-original-title="" title=""></i>
@endif
</span>
<span class="ForumTopic--preview">{{ $topic->content }}</span>
<span class="ForumTopic-author @if($topic->creator->role->id === 1) ForumTopic-author--blizzard @endif @if($topic->creator->role->id === 5) ForumTopic-author--mvp @endif">
{{ Str::title($topic->creator->name) }}
</span>

<span class="ForumTopic-replies">
<i class="Icon"></i>
<span>{{ $topic->replies_count }}</span>
</span>

<span class="ForumTopic-timestamp">
<span class="ForumTopic-timestamp--lastPost" href="{{ route('topic.show', [$topic])}}">{{ $topic->created_at->diffForHumans() }}</span>
</span>
</div>
</a>
@endif
@endforeach
</div>

@foreach ($topics as $topic)
@if($topic->sticky == 0)
<a class="ForumTopic @if($topic->creator->role->id === 1)has-blizzard-post @endif @if($topic->creator->role->id === 5) has-mvp-post @endif @if($topic->locked) is-locked @endif @if(auth()->check() && $topic->hasUpdatesFor(auth()->user())) is-read @else @endif" href="{{ route('topic.show', [$topic])}}" data-forum-topic="{'id':{{ $topic }},'lastPosition':0,'isSticky':false,'isFeatured':false,'isLocked':@if($topic->locked) true @else false @endif,'isHidden':false,'isSpam':false}">
<span class="ForumTopic-type">
<i class="Icon"></i>
@if($topic->creator->role->id === 1)
<i class="BlizzIcon" data-toggle="tooltip" data-tooltip-content="@lang('forum.messages_gm')" data-original-title="" title=""></i>
@endif
@if($topic->creator->role->id === 5)
<i class="MvpIcon" data-toggle="tooltip" data-tooltip-content="@lang('forum.messages_cuf')"></i>
@endif
</span>
<div class="ForumTopic-details">
<span class="ForumTopic-heading">
<span class="ForumTopic-title--wrapper">

<span class="ForumTopic-timestamp on-mobile">
<span class="ForumTopic-timestamp--lastPost" href="{{ route('topic.show', [$topic])}}" >
</span>
</span>

<span class="ForumTopic-title" data-toggle="tooltip" data-tooltip-content="" data-original-title="" title="">{{ $topic->title }}</span>
@if($topic->locked) <i class="statusIcon statusIcon-mobile" data-toggle="tooltip" data-tooltip-content="Закрыто" data-original-title="" title=""></i>@endif</span>
@if($topic->locked)
        <i class="statusIcon statusIcon-desktop" data-toggle="tooltip" data-tooltip-content="Закрыто" data-original-title="" title=""></i>
@endif
</span>
<span class="ForumTopic--preview">{{ $topic->content }}</span>
<span class="ForumTopic-author @if($topic->creator->role->id === 1) ForumTopic-author--blizzard @endif @if($topic->creator->role->id === 5) ForumTopic-author--mvp @endif">
    {{ Str::title($topic->creator->name) }}
</span>

<span class="ForumTopic-replies">
<i class="Icon"></i>
<span>{{ $topic->replies_count }}</span>
</span>

<span class="ForumTopic-timestamp">
<span class="ForumTopic-timestamp--lastPost" href="{{ route('topic.show', [$topic])}}">{{ $topic->created_at->diffForHumans() }}</span>
</span>
</div>
</a>
@endif
@endforeach
</div>
{{ $topics->links('forum.paginate.cat') }}
</div>
</section>
</x-forum-layout>
