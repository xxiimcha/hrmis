<?php

namespace App\Http\Controllers\Authenticated;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\EmployeeTable;
use Carbon\Carbon;
use Elibyy\TCPDF\Facades\TCPDF;

class DownloadFiles extends Controller
{
    public function downloadServiceRecord(string $employeeNo) {
        $employee = EmployeeTable::find($employeeNo);
        $pdf = Pdf::loadView('download.service-record', [
            'employee' => $employee
        ])->setPaper('legal')->setOptions([ 'isHtml5ParserEnabled' => true, 'defaultFont' => 'sans-serif' ]);

        return $pdf->download(date('m-d-Y') . '_' . time() . '_service-record.pdf');
    }

    public function downloadLeaveCard(string $employeeNo) {
        $employee = EmployeeTable::find($employeeNo);
        $pdf = Pdf::loadView('download.leave-card', [
            'employee' => $employee
        ])->setPaper('legal', 'landscape')->setOptions([ 'isHtml5ParserEnabled' => true, 'defaultFont' => 'sans-serif' ]);

        return $pdf->download(date('m-d-Y') . '_' . time() . '_leave-card.pdf');
    }

    public function downloadLeaveForm() {
        $pdf = new TCPDF();

        $html = view()->make('download.application-leave-form')->render();
        $pdf::SetTitle('Hello World');
        $pdf::AddPage();
        $pdf::writeHTML($html, true, false, true, false, '');
        $pdf::Output(date('m-d-Y') . '_' . time() . '_leave-form.pdf', 'D');
    }
}
