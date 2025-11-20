<?php

namespace App\Http\Controllers\Admin\Faq;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Faq\UpdateRequest;
use App\Models\Faq;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Faq $faq)
    {
        $data = $request->validated();
        $faq->update($data);

        return redirect()->route('admin.faq.index')->with('success', 'FAQ updated successfully');
    }
}
