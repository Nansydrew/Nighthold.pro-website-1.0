<x-login-layout>
    <x-auth-card>
        <div class="inner-wrapper">
            <div class="box-wrapper ">
                <h1 class="logo ">@lang('account.login_1', ['name' => setting('site.title')])</h1>
                <div class="hide" id="info-wrapper">
                    <h2><strong class="info-title"></strong></h2>
                    <p class="info-body"></p>
                    <button class="btn btn-block hide visible-phone" id="info-phone-close">@lang('account.login_2')</button>
                </div>
                <div class="input" id="login-wrapper">
                    <div class="login">
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <form action="{{ route('login') }}" method="post" id="password-form" novalidate="novalidate"
                            class="username-required input-focus form-with-captcha">
                            @csrf
                            <div id="login-input-container" class="">

                                <div id="js-errors" class="alert alert-error alert-icon hide" role="alert"
                                    aria-relevant="additions removals" data-support-aria="@lang('account.login_15')">
                                    <p id="cookie-check" class="hide">@lang('account.login_3')</p>
                                </div>
                                <x-auth-validation-errors class="alert alert-icon alert-warning" :errors="$errors" />
                                <noscript>
                                    <div id="javascript-disabled" class="alert alert-error alert-icon">
                                        @lang('account.login_4')
                                    </div>
                                </noscript>

                                <div class="control-group ">
                                    <label id="accountName-label" class="control-label"
                                           for="accountName">@lang('account.login_5')</label>
                                    <div class="controls">
                                        <input
                                            id="accountName"
                                            aria-label="@lang('account.login_6')"
                                            name="email"
                                            title="@lang('account.login_5')"
                                            maxlength="320"
                                            type="text"
                                            tabindex="0"
                                            class="input-block "
                                            placeholder="@lang('account.login_5')"
                                            autocorrect="off"
                                            spellcheck="false"
                                            value="{{ old('email') }}"
                                        />
                                        <span class="input-after"></span>
                                        @error('email')<span class="error-helper error-helper-accountName status-warning" style="display: block;">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label id="password-label" class="control-label"
                                           for="password">@lang('account.login_7')</label>
                                    <div class="controls">
                                        <input
                                            id="password"
                                            aria-label="@lang('account.login_8')"
                                            name="password"
                                            title="@lang('account.login_7')"
                                            maxlength="128"
                                            type="password"
                                            tabindex="0"
                                            class="input-block "
                                            autocomplete="off"
                                            placeholder="@lang('account.login_7')"
                                            autocorrect="off"
                                            spellcheck="false"
                                            data-password-show-aria="@lang('account.login_9')" data-password-hide-aria="@lang('account.login_10')"
                                        />
                                        <span class="input-after"></span>
                                        @error('password')<span class="error-helper error-helper-password status-warning" style="display: block;">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <input type="hidden" id="srpEnabled" name="srpEnabled" value="false" />
                                <input type="hidden" id="upgradeVerifier" name="upgradeVerifier" value="" />
                                <input type="hidden" id="useSrp" name="useSrp" value="false" />
                                <input type="hidden" id="publicA" name="publicA" value="" />
                                <input type="hidden" id="clientEvidenceM1" name="clientEvidenceM1" value="" />
                                <div class="persistWrapper">
                                    <label id="persistLogin-label" class="checkbox-label css-label hide" for="persistLogin">
                                        <input
                                            aria-labelledby="persistLogin-label"
                                            id="persistLogin"
                                            name="remember"
                                            type="checkbox"
                                            checked="checked"
                                            tabindex="0"
                                        />
                                        <span class="input-checkbox"></span>
                                        {{ __('Remember me') }}
                                    </label>
                                </div>
                            </div>
                            <div class="control-group submit ">
                                <button
                                    type="submit"
                                    id="submit"
                                    class="btn-block btn btn-primary btn-block "
                                    data-loading-text=""
                                    tabindex="0"
                                    aria-label="@lang('account.login_11')"
                                >
                                    @lang('account.login_11')
                                    <i class="spinner-battlenet"></i>
                                </button>
                            </div>
                        </form>
                        <div class="thirdparty-line">
                            <span>@lang('account.login_12')</span>
                        </div>
                        <ul id="help-links" role="navigation">
                            @if (Route::has('register'))
                            <li role="link">
                                <a rel="internal"
                                   href="{{ route('register') }}"
                                   class="btn btn-tertiary"
                                   tabindex="0"
                                   id="signup"
                                   role="button"
                                >
                                    @lang('account.login_13')
                                </a>
                            </li>
                            @endif
                            @if (Route::has('password.request'))
                            <li role="link">
                                <a rel="internal"
                                   target="_blank"
                                   href="{{ route('password.request') }}"
                                   class="btn btn-tertiary"
                                   tabindex="0"
                                   id="loginSupport"
                                   role="button"
                                >
                                    @lang('account.login_14')
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <img src="{{ asset('static/images/toolkit/themes/bnet/icons/sprite-24-red.0PPlX.png') }}" class="hide" />
            <img src="{{ asset('static/images/toolkit/themes/bnet/spinners/spinner-battlenet.1IdwV.png') }}" class="hide" />
        </div>
    </x-auth-card>
</x-login-layout>
