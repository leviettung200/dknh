<?php

namespace App\Exports;

use App\Models\CertificateModel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CertificateExport implements FromView, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
    public function view(): View
    {
        return view('admin.certificate.export_certificate', [
            'certificates' => CertificateModel::whereIn('id',$this->id)->orderBy('id', 'ASC')->get()
        ]);
    }
}
