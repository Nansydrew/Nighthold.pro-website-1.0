<x-app-layout>
    @push('css')
        <link href="{{ asset('static/5.60a3b147f091048d9af5.css') }}" rel="stylesheet" type="text/css"/>
    @endpush
   <div class="Pane Pane--full Pane--dirtDark" queryselectoralways="31">
      <div class="Pane-bg">
         <div class="Pane-overlay"></div>
      </div>
      <div class="Pane-content">
         <div class="Pane Pane--underSiteNav Pane--cropMax Pane--transparent" data-url="{{ asset('cms/template_resource/p8/P8LCY89PNXOK1466794718015.jpg') }}" queryselectoralways="31">
            <div class="Pane-bg" style="background-image:url({{ asset('cms/template_resource/p8/P8LCY89PNXOK1466794718015.jpg') }});">
               <div class="Pane-overlay"></div>
            </div>
            <div class="Pane-content">
               <div class="contain-max padding-top-huge" media-large="!padding-top-large padding-top-huge" queryselectoralways="0" media-original="contain-max padding-top-large">
                  <div class="padding-bottom-huge" media-large="!padding-bottom-large padding-bottom-huge" queryselectoralways="0" media-original="padding-bottom-large">
                     <h1 class="margin-none font-semp-xLarge-white font-semp-xxxLarge-white" media-large="font-semp-xxxLarge-white" queryselectoralways="0" media-original="margin-none font-semp-xLarge-white">Описание обновления</h1>
                     <div class="contain-wide contain-left margin-bottom-large margin-top-small">
                        <p class="margin-none font-bliz-light-white">World of Warcraft постоянно пополняется новым контентом, в игру вносятся исправления, и сама она постоянно совершенствуется. Ознакомьтесь с информацией о самых свежих изменениях и исправлениях.</p>
                     </div>
                     <div class="List--vertical List--separatorAll List--full">
                        <div class="Grid Grid--gutters SyncHeight margin-top-small" queryselectoralways="47">
                           <div class="Grid-full">
                              <div class="List List--vertical List--separatorAll List--full">
                                 @foreach($update as $item)
                                 <div class="List-item">
                                    <article class="NewsBlog" queryselectoralways="28">
                                       <div class="NewsBlog-content">
                                          <div class="Grid Grid--gutter">
                                             <div class="Grid-col Grid-1of4" media-large="!hide Grid-1of4" media-wide="Grid-1of5" queryselectoralways="0" media-original="Grid-col hide">
                                                <a class="Link" href="{{ route('news.show', [$item->id, $item->slug]) }}">
                                                   <div class="NewsBlog-tile">
                                                      <img class="NewsBlog-image" src="{{ asset('storage/'.$item->image) }}" data-src="{{ asset('storage/'.$item->image) }}" data-loaded="true">
                                                      <div class="NewsBlog-loading" style="display: none;"></div>
                                                   </div>
                                                </a>
                                             </div>
                                             <div class="Grid-full gutter-small Grid-3of4" media-large="Grid-3of4" media-wide="Grid-4of5" queryselectoralways="0" media-original="Grid-full gutter-small">
                                                <div class="contain-large contain-left gutter-normal" media-large="gutter-normal" queryselectoralways="0" media-original="contain-large contain-left">
                                                   <div class="NewsBlog-title">{{ $item->getTranslatedAttribute('title', App()->getLocale(), 'en-gb') }}</div>
                                                   <p class="NewsBlog-desc color-beige-medium font-size-xSmall">{{ $item->getTranslatedAttribute('excerpt', App()->getLocale(), 'en-gb') }}</p>
                                                </div>
                                                <div media-large="gutter-normal" queryselectoralways="0" media-original="" class="gutter-normal">
                                                   <div class="Pair">
                                                      <div class="Pair-left">
                                                         <div class="color-beige-dark font-size-xxSmall">
                                                            <div class="NewsBlog-date LocalizedDateMount" data-props="{&quot;iso8601&quot;:&quot;{{ $item->created_at }}&quot;,&quot;relative&quot;:true}" queryselectoralways="55">
                                                                <time datetime="{{ $item->created_at }}">{{ Text::HumanDatePrecise($item->created_at) }}</time>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <a class="Link NewsBlog-link" href="{{ route('news.show', [$item->id, $item->slug]) }}"></a>
                                    </article>
                                 </div>
                                 @endforeach
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

    @push('scripts')
        <script src="{{ asset('static/runtime.c86dff083122a451b1af.js') }}"></script>
        <script src="{{ asset('static/vendor.ac7a75610385e9b40211.js') }}"></script>
        <script src="{{ asset('static/3.20dec79f412b658fa525.js') }}"></script>
        <script src="{{ asset('static/legacy-components.24c8e8ac1040f44e6717.js') }}"></script>
    @endpush
</x-app-layout>
