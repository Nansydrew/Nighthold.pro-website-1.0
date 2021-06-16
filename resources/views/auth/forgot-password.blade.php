<x-login-layout>
    <x-auth-card>
        <div class="inner-wrapper">
            <div class="box-wrapper ">
                <h1 class="logo ">Восстановление пароля</h1>
                <div class="hide" id="info-wrapper">
                    <h2><strong class="info-title"></strong></h2>
                    <p class="info-body"></p>
                    <button class="btn btn-block hide visible-phone" id="info-phone-close">Закрыть</button>
                </div>
                <div class="input" id="login-wrapper">
                    <div class="login">

                        <form action="{{ route('password.email') }}" method="post" id="password-form" novalidate="novalidate"
                              class="username-required input-focus form-with-captcha">
                            @csrf
                            <div id="login-input-container" class="">

                                <div id="js-errors" class="alert alert-error alert-icon hide" role="alert"
                                     aria-relevant="additions removals" data-support-aria="Перейти по ссылке сайта поддержки, внешней ссылке.">
                                    <p id="cookie-check" class="hide">В вашем браузере отключены cookies. Чтобы перейти к следующей странице, пожалуйста, подключите их.</p>
                                </div>
                                <!-- Session Status -->
                                <x-auth-session-status class="alert alert-icon alert-warning" :status="session('status')" />

                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="alert alert-icon alert-warning" :errors="$errors" />
                                <noscript>
                                    <div id="javascript-disabled" class="alert alert-error alert-icon">
                                        Для просмотра сайта требуется поддержка JavaScript.
                                    </div>
                                </noscript>

                                <div class="control-group ">
                                    <label id="accountName-label" class="control-label"
                                           for="accountName">Электронная почта</label>
                                    <div class="controls">
                                        <input
                                            id="accountName"
                                            aria-label="Поле электронной почты. Введите электронный адрес"
                                            name="email"
                                            title="Электронная почта"
                                            maxlength="320"
                                            type="text"
                                            tabindex="0"
                                            class="input-block "
                                            placeholder="Электронная почта"
                                            autocorrect="off"
                                            spellcheck="false"
                                            value="{{ old('email') }}"
                                        />
                                        <span class="input-after"></span>
                                        @error('email')<span class="error-helper error-helper-accountName status-warning" style="display: block;">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="control-group submit ">
                                <button
                                    type="submit"
                                    id="submit"
                                    class="btn-block btn btn-primary btn-block "
                                    data-loading-text=""
                                    tabindex="0"
                                    aria-label="{{ __('Сбросить пароль') }}"
                                >
                                    {{ __('Сбросить пароль') }}
                                    <i class="spinner-battlenet"></i>
                                </button>
                            </div>
                        </form>
                        <div class="thirdparty-line">
                            <span>или</span>
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
                                        Зарегистрируйте учетную запись
                                    </a>
                                </li>
                            @endif
                            @if (Route::has('login'))
                                <li role="link">
                                    <a rel="internal"
                                       target="_blank"
                                       href="{{ route('login') }}"
                                       class="btn btn-tertiary"
                                       tabindex="0"
                                       id="loginSupport"
                                       role="button"
                                    >
                                        Авторизация
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
