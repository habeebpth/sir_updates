<?php

namespace App\Http\Controllers\Admin\Faq;

use App\Http\Controllers\Controller;
use App\Models\FaqDoubt;

class DoubtIndexController extends Controller
{
    public function __invoke()
    {
        $doubts = FaqDoubt::latest()->paginate(20);

        return view('admin.faq.doubts', compact('doubts'));
    }
}


