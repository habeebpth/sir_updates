<?php

namespace App\Http\Controllers;

use App\Models\FaqDoubt;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FaqDoubtController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|min:7|max:20',
            'doubt' => 'required|string|max:1500',
        ]);

        FaqDoubt::create($data);

        return redirect()
            ->route('faq.index')
            ->with('doubt_success', 'നിങ്ങളുടെ സംശയം ഞങ്ങൾ സ്വീകരിച്ചു. ഉടൻ തന്നെ പരിശോധിക്കും.');
    }
}


