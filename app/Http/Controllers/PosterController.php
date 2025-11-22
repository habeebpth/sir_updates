<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Contracts\View\View;

class PosterController extends Controller
{
    public function index(ViewFactory $view_factory): View
    {
        // Get all blog posts to display as posters
        $posters = Post::orderBy('created_at', 'desc')->paginate(12);

        return $view_factory->make('poster.index', compact('posters'));
    }
}
