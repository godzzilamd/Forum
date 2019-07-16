<?php

use Illuminate\Database\Seeder;

class SanctionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sanctions')->insert([
            [
                'name' => 'image_upload',
                'description' => 'Interzice incarcarea unei imagini',
            ],
            [
                'name' => 'public_image_upload',
                'description' => 'Interzice incarcarea unei imagini in albumul public',
            ],
            [
                'name' => 'edit_persoanl_profile',
                'description' => 'Interzice editarea profilului personal',
            ],
            [
                'name' => 'ban',
                'description' => 'Interzice logarea pe profilul personal',
            ],
            [
                'name' => 'no_topics',
                'description' => 'Interzice crearea topicelor',
            ],
            [
                'name' => 'no_messages',
                'description' => 'Interzice trimiterea mesajelor',
            ],
            [
                'name' => 'no_posts',
                'description' => 'Interzice scrierea posturilor la topic',
            ],
            [
                'name' => 'no_like',
                'description' => 'Interzice punerea de likeuri la topic',
            ],
        ]);
    }
}
