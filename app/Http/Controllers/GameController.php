<?php

namespace App\Http\Controllers;

use App\Models\Characters\Arena;
use App\Models\Classes;
use App\Models\Races;
use App\Services\Server;
use Butschster\Head\Facades\Meta;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function recruit () {
        Meta::prependTitle('Пригласи друга')
            ->setDescription('Позовите в игру друзей, чтобы вместе странствовать по Азероту и получить потрясающие награды.');
        return view('game.recruit_friend');
    }

    public function leaderboards () {
        Meta::prependTitle(' - Рейтинги подземелий с эпохальным ключом')
            ->setDescription('Просмотрите список игроков с наиболее высоким рейтингом на этой неделе. Кто занимает первое место в подземелье &quot;Кровавые катакомбы&quot;?');
        return view('game.pve.leaderboards', [
            'data' => Arena::with('characters')->where('slot', 0)->where('rating', '>', 0)->orderBy('rating', 'desc')->paginate(30)
        ]);
    }

    public function arena_two () {
        Meta::prependTitle('Арена 2х2 - Рейтинговая таблица PvP')
            ->setDescription('Сильнейшие среди героев Альянса и Орды сражаются за славу на аренах и полях боя. В этой таблице указана 1000 лучших игроков вашего региона.');
        return view('game.pvp.arena_two', [
            'data' => Arena::with('characters')->where('slot', 0)->where('rating', '>', 0)->orderBy('rating', 'desc')->paginate(30)
        ]);
    }

    public function arena_tree () {
        Meta::prependTitle('Арена 3х3 - Рейтинговая таблица PvP')
            ->setDescription('Сильнейшие среди героев Альянса и Орды сражаются за славу на аренах и полях боя. В этой таблице указана 1000 лучших игроков вашего региона.');
        return view('game.pvp.arena_tree', [
            'data' => Arena::with('characters')->where('slot', 1)->where('rating', '>', 0)->orderBy('rating', 'desc')->paginate(30)
        ]);
    }

    public function battlegrounds () {
        Meta::prependTitle('Поля боя 10x10 - Рейтинговая таблица PvP')
            ->setDescription('Сильнейшие среди героев Альянса и Орды сражаются за славу на аренах и полях боя. В этой таблице указана 1000 лучших игроков вашего региона.');
        return view('game.pvp.battlegrounds', [
            'data' => Arena::with('characters')->where('slot', 3)->where('rating', '>', 0)->orderBy('rating', 'desc')->paginate(30)
        ]);
    }

    public function calculator () {
        Meta::prependTitle('Таланты')
            ->setDescription('Просмотреть все таланты, доступные для классов игровых персонажей World of Warcraft.');
        return view('game.talent-calculator');
    }

    public function status () {
        return view('game.status');
    }

    public function races () {
        Meta::prependTitle(__('races.races_11'))
            ->setDescription(__('races.races_12'));
        return view('game.races', [
            'race' => Races::select(['name', 'images_main', 'images_main_two', 'slug', 'faction'])->get()
        ]);
    }

    public function races_view($race) {
        $races = Races::where('slug', $race)->firstOrFail();
        Meta::prependTitle($races->getTranslatedAttribute('name', App()->getLocale(), 'en-gb'))
            ->setDescription($races->getTranslatedAttribute('description', App()->getLocale(), 'en-gb'), 200);
        return view('game.races_view', [
            'race' => $races,
            'other' => Races::where('slug', '!=', $race)->limit(2)->get()
        ]);
    }

    public function classes_view($classes) {
        $class = Classes::where('slug', $classes)->firstOrFail();
        Meta::prependTitle($class->getTranslatedAttribute('name', App()->getLocale(), 'en-gb'))
            ->setDescription($class->getTranslatedAttribute('description', App()->getLocale(), 'en-gb'), 200);
        return view('game.classes_view', [
            'classes' => $class,
            'other' => Classes::where('slug', '!=', $classes)->limit(2)->get()
        ]);
    }

    public function classes () {
        Meta::prependTitle(__('classes.classes_7'))
            ->setDescription(__('classes.classes_8'));
        $first = Classes::all()->reverse()->take(6);
        $last = Classes::all()->reverse()->skip(6)->take(6);
        $num = 0;
        return view('game.classes', [
            'first' => $first,
            'last' => $last,
            'num' => $num
        ]);
    }

    public function graphql(Request $request) {
        if ($request->get('operationName') === 'GetInitialRealmStatusData') {
            return Server::status();
        } else {
            return json_encode(
                ["errors"=>[["message"=>"PersistedQueryNotSupported"]]]
            );
        }
    }
}
