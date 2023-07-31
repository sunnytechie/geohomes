<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
//use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PdfController extends Controller
{
    public function generateInitialPdf($id) {
        $transaction = Transaction::find($id);

        return view('dashboard.pdf.intial', compact('transaction'));
    }

    public function generateFinalPdf($id) {
        $transaction = Transaction::find($id);

        return view('dashboard.pdf.final', compact('transaction'));
    }

    public function downloadInitialPdf($id){

        $data = ['transaction' => Transaction::find($id)];

        // Instantiate the PDF class
        $pdf = app()->make('dompdf.wrapper');

        // Load the view and convert to PDF
        $pdf->loadView('dashboard.pdf.download.initial', $data);

        // (Optional) Set paper size and orientation. Default is A4 portrait.
        $pdf->setPaper('A4', 'portrait');

        return $pdf->download('initialPaper.pdf');
    }


    public function downloadFinalPdf($id){

        $data = ['transaction' => Transaction::find($id)];

        // Instantiate the PDF class
        $pdf = app()->make('dompdf.wrapper');

        // Load the view and convert to PDF
        $pdf->loadView('dashboard.pdf.download.final', $data);

        // (Optional) Set paper size and orientation. Default is A4 portrait.
        $pdf->setPaper('A4', 'portrait');

        return $pdf->download('finalPaper.pdf');
    }


}
