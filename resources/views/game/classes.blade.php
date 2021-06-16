<x-app-layout>
    @push('css')
        <link href="{{ asset('static/5.60a3b147f091048d9af5.css') }}" rel="stylesheet" type="text/css"/>
    @endpush
   <div class="Pane Pane--underSiteNav Pane--cropWide" data-url="https://images.blz-contentstack.com/v3/assets/blt3452e3b114fab0cd/bltfdb10c76cd837218/5ef22bb0b7f22712a4d508b9/PJBK2UYV0YYL1466177409759.jpg">
      <div class="Pane-bg" style="background-color:#151b0f;background-image:url(https://images.blz-contentstack.com/v3/assets/blt3452e3b114fab0cd/bltfdb10c76cd837218/5ef22bb0b7f22712a4d508b9/PJBK2UYV0YYL1466177409759.jpg);">
         <div class="Pane-overlay"></div>
      </div>
      <div class="Pane-content">
         <div class="space-medium"></div>
         <div class="space-large hide" media-medium="!hide"></div>
         <div class="space-large hide" media-wide="!hide"></div>
         <div class="contain-masthead align-center">
            <h1 class="margin-none font-semp-xxxLarge-white">@lang('classes.classes_5')</h1>
            <div class="space-rhythm-medium"></div>
            <p class="margin-none font-bliz-light-small-beige">@lang('classes.classes_6')</p>
         </div>
         <div class="space-medium"></div>
         <div class="space-large hide" media-medium="!hide"></div>
         <div class="space-large hide" media-wide="!hide"></div>
         <div class="Grid Grid--gutters" media-large="SyncHeight">
            <div class="Grid-full" media-large="Grid-1of2">
               <div class="Cards Cards--gutters Cards--stacked" media-huge="!Cards--stacked Cards--1of3 Cards--excerpts" media-max="!Cards--excerpts">
                  @foreach($first as $class)
                  <div class="Card Card--borderPaper Cards-card">
                     <a class="Card-link SyncHeight-item" href="{{ route('classes.view', $class->slug) }}">
                        <div class="Card-image">
                           <div class="Card-image--full">
                              <div class="Art Card-art">
                                 <div class="Art-size" style="padding-top:100%"></div>
                                 <div class="Art-image" style="background-image:url({{ asset('/storage/' . Utils::ImagesLogo($class->images_main)) }});"></div>
                                 <div class="Art-overlay"></div>
                              </div>
                           </div>
                           <div class="Card-image--half">
                              <div class="Art Card-art">
                                 <div class="Art-size" style="padding-top:50%"></div>
                                 <div class="Art-image" style="background-image:url({{ asset('/storage/' . Utils::ImagesLogo($class->images_main)) }});"></div>
                                 <div class="Art-overlay"></div>
                              </div>
                           </div>
                        </div>
                        <div class="Card-content">
                           <div class="gutter-normal gutter-all">
                              <div class="Card-title">{{ $class->getTranslatedAttribute('name', App()->getLocale(), 'en-gb') }}</div>
                              <div class="Card-subtitle">{{ $class->getTranslatedAttribute('card_subtitle', App()->getLocale(), 'en-gb') }}</div>
                              {!! $class->getTranslatedAttribute('card_description', App()->getLocale(), 'en-gb') !!}
                           </div>
                        </div>
                     </a>
                  </div>
                  @endforeach
               </div>
            </div>
            <div class="Grid-full" media-large="Grid-1of2">
               <div class="Cards Cards--gutters Cards--stacked" media-huge="!Cards--stacked Cards--1of3 Cards--excerpts" media-max="!Cards--excerpts">
                  @foreach($last as $class)
                  <div class="Card Card--borderPaper Cards-card">
                     <a class="Card-link SyncHeight-item" href="{{ route('classes.view', $class->slug) }}">
                        <div class="Card-image">
                           <div class="Card-image--full">
                              <div class="Art Card-art">
                                 <div class="Art-size" style="padding-top:100%"></div>
                                 <div class="Art-image" style="background-image:url({{ asset('/storage/' . Utils::ImagesLogo($class->images_main)) }});"></div>
                                 <div class="Art-overlay"></div>
                              </div>
                           </div>
                           <div class="Card-image--half">
                              <div class="Art Card-art">
                                 <div class="Art-size" style="padding-top:50%"></div>
                                 <div class="Art-image" style="background-image:url({{ asset('/storage/' . Utils::ImagesLogo($class->images_main)) }});"></div>
                                 <div class="Art-overlay"></div>
                              </div>
                           </div>
                        </div>
                        <div class="Card-content">
                           <div class="gutter-normal gutter-all">
                               <div class="Card-title">{{ $class->getTranslatedAttribute('name', App()->getLocale(), 'en-gb') }}</div>
                               <div class="Card-subtitle">{{ $class->getTranslatedAttribute('card_subtitle', App()->getLocale(), 'en-gb') }}</div>
                               {!! $class->getTranslatedAttribute('card_description', App()->getLocale(), 'en-gb') !!}
                           </div>
                        </div>
                     </a>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
         <div class="space-normal"></div>
      </div>
   </div>
    @push('scripts')
        <script src="{{ asset('static/runtime.c86dff083122a451b1af.js') }}"></script>
        <script src="{{ asset('static/vendor.ac7a75610385e9b40211.js') }}"></script>
        <script src="{{ asset('static/3.20dec79f412b658fa525.js') }}"></script>
        <script src="{{ asset('static/legacy-components.24c8e8ac1040f44e6717.js') }}"></script>
    @endpush
</x-app-layout>
