<?php

namespace App\Http\Controllers\export;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Session;
use App\provarcost;
use App\produce;

class ExportBu_Pro_VariableController extends Controller implements FromCollection, WithHeadings
{
    use Exportable;
    public function collection() {
        $produces = provarcost::whereIn('pro_id', Session('bu_produces'))->get();
        foreach($produces as $value) {
            $excel[] = [
                    '1' => $value->item,
                    '2' => $value->amount,
                    '3' => $value->qty,
                    '4' => $value->total,
                    '5' => $value->date,
                    '6' => $value->remark,
                ];
            }
       return (collect($excel));
    }

    public function headings(): array
    {
        return [
            'Item',
            'Amount',
            'Qty',
            'Total',
            'Date',
            'Remark',
        ];
    }

    public function getExcel() {
        return Excel::download(new ExportBu_Pro_VariableController, 'Produce_variable.xlsx');
    }
}
