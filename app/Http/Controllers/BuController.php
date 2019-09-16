<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bucategory;
use App\bu;
use App\procategory;
use App\produce;
use App\itemcategory;
use App\costcategory;
use App\buvarcost;
use App\bufixcost;
use App\burevenue;
use App\buprofitshare;
use App\provarcost;
use App\profixcost;
use App\prorevenue;
use App\proprofitshare;
use App\proline;
use App\User;
use Session;
use DB;
use Excel;
use Rap2hpoutre\FastExcel\FastExcel;
use PDF;
use Carbon\Carbon;

class BuController extends Controller
{
    public function getList() {
        $data = [
            'bu' => bu::all(),
            'procategory' => procategory::where('is_deleted', 0)->get(),
            'proline' => proline::where('is_deleted', 0)->get(),
            'bucategory' => bucategory::where('is_deleted', 0)->get(),
        ];
        return view('admin.themes.bu.list', $data);
    }

    public function getAdd() {
        $bucategory = bucategory::where('is_deleted', 0)->get();
        return view('admin.themes.bu.add', compact('bucategory'));
    }

    public function postAdd(Request $request) {
        $this->validate($request,
        [
            'name' => 'required|min:2|max:255',
            'code' => 'required|min:8|max:10',
            'address' => 'required',
            'tax' => 'required|min:8|max:10',
            'follow' => 'required',
            'mail' => 'required|email|unique:bu,mail',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'remark' => 'required'
        ],
        [
            'name.required' => 'Company name may not be blank.',
            'name.min' => 'Company name has an invalid length.',
            'name.max' => 'Company name has an invalid length.',
            'code.required' => 'Code may not be blank.',
            'code.min' => 'Code has an invalid length.',
            'code.max' => 'Code has an invalid length.',
            'address.required' => 'Address may not be blank.',
            'tax.required' => 'Tax may not be blank.',
            'tax.min' => 'Tax has an invalid length.',
            'tax.max' => 'Tax has an invalid length.',
            'follow.required' => 'Follow may not be blank.',
            'mail.requird' => 'Email may not be blank.',
            'mail.email' => 'Invalid email.',
            'mail.unique' => 'Email is already in use',
            'phone.required' => 'Phone may not be blank.',
            'phone.regex' => 'invalid phone number.',
            'remark.required' => 'Remark may not be blank.',
        ]);
        $bucategory_ = bucategory::where('is_deleted', 0)->get();
        foreach($bucategory_ as $key => $value) {
            $bucategory[$value->id] = $value;
        }
        if(!array_key_exists($request->bucategory_id, $bucategory)) {
            abort('404');
        }
        bu::create([
            'name' => $request->name,
            'code' => $request->code,
            'address' => $request->address,
            'bucategory_id' => $request->bucategory_id,
            'tax' => $request->tax,
            'follow' => $request->follow,
            'mail' => $request->mail,
            'phone' => $request->phone,
            'remark' => $request->remark,
            'is_deleted' => 0,
            'created_at' => date(now()),
            'updated_at' => date(now()),
        ]);

        return redirect()->back()->with('success', 'Add a successful company.');
    }

    public function postEdit(Request $request, $id) {
        $bu = bu::find($id);
        if(is_null($bu)) {
            abort('404');
        }
        $this->validate($request,
        [
            'name' => 'required|min:2|max:255',
            'code' => 'required|min:8|max:10',
            'address' => 'required',
            'tax' => 'required|min:8|max:10',
            'follow' => 'required',
            'mail' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'remark' => 'required'
        ],
        [
            'name.required' => 'Company name may not be blank.',
            'name.min' => 'Company name has an invalid length.',
            'name.max' => 'Company name has an invalid length.',
            'code.required' => 'Code may not be blank.',
            'code.min' => 'Code has an invalid length.',
            'code.max' => 'Code has an invalid length.',
            'address.required' => 'Address may not be blank.',
            'tax.required' => 'Tax may not be blank.',
            'tax.min' => 'Tax has an invalid length.',
            'tax.max' => 'Tax has an invalid length.',
            'follow.required' => 'Follow may not be blank.',
            'mail.requird' => 'Email may not be blank.',
            'mail.email' => 'Invalid email.',
            'phone.required' => 'Phone may not be blank.',
            'phone.regex' => 'invalid phone number.',
            'remark.required' => 'Remark may not be blank.',
        ]);
        $bucategory_ = bucategory::where('is_deleted', 0)->get();
        foreach($bucategory_ as $key => $value) {
            $bucategory[$value->id] = $value;
        }
        if(!array_key_exists($request->bucategory_id, $bucategory)) {
            abort('404');
        }
        $bu->update([
            'name' => $request->name,
            'code' => $request->code,
            'address' => $request->address,
            'bucategory_id' => $request->bucategory_id,
            'tax' => $request->tax,
            'follow' => $request->follow,
            'mail' => $request->mail,
            'phone' => $request->phone,
            'remark' => $request->remark,
            'is_deleted' => 0,
            'updated_at' => date(now()),
        ]);

        return redirect()->back()->with('success', 'Update a successful company.');
        
    }

    public function getEdit($id) {
        $bucategory = bucategory::where('is_deleted', 0)->get();
        $bu = bu::find($id);
        if(is_null($bu)) {
            abort('404');
        }

        return view('admin.themes.bu.edit', compact('bu', 'bucategory'));
    }

    public function getDetail($id) {
        $bu = bu::find($id);
        if(is_null($id)) {
            abort('404');
        }
        $produce = DB::table('produce')->where('bu_id',$id)->get()->toArray();
        Session::put('bu_produce', $id);
        foreach($produce as $k => $v) {
            $produces[] = $v->id;
        }
        Session::put('bu_produces', $produces);
        $provarcost = provarcost::whereIn('pro_id', $produces)->get();
        $profixcost = profixcost::whereIn('pro_id', $produces)->get();
        $prorevenue = prorevenue::whereIn('pro_id', $produces)->get();
        $proprofitshare = proprofitshare::whereIn('pro_id', $produces)->get();
        $total_profixcost = 0;
        foreach($profixcost as $key => $value) {
            $total_profixcost += ($value->total);
        }
        $total_provarcost = 0;
        foreach($provarcost as $key => $value) {
            $total_provarcost += ($value->total);
        }
        $total_prorevenue = 0;
        foreach($prorevenue as $key => $value) {
            $total_prorevenue += ($value->amount);
        }
        $total_profitshare = 0;
        foreach($proprofitshare as $key => $value) {
            $total_profitshare += ($value->amount);
        }
        $data = [
            'bucategory' => bucategory::where('is_deleted', 0)->get(),
            'bu' => $bu,
            'procategory' => procategory::all(),
            'produce' => $produce,
            'itemcart' => itemcategory::all(),
            'costcart' => costcategory::all(),
            'buvarcost' => buvarcost::where('bu_id', $id)->get(),
            'bufixcost' => bufixcost::where('bu_id', $id)->get(),
            'burevenue' => burevenue::where('bu_id', $id)->get(),
            'buprofitshare' => buprofitshare::where('bu_id', $id)->get(),
            'total_profixcost' => $total_profixcost,
            'total_provarcost' => $total_provarcost,
            'total_prorevenue' => $total_prorevenue,
            'total_profitshare' => $total_profitshare,
            'provarcost' => $provarcost,
            'profixcost' => $profixcost,
            'prorevenue' => $prorevenue,
            'proprofitshare' => $proprofitshare,
        ];
        $total_bufixcost = 0;
        foreach($data['bufixcost'] as $key => $value) {
            $total_bufixcost += ($value->total);
        }
        $total_buvarcost = 0;
        foreach($data['buvarcost'] as $key => $value) {
            $total_buvarcost += ($value->total);
        }
        $total_burevenue = 0;
        foreach($data['burevenue'] as $key => $value) {
            $total_burevenue += ($value->amount);
        }
        $total_buprofitshare = 0;
        foreach($data['buprofitshare'] as $key => $value) {
            $total_buprofitshare += ($value->amount);
        }
        $total_amount = $total_burevenue - ($total_bufixcost+$total_buvarcost);
        Session::put('total_amount', $total_amount);
        return view('admin.themes.bu.detail', $data, compact('total_bufixcost', 'total_buvarcost', 'total_burevenue', 'total_amount', 'total_buprofitshare'));
    }

    public function getDelete($id) {
        $bu = bu::find($id);
        if(is_null($bu)) {
            abort('404');
        }
        $bu->delete();

        return redirect()->back()->with('success', 'Successfully deleted the company.');
    }

    public function postAddProduct(Request $request, $id) {
        $this->validate($request,
        [
            'name' => 'required|min:2|max:255',
            'code' => 'required|min:8|max:10',
            'address' => 'required',
            'follow' => 'required',
            'mail' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'remark' => 'required'
        ],
        [
            'name.required' => 'Company name may not be blank.',
            'name.min' => 'Company name has an invalid length.',
            'name.max' => 'Company name has an invalid length.',
            'code.required' => 'Code may not be blank.',
            'code.min' => 'Code has an invalid length.',
            'code.max' => 'Code has an invalid length.',
            'address.required' => 'Address may not be blank.',
            'follow.required' => 'Follow may not be blank.',
            'mail.requird' => 'Email may not be blank.',
            'mail.email' => 'Invalid email.',
            'phone.required' => 'Phone may not be blank.',
            'phone.regex' => 'invalid phone number.',
            'remark.required' => 'Remark may not be blank.',
        ]);
        $procategoory_ = procategory::all();
        foreach($procategoory_ as $key => $value) {
            $procategory[$value->id] = $value;
        }
        if(!array_key_exists($request->procategory_id, $procategory)) {
            abort('404');
        }
        produce::create([
            'name' => $request->name,
            'bu_id' => $id,
            'code' => $request->code,
            'address' => $request->address,
            'procategory_id' => $request->procategory_id,
            'follow' => $request->follow,
            'mail' => $request->mail,
            'phone' => $request->phone,
            'remark' => $request->remark,
            'is_deleted' => 0,
            'created_at' => date(now()),
            'updated_at' => date(now()),
        ]);

        return redirect()->back()->with('success', 'Add produce successfully.');
    }

    public function getDeleteProduce($id) {
        $produce = produce::find($id);
        if(is_null($produce)) {
            abort('404');
        }
        $produce->delete();

        return redirect()->back()->with('success', 'Delete produce successfully.');
    }

    public function postAddvariable(Request $request, $id) {
        $this->validate($request,
        [
            'item' => 'required|min:6|max:20',
            'docnum' => 'required|min:6|max:20',
            'date' => 'required',
            'qty' => 'required|max:6|regex:/^([0-9\s\-\+\(\)]*)$/',
            'cost' => 'required|max:255|regex:/^([0-9\s\-\+\(\)]*)$/',
            'remark' => 'required',
        ]);
        $itemcart_ = itemcategory::all();
        $costcart_ = costcategory::all();
        foreach($itemcart_ as $key => $value) {
            $itemcart[$value->id] = $value;
        }
        foreach($costcart_ as $key => $value) {
            $costcart[$value->id] = $value;
        }
        if(!array_key_exists($request->itemcategory_id, $itemcart)) {
            abort('404');
        }
        if(!array_key_exists($request->costcategory_id, $costcart)) {
            abort('404');
        }
        if(!array_key_exists($request->unit_id, config('master.unit'))) {
            abort('404');
        }
        buvarcost::create([
            'bu_id' => $id,
            'item' => $request->item,
            'docnum' => $request->docnum,
            'itemcategory_id' => $request->itemcategory_id,
            'costcategory_id' => $request->costcategory_id,
            'unit_id' => $request->unit_id,
            'qty' => $request->qty,
            'amount' => $request->cost,
            'total' => $request->qty*$request->cost,
            'date' => $request->date,
            'remark' => $request->remark,
            'is_deleted' => 0,
            'created_at' => date(now()),
            'updated_at' => date(now()),
        ]);

        return redirect()->back()->with('success', 'Add variable successful.');
    }

    public function getDeletevariable($id) {
        $variable = buvarcost::find($id);
        if(is_null($variable)) {
            abort('404');
        }
        $variable->delete();

        return redirect()->back()->with('success', 'Delete variable successful.');
    }

    public function postAddFixed(Request $request, $id) {
        $this->validate($request,
        [
            'item' => 'required|min:6|max:20',
            'docnum' => 'required|min:6|max:20',
            'date' => 'required',
            'qty' => 'required|max:6|regex:/^([0-9\s\-\+\(\)]*)$/',
            'cost' => 'required|max:255|regex:/^([0-9\s\-\+\(\)]*)$/',
            'remark' => 'required',
        ]);
        $itemcart_ = itemcategory::all();
        $costcart_ = costcategory::all();
        foreach($itemcart_ as $key => $value) {
            $itemcart[$value->id] = $value;
        }
        foreach($costcart_ as $key => $value) {
            $costcart[$value->id] = $value;
        }
        if(!array_key_exists($request->itemcategory_id, $itemcart)) {
            abort('404');
        }
        if(!array_key_exists($request->costcategory_id, $costcart)) {
            abort('404');
        }
        if(!array_key_exists($request->unit_id, config('master.unit'))) {
            abort('404');
        }
        bufixcost::create([
            'bu_id' => $id,
            'item' => $request->item,
            'docnum' => $request->docnum,
            'itemcategory_id' => $request->itemcategory_id,
            'costcategory_id' => $request->costcategory_id,
            'unit_id' => $request->unit_id,
            'qty' => $request->qty,
            'amount' => $request->cost,
            'total' => $request->qty*$request->cost,
            'date' => $request->date,
            'remark' => $request->remark,
            'is_deleted' => 0,
            'created_at' => date(now()),
            'updated_at' => date(now()),
        ]);

        return redirect()->back()->with('success', 'Add fixed cost successful.');
    }

    public function getDeleteFixed($id) {
        $bufixcost = bufixcost::find($id);
        if(is_null($bufixcost)) {
            abort('404');
        }
        $bufixcost->delete();

        return redirect()->back()->with('success', 'Delete fixed successful.');
    }

    public function postAddRevenue(Request $request, $id) {
        $this->validate($request,
        [
            // 'item' => 'required|min:6|max:20',
            'docnum' => 'required|min:6|max:20',
            'name' => 'required|min:2|max:255',
            'date' => 'required',
            // 'qty' => 'required|max:6|regex:/^([0-9\s\-\+\(\)]*)$/',
            'amount' => 'required|max:255|regex:/^([0-9\s\-\+\(\)]*)$/',
            'remark' => 'required',
        ]);
        burevenue::create([
            'name' => $request->name,
            'bu_id' => $id,
            'cart_item' => $request->cart_item,
            'docnum' => $request->docnum,
            'date' => $request->date,
            'amount' => $request->amount,
            'remark' => $request->remark,
            'is_deleted' => 0,
            'created_at' => date(now()),
            'updated_at' => date(now()),
        ]);

        return redirect()->back()->with('success', 'Add revenue successful.');
    }

    public function getDeleteRevenue($id) {
        $burevenue = burevenue::find($id);
        if(is_null($burevenue)) {
            abort('404');
        }
        $burevenue->delete();

        return redirect()->back()->with('success', 'Delete revenue successful.');
    }

    public function postAddProfit(Request $request, $id) {
        if(Session('total_amount') < 0) {
            return redirect()->back()->with('error', 'Negative profits cannot divide profits.');
        }
        $this->validate($request,
        [
            'name' => 'required|min:2|max:255',
            'docnum' => 'required|min:6|max:20',
            'date' => 'required',
            'remark' => 'required|max:3|regex:/^([0-9\s\-\+\(\)]*)$/',
            'remark' => 'required',
        ]);
        $test = (100-$request->percent)/100;
        $amount = Session('total_amount')*$test;
        buprofitshare::create([
            'name' => $request->name,
            'cart_item' => $request->cart_item,
            'bu_id' => $id,
            'docnum' => $request->docnum,
            'percent' => $request->percent,
            'amount' => Session('total_amount')-$amount,
            'total' => Session('total_amount'),
            'date' => $request->date,
            'remark' => $request->remark,
            'is_deleted' => 0,
            'created_at' => date(now()),
            'updated_at' => date(now()),
        ]);

        return redirect()->back()->with('success', 'Add profix share successful.');
    }

    public function getDeleteProfix($id) {
        $buprofitshare = buprofitshare::find($id);
        if(is_null($buprofitshare)){
            abort('404');
        }
        $buprofitshare->delete();

        return redirect()->back()->with('success', 'Delete profix share successful.');
    }

    public function getPDF($id) {
        $data = [
            'produce' => produce::where('bu_id', $id)->get(),
            'bu' => bu::where('id', $id)->first(),
        ];
        $pdf = PDF::loadView('produce', $data);
  
        return $pdf->download('Produce.pdf');
    }

    public function postImportProduce(Request $request) {
        // $this->validate($request,
        // [
        //     'select_file' => 'required|mimes:xls.xlsx'
        // ]);
        $path = $request->file('select_file')->getRealPath();
        $data = Excel::load($path)->get();
        if(count($data) > 0) {
            foreach($data->toArray() as $Key => $value) {
                    $insert_data[] = array(
                        'name' => $value['name'],
                        'code' => $value['code'],
                        'address' => $value['address'],
                        'follow' => $value['follow'],
                        'mail' => $value['mail'],
                        'phone' => $value['phone'],
                    );
            }
        }
        DB::table('produce')->insert($insert_data);
        // $produce = produce::where('bu_id', 3)->get();
        // (new FastExcel($produce))->export('file.xlsx');
        // // $produce = (new FastExcel)->import('file.xlsx');
        // $produce = (new FastExcel)->import('file.xlsx', function ($line) {
        //     return User::create([
        //         'name' => $line['Name'],
        //         'code' => $line['Code'],
        //         'address' => $line['Address'],
        //         'follow' => $line['Follow'],
        //         'mail' => $line['Mail'],
        //         'phone' => $line['phone'],
        //     ]);
        // });
        return redirect()->back()->with('success', 'Import successful.');
    }

    public function getChart($id) {
        $bu = bu::where('id', $id)->first();
        if(is_null($bu)) {
            abort('404');
        }
        $one_week = Carbon::now()->subWeeks(2);
        // $two_week = Carbon::now()->subDays(1);
        $two_week = Carbon::now()->subWeeks(1);
        $one_week_ago = Carbon::now()->subDays(1);

        $one_week_bu = DB::table('bufixcost')
        ->join('buvarcost', 'bufixcost.bu_id', '=', 'buvarcost.bu_id')
        ->join('buprofitshare', 'bufixcost.bu_id', '=', 'buprofitshare.bu_id')
        ->join('burevenue', 'bufixcost.bu_id', '=', 'burevenue.bu_id')
        ->where('bufixcost.bu_id', $id)->where('buvarcost.bu_id', $id)->where('buprofitshare.bu_id', $id)->where('burevenue.bu_id', $id)
        ->select('bufixcost.total as bufixcost_total', 'buvarcost.total as buvarcost_total', 'buprofitshare.total as buprofitshare_total', 'buprofitshare.amount as buprofitshare', 'burevenue.amount as burevenue_total')->get();
        $one_week_variable = 0;
        $one_week_fixed = 0;
        $one_week_revenue = 0;
        $one_week_profixshare_total = 0;
        $one_week_profixshare = 0;
        foreach($one_week_bu as $key => $value) {
            $one_week_variable += ($value->buvarcost_total);
            $one_week_fixed += ($value->bufixcost_total);
            $one_week_revenue += ($value->burevenue_total);
            $one_week_profixshare_total += ($value->buprofitshare_total);
            $one_week_profixshare += ($value->buprofitshare);
        }
        $two_week_bu = DB::table('bufixcost')
        ->join('buvarcost', 'bufixcost.bu_id', '=', 'buvarcost.bu_id')
        ->join('buprofitshare', 'bufixcost.bu_id', '=', 'buprofitshare.bu_id')
        ->join('burevenue', 'bufixcost.bu_id', '=', 'burevenue.bu_id')
        ->where('bufixcost.bu_id', $id)->where('buvarcost.bu_id', $id)->where('buprofitshare.bu_id', $id)->where('burevenue.bu_id', $id)
        ->where('bufixcost.created_at', '>=', $two_week)->where('bufixcost.created_at', '<=', $one_week_ago)
        ->where('buvarcost.created_at', '>=', $two_week)->where('buvarcost.created_at', '<=', $one_week_ago)
        ->where('buprofitshare.created_at', '>=', $two_week)->where('buprofitshare.created_at', '<=', $one_week_ago)
        ->where('burevenue.created_at', '>=', $two_week)->where('burevenue.created_at', '<=', $one_week_ago)
        ->select('bufixcost.total as bufixcost_total', 'buvarcost.total as buvarcost_total', 'buprofitshare.total as buprofitshare_total', 'burevenue.amount as burevenue_total')->get();
        $two_week_variable = 0;
        $two_week_fixed = 0;
        $two_week_revenue = 0;
        $two_week_profixshare = 0;
        foreach($two_week_bu as $key => $value) {
            $two_week_variable += ($value->buvarcost_total);
            $two_week_fixed += ($value->bufixcost_total);
            $two_week_revenue += ($value->burevenue_total);
            $two_week_profixshare += ($value->buprofitshare_total);
        }
        $bu_variable = 0;
        $bu_fixed = 0;
        $bu_burevenue = 0;
        $bu_buprofitshare = 0;
        $bu_variable_ = buvarcost::where('bu_id', $id)->where('created_at', date(now()))->select('total')->get();
        $bu_fixed_ = bufixcost::where('bu_id', $id)->where('created_at', date(now()))->select('total')->get();
        $bu_burevenue_ = burevenue::where('bu_id', $id)->where('created_at', date(now()))->select('amount')->get();
        $bu_buprofitshare_ = buprofitshare::where('bu_id', $id)->where('created_at', date(now()))->select('amount')->get();
        foreach($bu_variable_ as $key => $value) {
            $bu_variable += ($value->total);
        }
        foreach($bu_fixed_ as $key => $value) {
            $bu_fixed += ($value->total);
        }
        foreach($bu_burevenue_ as $key => $value) {
            $bu_burevenue += ($value->amount);
        }
        foreach($bu_buprofitshare_ as $key => $value) {
            $bu_buprofitshare += ($value->total);
        }
        $total = $bu_variable + $bu_fixed + $bu_burevenue + $bu_buprofitshare;
        $cost = $bu_variable + $bu_fixed;
        // $total_one_week = $one_week_variable + $one_week_fixed + $one_week_revenue + $one_week_profixshare + $one_week_profixshare_total;
        $total_two_week = $two_week_variable + $two_week_fixed + $two_week_revenue + $two_week_profixshare;
        $one_week_cost = $one_week_variable + $one_week_fixed;
        $two_week_cost = $two_week_variable + $two_week_fixed;
        $data = [
            'one_week_cost' => ($one_week_cost) ? $one_week_cost : 0,
            'one_week_revenue' => ($one_week_revenue) ? $one_week_revenue : 0,
            'one_week_profixshare_total' => ($one_week_profixshare_total) ? $one_week_profixshare_total : 0,
            'one_week_profixshare' => ($one_week_profixshare) ? $one_week_profixshare : 0,
            'two_week_cost' => ($two_week_cost) ? round($two_week_cost/($total_two_week)*100) : 0,
            'two_week_revenue' => ($two_week_revenue) ? round($two_week_revenue/($total_two_week)*100) : 0,
            'two_week_profixshare' => ($two_week_profixshare) ? round($two_week_profixshare/($total_two_week)*100) : 0,
            'date_one' => date('d-m-Y', strtotime($one_week)),
            'date_two' => date('d-m-Y', strtotime($two_week)),
            'bu_variable' => $bu_variable,
            'bu_fixed' => $bu_fixed,
            'bu' => $bu,
            'cost' => ($total > 0) ? round($cost/($total)*100) : 0,
            'bu_burevenue' => ($total > 0) ? round($bu_burevenue/($total)*100) : 0,
            'bu_buprofitshare' => ($total > 0) ? round($bu_buprofitshare/($total)*100) : 0,
        ];
        return view('admin.themes.bu.chart', $data);
    }

    public function postChart(Request $request, $id) {
        $this->validate($request,
        [
            'start_day' => 'required|max:10',
			'end_day' => 'required|date|min:10|max:10',
        ],
        [
            'start_day.max' => 'Invalid start date selected.',
            'start_day.required' => 'The start date selection must not be blank.',
            'end_day.required' => 'The end date selection must not be blank.',
            'end_day.date' => 'Invalid end date selected.',
            'end_day.min' => 'Invalid end date selected.',
            'end_day.max' => 'Invalid end date selected.',
        ]);
        $one_week = Carbon::now()->subWeeks(2);
        // $two_week = Carbon::now()->subDays(1);
        $two_week = Carbon::now()->subWeeks(1);
        $one_week_ago = Carbon::now()->subDays(1);

        $one_week_bu = DB::table('bufixcost')
        ->join('buvarcost', 'bufixcost.bu_id', '=', 'buvarcost.bu_id')
        ->join('buprofitshare', 'bufixcost.bu_id', '=', 'buprofitshare.bu_id')
        ->join('burevenue', 'bufixcost.bu_id', '=', 'burevenue.bu_id')
        ->where('bufixcost.bu_id', $id)->where('buvarcost.bu_id', $id)->where('buprofitshare.bu_id', $id)->where('burevenue.bu_id', $id)
        ->select('bufixcost.total as bufixcost_total', 'buvarcost.total as buvarcost_total', 'buprofitshare.total as buprofitshare_total', 'buprofitshare.amount as buprofitshare', 'burevenue.amount as burevenue_total')->get();
        $one_week_variable = 0;
        $one_week_fixed = 0;
        $one_week_revenue = 0;
        $one_week_profixshare_total = 0;
        $one_week_profixshare = 0;
        foreach($one_week_bu as $key => $value) {
            $one_week_variable += ($value->buvarcost_total);
            $one_week_fixed += ($value->bufixcost_total);
            $one_week_revenue += ($value->burevenue_total);
            $one_week_profixshare_total += ($value->buprofitshare_total);
            $one_week_profixshare += ($value->buprofitshare);
        }
        $two_week_bu = DB::table('bufixcost')
        ->join('buvarcost', 'bufixcost.bu_id', '=', 'buvarcost.bu_id')
        ->join('buprofitshare', 'bufixcost.bu_id', '=', 'buprofitshare.bu_id')
        ->join('burevenue', 'bufixcost.bu_id', '=', 'burevenue.bu_id')
        ->where('bufixcost.bu_id', $id)->where('buvarcost.bu_id', $id)->where('buprofitshare.bu_id', $id)->where('burevenue.bu_id', $id)
        ->where('bufixcost.created_at', '>=', $two_week)->where('bufixcost.created_at', '<=', $one_week_ago)
        ->where('buvarcost.created_at', '>=', $two_week)->where('buvarcost.created_at', '<=', $one_week_ago)
        ->where('buprofitshare.created_at', '>=', $two_week)->where('buprofitshare.created_at', '<=', $one_week_ago)
        ->where('burevenue.created_at', '>=', $two_week)->where('burevenue.created_at', '<=', $one_week_ago)
        ->select('bufixcost.total as bufixcost_total', 'buvarcost.total as buvarcost_total', 'buprofitshare.total as buprofitshare_total', 'burevenue.amount as burevenue_total')->get();
        $two_week_variable = 0;
        $two_week_fixed = 0;
        $two_week_revenue = 0;
        $two_week_profixshare = 0;
        foreach($two_week_bu as $key => $value) {
            $two_week_variable += ($value->buvarcost_total);
            $two_week_fixed += ($value->bufixcost_total);
            $two_week_revenue += ($value->burevenue_total);
            $two_week_profixshare += ($value->buprofitshare_total);
        }
        $start_day = Carbon::parse($request->start_day)->startOfDay()->toDateTimeString();
        $end_day = Carbon::parse($request->end_day)->startOfDay()->toDateTimeString();
        $bu_variable = 0;
        $bu_fixed = 0;
        $bu_burevenue = 0;
        $bu_buprofitshare = 0;
        $bu_variable_ = buvarcost::where('bu_id', $id)->whereBetween('created_at', [$start_day,$end_day])->select('total')->get();
        $bu_fixed_ = bufixcost::where('bu_id', $id)->whereBetween('created_at', [$start_day,$end_day])->select('total')->get();
        $bu_burevenue_ = burevenue::where('bu_id', $id)->whereBetween('created_at', [$start_day,$end_day])->select('amount')->get();
        $bu_buprofitshare_ = buprofitshare::where('bu_id', $id)->whereBetween('created_at', [$start_day,$end_day])->select('amount')->get();
        foreach($bu_variable_ as $key => $value) {
            $bu_variable += ($value->total);
        }
        foreach($bu_fixed_ as $key => $value) {
            $bu_fixed += ($value->total);
        }
        foreach($bu_burevenue_ as $key => $value) {
            $bu_burevenue += ($value->amount);
        }
        foreach($bu_buprofitshare_ as $key => $value) {
            $bu_buprofitshare += ($value->amount);
        }
        $total = $bu_variable + $bu_fixed + $bu_buprofitshare;
        $cost = $bu_variable + $bu_fixed;
        $total_one_week = $one_week_variable + $one_week_fixed + $one_week_revenue + $one_week_profixshare;
        $total_two_week = $two_week_variable + $two_week_fixed + $two_week_revenue + $two_week_profixshare;
        $one_week_cost = $one_week_variable + $one_week_fixed;
        $two_week_cost = $two_week_variable + $two_week_fixed;
        $data = [
            'one_week_cost' => ($one_week_cost) ? $one_week_cost : 0,
            'one_week_revenue' => ($one_week_revenue) ? $one_week_revenue : 0,
            'one_week_profixshare_total' => ($one_week_profixshare_total) ? $one_week_profixshare_total : 0,
            'one_week_profixshare' => ($one_week_profixshare) ? $one_week_profixshare : 0,
            'two_week_cost' => ($two_week_cost) ? round($two_week_cost/($total_two_week)*100) : 0,
            'two_week_revenue' => ($two_week_revenue) ? round($two_week_revenue/($total_two_week)*100) : 0,
            'two_week_profixshare' => ($two_week_profixshare) ? round($two_week_profixshare/($total_two_week)*100) : 0,
            'date_one' => date('d-m-Y', strtotime($one_week)),
            'date_two' => date('d-m-Y', strtotime($two_week)),
            'bu_variable' => ($total > 0) ? round($bu_variable/($total)*100) : 0,
            'bu_fixed' => ($total > 0) ? round($bu_fixed/($total)*100) : 0,
            'cost' => ($total > 0) ? round($cost/($total)*100) : 0,
            'bu_burevenue' => round($bu_burevenue/($total)*100),
            'bu_buprofitshare' => round($bu_buprofitshare/($total)*100),
        ];
        return view('admin.themes.bu.chart', $data)->render();
    }
}