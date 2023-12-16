<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $admin = User::first();

        $admin->pages()->saveMany([
            $home = new Page([
                'title' => 'Home',
                'url' => 'home',
                'content' => 'this is Home Page',
            ]),
            $about = new Page([
                'title' => 'About',
                'url' => 'about',
                'content' => 'this is About Page',
            ]),
            $contact = new Page([
                'title' => 'Contact Us',
                'url' => 'contact-us',
                'content' => 'this is Contact Page',
            ]),
            $faq = new Page([
                'title' => 'Faq',
                'url' => 'faq',
                'content' => 'this is Contact Page',
            ])
        ]);

        $about->appendNode($faq);

    }
}
