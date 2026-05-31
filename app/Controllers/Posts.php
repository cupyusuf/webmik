<?php

namespace App\Controllers;

use App\Services\ContentService;

class Posts extends \App\Controllers\BaseController
{
    public function index(): string
    {
        $service = new ContentService();

        return view('posts/index', $service->postsPage());
    }
}
