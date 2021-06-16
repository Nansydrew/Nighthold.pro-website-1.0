<i class="phantom" id="step-meta-data" data-step-id="legal-and-opt-ins" data-step-has-errors="false"></i>
<h1 class="step__title step__block">@lang('account.create_step_4_1')</h1>
<p class="step__description step__block">@lang('account.create_step_4_2')</p>
<form class="step__form step__block" action="/account/creation/flow/create-full/step/legal-and-opt-ins" method="post" id="flow-form" enctype="multipart/form-data" novalidate>
    @csrf
    <label class="step__field--label step__form__block">
        <input class="step__checkbox" value="true" id="capture-opt-in-third-party-news-special-offers" data-capture-id="opt-in-third-party-news-special-offers" name="special-offers" type="checkbox" />
        <span class="step__field__indicator--checkbox"> <i class="far fa-check"></i> </span>
        <span class="step__field--label__text">@lang('account.create_step_4_3')</span>
    </label>
    <div class="step__legal-checkboxes step__form__block" id="legal-checkboxes">
        <label class="step__field--label step__form__block">
            <input class="step__checkbox" value="true" data-capture-id="tou-agreements-implicit" name="tou-agreements" type="checkbox" />
            <span class="step__field__indicator--checkbox"> <i class="far fa-check"></i></span>
            <span class="step__field--label__text">@lang('account.create_step_4_4') <a href="{{ route('pages.view', [4, 'licenzionnogo-soglasheniya']) }}" rel="external noopener" target="_blank">@lang('account.create_step_4_5', ['name' => setting('site.title')]) <i class="far fa-external-link"></i></a> .</span>
        </label>
    </div>
    <div class="step__legal-summary step__block end">
        <div class="step__legal-summary__links step__block" id="legal-summary-links"> @lang('account.create_step_4_6') <a href="{{ route('pages.view', [4, 'licenzionnogo-soglasheniya']) }}" rel="external noopener" target="_blank">@lang('account.create_step_4_7', ['name' => setting('site.title')]) <i class="far fa-external-link"></i></a>
        </div>
    </div>
    <button type="submit" class="step__button--primary step__block" id="flow-form-submit-btn">@lang('account.create_step_2_6')</button>
</form>
<ul class="step__controls step__block">
    <li class="step__controls__item">
        <a href="/account/creation/flow/create-full/back" class="step__controls__link" id="flow-button-back">@lang('account.create_step_2_7')</a>
    </li>
</ul>
<ul class="step__pagination">
    <li class="step__pagination__item"></li>
    <li class="step__pagination__item"></li>
    <li class="step__pagination__item"></li>
    <li class="step__pagination__item--active"></li>
    <li class="step__pagination__item"></li>
    <li class="step__pagination__item"></li>
</ul>
