<?php

namespace App\Http\Controllers\Admin\Faq;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('admin.faq.create');
    }
}
