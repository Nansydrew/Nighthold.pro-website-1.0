@section('title')Поиск - @endsection

@section('og')
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ route('forums.new')}}" />
    <meta property="og:title" content="Новые темы - {{ config('app.name_forum') }}" />
    <meta property="og:image" content="{{ asset('/forum/static/images/social-thumbs/wow.png') }}" />
    <meta property="og:description" content="Новые темы за последние несколько дней" />
@endsection

@section('sidebar')
    <div class="Breadcrumbs"> <span class="Breadcrumb"> <a href="{{ route('forums.index') }}" class="Breadcrumb-content">
<span class="Breadcrumb-divider Home"> <i class="Icon"></i> </span>@lang('navbar.Navbar-forums')</a> </span>
    </div>
@endsection

<x-forum-layout>
    <div role="main">
        <section class="Search">
            <header class="Search-header">
                <div class="Container Container--content">
                    <h1 class="Search-heading"><a class="Game-logo" href="/"></a>Поиск</h1>
                    <div class="Search-controls">
                        <div class="Search-option">
                            <select class="Search-forum-dropdown">
                                <option value="">All Forums</option>
                                <optgroup label="SUPPORT">
                                    <option name="forum" value="1011699">Customer Support</option> <option name="forum" value="1011700">Service Status</option> <option name="forum" value="1011701">Technical Support</option> <option name="forum" value="1011702">Mac Technical Support</option> <option name="forum" value="1012660">Bug Report</option> </optgroup>
                            </select>
                        </div>
                        <form action="" class="Form" id="search-form">
                            <div class="Form-group">
                                <div class="Input Input--large Input--search">
                                    <input id="search-input" name="q" placeholder="Поиск..." type="search" value="{{ request()->q }}" autocomplete="off" />
                                    <input data-search-forum="true" type="hidden" name="forum" />
                                    <div class="Input-border"></div>
                                </div>
                                <button class="Search-button" type="submit">
                                    <span class="Button-content">
                                        <i class="Icon Icon--32 Icon--search"></i>
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </header>
            <div class="Search-content">
                <div class="Search-noResults">
                    Упс! Страница в разработке.
                </div>
            </div>
        </section>
    </div>
</x-forum-layout>
