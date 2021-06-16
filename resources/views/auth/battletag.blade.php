<i class="phantom" id="step-meta-data" data-step-id="create-success" data-step-has-errors="false"></i>
<i class="phantom" id="player-id" data-player-account-id="497154853"></i>
<div class="step-icon--success" id="success-icon">
    <i class="fal fa-check-circle"></i>
</div>
<h1 class="step__title step__block">@lang('account.create_step_7_1')</h1>
<p class="step__block">@lang('account.create_step_7_2')</p>
<p class="step__banner--account-identifier step__block">{{ $email }}</p>
<p class="step__description step__block">@lang('account.create_step_7_3', ['name' => setting('site.title')]) " <a href="{{ route('login') }}" rel="external noopener">@lang('account.create_step_7_4')<i class="fal fa-external-link"></i></a> ".</p>
<a id="flow-cta-btn" href="/" class="step__button--primary step__block"> @lang('account.create_step_7_5')</a>
