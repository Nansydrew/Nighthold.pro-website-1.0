<?php

use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\CharactersController;
use App\Http\Controllers\Forums\IndexController;
use App\Http\Controllers\Forums\RepliesController;
use App\Http\Controllers\FreeKassaController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GuildController;
use App\Http\Controllers\JsonController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OnlineController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RaidController;
use App\Http\Controllers\SearchController;
use App\Http\Middleware\LocaleMiddleware;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', function () {
    return redirect('/'. App::getLocale());
});

Route::get('lang/{lang}/', function ($lang) {
    $referer = Redirect::back()->getTargetUrl();
    $parse_url = parse_url($referer, PHP_URL_PATH);
    $segments = explode('/', $parse_url);
    if (in_array($segments[1], LocaleMiddleware::$languages)) {
        unset($segments[1]);
    }
    array_splice($segments, 1, 0, $lang);
    $url = Request::root().implode("/", $segments);
    if(parse_url($referer, PHP_URL_QUERY)){
        $url = $url.'?'. parse_url($referer, PHP_URL_QUERY);
    }
    return redirect($url);
})->name('lang');

Route::group(['prefix' => LocaleMiddleware::getLocales()], function(){

        Route::get('/', [MainController::class, 'index'])->name('index');
        Route::get('content-update-notes', [MainController::class, 'update'])->name('content.update');
        Route::get('/news', [NewsController::class, 'index'])->name('news.index');
        Route::get('/news/{id}/{slug}', [NewsController::class, 'show'])->name('news.show');
        Route::get('news.frag', [NewsController::class, 'frag'])->name('news.frag');

        Route::prefix('forums')->group(function () {
            Route::get('/', [IndexController::class, 'index'])->name('forums.index');
            Route::get('/patch-notes/', [IndexController::class, 'patch_notes'])->name('forums.patch.notes');
            Route::get('/new', [IndexController::class, 'new'])->name('forums.new');
            Route::get('/latest', [IndexController::class, 'latest'])->name('forums.latest');
            Route::get('/{category}', [IndexController::class, 'show'])->name('forum.show')->where('category', '[0-9]+');
            Route::post('/{category}/create', [IndexController::class, 'store'])->name('forum.topic.store');
            Route::get('/topic/{thread}', [IndexController::class, 'topic'])->name('topic.show');
            Route::post('/replies/{thread}', [RepliesController::class, 'store'])->name('forum.topic.reply.create');
            Route::get('/search', [SearchController::class, 'forum'])->name('forum.search');
        });

        Route::get('game/talent-calculator', [GameController::class, 'calculator'])->name('talent.calculator');
        Route::get('game/status/eu', [GameController::class, 'status'])->name('status');
        Route::get('game/races', [GameController::class, 'races'])->name('races');
        Route::get('game/races/{race}', [GameController::class, 'races_view'])->name('races.view');
        Route::get('game/classes', [GameController::class, 'classes'])->name('classes');
        Route::get('game/classes/{classes}', [GameController::class, 'classes_view'])->name('classes.view');

        Route::get('game/recruit-a-friend', [GameController::class, 'recruit'])->name('recruit');

        Route::get('game/pvp/leaderboards/2v2', [GameController::class, 'arena_two'])->name('arena_two');
        Route::get('game/pvp/leaderboards/3v3', [GameController::class, 'arena_tree'])->name('arena_tree');
        Route::get('game/pvp/leaderboards/battlegrounds', [GameController::class, 'battlegrounds'])->name('battlegrounds');

        Route::get('game/pve/leaderboards/{server}/{instance}', [GameController::class, 'leaderboards'])->name('leaderboards');

        Route::get('pages/{id}/{slug}', [PagesController::class, 'view'])->name('pages.view');

        Route::get('character', [CharactersController::class, 'index'])->name('characters.index');
        Route::get('character/eu/{server}/{characters}', [CharactersController::class, 'show'])->name('characters.show');
        Route::get('character/eu/{server}/{characters}/model.json', [CharactersController::class, 'model']);
        Route::get('character/eu/{server}/{characters}/achievements', [CharactersController::class, 'achievements'])->name('achievements');
        Route::get('character/eu/{server}/{characters}/achievements/model.json', [CharactersController::class, 'achievementsModel']);
        Route::get('character/eu/{server}/{characters}/collections/pets.json', [CharactersController::class, 'petsModel']);
        Route::get('character/eu/{server}/{characters}/pve/raids.json ', [CharactersController::class, 'raidsModel']);
        Route::get('character/eu/{server}/{characters}/pve/raids', [CharactersController::class, 'raids']);
        Route::get('character/eu/{server}/{characters}/pvp', [CharactersController::class, 'pvp'])->name('pvp');
        Route::get('character/eu/{server}/{characters}/pvp.json', [CharactersController::class, 'pvpModel']);
        Route::get('character/eu/{server}/{characters}/reputation.json', [CharactersController::class, 'reputationModel']);
        Route::get('character/eu/{server}/{characters}/reputation', [CharactersController::class, 'reputation'])->name('reputation');

        Route::get('character/eu/{server}/{characters}/pve/raids/{key}/{ids}/details.frag', [RaidController::class, 'index'])->name('raid.details');

        Route::get('guild/eu/{server}/{guild_name}', [GuildController::class, 'show'])->name('guild.show');

        Route::get('search', [SearchController::class, 'index'])->name('search');
        Route::get('search/character', [SearchController::class, 'character'])->name('search.character');
        Route::get('search/blog', [SearchController::class, 'blog'])->name('search.blog');

        Route::get('online', [OnlineController::class, 'index'])->name('online.index');

        Route::get('/referral-link', [MainController::class, 'referral']);
    }
);

require __DIR__.'/auth.php';

Route::get('/cookie', function () {
    return Cookie::get('referral');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::get('clear', function() {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        return "Кэш очищен.";
    });
});

Route::group(['prefix' => 'forums'], function () {
    Route::post('topic/post/{user}/block', [JsonController::class, 'block']);
    Route::post('topic/post/{thread}/report', [JsonController::class, 'report']);
    Route::get('topic/post/{topic}/frag', [JsonController::class, 'frag']);
    Route::post('topic/post/{topic}/edit', [JsonController::class, 'edit']);
    Route::post('topic/post/{topic}/up', [JsonController::class, 'up']);
    Route::post('topic/post/{topic}/down', [JsonController::class, 'down']);
    Route::post('topic/post/{topic}/delete', [JsonController::class, 'delete']);
    Route::post('topic/post/{topic}/closed', [JsonController::class, 'closed']);
    Route::post('topic/post/{topic}/unclosed', [JsonController::class, 'unclosed']);
    Route::post('topic/post/{topic}/sticky', [JsonController::class, 'sticky']);
    Route::post('topic/post/{topic}/unsticky', [JsonController::class, 'unsticky']);
});

Route::prefix('dashboard')->group(function () {
    Route::get('{any}', AccountController::class)
        ->where('any', '.*')
        ->middleware('auth')
        ->name('user');
});

Route::post('graphql', [GameController::class, 'graphql'])->name('graphql');
Route::get('navbar/notifications.json', [JsonController::class, 'notifications'])->name('json.notifications');
Route::get('support/update/json', [JsonController::class, 'update'])->name('json.update');

Route::get('freekassa/result', [FreeKassaController::class, 'searchOrder']);
