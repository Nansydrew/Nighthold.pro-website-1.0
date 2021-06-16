<div class="Pane Pane--dirtDark Pane--above">
   <div class="Pane-bg">
      <div class="Pane-overlay"></div>
   </div>
   <div class="Pane-content">
      <div class="SiteFooter">
         <div class="NavbarFooter is-regionless" id="global-navbar-footer" role="application" aria-label="Нижний колонтитул Blizzard" data-hash="6dae1d8c140be2bc46266421b6d629d35b7a98f9" data-region-selection="none" data-region="eu" data-country="RU" data-geoip-service-url="https://geo.battle.net" data-locale="{{ str_replace('_', '-', app()->getLocale()) }}">
            <div class="NavbarFooter-overlay" role="presentation"></div>
            <div class="NavbarFooter-selector">
               <div class="NavbarFooter-selectorToggle" tabindex="0" role="button" aria-haspopup="true" aria-label="Выберите язык">
                  <div class="NavbarFooter-icon NavbarFooter-selectorToggleIcon">
                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false" aria-hidden="true">
                        <use xlink:href="#Navbar-icon-globe"></use>
                     </svg>
                  </div>
                  <label class="NavbarFooter-selectorToggleLabel">
                      @foreach (config('app.locales') as $locale => $name)
                          @if (app()->getLocale() === $locale)
                              {{ $name }}
                          @endif
                      @endforeach
                  </label>
                  <div class="NavbarFooter-icon NavbarFooter-selectorToggleArrow">
                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false" aria-hidden="true">
                        <use xlink:href="#Navbar-icon-selector"></use>
                     </svg>
                  </div>
               </div>
               <div class="NavbarFooter-selectorDropdown" role="listbox">
                  <div class="NavbarFooter-selectorDropdownContainer">
                     <div class="NavbarFooter-selectorCloser">
                        <div class="NavbarFooter-selectorCloserAnchor">
                           <div class="NavbarFooter-icon">
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false" aria-hidden="true">
                                 <use xlink:href="#Navbar-icon-close"></use>
                              </svg>
                           </div>
                        </div>
                     </div>
                     <div class="NavbarFooter-selectorLocales NavbarFooter-selectorSection">
                          <div class="NavbarFooter-selectorSectionBlock">
                              <a class="NavbarFooter-selectorLocale @if(App::isLocale('de-de')) is-active is-selected @endif NavbarFooter-selectorOption" href="{{ route('lang', ['lang' => 'de-de', 'current' => app()->getLocale()]) }}" data-id="de-de">
                                  <div class="NavbarFooter-selectorOptionLabel">Deutsch</div>
                                  <div class="NavbarFooter-selectorOptionCheck NavbarFooter-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false">
                                          <use xlink:href="#Navbar-icon-check"></use>
                                      </svg>
                                  </div>
                              </a>
                              <a class="NavbarFooter-selectorLocale @if(App::isLocale('en-us')) is-active is-selected @endif NavbarFooter-selectorOption" href="{{ route('lang', ['lang' => 'en-us', 'current' => app()->getLocale()]) }}" data-id="en-us">
                                  <div class="NavbarFooter-selectorOptionLabel">English (US)</div>
                                  <div class="NavbarFooter-selectorOptionCheck NavbarFooter-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false">
                                          <use xlink:href="#Navbar-icon-check"></use>
                                      </svg>
                                  </div>
                              </a>
                              <a class="NavbarFooter-selectorLocale @if(App::isLocale('en-gb')) is-active is-selected @endif NavbarFooter-selectorOption" href="{{ route('lang', ['lang' => 'en-gb', 'current' => app()->getLocale()]) }}" data-id="en-gb">
                                  <div class="NavbarFooter-selectorOptionLabel">English (EU)</div>
                                  <div class="NavbarFooter-selectorOptionCheck NavbarFooter-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false">
                                          <use xlink:href="#Navbar-icon-check"></use>
                                      </svg>
                                  </div>
                              </a>
                              <a class="NavbarFooter-selectorLocale @if(App::isLocale('es-es')) is-active is-selected @endif NavbarFooter-selectorOption" href="{{ route('lang', ['lang' => 'es-es', 'current' => app()->getLocale()]) }}" data-id="es-es"><div class="NavbarFooter-selectorOptionLabel">Español (EU)</div>
                                  <div class="NavbarFooter-selectorOptionCheck NavbarFooter-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false"><use xlink:href="#Navbar-icon-check"></use></svg>
                                  </div>
                              </a>
                              <a class="NavbarFooter-selectorLocale @if(App::isLocale('es-mx')) is-active is-selected @endif NavbarFooter-selectorOption" href="{{ route('lang', ['lang' => 'es-mx', 'current' => app()->getLocale()]) }}" data-id="es-mx">
                                  <div class="NavbarFooter-selectorOptionLabel">Español (AL)</div>
                                  <div class="NavbarFooter-selectorOptionCheck NavbarFooter-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false"><use xlink:href="#Navbar-icon-check"></use></svg>
                                  </div>
                              </a>
                              <a class="NavbarFooter-selectorLocale @if(App::isLocale('fr-fr')) is-active is-selected @endif NavbarFooter-selectorOption" href="{{ route('lang', ['lang' => 'fr-fr', 'current' => app()->getLocale()]) }}" data-id="fr-fr">
                                  <div class="NavbarFooter-selectorOptionLabel">Français</div>
                                  <div class="NavbarFooter-selectorOptionCheck NavbarFooter-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false"><use xlink:href="#Navbar-icon-check"></use></svg>
                                  </div>
                              </a>
                              <a class="NavbarFooter-selectorLocale @if(App::isLocale('it-it')) is-active is-selected @endif NavbarFooter-selectorOption" href="{{ route('lang', ['lang' => 'it-it', 'current' => app()->getLocale()]) }}" data-id="it-it">
                                  <div class="NavbarFooter-selectorOptionLabel">Italiano</div>
                                  <div class="NavbarFooter-selectorOptionCheck NavbarFooter-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false"><use xlink:href="#Navbar-icon-check"></use></svg>
                                  </div>
                              </a>
                          </div>
                          <div class="NavbarFooter-selectorSectionBlock">
                              <a class="NavbarFooter-selectorLocale @if(App::isLocale('pt-br')) is-active is-selected @endif NavbarFooter-selectorOption" href="{{ route('lang', ['lang' => 'pt-br', 'current' => app()->getLocale()]) }}" data-id="pt-br">
                                  <div class="NavbarFooter-selectorOptionLabel">Português (AL)</div>
                                  <div class="NavbarFooter-selectorOptionCheck NavbarFooter-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false"><use xlink:href="#Navbar-icon-check"></use></svg>
                                  </div>
                              </a>
                              <a class="NavbarFooter-selectorLocale @if(App::isLocale('pt-pt')) is-active is-selected @endif NavbarFooter-selectorOption" href="{{ route('lang', ['lang' => 'pt-pt', 'current' => app()->getLocale()]) }}" data-id="pt-pt">
                                  <div class="NavbarFooter-selectorOptionLabel">Português (EU)</div>
                                  <div class="NavbarFooter-selectorOptionCheck NavbarFooter-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false"><use xlink:href="#Navbar-icon-check"></use></svg>
                                  </div>
                              </a>
                              <a class="NavbarFooter-selectorLocale @if(App::isLocale('ru-ru')) is-active is-selected @endif NavbarFooter-selectorOption" href="{{ route('lang', ['lang' => 'ru-ru', 'current' => app()->getLocale()]) }}" data-id="ru-ru">
                                  <div class="NavbarFooter-selectorOptionLabel">Русский</div>
                                  <div class="NavbarFooter-selectorOptionCheck NavbarFooter-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false"><use xlink:href="#Navbar-icon-check"></use>
                                      </svg>
                                  </div>
                              </a>
                              <a class="NavbarFooter-selectorLocale @if(App::isLocale('ko-kr')) is-active is-selected @endif NavbarFooter-selectorOption" href="{{ route('lang', ['lang' => 'ko-kr', 'current' => app()->getLocale()]) }}" data-id="ko-kr">
                                  <div class="NavbarFooter-selectorOptionLabel">한국어</div>
                                  <div class="NavbarFooter-selectorOptionCheck NavbarFooter-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false"><use xlink:href="#Navbar-icon-check"></use></svg>
                                  </div>
                              </a>
                              <a class="NavbarFooter-selectorLocale @if(App::isLocale('zh-tw')) is-active is-selected @endif NavbarFooter-selectorOption" href="{{ route('lang', ['lang' => 'zh-tw', 'current' => app()->getLocale()]) }}" data-id="zh-tw">
                                  <div class="NavbarFooter-selectorOptionLabel">繁體中文</div>
                                  <div class="NavbarFooter-selectorOptionCheck NavbarFooter-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false"><use xlink:href="#Navbar-icon-check"></use>
                                      </svg>
                                  </div>
                              </a>
                              <a class="NavbarFooter-selectorLocale @if(App::isLocale('zh-cn')) is-active is-selected @endif NavbarFooter-selectorOption" href="{{ route('lang', ['lang' => 'zh-cn', 'current' => app()->getLocale()]) }}" data-id="zh-cn">
                                  <div class="NavbarFooter-selectorOptionLabel">简体中文</div>
                                  <div class="NavbarFooter-selectorOptionCheck NavbarFooter-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false"><use xlink:href="#Navbar-icon-check"></use></svg>
                                  </div>
                              </a>
                          </div>
                      </div>
                     <div class="NavbarFooter-selectorTick"></div>
                  </div>
               </div>
            </div>
            <style>.NavbarFooter-doNotSell {
               display: none;
               }
               .NavbarFooter[data-country="US"][data-administrative-division="CA"] > .NavbarFooter-doNotSell,
               .NavbarFooter[data-country="US"][data-administrative-division="NV"] > .NavbarFooter-doNotSell {
               display: block;
               }
            </style>
            <nav class="NavbarFooter-links NavbarFooter-mainLinks">
                @include('layouts.providers.pages')
            </nav>
            <div class="NavbarFooter-copyright">© {{ config('app.name') }}, Inc., 2021</div>
         </div>
      </div>
   </div>
</div>
