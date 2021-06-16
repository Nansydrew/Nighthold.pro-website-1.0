<i class="phantom" id="step-meta-data" data-step-id="set-battletag" data-step-has-errors="false"></i>
<h1 class="step__title step__block">@lang('account.create_step_6_1', ['name' => setting('site.title')])Tag</h1>
<p class="step__description step__block">@lang('account.create_step_6_2')</p>
<form class="step__form step__block" action="/account/creation/flow/create-full/step/set-battletag" method="post" id="flow-form" enctype="multipart/form-data" novalidate>
    @csrf
    <div class="step__field step__form__block">
        <input class="step__input" valid="true" id="capture-battletag" data-capture-id="battletag" name="battletag" placeholder="@lang('account.create_step_6_3', ['name' => setting('site.title')])Tag" type="text" autocomplete="nickname" maxlength="30" pattern="([\u0041-\u005a\u0061-\u007a\u00c0-\u00d6\u00d8-\u00f6\u00f8-\u017e\u0180-\u0188\u0190-\u0198\u01c0-\u0217\u0030-\u0039]{3,12})|([\u0400-\u04ff\u0500-\u052f\u0030-\u0039]{3,12})" />
        <span class="step__field__indicator"></span>
    </div>
    <!--button type="button" class="step__button--secondary step__form__block" id="suggest-battletag-btn" data-blz-battletag-suggestion-endpoint="/account/creation/api/battletag-suggestion" >
        <i class="fas fa-random"></i> Сгенерировать</button-->
    <button type="submit" class="step__button--primary step__block" id="flow-form-submit-btn">@lang('account.create_step_2_6')</button>
</form>
<ul class="step__controls step__block"> <li class="step__controls__item">
        <a href="/account/creation/flow/create-full/back" class="step__controls__link" id="flow-button-back">@lang('account.create_step_2_7')</a>
    </li>
</ul>

<ul class="step__pagination">
    <li class="step__pagination__item"></li>
    <li class="step__pagination__item"></li>
    <li class="step__pagination__item"></li>
    <li class="step__pagination__item"></li>
    <li class="step__pagination__item"></li>
    <li class="step__pagination__item--active"></li>
</ul>
