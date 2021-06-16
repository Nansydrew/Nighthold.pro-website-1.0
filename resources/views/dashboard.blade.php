<x-app-layout>
    @push('css')
        <link href="{{ asset('static/5.60a3b147f091048d9af5.css') }}" rel="stylesheet" type="text/css"/>
    @endpush
   <div class="page-Home">
      <div class="page-Home-masthead">
         <div class="VideoPane VideoPane--fadeBottom VideoPane--disabled" media-wide="VideoPane--underSiteNav !VideoPane--disabled">
            <div class="VideoPane-bg">
               @foreach(json_decode(setting('homepage.site')) as $file)
               <video class="VideoPane-video" src="{{ asset('storage/'. Utils::ImagesLogo($file->download_link)) }}" data-src="{{ asset('storage/' . Utils::ImagesLogo($file->download_link)) }}" loop="loop" muted="muted" autoplay="autoplay" playsinline="playsinline"></video>
               @endforeach
               <div class="VideoPane-overlay"></div>
               <div class="VideoPane-fallback BackgroundVideo-fallback" style="background-image: url({{ asset('storage/'. Utils::ImagesLogo(setting('homepage.images_phone'))) }});"></div>
            </div>
            <div class="VideoPane-content">
               <div class="gutter-normal gutter-negative" media-wide="hide">
                  <div class="Art Art--fadeBottom" style="margin-bottom:-52.5%;">
                     <div class="Art-size" style="padding-top:90%"></div>
                     <div class="Art-image" style="background-image:url({{ asset('storage/'. Utils::ImagesLogo(setting('homepage.images_phone'))) }});"></div>
                     <div class="Art-overlay"></div>
                  </div>
               </div>
               <div class="hide" media-wide="!hide">
                  <div class="space-huge"></div>
                  <div class="space-large"></div>
               </div>
               <div class="align-left">
                  <div media-small="gutter-vertical" media-large="!gutter-vertical">
                     <div class="align-center" media-wide="!align-center">
                        <h1 class="margin-none font-semp-xxxLarge-white text-upper">{{ setting('homepage.title') }}</h1>
                        <div class="contain-masthead" media-wide="contain-left">
                           <div class="space-rhythm-medium"></div>
                           <p class="margin-none font-bliz-light-medium-beige">{{ setting('homepage.opisanie') }}</p>
                           <div class="space-rhythm-large"></div>
                           <div class="List List--gutters List--center List--vertical" media-large="!List--vertical" media-wide="!List--center List--left">
                               @if(setting('homepage.slug'))
                              <a class="Link Link--external Button Button--ghost Panel-button Button--purchase" href="{{ setting('homepage.slug') }}" data-analytics="shop-link" data-analytics-placement="Shop: Shadowlands">
                                 <div class="Button-outer">
                                    <div class="Button-inner">
                                       <div class="Button-label" data-text="{{ setting('homepage.slug_text') }}">{{ setting('homepage.slug_text') }}</div>
                                    </div>
                                 </div>
                              </a>
                               @endif
                               @if(setting('homepage.slug_two'))
                              <a class="Link Button Button--ghost Panel-button" href="{{ setting('homepage.slug_two') }}" data-analytics="homepage-panel" data-analytics-placement="Blog: Shadowlands Season 1">
                                 <div class="Button-outer">
                                    <div class="Button-inner">
                                       <div class="Button-label" data-text="{{ setting('homepage.slug_text_two') }}">{{ setting('homepage.slug_text_two') }}</div>
                                    </div>
                                 </div>
                              </a>
                               @endif
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="hide" media-wide="!hide">
                  <div class="space-large"></div>
               </div>
               <div class="space-large" media-wide="space-huge"></div>
               <div class="List List--gutters">
                  <div class="List-item font-semp-small-white text-upper">@lang('article.article_1')</div>
                  <div class="List-item fontFamily-blizzard">
                     <a class="Link Link--text" href="{{ route('news.index') }}" data-analytics="action-link" data-analytics-placement="News || Home - View All News">@lang('article.article_2')</a>
                  </div>
               </div>
               <div class="gutter-normal gutter-negative">
                  <div class="MastheadFeaturedNewsMount" data-props="{{ $data }}" style="min-height: 250px;"></div>
               </div>
               <div class="space-normal"></div>
            </div>
         </div>
      </div>
      <div id="gtx-trans">
         <div class="gtx-trans-icon"> </div>
      </div>
      @foreach($content as $item)
          @if($item->columns === 1 || $item->columns !== 2)
            @include('homepage.relative', $item)
          @elseif($item->columns === 0 || $item->columns !== 2)
            @include('homepage.section1of2', $item)
          @elseif($item->columns === 2 || $item->columns !== 1 || $item->columns !== 0)
            @include('homepage.video', $item)
          @endif
      @endforeach
   </div>
    @push('scripts')
        <script src="{{ asset('static/runtime.c86dff083122a451b1af.js') }}"></script>
        <script src="{{ asset('static/vendor.ac7a75610385e9b40211.js') }}"></script>
        <script src="{{ asset('static/3.20dec79f412b658fa525.js') }}"></script>
        <script src="{{ asset('static/legacy-components.24c8e8ac1040f44e6717.js') }}"></script>
    @endpush
</x-app-layout>
