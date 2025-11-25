<?php

namespace App\Http\Controllers\Admin\Faq;

use App\Http\Controllers\Controller;
use App\Models\FaqDoubt;
use Illuminate\Http\RedirectResponse;

class DoubtUpdateController extends Controller
{
    public function __invoke(FaqDoubt $doubt): RedirectResponse
    {
        $doubt->update(['is_reviewed' => true]);

        return redirect()
            ->route('admin.faq.doubts.index')
            ->with('success', 'Doubt marked as reviewed.');
    }
}

