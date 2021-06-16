<?php

use Illuminate\Database\Seeder;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
                'title' => 'Русский',
                'code' => 'ru-ru',
                'published' => 1,
        ]);
        
        DB::table('languages')->insert([
                'title' => 'Deutsch',
                'code' => 'de-de',
                'published' => 1,
        ]);
    
        DB::table('languages')->insert([
                'title' => 'English (US)',
                'code' => 'en-us',
                'published' => 1,
        ]);
    
        DB::table('languages')->insert([
                'title' => 'English (EU)',
                'code' => 'en-gb',
                'published' => 1,
        ]);
    
        DB::table('languages')->insert([
                'title' => 'Español (EU)',
                'code' => 'es-es',
                'published' => 1,
        ]);
    
        DB::table('languages')->insert([
                'title' => 'Español (AL)',
                'code' => 'es-mx',
                'published' => 1,
        ]);
    
        DB::table('languages')->insert([
                'title' => 'Français',
                'code' => 'fr-fr',
                'published' => 1,
        ]);
    
        DB::table('languages')->insert([
                'title' => 'Italiano',
                'code' => 'it-it',
                'published' => 1,
        ]);
        
        DB::table('languages')->insert([
                'title' => 'Português (AL)',
                'code' => 'pt-br',
                'published' => 1,
        ]);
        
        DB::table('languages')->insert([
                'title' => 'Português (EU)',
                'code' => 'pt-pt',
                'published' => 1,
        ]);
        
        DB::table('languages')->insert([
                'title' => '한국어',
                'code' => 'ko-kr',
                'published' => 1,
        ]);
        
        DB::table('languages')->insert([
                'title' => '繁體中文',
                'code' => 'zh-tw',
                'published' => 1,
        ]);
        
        DB::table('languages')->insert([
                'title' => '简体中文',
                'code' => 'zh-cn',
                'published' => 1,
        ]);
    }
}
