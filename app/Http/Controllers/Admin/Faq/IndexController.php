<?php

namespace App\Http\Controllers\Admin\Faq;

use App\Http\Controllers\Controller;
use App\Models\Faq;

class IndexController extends Controller
{
    public function __invoke()
    {
        $faqs = Faq::ordered()->paginate(20);
        return view('admin.faq.index', compact('faqs'));
    }
}
