<?php

namespace App\Http\Controllers\export;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Excel;
use App\produce;
use App\bu;
use DB;
use Session;

class ExportProController extends Controller 
{

    

    // use Exportable;
    // public function collection() {
    //     $produces = produce::where('bu_id', Session('bu_produce'))->get();
    //     foreach($produces as $value) {
    //         $produce[] = [
    //             '0' => $value->name,
    //             '1' => $value->code,
    //             '2' => $value->address,
    //             '3' => $value->follow,
    //             '4' => $value->mail,
    //             '5' => $value->phone,
    //             '6' => $value->remark,
    //         ];
    //     }
    //    return (collect($produce));
    // }

    // public function headings(): array
    // {
    //     return [
    //         'name',
    //         'Code',
    //         'Address',
    //         'Follow',
    //         'Mail',
    //         'Phone',
    //         'Remark',
    //     ];
    // }

    public function getExcelProduce() {
        $customer_data = DB::table('produce')->where('bu_id', Session('bu_produce'))->get()->toArray();
            $customer_array[] = array('Name', 'Code', 'Address', 'Mail', 'Follow', 'Phone');
            foreach($customer_data as $customer)
                {
                    $customer_array[] = array(
                    'Name'  => $customer->name,
                    'Code'   => $customer->code,
                    'Address'    => $customer->address,
                    'Mail'  => $customer->mail,
                    'Follow'   => $customer->follow,
                    'Phone'   => $customer->phone,
                    );
                }
            Excel::create('Produce', function($excel) use ($customer_array){
            $excel->setTitle('Produce');
            $excel->sheet('Produce', function($sheet) use ($customer_array){
            $sheet->fromArray($customer_array, null, 'A1', false, false);
            });
        })->download('xlsx');

        return redirect()->back();
    //     return Excel::download(new ExportProController, 'Produce.xlsx');
    }
}
