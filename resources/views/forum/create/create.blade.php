<div class="Section Section--secondary is-hidden" id="create-topic-section">
    <div class="CreateTopic-container">
        <div class="TopicForm TopicForm-group--isActive TopicForm-group--isActivated TopicForm--create is-hidden is-editing" data-topic-form="{'userId': {{ Auth::user()->id }}  }" id="create-topic"><header class="TopicForm-header"><h1 class="TopicForm-heading">@lang('forum.New_Topic')</h1><a class="TopicForm-button--close" data-trigger="create.topicpost.forum" data-forum-button="true"></a></header>
            <div class="TopicForm-content">
                <aside class="TopicForm-author" data-topic-form="{'userId': {{ Auth::user()->id }}  }">
                    <div class="Author" id="" data-topic-post-body-content="true">
                        <a href="characters" class="Author-avatar ">
                            <img src="{{ asset('/storage/'.Auth::user()->avatar ?: '/static/Avatar-anon.png') }}" alt="" /></a>
                        <div class="Author-details">
<span class="Author-name">
<a class="Author-name--profileLink" href="characters">{{ Auth::user()->name }}</a>
</span>
                            <span class="Author-posts">
<a class="Author-posts" href="/search?a={{ Auth::user()->name }}" data-toggle="tooltip" data-tooltip-content="@lang('forum.view_message_history')" data-original-title="" title="">
@lang('forum.count_messages', ['count' => Auth::user()->posts_count])
</a>
</span>
                        </div>
                    </div>
                </aside>
                <form class="Form" action="{{ route('forum.topic.store', $category) }}" method="post" id="create-topic-form" data-post-form="true">
                    <fieldset>
                        @csrf
                        <input type="hidden" name="channel_id" value="{{ $category->id }}" />
                    </fieldset>
                    <div class="TopicForm-group">	<i class="Icon Icon-compose"></i>
                        <input type="text" id="subject" name="subject" autocomplete="off" class="TopicForm-control TopicForm-control--subject TopicForm-subject" data-topic-form-subject="true" placeholder="@lang('forum.TopicFormSubject')" required="required" tabindex="1" fieldType="text" />
                    </div>
                    <div class="TopicForm-group TopicForm-group-content">
                        <textarea id="postCommand.detail" name="messages" class="TopicForm-control TopicForm-control--detail TopicForm-detail" data-topic-form-detail="true" required="required" spellcheck="true" tabindex="1"></textarea>
                        <div class="BmlToolbar" id="BmlToolbar">
                            <div class="BmlToolbar--content">
<span data-toggle="tooltip" data-tooltip-content="@lang('forum.bold')" data-topic-post-button="true" data-trigger="bml.bold.bmltoolbar" class="BmlToolbar-button" data-original-title="" title="">
<i class="Icon Icon--16 Icon--bold"></i>
</span>
                                <span data-toggle="tooltip" data-tooltip-content="@lang('forum.italics')" data-topic-post-button="true" data-trigger="bml.italics.bmltoolbar" class="BmlToolbar-button" data-original-title="" title=""><i class="Icon Icon--16 Icon--italics"></i>
</span>
                                <span data-toggle="tooltip" data-tooltip-content="@lang('forum.underline')" data-topic-post-button="true" data-trigger="bml.underline.bmltoolbar" class="BmlToolbar-button" data-original-title="" title="">
<i class="Icon Icon--16 Icon--underline"></i>
</span>
                                <span class="BmlToolbar-divider"></span>
                                <span data-toggle="tooltip" data-tooltip-content="@lang('forum.list')" data-topic-post-button="true" data-trigger="bml.list.bmltoolbar" class="BmlToolbar-button" data-original-title="" title="">
<i class="Icon Icon--16 Icon--list"></i>
</span>
                                <span data-toggle="tooltip" data-tooltip-content="@lang('forum.listItem')" data-topic-post-button="true" data-trigger="bml.listItem.bmltoolbar" class="BmlToolbar-button" data-original-title="" title="">
<i class="Icon Icon--16 Icon--list-item"></i>
</span>
                                <span class="BmlToolbar-divider"></span>
                                <span data-toggle="tooltip" data-tooltip-content="@lang('forum.quote')" data-topic-post-button="true" data-trigger="bml.quote.bmltoolbar" class="BmlToolbar-button" data-original-title="" title="">
<i class="Icon Icon--16 Icon--quote"></i>
</span>
                                <span data-toggle="tooltip" data-tooltip-content="@lang('forum.code')" data-topic-post-button="true" data-trigger="bml.code.bmltoolbar" class="BmlToolbar-button" data-original-title="" title="">
<i class="Icon Icon--16 Icon--code"></i>
</span>
                                <span data-toggle="tooltip" data-tooltip-content="@lang('forum.item')" data-topic-post-button="true" data-trigger="bml.item.bmltoolbar" class="BmlToolbar-button" data-original-title="" title="">
<i class="Icon Icon--16 Icon--code"></i>
</span>
                            </div>
                        </div>
                    </div>
                    <div class="CoolDownTimer-message" data-time-left="0" id="post-countdown">@lang('forum.CoolDownTimerMessage')</div>
                    <div class="TopicForm-action--buttons">
                        <button type="submit" id="submit-button" class="TopicForm-button TopicForm-button--create" data-topic-post-button="true" disabled="disabled">
                            <span class="Button-content" disabled="disabled">@lang('forum.TopicFormButtonCreate')</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if (count($errors))
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>
