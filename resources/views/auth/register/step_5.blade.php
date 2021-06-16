<i class="phantom" id="step-meta-data" data-step-id="set-password" data-step-has-errors="false"></i>
<h1 class="step__title step__block">@lang('account.create_step_5_1')</h1>
<p class="step__description step__block">@lang('account.create_step_5_2')</p>
<form class="step__form step__block" action="/account/creation/flow/create-full/step/set-password" method="post" id="flow-form" enctype="multipart/form-data" novalidate>
    @csrf
    <div class="step__field step__form__block">
        <input class="step__input" valid="true" id="capture-password" data-capture-id="password" name="password" placeholder="@lang('account.create_step_5_3')" type="password" minlength="8" autocomplete="new-password" maxlength="128" pattern="^(?!^\s.*$)(?!^.*\s$)[ -~]+$" data-blz-password-weak-error="@lang('account.create_step_5_4')" title="@lang('account.create_step_5_5')" />
        <span class="step__input-addon--caps-alert" id="caps-alert"> <i class="fas fa-arrow-alt-square-up"></i> </span>
        <span class="step__input-addon--show-password" id="show-password">
            <i class="fas fa-eye-slash"></i>
            <i class="fas fa-eye"></i>
        </span>
        <span class="step__field__indicator"></span>
    </div>
    @error('password')
    <ul class="step__form__block step__field-errors" id="capture-error-password-container">
        <li class="step__field-errors-item">{{ $message }}</li>
    </ul>
    @enderror
    <progress class="step__password-strength-meter step__form__block" id="password-strength-bar" value="0"></progress>
    <div class="step__password-strength-status step__form__block" id="password-strength-status" data-blz-password-strength-poor="@lang('account.create_step_5_6')" data-blz-password-strength-uncommon="@lang('account.create_step_5_7')" data-blz-password-strength-epic="@lang('account.create_step_5_8')">@lang('account.create_step_5_9')
    </div>
    <button type="submit" class="step__button--primary step__block" id="flow-form-submit-btn">@lang('account.create_step_2_6')</button>
</form>
<ul class="step__pagination">
    <li class="step__pagination__item"></li>
    <li class="step__pagination__item"></li>
    <li class="step__pagination__item"></li>
    <li class="step__pagination__item"></li>
    <li class="step__pagination__item--active"></li>
    <li class="step__pagination__item"></li>
</ul>
