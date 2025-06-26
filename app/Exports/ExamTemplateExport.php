<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExamTemplateExport implements FromView
{
    public function view(): View
    {
        return view('admin.exam_template');
    }
}
