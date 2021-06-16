@section('title')Новые темы - @endsection

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
    <div id="main-outlet" class="wrap" role="main">
        <div id="ember13" class="above-main-container-outlet blizzard-banner-message ember-view"><!----></div>

        <div class="container">
            <div id="ember14" class="ember-view"></div>
            <div id="ember15" class="controls ember-view"><!----></div>
            <div id="ember16" class="ember-view"><!----></div>
            <div id="ember17" class="ember-view">  <div class="row">
                    <div id="global-notice-alert-emails-disabled" class="alert alert-info alert-emails-disabled">
                        <!---->      <span class="text">Все исходящие письма были глобально отключены администратором. Уведомления любого вида не будут отправляться на почту.</span>

                        <!---->    </div>
                </div>
            </div>
            <div id="ember19" class="hidden create-topics-notice ember-view"><!----></div>
            <!---->
        </div>
        <div class="container">
            <div id="ember20" class="ember-view"><!----></div>
            <div id="ember21" class="ember-view"><!----></div>
        </div>

        <div class="list-controls">
            <div class="container">
                <section id="ember22" class="navigation-container ember-view">  <ol id="ember24" class="category-breadcrumb ember-view">    <li id="ember26" class="select-kit single-select combobox combo-box category-drop none ember-view">  <div data-name="все категории" data-value="" role="button" data-select-kit-id="ember26-header" aria-expanded="false" aria-haspopup="" aria-owns="[data-select-kit-id=ember26-body]" tabindex="0" id="ember27" class="select-kit-header single-select-header combo-box-header category-drop-header ember-view" style="">  <div tabindex="0" title="все категории" data-name="все категории" class="select-kit-selected-name selected-name choice" data-ember-action="" data-ember-action-29="29">
                                    <!---->
                                    <span class="name">
      все категории
    </span>

                                    <!---->  </div>


                                <svg class="fa d-icon d-icon-caret-right svg-icon caret-icon svg-string" xmlns="http://www.w3.org/2000/svg" style=""><use xlink:href="#blizzard-chevron_right"></use></svg>
                            </div>

                            <div data-select-kit-id="ember26-body" id="ember30" class="select-kit-body ember-view"><!----></div>
                            <div class="select-kit-wrapper"></div>
                        </li>

                        <!---->
                        <!---->
                    </ol>

                    <ul class="nav nav-pills ember-view">
                        <li title="Все темы по категориям" id="ember33" class="ember-view">
                            <a href="{{ route('forums.index') }}" class="">Категории</a>
                        </li>
                        <li title="Новые темы за последние несколько дней" id="ember37" class="ember-view">
                            <a href="{{ route('forums.new') }}" class="">Новые</a>
                        </li>
                        <li title="Темы с недавними сообщениями" id="ember41" class="active ember-view">
                            <a href="{{ route('forums.latest') }}" class="active">Последние</a>
                        </li>
                    </ul>

                    <span id="ember45" class="ember-view"><!----></span>

                </section>
            </div>
        </div>

        <div id="ember47" class="loading-container ember-view">
        </div>

        <span id="ember48" class="ember-view"><!----></span>

        <div class="container list-container ">
            <div class="row">
                <div class="full-width">
                    <div id="header-list-area">
                        <!---->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="full-width">
                    <div id="list-area">
                        <span id="ember49" class="ember-view"><!----></span>
                        <!---->
                        <!---->
                        <!---->
                        <div id="ember50" class="bulk-select-container ember-view" style="top: 41px;"><!----></div>

                        <div id="ember51" class="contents ember-view"><!---->  <span id="ember52" class="ember-view"><!----></span>

                            <table id="ember53" class="topic-list ember-view">  <thead>
                                <tr><th data-sort-order="default" class="default">Тема</th>

                                    <th data-sort-order="" class="">Автор</th>

                                    <th data-sort-order="posts" class="posts sortable num">Ответы</th>

                                    <th data-sort-order="views" class="views sortable num">Просмотры</th>

                                    <th data-sort-order="activity" class="activity sortable num">Сообщения</th>

                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($topics as $item)
                                    <tr data-topic-id="194369" id="ember59" class="topic-list-item category-%D0%9F%D0%BE%D0%B4%D0%B4%D0%B5%D1%80%D0%B6%D0%BA%D0%B0-c%D0%BB%D1%83%D0%B6%D0%B1%D0%B0-%D0%BF%D0%BE%D0%B4%D0%B4%D0%B5%D1%80%D0%B6%D0%BA%D0%B8 unseen-topic ember-view">
                                        <td class="main-link clearfix" colspan="1">
  <span class="link-top-line"><span class="topic-icon-container">
</span>
<a href="{{ route('topic.show', [$item->thread->id]) }}#post-{{ $item->id }}" class="title raw-link raw-topic-link" data-topic-id="{{ $item->id }}">{{ $item->thread->title }}</a>  </span>
                                            <div class="link-bottom-line">
                                                <a class="badge-wrapper none" href="{{ route('forum.show', [$item->channel->id]) }}"><span data-drop-close="true" class="badge-category clear-badge" title="{{ $item->channel->category_description }}"><span class="category-name">{{ $item->channel->name }}</span></span></a>


                                            </div>
                                        </td>

                                        <td class="creator">
                                            <a href="#" data-user-card="{{ $item->creator->name }}">
                                                {{ $item->creator->name }}
                                            </a>
                                        </td>


                                        <td class="num posts-map posts heatmap-" title="Ответов  в этой теме: 1">
                                            <a href="" class="posts-map badge-posts heatmap-">
                                                <svg class="fa d-icon d-icon-blizzard-chat svg-icon blizzard-reply-icon svg-string" xmlns="http://www.w3.org/2000/svg"><use xlink:href="#blizzard-chat"></use></svg>

                                                <span class="number" aria-label="Ответов  в этой теме: {{ $item->thread->replies_count }}">{{ $item->thread->replies_count }}</span>
                                            </a>
                                        </td>

                                        <td class="num views "><span class="number" title="просмотров темы: 0">0</span></td>

                                        <td class="num age activity" title="Первое сообщение: {{ $item->created_at->diffForHumans() }}">
                                            <a class="post-activity" href="{{ route('forum.show', [$item->channel->id]) }}"><span class="relative-date" data-time="1622815911072" data-format="tiny">{{ $item->created_at->diffForHumans() }}</span></a>
                                        </td>


                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <span id="ember65" class="ember-view"><!----></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <span id="ember70" class="ember-view"><!----></span>

        <!---->
        <div id="user-card" class="user-card no-bg group-undefined selectable-characters-enabled ember-view" style="left: -9999px; top: -9999px;"><!----></div>

        <div id="group-card" class="no-bg group-card ember-view" style="left: -9999px; top: -9999px;"><!----></div>

    </div>
</x-forum-layout>
