<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(){
        $posts = Post::factory(100)->create();

        foreach ($posts as $post) {
            Image::factory(1)->create([
                'imageable_id' => $post->id,
                'imageable_type' => Post::class
            ]);
            /**
             * se puede realizar un random del 1 al 8 pero se podrian repetir los tags
             * por lo que al crear 8 tags indicamos el rango 1 al 4 para el primer post
             * y del 5 al 8 para el segundo post
            $post->tags()->attach([
                Tag::all()->random()->id,
                Tag::all()->random()->id
            ]);
             **/
            $post->tags()->attach([
                rand(1,4),
                rand(5,8)
            ]);
        }
    }
}
