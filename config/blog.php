<?php
/**
 * Created by PhpStorm.
 * User: gineign
 * Date: 2018/12/21
 * Time: 上午9:56
 */
return [
    'name' => "蛋蛋",
    'title' => 'My Blog',
    'subtitle' => 'http://www.yzhen.xyz',
    'description' => '好好学习天天向上',
    'author' => 'thomas',
    'page_image' => 'home-bg.jpg',
    'posts_per_page' => 10,
    'uploads' => [
        'storage' => 'public',
        'webpath' => '/storage',
    ],

    'rss_size' => 25,
    'contact_email'=>env('MAIL_FROM'),
];
