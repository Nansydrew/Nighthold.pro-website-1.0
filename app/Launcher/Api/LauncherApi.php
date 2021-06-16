<?php

namespace App\Launcher\Api;

use App\Models\Post;
use App\Services\Utils;
use App\Launcher\Data\{LauncherVersion, ShopItem};
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Collection;
use File;

class LauncherApi
{

	public function getAllNews()
    {
		$raw = Post::select('id', 'title', 'excerpt', 'image', 'slug')->orderBy('created_at', 'desc')->get();

        $collection = [];
        foreach($raw as $key) {
            $collection[] = $this->buildArticle($key);
        }
        return json_encode($collection, JSON_UNESCAPED_UNICODE);
    }

    private function buildArticle($raw)
    {
        return array(
            'title' => $raw->title,
            'description' => $raw->created_at,
            'image' => config('app.url') . '/storage/' . Utils::ImagesLogo($raw->image),
            'link' => route('news.show', [$raw->id, $raw->slug])
        );
    }

	public function getOneArticle(int $id, string $langCode = 'ru-ru')
	{
		$raw = Post::where('id', '=', $id)->get();
		if(!$raw)
		{
			$raw = Post::all()->first();
		}

		return response()->json($this->buildArticle($raw));
	}

	public function getPatchlist(bool $full, int $serverId)
	{
		$path = ($full === true) ? 'cdn/full/' : 'cdn/mini/';
		$path .= "$serverId/";
		$path .= ($full === true) ? 'full_patch.rem' : 'mini_patch.rem';

		$prepared = new Collection();
		foreach($this->splitContents(public_path($path), '*') as $key)
		{
			if($key === "") continue;

			$t = $key;
			list($fn, $rp, $hash) = explode('=', $t);

			$temp['filename'] = $fn;
			$temp['remotepath'] = $rp;
			$temp['hash'] = $hash;

			$prepared->push($temp);
		}
		return response()->json($prepared);
	}

	public function checkUpdate(string $ver)
	{
		$data = $this->splitContents(public_path('cdn/launcher/updates/version.txt'), '=');

		$comparer = new LauncherVersion($data[1]);

		return $comparer->compare($ver);
	}

	public function getUpdate(string $ver)
	{
		$uDesc = array();
		foreach($this->splitContents(public_path('cdn/launcher/updates/') . $ver . '/desc.txt', '*') as $key)
		{
			$t = $key;
			list($k, $v) = explode('=', $t);
			$uDesc[0][$k] = $v;
		}
		return response()->json($uDesc);
	}

	public function getRemoteVersionStr()
	{
		foreach($this->splitContents(public_path($this->getUpdateUri() . '/last/desc.txt'), '*') as $key)
		{
		    $temp = explode('=', $key);
		    $res = array();
		    $res[0] = $temp[1];
		    return response()->json($res);
		}
	}

    private function splitContents(string $filepath, string $lineDelimeter)
    {
        try
        {
            $contents = File::get($filepath);

            return explode($lineDelimeter, $contents);
        }
        catch (FileNotFoundException $e)
        {
            return 'Error: ' . $e->getMessage() . '\n Stacktrace:' . $e->getTraceAsString();
        }
    }

	public function getUpdateUtil()
	{
		return $this->getUpdateUri() . '/IgniteUpdater.exe';
	}

	public function getShopItems()
	{
        $all = Shop::select('title', 'price', 'short_code', 'item_id', 'images', 'item_type')->get();

        $response = new Collection();

        foreach($all as $element)
        {
            $temp = new ShopItem();
            $response->push(
                $temp->setImage(config('app.url'), $element['images'])
                     ->build($element)
                     ->toJson());
        }

        return $response;
	}

	public function getShopOneItem(int $id)
	{
        $selected = Shop::where('item_id', '=', $id)->get();
        if(!$selected || $selected->count() == 0)
        {
            $selected = NULL;
            $selected = 'Error: this item not found in public shop!';
        }

        return response()->json($selected);
	}

	public function getImagesUri()
    {
        return config('app.url') . 'uploads/news/';
    }

    public function getUpdateUri()
    {
        return 'cdn/launcher/updates/';
    }

}
