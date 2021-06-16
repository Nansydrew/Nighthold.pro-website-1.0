@section('sidebar')
    <div class="Breadcrumbs"> <span class="Breadcrumb"> <a href="{{ route('forums.index') }}" class="Breadcrumb-content is-active">
<span class="Breadcrumb-divider Home"> <i class="Icon"></i> </span> @lang('navbar.Navbar-forums') </a> </span> </div>
@endsection

@section('og')
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ route('forums.index') }}" />
    <meta property="og:title" content="@yield('title') {{ config('app.name_forum', __('forum.title')) }}" />
    <meta property="og:image" content="{{ asset('/forum/static/images/social-thumbs/wow.png') }}" />
    <meta property="og:description" content="@lang('forum.description')" />
@endsection

<x-forum-layout>
<section class="Scm-content">
    <div class="section">
        <h2>Patch Notes</h2>
        We are constantly updating and improving the Blizzard Forums. Let us know if there's anything not working or that you're missing. Thanks for all the suggestions; we read every one, and appreciate your insights!<br />
        <br />
        <a class="PatchNotes-button--feedback" href="http://web.archive.org/web/20161118234927/http://us.battle.net/forums/en/wow/1025938/">Send Feedback</a></div>

    <div class="section">
        <h3>2.11.0 - October 25, 2016</h3>

        <div class="PatchNotes-statusTag newFeatures"><span class="PatchNotes-statusTagContent">New!</span></div>

        <ul>
            <li><strong>Diablo III </strong>profiles now linked from Diablo III posters.</li>
            <li><strong>Diablo III </strong>Tooltips now integrated! </li>
            <li><strong>All: </strong>Increased opacity of "ghost" text for easier reading.</li>
        </ul>

        <div class="PatchNotes-statusTag improvements"><span class="PatchNotes-statusTagContent">Improved</span></div>

        <ul>
            <li><strong>Bug Fixes: </strong>

                <ul>
                    <li>​All Blizzard posters now correctly show their pretty animated avatars, job titles, and blue colored name. </li>
                    <li>MVP title now shows correctly under user name.</li>
                    <li>Addressed a security vulnerability.</li>
                    <li>Post command tooltips now localized for for China in traditional Chinese.</li>
                    <li>A few more minor quality-of-life bug fixes! </li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="section">
        <h3>2.10.0 - October 4, 2016</h3>

        <div class="PatchNotes-statusTag newFeatures"><span class="PatchNotes-statusTagContent">New!</span></div>

        <ul>
            <li>The <a href="/web/20161118234927/http://us.battle.net/forums/d3/"><strong>Diablo III</strong></a>, <a href="/web/20161118234927/http://us.battle.net/forums/hearthstone/"><strong>Hearthstone</strong></a> and <a href="/web/20161118234927/http://us.battle.net/forums/heroes/"><strong>Heroes of the Storm</strong></a> forums have joined all other Blizzard games on our new forum platform.</li>
            <li><strong>Like/Dislike Breakdown:</strong> Mousing over a post's score now reveals that post's total likes and dislikes.</li>
        </ul>

        <div class="PatchNotes-statusTag improvements"><span class="PatchNotes-statusTagContent">Improved</span></div>

        <ul>
            <li><strong>Stickies:</strong> We've added some spacing between stickied topics and the rest so it's easier to tell them apart.</li>
            <li><strong>Bug Fixes: </strong>Lots of them.</li>
        </ul>
    </div>

    <div class="section">
        <h3>2.8.0 - August 23, 2016</h3>

        <ul>
            <li><strong>Edit Topic Title:</strong> We added this back because we know you missed it.</li>
            <li><strong>Forum Version and Patch Notes:</strong> Hey there!</li>
            <li><strong>Overwatch Profiles Linked:</strong>  Your Overwatch profile is now linked from your forum avatar!</li>
        </ul>
    </div>

    <div class="section">
        <h3>2.7.0 - August 2, 2016</h3>

        <ul>
            <li><strong>WoW Forums Migrated:</strong> This actually happened a week before.  We're sneaky.</li>
            <li><strong>Realm list improvement:</strong> Specific to the WoW forums: if you're logged in, the forums will prioritize realms you have characters on, and collapse ones you don't.</li>
            <li><strong>WoW Guild Names Added Back:</strong> We know you missed them, and sorry we forgot them, but here they are again!</li>
            <li><strong>Removed Post Composition Restriction:</strong> You can compose even if you're on posting cooldown, because that makes sense.</li>
            <li><strong>Quote Highlighted Text:</strong> Won't work on mobile, but sorely missed on PC.  </li>
            <li><strong>"Squish":</strong> Lots of bugs.</li>
        </ul>
    </div>

    <div class="section">
        <h3>2.6.0 - July 12, 2016</h3>

        <ul>
            <li><strong>Console Posting on Overwatch Forums:</strong> Making our Overwatch forums accessible to console users with a valid game profile.</li>
            <li><strong>zomg bugs:</strong> Somewhere, a production-type is muttering to herself about test-driven development.</li>
        </ul>
    </div>

    <div class="section">
        <h3>2.5.0 - June 21, 2016</h3>

        <ul>
            <li><strong>SC2 and Battle.net Forums Migrated:</strong> Get cozy!</li>
            <li><strong>Error Messaging Improvements:</strong> You should never see these, but if you do, you'll probably be less likely to wonder what the heck just happened.</li>
            <li><strong>Bugs and Polish:</strong> My favorite mid-80s buddy-cop sitcom.</li>
        </ul>
    </div>

    <div class="section">
        <h3>2.4.0 - June 1, 2016</h3>

        <ul>
            <li><strong>Timestamp Update:</strong> A little moving around to make the forums more readable.</li>
            <li><strong>Post Navigation:</strong> In topics with multiple pages (&gt; 3), if you click on the ellipses within the post listing, you can pull up a "Go to Page" dialogue! </li>
        </ul>
    </div>

    <div class="section">
        <h3>2.3.0 - May 16, 2016</h3>

        <ul>
            <li><strong>POOOOOOOOOOOOOOOOOOLLS:</strong> They got added back to the forums!</li>
            <li><strong>Preview on Hover:</strong> On desktop a mouse over the link to the topic gives a preview of content.  On mobile, this appears as a subheading.</li>
            <li><strong>Browse-away Warning:</strong> Hey! You haven't finished that post!  You sure you want to close that browser?</li>
            <li><strong>Overwatch Avatars:</strong> WHOOOOOOOOOOOOOOOOOOOO.  (Initially only for PC players, working on console.)  (I like "O"s.)  </li>
            <li><strong>Blizzcon Migrated:</strong> Welcome, friends!</li>
            <li><strong>Bug Fixes:</strong> We're a locomotive, and bugs are our coal.  Shovel a few more on the fire!  </li>
        </ul>
    </div>

    <div class="section">
        <h3>2.2.0 - May 2, 2016</h3>

        <ul>
            <li>We don't talk about 2.2.0.</li>
        </ul>
    </div>

    <div class="section">
        <h3>2.1.0 - April 19, 2016</h3>

        <ul>
            <li><strong>Breadcrumb Update:</strong> Improvement to the breadcrumb navigation.</li>
            <li><strong>MVP and Moderator Upgrades:</strong> Seekrit improvements.</li>
            <li><strong>Bug Fixes:</strong> Forever.</li>
        </ul>
    </div>

    <div class="section">
        <h3>2.0.0 - April 5, 2016</h3>

        <ul>
            <li><strong>MAJOR VERSION BUMP:</strong> THIS ISN'T EVEN OUR FINAL FORM.</li>
            <li><strong>Up/Down Votes:</strong> We know you missed it. It's back.</li>
            <li><strong>User Menu:</strong> You can find it in the top right, next to the Overwatch home site link. Currently only shows your latest posts, but someday it will be mighty.</li>
            <li><strong>Mobile Menu:</strong> It's way better now! Navigation through the forums should be much easier for those of you viewing on tablets or mobile devices.</li>
            <li><strong>Bug Fixes:</strong> Lots of them.</li>
        </ul>
    </div>

    <div class="section">
        <h3>1.5.0 - March 10, 2016</h3>

        <ul>
            <li><strong>State Text on Forums:</strong> Easier to tell if a forum's locked/read-only.</li>
            <li><strong>Search by Specific Forum/All Forums:</strong> Search bar added to the forum landing page allows you to search through all forums. Search bar within a forum (General Discussion, Bug Reports) only searches in that forum.</li>
            <li><strong>Last Post/Timestamp Links:</strong> Last post visited "bookmarks" that thread with a "Go to Last Post" link so you can jump to the latest updates. This is client-side only at this time. We hope to move this to a server setting in the future.</li>
            <li><strong>Timestamp Links:</strong> A post's timestamp now functions as a direct link to that post</li>
            <li><strong>Posting Cooldown:</strong> Browser-side countdown timer for when you can post next</li>
        </ul>
    </div>

    <div class="section">
        <h3>1.4.0 - February 19, 2016</h3>

        <ul>
            <li><strong>Visited Topics:</strong> If you've visited a topic, it will display as grayed out until new posts are added.</li>
            <li><strong>Linking to Posts:</strong> You can now link to an individual post using the "More Options" dropdown (the little [v] button in the post)</li>
            <li><strong>Ignore User:</strong> You can now ignore a user (this grays out and collapses their posts; you can unignore them if you decide you like them again after all). This is also available from the "More Options" dropdown.</li>
            <li><strong>Blizz Badge Links to First Blizz Post:</strong> The handy "Blizz" badge on a topic now links to the first Blizz-blue post in that topic.</li>
            <li><strong>Tooltips:</strong> Many buttons, icons, and menus now display a helpful tooltip.</li>
            <li><strong>Better Error Handling for Missing Pages:</strong> You probably won't ever notice this feature until you need to.</li>
            <li><strong>Bug fixes:</strong> Mostly design and translation polish.</li>
        </ul>
    </div>
</section>
</x-forum-layout>
