<i class="phantom" id="step-meta-data" data-step-id="provide-credentials" data-step-has-errors="false"></i>
<h1 class="step__title step__block">@lang('account.create_step_3_1')</h1>
<p class="step__description step__block">@lang('account.create_step_3_2')
    <span class="step__tooltip">
        <span class="step__tooltip__anchor"> <span class="step__tooltip__description">@lang('account.create_step_3_3')</span>
        </span>
        <span class="step__tooltip__title">@lang('account.create_step_3_4')</span>
    </span>.
</p>
<form class="step__form step__block" action="/account/creation/flow/create-full/step/provide-credentials" method="post" id="flow-form" enctype="multipart/form-data" novalidate>
    @csrf
    <div class="step__field step__form__block">
        <input class="step__input" valid="true" id="capture-email" data-capture-id="email" name="email" placeholder="@lang('account.create_step_3_5')" type="email" minlength="3" autocomplete="email" maxlength="254" />
        <span class="step__field__indicator"></span>
    </div>
    @error('email')
    <ul class="step__form__block step__field-errors" id="capture-error-email-container">
        <li class="step__field-errors-item">{{ $message }}</li>
    </ul>
    @enderror
    <div class="step__field step__form__block">
        <input class="step__input" valid="true" id="capture-phone-number" data-capture-id="phone-number" name="phoneNumber" placeholder="@lang('account.create_step_3_6')" type="tel" autocomplete="tel" maxlength="20" pattern="[0-9\-()\.\+\s]{5,}" />
        <span class="step__field__indicator"></span>
    </div>
    @error('phoneNumber')
    <ul class="step__form__block step__field-errors" id="capture-error-phone-number-container">
        <li class="step__field-errors-item">Номер телефона уже используется</li>
    </ul>
    @enderror
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
    <li class="step__pagination__item--active"></li>
    <li class="step__pagination__item"></li>
    <li class="step__pagination__item"></li>
    <li class="step__pagination__item"></li>
</ul>
