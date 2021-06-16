<section class="Section Section--secondary">
    <div data-topic-post="true" tabindex="0" class="TopicForm is-editing" id="topic-reply">
        <header class="TopicForm-header">
            <h1 class="TopicForm-heading">@lang('forum.TopicFormHeadingClosed')</h1>
        </header>
        <div class="TopicForm-content">
            <aside class="TopicForm-author" data-topic-form="{'userId': {{ Auth::user()->id }}}">
                <div class="Author" id="" data-topic-post-body-content="true"><a href="characters" class="Author-avatar "><img src="{{ asset('/storage/'.Auth::user()->avatar) }}" alt="" /></a><div class="Author-details"> <span class="Author-name">
<a class="Author-name--profileLink" href="characters">{{ Str::Title(Auth::user()->name) }}</a>
</span>
                        <span class="Author-posts">
<a class="Author-posts" href="/search?a={{ Auth::user()->name }}" data-toggle="tooltip" data-tooltip-content="@lang('forum.view_message_history')" data-original-title="" title="">
@lang('forum.count_messages', ['count' => Auth::user()->posts_count])
</a>
</span></div></div>
                <div class="Author-ignored is-hidden" data-topic-post-ignored-author="true">
<span class="Author-name">
<a class="Author-name--profileLink" href="characters">{{ Auth::user()->name }}</a>
</span>
                    <div class="Author-posts Author-posts--ignored">@lang('forum.ignored')</div></div>
            </aside>
            <div class="LoginPlaceholder-details"> <div class="LogIn-message LogIn-message--center"> @lang('forum.thread_is_locked')</div> </div>
        </div>
    </div>
</section>
