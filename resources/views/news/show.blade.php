<x-app-layout>
    @push('css')
        <link href="{{ asset('static/5.60a3b147f091048d9af5.css') }}" rel="stylesheet" type="text/css"/>
    @endpush
   <article>
      <header>
         <div class="Pane Pane--underSiteNav Pane--fadeBottom bordered" data-url="{{ asset('/storage/' . Utils::Images($post->image)) }}" queryselectoralways="31">
            <div class="Pane-bg" style="background-color:#000000;background-image:url({{ asset('/storage/' . Utils::Images($post->image)) }});">
               <div class="Pane-overlay"></div>
            </div>
            <div class="Pane-content">
               <div class="space-huge"></div>
               <div class="" media-large="!space-large" queryselectoralways="0" media-original="space-large"></div>
               <div media-medium="space-medium" media-large="!space-medium space-huge" queryselectoralways="0" media-original="" class="space-huge"></div>
               <div media-wide="space-huge" queryselectoralways="0" media-original="" class="space-huge"></div>
               <div media-wide="space-huge" queryselectoralways="0" media-original="" class="space-huge"></div>
               <div media-huge="space-huge" queryselectoralways="0" media-original="" class=""></div>
               <div media-huge="space-huge" queryselectoralways="0" media-original="" class=""></div>
               <div class="contain-max">
                  <h1 class="margin-none font-title-large-onDark">{{ $post->getTranslatedAttribute('title', App()->getLocale(), 'en-gb') }}</h1>
                  <div class="space-small"></div>
                  <div class="List">
                     <div class="font-bliz-light-small-beige List-item gutter-tiny" media-medium="List-item gutter-tiny" queryselectoralways="0" media-original="font-bliz-light-small-beige">
                        <div class="Content">
                           <a href="{{ route('search.blog', ['a' => $post->author->name]) }}">{{ Str::title($post->author->name) }}</a>,
                           {!! Text::rusDate($post->created_at) !!}
                        </div>
                     </div>
                     <div class="List-item gutter-tiny">
                        <a class="Link Link--external" href="/">
                           <div class="CommentTotal CommentTotal--horizontal CommentTotal--transition">
                              <span class="Icon Icon--comment Icon--small CommentTotal-icon">
                                 <svg class="Icon-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false">
                                    <use xlink:href="/static/components/Icon/svg/comment.88a6bb267bb247fed6a4ae5b51ea531d.svg#comment"></use>
                                 </svg>
                              </span>
                              <div class="CommentTotal-number">0</div>
                           </div>
                        </a>
                     </div>
                  </div>
                  <div class="space-medium space-large" media-large="space-large" queryselectoralways="0" media-original="space-medium"></div>
               </div>
            </div>
         </div>
      </header>
      <div class="Pane Pane--dirtDark" queryselectoralways="31">
         <div class="Pane-bg">
            <div class="Pane-overlay"></div>
         </div>
         <div class="Pane-content">
            <div class="space-medium space-large" media-large="space-large" queryselectoralways="0" media-original="space-medium"></div>
            <div class="contain-wide">
               <div class="flex flex-items-center margin-bottom-normal">
                  <div class="SocialButtons font-none" queryselectoralways="43">
                     <div class="SocialButtons-button">
                        <a class="SocialButtons-link font-size-xSmall SocialButtons-link--facebook" href="javascript:void(0);" data-url="/" data-popup-height="450" data-popup-width="550" data-analytics="sns-share" data-analytics-placement="News - facebook">
                           <span class="Icon Icon--social-facebook SocialButtons-icon SocialButtons-icon--facebook">
                              <svg class="Icon-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false">
                                 <use xlink:href="/static/components/Icon/svg/social-facebook.20d2ed4f5a690fe838af4c2beb4ba8be.svg#social-facebook"></use>
                              </svg>
                           </span>
                           <span>Поделиться</span>
                        </a>
                     </div>
                     <div class="SocialButtons-button">
                        <a class="SocialButtons-link font-size-xSmall SocialButtons-link--twitter" href="javascript:void(0);" data-url="/" data-popup-height="450" data-popup-width="550" data-analytics="sns-share" data-analytics-placement="News - twitter">
                           <span class="Icon Icon--social-twitter SocialButtons-icon SocialButtons-icon--twitter">
                              <svg class="Icon-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false">
                                 <use xlink:href="/static/components/Icon/svg/social-twitter.fe8ef9d809c5b5099e326f60b39ff940.svg#social-twitter"></use>
                              </svg>
                           </span>
                           <span>Твитнуть</span>
                        </a>
                     </div>
                     <div class="SocialButtons-button">
                        <a class="SocialButtons-link font-size-xSmall SocialButtons-link--vkontakte" href="javascript:void(0);" data-url="https://vkontakte.ru/share.php?url={{ route('news.show', [$post->id, $post->slug]) }}" data-popup-height="280" data-popup-width="550" data-analytics="sns-share" data-analytics-placement="News - vkontakte">
                           <span class="Icon Icon--social-vkontakte SocialButtons-icon SocialButtons-icon--vkontakte">
                              <svg class="Icon-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false">
                                 <use xlink:href="/static/components/Icon/svg/social-vkontakte.57ff1545fb0a71780640cc4f07ad2be3.svg#social-vkontakte"></use>
                              </svg>
                           </span>
                           <span>Поделиться</span>
                        </a>
                     </div>
                  </div>
                  <a class="Link Link--external Button Button--ghost Button--small Button--social Icon--tiny" href="/">
                     <div class="Button-outer">
                        <div class="Button-inner">
                           <div class="Button-label" data-text="Комментарии (0)">
                              Комментарии (0)
                              <span class="Icon Icon--external Button-icon">
                                 <svg class="Icon-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false">
                                    <use xlink:href="/static/components/Icon/svg/external.13e8aff2467eba3ecaa64fc085f36f98.svg#external"></use>
                                 </svg>
                              </span>
                           </div>
                        </div>
                     </div>
                  </a>
               </div>
               <div id="blog">
                  <div class="Blog margin-bottom-medium" queryselectoralways="5">
                     <div class="detail">
                        {!! $post->getTranslatedAttribute('body', App()->getLocale(), 'en-gb') !!}
                     </div>
                  </div>
               </div>
               <a class="Link Link--external Button Button--ghost Button--social Icon--tiny width-full" href="/">
                  <div class="Button-outer">
                     <div class="Button-inner">
                        <div class="Button-label" data-text="Комментарии (0)">
                           Комментарии (0)
                           <span class="Icon Icon--external Button-icon">
                              <svg class="Icon-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false">
                                 <use xlink:href="/static/components/Icon/svg/external.13e8aff2467eba3ecaa64fc085f36f98.svg#external"></use>
                              </svg>
                           </span>
                        </div>
                     </div>
                  </div>
               </a>
               <div class="space-medium"></div>
               <div class="space-normal"></div>
            </div>
         </div>
      </div>
   </article>

    @push('scripts')
        <script src="{{ asset('static/runtime.c86dff083122a451b1af.js') }}"></script>
        <script src="{{ asset('static/responsive-blogs.97611243817fa00c810b.js') }}"></script>
        <script src="{{ asset('static/vendor.ac7a75610385e9b40211.js') }}"></script>
        <script src="{{ asset('static/3.20dec79f412b658fa525.js') }}"></script>
        <script src="{{ asset('static/news.9cc38be212731cf63e0c.js') }}"></script>
    @endpush
</x-app-layout>
