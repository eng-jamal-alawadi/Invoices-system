<?php

namespace App\Exports;

use App\Models\invoices;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class InvoicesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return invoices::all();

        // return invoices::select('invoice_number','invoice_Date','due_date','product','section_id','amount_collection')->get();


    }
}



// class InvoicesExport implements FromView
// {
//     public function view(): View
//     {
//          $invoices = invoices::all();
//         return view('invoices.invoicesExport', compact('invoices'));
//     }
// }


