<x-app-layout>
    @push('css')
        <link href="{{ asset('static/5.60a3b147f091048d9af5.css') }}" rel="stylesheet" type="text/css"/>
    @endpush
   <div class="VideoPane VideoPane--underSiteNav VideoPane--disabled hide" media-wide="!hide !VideoPane--disabled">
      <div class="VideoPane-bg">
         <video class="VideoPane-video" src="https://bnetcmsus-a.akamaihd.net/cms/template_resource/UH8JZNHE7BY71534102731470.mp4" data-src="https://bnetcmsus-a.akamaihd.net/cms/template_resource/UH8JZNHE7BY71534102731470.mp4" loop="loop" muted="muted" autoplay="autoplay" playsinline="playsinline"></video>
         <div class="VideoPane-overlay"></div>
         <div class="VideoPane-fallback BackgroundVideo-fallback" style="background-image: url('https://bnetcmsus-a.akamaihd.net/cms/template_resource/Q6V9DEIZUHX71534102728680.jpg');"></div>
      </div>
      <div class="VideoPane-content">
         <div class="space-large"></div>
         <div class="space-large"></div>
         <div media-wide="space-medium"></div>
         <div class="contain-masthead align-center gutter-normal">
            <h1 class="margin-none font-semp-xxxLarge-white">@lang('races.races_1')</h1>
            <div class="space-rhythm-medium"></div>
            <p class="margin-none font-bliz-light-small-darkBeige">@lang('races.races_2')</p>
         </div>
         <div class="space-large"></div>
         <div class="space-large"></div>
         <div media-wide="space-large"></div>
      </div>
   </div>
   <div class="Pane Pane--underSiteNav Pane--small Pane--bgTop" data-small="https://bnetcmsus-a.akamaihd.net/cms/template_resource/Q6V9DEIZUHX71534102728680.jpg" data-large="https://bnetcmsus-a.akamaihd.net/cms/template_resource/Q6V9DEIZUHX71534102728680.jpg" media-wide="hide">
      <div class="Pane-bg">
         <div class="Pane-overlay"></div>
      </div>
      <div class="Pane-content">
         <div class="space-large"></div>
         <div class="space-large"></div>
         <div media-wide="space-medium"></div>
         <div class="contain-masthead align-center gutter-normal">
            <h1 class="margin-none font-semp-xxxLarge-white">@lang('races.races_1')</h1>
            <div class="space-rhythm-medium"></div>
            <p class="margin-none font-bliz-light-small-darkBeige">@lang('races.races_2')</p>
         </div>
         <div class="space-large"></div>
         <div class="space-large"></div>
         <div media-wide="space-large"></div>
      </div>
   </div>
   <div class="Divider Divider--transparent"></div>
   <section>
      <div class="Pane Pane--leatherBlue Pane--cropHuge Pane--flush relative">
         <div class="Pane-bg">
            <div class="Pane-overlay"></div>
         </div>
         <div class="Pane-content">
            <div class="align-center">
               <div class="hide inline" style="margin-top: -50px" media-huge="!hide">
                  <div class="Logo Logo--small Logo--alliance"></div>
               </div>
               <div class="hide inline" style="margin-top: -50px" media-wide="!hide" media-huge="!!hide">
                  <div class="Logo Logo--smaller Logo--alliance"></div>
               </div>
               <div class="inline" style="margin-top: -35px" media-wide="hide">
                  <div class="Logo Logo--tiny Logo--alliance"></div>
               </div>
            </div>
            <div class="space-small"></div>
            <div class="align-center contain-wide gutter-normal" medi-nav="!gutter-normal gutter-medium" media-wide="!gutter-normal !gutter-medium gutter-large">
               <h2 class="margin-none font-semp-large-white text-upper">@lang('races.races_3')</h2>
               <div class="space-rhythm-small"></div>
               <p class="margin-none font-bliz-light-small-darkBeige">@lang('races.races_4')</p>
            </div>
            <div class="space-large"></div>
            <div class="hide flex flex-column flex-items-center" media-huge="!hide">
               <div class="contain-center">
                  <div class="List List--gutters">
                     @foreach($race as $races)
                     @if($races->faction === 1 || $races->faction === 3)
                     <div class="List-item">
                        <div class="RaceTile RaceTile--alliance fixed-static-xxsmall" media-max="!fixed-static-xxsmall fixed-static-xsmall">
                           <a class="Link RaceTile-link" href="{{ route('races.view', $races->slug) }}">
                              <div class="RaceTile-content">
                                 <div class="RaceTile-backWrapper">
                                    <div class="RaceTile-back" style="background-image:url({{ asset('/storage/' . Utils::ImagesLogo($races->images_main)) }});"></div>
                                 </div>
                                 <div class="RaceTile-front" style="background-image:url({{ asset('/storage/' . Utils::ImagesLogo($races->images_main_two)) }});"></div>
                                 <div class="Position Position--anchorBottom" style="bottom:-84px;left:50%;">
                                    <div class="RaceTile-emblem"></div>
                                 </div>
                              </div>
                              <div class="space-normal"></div>
                              <div class="space-small"></div>
                              <div class="RaceTile-name SyncHeightItem">{{ $races->getTranslatedAttribute('name', App()->getLocale(), 'en-gb') }}</div>
                           </a>
                        </div>
                     </div>
                     @endif
                     @endforeach
                  </div>
               </div>
            </div>
            <div class="gutter-normal" media-huge="hide">
               <div class="Slider Slider--topOverflow" data-slider-options="{}" media-huge="Slider--disabled">
                  @foreach($race as $races)
                  @if($races->faction === 1 || $races->faction === 3)
                  <div class="Slider-slide Slider-slide--gutters">
                     <div class="RaceTile RaceTile--alliance fixed-static-tiny">
                        <a class="Link RaceTile-link" href="{{ route('races.view', $races->slug) }}">
                           <div class="RaceTile-content">
                              <div class="RaceTile-backWrapper">
                                 <div class="RaceTile-back" style="background-image:url({{ asset('/storage/' . Utils::ImagesLogo($races->images_main)) }});"></div>
                              </div>
                              <div class="RaceTile-front" style="background-image:url({{ asset('/storage/' . Utils::ImagesLogo($races->images_main_two)) }});"></div>
                              <div class="Position Position--anchorBottom" style="bottom:-84px;left:50%;">
                                 <div class="RaceTile-emblem"></div>
                              </div>
                           </div>
                           <div class="space-normal"></div>
                           <div class="space-small"></div>
                           <div class="RaceTile-name SyncHeightItem">{{ $races->getTranslatedAttribute('name', App()->getLocale(), 'en-gb') }}</div>
                        </a>
                     </div>
                  </div>
                  @endif
                  @endforeach
               </div>
            </div>
            <div class="space-huge"></div>
         </div>
      </div>
   </section>
   <div class="Divider Divider--transparent"></div>
   <section>
      <div class="Pane Pane--leatherRed Pane--cropHuge Pane--flush relative">
         <div class="Pane-bg">
            <div class="Pane-overlay"></div>
         </div>
         <div class="Pane-content">
            <div class="align-center">
               <div class="hide inline" style="margin-top: -50px" media-huge="!hide">
                  <div class="Logo Logo--small Logo--horde"></div>
               </div>
               <div class="hide inline" style="margin-top: -50px" media-wide="!hide" media-huge="!!hide">
                  <div class="Logo Logo--smaller Logo--horde"></div>
               </div>
               <div class="inline" style="margin-top: -35px" media-wide="hide">
                  <div class="Logo Logo--tiny Logo--horde"></div>
               </div>
            </div>
            <div class="space-small"></div>
            <div class="align-center contain-wide gutter-normal" medi-nav="!gutter-normal gutter-medium" media-wide="!gutter-normal !gutter-medium gutter-large">
               <h2 class="margin-none font-semp-large-white text-upper">@lang('races.races_5')</h2>
               <div class="space-rhythm-small"></div>
               <p class="margin-none font-bliz-light-small-darkBeige">@lang('races.races_6')</p>
            </div>
            <div class="space-large"></div>
            <div class="hide flex flex-column flex-items-center" media-huge="!hide">
               <div class="contain-center">
                  <div class="List List--gutters">
                     @foreach($race as $races)
                     @if($races->faction === 2 || $races->faction === 3)
                     <div class="List-item">
                        <div class="RaceTile RaceTile--horde fixed-static-xxsmall" media-max="!fixed-static-xxsmall fixed-static-xsmall">
                           <a class="Link RaceTile-link" href="{{ route('races.view', $races->slug) }}">
                              <div class="RaceTile-content">
                                 <div class="RaceTile-backWrapper">
                                    <div class="RaceTile-back" style="background-image:url({{ asset('/storage/' . Utils::ImagesLogo($races->images_main)) }});"></div>
                                 </div>
                                 <div class="RaceTile-front" style="background-image:url({{ asset('/storage/' . Utils::ImagesLogo($races->images_main_two)) }});"></div>
                                 <div class="Position Position--anchorBottom" style="bottom:-84px;left:50%;">
                                    <div class="RaceTile-emblem"></div>
                                 </div>
                              </div>
                              <div class="space-normal"></div>
                              <div class="space-small"></div>
                              <div class="RaceTile-name SyncHeightItem">{{ $races->getTranslatedAttribute('name', App()->getLocale(), 'en-gb') }}</div>
                           </a>
                        </div>
                     </div>
                     @endif
                     @endforeach
                  </div>
               </div>
            </div>
            <div class="gutter-normal" media-huge="hide">
               <div class="Slider Slider--topOverflow" data-slider-options="{}" media-huge="Slider--disabled">
                  @foreach($race as $races)
                  @if($races->faction === 2 || $races->faction === 3)
                  <div class="Slider-slide Slider-slide--gutters">
                     <div class="RaceTile RaceTile--horde fixed-static-tiny">
                        <a class="Link RaceTile-link" href="{{ route('races.view', $races->slug) }}">
                           <div class="RaceTile-content">
                              <div class="RaceTile-backWrapper">
                                 <div class="RaceTile-back" style="background-image:url({{ asset('/storage/' . Utils::ImagesLogo($races->images_main)) }});"></div>
                              </div>
                              <div class="RaceTile-front" style="background-image:url({{ asset('/storage/' . Utils::ImagesLogo($races->images_main_two)) }});"></div>
                              <div class="Position Position--anchorBottom" style="bottom:-84px;left:50%;">
                                 <div class="RaceTile-emblem"></div>
                              </div>
                           </div>
                           <div class="space-normal"></div>
                           <div class="space-small"></div>
                           <div class="RaceTile-name SyncHeightItem">{{ $races->getTranslatedAttribute('name', App()->getLocale(), 'en-gb') }}</div>
                        </a>
                     </div>
                  </div>
                  @endif
                  @endforeach
               </div>
            </div>
            <div class="space-huge"></div>
         </div>
      </div>
   </section>
   <div class="Divider Divider--transparent"></div>
   <section>
      <div class="Pane Pane--leatherGrayMap Pane--cropHuge Pane--flush relative">
         <div class="Pane-bg">
            <div class="Pane-overlay"></div>
         </div>
         <div class="Pane-content">
            <div class="space-large"></div>
            <div class="space-small"></div>
            <div class="align-center contain-wide gutter-normal" medi-nav="!gutter-normal gutter-medium" media-wide="!gutter-normal !gutter-medium gutter-large">
               <h2 class="margin-none font-semp-large-white text-upper">@lang('races.races_7')</h2>
               <div class="space-rhythm-small"></div>
               <p class="margin-none font-bliz-light-small-darkBeige">@lang('races.races_8')</p>
            </div>
            <div class="padding-top-normal padding-bottom-normal"></div>
            <div class="hide flex flex-column flex-items-center" media-huge="!hide">
               <div class="contain-center">
                  <div class="List List--gutters">
                     <div class="List-item">
                        <div class="RaceTile RaceTile--alliance fixed-static-xxsmall" media-max="!fixed-static-xxsmall fixed-static-xsmall">
                           <a class="Link RaceTile-link" href="/ru-ru/game/races/void-elf">
                              <div class="RaceTile-content">
                                 <div class="RaceTile-backWrapper">
                                    <div class="RaceTile-back" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/gallery/15H3ECGHPZG21533927442699.png);"></div>
                                 </div>
                                 <div class="RaceTile-front" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/template_resource/EZ4UC404L5BZ1533927442765.png);"></div>
                                 <div class="Position Position--anchorBottom" style="bottom:-84px;left:50%;">
                                    <div class="RaceTile-emblem"></div>
                                 </div>
                              </div>
                              <div class="space-normal"></div>
                              <div class="space-small"></div>
                              <div class="RaceTile-name SyncHeightItem">Эльфы Бездны</div>
                           </a>
                        </div>
                     </div>
                     <div class="List-item">
                        <div class="RaceTile RaceTile--alliance fixed-static-xxsmall" media-max="!fixed-static-xxsmall fixed-static-xsmall">
                           <a class="Link RaceTile-link" href="/ru-ru/game/races/lightforged-draenei">
                              <div class="RaceTile-content">
                                 <div class="RaceTile-backWrapper">
                                    <div class="RaceTile-back" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/gallery/TJ9TU2EJGMQD1533927441444.png);"></div>
                                 </div>
                                 <div class="RaceTile-front" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/template_resource/B3RJR6N7UVR51533927441620.png);"></div>
                                 <div class="Position Position--anchorBottom" style="bottom:-84px;left:50%;">
                                    <div class="RaceTile-emblem"></div>
                                 </div>
                              </div>
                              <div class="space-normal"></div>
                              <div class="space-small"></div>
                              <div class="RaceTile-name SyncHeightItem">Озаренные дренеи</div>
                           </a>
                        </div>
                     </div>
                     <div class="List-item">
                        <div class="RaceTile RaceTile--alliance fixed-static-xxsmall" media-max="!fixed-static-xxsmall fixed-static-xsmall">
                           <a class="Link RaceTile-link" href="/ru-ru/game/races/dark-iron-dwarf">
                              <div class="RaceTile-content">
                                 <div class="RaceTile-backWrapper">
                                    <div class="RaceTile-back" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/gallery/7W9RAE19S4SZ1533927440513.png);"></div>
                                 </div>
                                 <div class="RaceTile-front" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/template_resource/4SMM0ZA4JETW1533927440560.png);"></div>
                                 <div class="Position Position--anchorBottom" style="bottom:-84px;left:50%;">
                                    <div class="RaceTile-emblem"></div>
                                 </div>
                              </div>
                              <div class="space-normal"></div>
                              <div class="space-small"></div>
                              <div class="RaceTile-name SyncHeightItem">Дворфы Черного Железа</div>
                           </a>
                        </div>
                     </div>
                     <div class="List-item">
                        <div class="RaceTile RaceTile--alliance fixed-static-xxsmall" media-max="!fixed-static-xxsmall fixed-static-xsmall">
                           <a class="Link RaceTile-link" href="/ru-ru/game/races/kul-tiran">
                              <div class="RaceTile-content">
                                 <div class="RaceTile-backWrapper">
                                    <div class="RaceTile-back" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/gallery/VRV4QPLLVYV91549479456219.png);"></div>
                                 </div>
                                 <div class="RaceTile-front" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/template_resource/XPUAHIW8CRP41549479456294.png);"></div>
                                 <div class="Position Position--anchorBottom" style="bottom:-84px;left:50%;">
                                    <div class="RaceTile-emblem"></div>
                                 </div>
                              </div>
                              <div class="space-normal"></div>
                              <div class="space-small"></div>
                              <div class="RaceTile-name SyncHeightItem">Култирасцы</div>
                           </a>
                        </div>
                     </div>
                     <div class="List-item">
                        <div class="RaceTile RaceTile--alliance fixed-static-xxsmall" media-max="!fixed-static-xxsmall fixed-static-xsmall">
                           <a class="Link RaceTile-link" href="/ru-ru/game/races/mechagnome">
                              <div class="RaceTile-content">
                                 <div class="RaceTile-backWrapper">
                                    <div class="RaceTile-back" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/gallery/D1KJTXSAJG2A1578618717193.png);"></div>
                                 </div>
                                 <div class="Position Position--anchorBottom" style="bottom:-84px;left:50%;">
                                    <div class="RaceTile-emblem"></div>
                                 </div>
                              </div>
                              <div class="space-normal"></div>
                              <div class="space-small"></div>
                              <div class="RaceTile-name SyncHeightItem">Механогном</div>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="gutter-normal" media-huge="hide">
               <div class="Slider Slider--topOverflow" data-slider-options="{}" media-huge="Slider--disabled">
                  <div class="Slider-slide Slider-slide--gutters">
                     <div class="RaceTile RaceTile--alliance fixed-static-tiny">
                        <a class="Link RaceTile-link" href="/ru-ru/game/races/void-elf">
                           <div class="RaceTile-content">
                              <div class="RaceTile-backWrapper">
                                 <div class="RaceTile-back" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/gallery/15H3ECGHPZG21533927442699.png);"></div>
                              </div>
                              <div class="RaceTile-front" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/template_resource/EZ4UC404L5BZ1533927442765.png);"></div>
                              <div class="Position Position--anchorBottom" style="bottom:-84px;left:50%;">
                                 <div class="RaceTile-emblem"></div>
                              </div>
                           </div>
                           <div class="space-normal"></div>
                           <div class="space-small"></div>
                           <div class="RaceTile-name SyncHeightItem">Эльфы Бездны</div>
                        </a>
                     </div>
                  </div>
                  <div class="Slider-slide Slider-slide--gutters">
                     <div class="RaceTile RaceTile--alliance fixed-static-tiny">
                        <a class="Link RaceTile-link" href="/ru-ru/game/races/lightforged-draenei">
                           <div class="RaceTile-content">
                              <div class="RaceTile-backWrapper">
                                 <div class="RaceTile-back" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/gallery/TJ9TU2EJGMQD1533927441444.png);"></div>
                              </div>
                              <div class="RaceTile-front" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/template_resource/B3RJR6N7UVR51533927441620.png);"></div>
                              <div class="Position Position--anchorBottom" style="bottom:-84px;left:50%;">
                                 <div class="RaceTile-emblem"></div>
                              </div>
                           </div>
                           <div class="space-normal"></div>
                           <div class="space-small"></div>
                           <div class="RaceTile-name SyncHeightItem">Озаренные дренеи</div>
                        </a>
                     </div>
                  </div>
                  <div class="Slider-slide Slider-slide--gutters">
                     <div class="RaceTile RaceTile--alliance fixed-static-tiny">
                        <a class="Link RaceTile-link" href="/ru-ru/game/races/dark-iron-dwarf">
                           <div class="RaceTile-content">
                              <div class="RaceTile-backWrapper">
                                 <div class="RaceTile-back" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/gallery/7W9RAE19S4SZ1533927440513.png);"></div>
                              </div>
                              <div class="RaceTile-front" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/template_resource/4SMM0ZA4JETW1533927440560.png);"></div>
                              <div class="Position Position--anchorBottom" style="bottom:-84px;left:50%;">
                                 <div class="RaceTile-emblem"></div>
                              </div>
                           </div>
                           <div class="space-normal"></div>
                           <div class="space-small"></div>
                           <div class="RaceTile-name SyncHeightItem">Дворфы Черного Железа</div>
                        </a>
                     </div>
                  </div>
                  <div class="Slider-slide Slider-slide--gutters">
                     <div class="RaceTile RaceTile--alliance fixed-static-tiny">
                        <a class="Link RaceTile-link" href="/ru-ru/game/races/kul-tiran">
                           <div class="RaceTile-content">
                              <div class="RaceTile-backWrapper">
                                 <div class="RaceTile-back" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/gallery/VRV4QPLLVYV91549479456219.png);"></div>
                              </div>
                              <div class="RaceTile-front" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/template_resource/XPUAHIW8CRP41549479456294.png);"></div>
                              <div class="Position Position--anchorBottom" style="bottom:-84px;left:50%;">
                                 <div class="RaceTile-emblem"></div>
                              </div>
                           </div>
                           <div class="space-normal"></div>
                           <div class="space-small"></div>
                           <div class="RaceTile-name SyncHeightItem">Култирасцы</div>
                        </a>
                     </div>
                  </div>
                  <div class="Slider-slide Slider-slide--gutters">
                     <div class="RaceTile RaceTile--alliance fixed-static-tiny">
                        <a class="Link RaceTile-link" href="/ru-ru/game/races/mechagnome">
                           <div class="RaceTile-content">
                              <div class="RaceTile-backWrapper">
                                 <div class="RaceTile-back" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/gallery/D1KJTXSAJG2A1578618717193.png);"></div>
                              </div>
                              <div class="Position Position--anchorBottom" style="bottom:-84px;left:50%;">
                                 <div class="RaceTile-emblem"></div>
                              </div>
                           </div>
                           <div class="space-normal"></div>
                           <div class="space-small"></div>
                           <div class="RaceTile-name SyncHeightItem">Механогном</div>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="space-large"></div>
            <div class="hide flex flex-column flex-items-center" media-huge="!hide">
               <div class="contain-center">
                  <div class="List List--gutters">
                     <div class="List-item">
                        <div class="RaceTile RaceTile--horde fixed-static-xxsmall" media-max="!fixed-static-xxsmall fixed-static-xsmall">
                           <a class="Link RaceTile-link" href="/ru-ru/game/races/nightborne">
                              <div class="RaceTile-content">
                                 <div class="RaceTile-backWrapper">
                                    <div class="RaceTile-back" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/gallery/RR47HIN415K81533927441927.png);"></div>
                                 </div>
                                 <div class="RaceTile-front" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/template_resource/P67QU9J1CAR71533927441935.png);"></div>
                                 <div class="Position Position--anchorBottom" style="bottom:-84px;left:50%;">
                                    <div class="RaceTile-emblem"></div>
                                 </div>
                              </div>
                              <div class="space-normal"></div>
                              <div class="space-small"></div>
                              <div class="RaceTile-name SyncHeightItem">Ночнорожденные</div>
                           </a>
                        </div>
                     </div>
                     <div class="List-item">
                        <div class="RaceTile RaceTile--horde fixed-static-xxsmall" media-max="!fixed-static-xxsmall fixed-static-xsmall">
                           <a class="Link RaceTile-link" href="/ru-ru/game/races/highmountain-tauren">
                              <div class="RaceTile-content">
                                 <div class="RaceTile-backWrapper">
                                    <div class="RaceTile-back" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/gallery/HLF6UDNP8SLE1533927441225.png);"></div>
                                 </div>
                                 <div class="RaceTile-front" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/template_resource/655IRZJ6MR0V1533927441437.png);"></div>
                                 <div class="Position Position--anchorBottom" style="bottom:-84px;left:50%;">
                                    <div class="RaceTile-emblem"></div>
                                 </div>
                              </div>
                              <div class="space-normal"></div>
                              <div class="space-small"></div>
                              <div class="RaceTile-name SyncHeightItem">Таурены Крутогорья</div>
                           </a>
                        </div>
                     </div>
                     <div class="List-item">
                        <div class="RaceTile RaceTile--horde fixed-static-xxsmall" media-max="!fixed-static-xxsmall fixed-static-xsmall">
                           <a class="Link RaceTile-link" href="/ru-ru/game/races/maghar-orc">
                              <div class="RaceTile-content">
                                 <div class="RaceTile-backWrapper">
                                    <div class="RaceTile-back" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/gallery/PUPRNQDXM3FT1533927441732.png);"></div>
                                 </div>
                                 <div class="RaceTile-front" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/template_resource/UHSF17T0MX7N1533927441755.png);"></div>
                                 <div class="Position Position--anchorBottom" style="bottom:-84px;left:50%;">
                                    <div class="RaceTile-emblem"></div>
                                 </div>
                              </div>
                              <div class="space-normal"></div>
                              <div class="space-small"></div>
                              <div class="RaceTile-name SyncHeightItem">Маг'хары</div>
                           </a>
                        </div>
                     </div>
                     <div class="List-item">
                        <div class="RaceTile RaceTile--horde fixed-static-xxsmall" media-max="!fixed-static-xxsmall fixed-static-xsmall">
                           <a class="Link RaceTile-link" href="/ru-ru/game/races/zandalari-troll">
                              <div class="RaceTile-content">
                                 <div class="RaceTile-backWrapper">
                                    <div class="RaceTile-back" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/gallery/2SLCPPC6KW791549412561012.png);"></div>
                                 </div>
                                 <div class="RaceTile-front" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/template_resource/352XGNYFM1SD1549412561001.png);"></div>
                                 <div class="Position Position--anchorBottom" style="bottom:-84px;left:50%;">
                                    <div class="RaceTile-emblem"></div>
                                 </div>
                              </div>
                              <div class="space-normal"></div>
                              <div class="space-small"></div>
                              <div class="RaceTile-name SyncHeightItem">Зандаларские тролли</div>
                           </a>
                        </div>
                     </div>
                     <div class="List-item">
                        <div class="RaceTile RaceTile--horde fixed-static-xxsmall" media-max="!fixed-static-xxsmall fixed-static-xsmall">
                           <a class="Link RaceTile-link" href="/ru-ru/game/races/vulpera">
                              <div class="RaceTile-content">
                                 <div class="RaceTile-backWrapper">
                                    <div class="RaceTile-back" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/gallery/3SUNFMRVXCYZ1578618800806.png);"></div>
                                 </div>
                                 <div class="RaceTile-front" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/template_resource/8D8JEPR9D56J1578618832976.png);"></div>
                                 <div class="Position Position--anchorBottom" style="bottom:-84px;left:50%;">
                                    <div class="RaceTile-emblem"></div>
                                 </div>
                              </div>
                              <div class="space-normal"></div>
                              <div class="space-small"></div>
                              <div class="RaceTile-name SyncHeightItem">Вульперы</div>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="gutter-normal" media-huge="hide">
               <div class="Slider Slider--topOverflow" data-slider-options="{}" media-huge="Slider--disabled">
                  <div class="Slider-slide Slider-slide--gutters">
                     <div class="RaceTile RaceTile--horde fixed-static-tiny">
                        <a class="Link RaceTile-link" href="/ru-ru/game/races/nightborne">
                           <div class="RaceTile-content">
                              <div class="RaceTile-backWrapper">
                                 <div class="RaceTile-back" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/gallery/RR47HIN415K81533927441927.png);"></div>
                              </div>
                              <div class="RaceTile-front" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/template_resource/P67QU9J1CAR71533927441935.png);"></div>
                              <div class="Position Position--anchorBottom" style="bottom:-84px;left:50%;">
                                 <div class="RaceTile-emblem"></div>
                              </div>
                           </div>
                           <div class="space-normal"></div>
                           <div class="space-small"></div>
                           <div class="RaceTile-name SyncHeightItem">Ночнорожденные</div>
                        </a>
                     </div>
                  </div>
                  <div class="Slider-slide Slider-slide--gutters">
                     <div class="RaceTile RaceTile--horde fixed-static-tiny">
                        <a class="Link RaceTile-link" href="/ru-ru/game/races/highmountain-tauren">
                           <div class="RaceTile-content">
                              <div class="RaceTile-backWrapper">
                                 <div class="RaceTile-back" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/gallery/HLF6UDNP8SLE1533927441225.png);"></div>
                              </div>
                              <div class="RaceTile-front" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/template_resource/655IRZJ6MR0V1533927441437.png);"></div>
                              <div class="Position Position--anchorBottom" style="bottom:-84px;left:50%;">
                                 <div class="RaceTile-emblem"></div>
                              </div>
                           </div>
                           <div class="space-normal"></div>
                           <div class="space-small"></div>
                           <div class="RaceTile-name SyncHeightItem">Таурены Крутогорья</div>
                        </a>
                     </div>
                  </div>
                  <div class="Slider-slide Slider-slide--gutters">
                     <div class="RaceTile RaceTile--horde fixed-static-tiny">
                        <a class="Link RaceTile-link" href="/ru-ru/game/races/maghar-orc">
                           <div class="RaceTile-content">
                              <div class="RaceTile-backWrapper">
                                 <div class="RaceTile-back" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/gallery/PUPRNQDXM3FT1533927441732.png);"></div>
                              </div>
                              <div class="RaceTile-front" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/template_resource/UHSF17T0MX7N1533927441755.png);"></div>
                              <div class="Position Position--anchorBottom" style="bottom:-84px;left:50%;">
                                 <div class="RaceTile-emblem"></div>
                              </div>
                           </div>
                           <div class="space-normal"></div>
                           <div class="space-small"></div>
                           <div class="RaceTile-name SyncHeightItem">Маг'хары</div>
                        </a>
                     </div>
                  </div>
                  <div class="Slider-slide Slider-slide--gutters">
                     <div class="RaceTile RaceTile--horde fixed-static-tiny">
                        <a class="Link RaceTile-link" href="/ru-ru/game/races/zandalari-troll">
                           <div class="RaceTile-content">
                              <div class="RaceTile-backWrapper">
                                 <div class="RaceTile-back" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/gallery/2SLCPPC6KW791549412561012.png);"></div>
                              </div>
                              <div class="RaceTile-front" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/template_resource/352XGNYFM1SD1549412561001.png);"></div>
                              <div class="Position Position--anchorBottom" style="bottom:-84px;left:50%;">
                                 <div class="RaceTile-emblem"></div>
                              </div>
                           </div>
                           <div class="space-normal"></div>
                           <div class="space-small"></div>
                           <div class="RaceTile-name SyncHeightItem">Зандаларские тролли</div>
                        </a>
                     </div>
                  </div>
                  <div class="Slider-slide Slider-slide--gutters">
                     <div class="RaceTile RaceTile--horde fixed-static-tiny">
                        <a class="Link RaceTile-link" href="/ru-ru/game/races/vulpera">
                           <div class="RaceTile-content">
                              <div class="RaceTile-backWrapper">
                                 <div class="RaceTile-back" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/gallery/3SUNFMRVXCYZ1578618800806.png);"></div>
                              </div>
                              <div class="RaceTile-front" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/template_resource/8D8JEPR9D56J1578618832976.png);"></div>
                              <div class="Position Position--anchorBottom" style="bottom:-84px;left:50%;">
                                 <div class="RaceTile-emblem"></div>
                              </div>
                           </div>
                           <div class="space-normal"></div>
                           <div class="space-small"></div>
                           <div class="RaceTile-name SyncHeightItem">Вульперы</div>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="space-huge"></div>
         </div>
      </div>
   </section>

    @push('scripts')
        <script src="{{ asset('static/runtime.c86dff083122a451b1af.js') }}"></script>
        <script src="{{ asset('static/vendor.ac7a75610385e9b40211.js') }}"></script>
        <script src="{{ asset('static/3.20dec79f412b658fa525.js') }}"></script>
        <script src="{{ asset('static/legacy-components.24c8e8ac1040f44e6717.js') }}"></script>
    @endpush
</x-app-layout>
