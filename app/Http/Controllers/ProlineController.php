<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bu;
use App\produce;
use App\proline;
use App\itemcategory;
use App\costcategory;
use App\prolinecategory;
use App\unit;
use App\prolinevarcost;
use App\prolinefixcost;
use App\prolinerevenue;
use App\prolineprofitshare;
use Session;

class ProlineController extends Controller
{
    public function getEditProline($bu, $pro, $id) {
        $proline = proline::find($id);
        $data = [
            'bu' => bu::find($bu),
            'pro' => produce::find($pro),
            'proline' => $proline,
            'prolinecategory' => prolinecategory::where('is_deleted', 0)->get(),
            'itemcart' => itemcategory::where('is_deleted', 0)->get(),
            'costcart' => costcategory::where('is_deleted', 0)->get(),
            'unit' => unit::where('is_deleted', 0)->get(),
            'prolinevarcost' => prolinevarcost::where('proline_id', $proline->id)->get(),
            'prolinefixcost' => prolinefixcost::where('proline_id', $proline->id)->get(),
            'prolinerevenue' => prolinerevenue::where('proline_id', $proline->id)->get(),
            'prolineprofitshare' => prolineprofitshare::where('proline_id', $proline->id)->get(),
        ];
        $total_prolinefixcost = 0;
        foreach($data['prolinefixcost'] as $key => $value) {
            $total_prolinefixcost += ($value->total);
        }
        $total_prolinevarcost = 0;
        foreach($data['prolinevarcost'] as $key => $value) {
            $total_prolinevarcost += ($value->total);
        }
        $total_prolinerevenue = 0;
        foreach($data['prolinerevenue'] as $key => $value) {
            $total_prolinerevenue += ($value->amount);
        }
        $total_prolinefitshare = 0;
        foreach($data['prolineprofitshare'] as $key => $value) {
            $total_prolinefitshare += ($value->amount);
        }
        $total_amount = $total_prolinerevenue - ($total_prolinefixcost+$total_prolinevarcost);
        Session::put('total_amount', $total_amount);
        return view('admin.themes.proline.detail', $data, compact('total_prolinevarcost', 'total_prolinefixcost', 'total_prolinerevenue', 'total_prolinefitshare'));
    }

    public function postEditProline(Request $request, $bu, $pro, $id) {
        $proline = proline::find($id);
        if(is_null($proline)) {
            abort('404');
        }
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
        $prolinecategory_ = prolinecategory::all();
        foreach($prolinecategory_ as $key => $value) {
            $prolinecategory[$value->id] = $value;
        }
        if(!array_key_exists($request->prolinecategory_id, $prolinecategory)) {
            abort('404');
        }
        $proline->update([
            'name' => $request->name,
            'pro_id' => $id,
            'code' => $request->code,
            'address' => $request->address,
            'prolinecategory_id' => $request->prolinecategory_id,
            'follow' => $request->follow,
            'mail' => $request->mail,
            'phone' => $request->phone,
            'remark' => $request->remark,
            'is_deleted' => 0,
            'updated_at' => date(now()),
        ]);

        return redirect()->back()->with('success', 'Update proline successfully.');
    }

    public function postAddVariable(Request $request, $bu, $pro, $id) {
        $this->validate($request,
        [
            'item' => 'required|min:6|max:255',
            'docnum' => 'required|min:6|max:20',
            'date' => 'required',
            'qty' => 'required|max:6|regex:/^([0-9\s\-\+\(\)]*)$/',
            'cost' => 'required|max:255|regex:/^([0-9\s\-\+\(\)]*)$/',
            'remark' => 'required',
        ]);
        $itemcart_ = itemcategory::all();
        $costcart_ = costcategory::all();
        $unit_ = unit::all();
        foreach($itemcart_ as $key => $value) {
            $itemcart[$value->id] = $value;
        }
        foreach($costcart_ as $key => $value) {
            $costcart[$value->id] = $value;
        }
        foreach($unit_ as $key => $value) {
            $unit[$value->id] = $value;
        }
        if(!array_key_exists($request->itemcategory_id, $itemcart)) {
            abort('404');
        }
        if(!array_key_exists($request->costcategory_id, $costcart)) {
            abort('404');
        }
        if(!array_key_exists($request->unit_id, $unit)) {
            abort('404');
        }
        prolinevarcost::create([
            'proline_id' => $id,
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

        return redirect()->back()->with('success', 'Add variable cost successful.');
    }

    public function getDeleteVariable($bu, $pro, $id) {
        $prolinevarcost = prolinevarcost::find($id);
        if(is_null($prolinevarcost)) {
            abort('404');
        };
        $prolinevarcost->delete();

        return redirect()->back()->with('success', 'Delete variable successful.');
    }

    public function postAddFixed(Request $request, $bu, $pro, $id) {
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
        $unit_ = unit::all();
        foreach($itemcart_ as $key => $value) {
            $itemcart[$value->id] = $value;
        }
        foreach($costcart_ as $key => $value) {
            $costcart[$value->id] = $value;
        }
        foreach($unit_ as $key => $value) {
            $unit[$value->id] = $value;
        }
        if(!array_key_exists($request->itemcategory_id, $itemcart)) {
            abort('404');
        }
        if(!array_key_exists($request->costcategory_id, $costcart)) {
            abort('404');
        }
        if(!array_key_exists($request->unit_id, $unit)) {
            abort('404');
        }
        prolinefixcost::create([
            'proline_id' => $id,
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

        return redirect()->back()->with('success', 'Add Fixed cost successful.');
    }

    public function getDeleteFixed($bu, $pro, $id) {
        $prolinefixcost = prolinefixcost::find($id);
        if(is_null($prolinefixcost)) {
            abort('404');
        };
        $prolinefixcost->delete();

        return redirect()->back()->with('success', 'Delete variable successful.');
    }

    public function postAddRevenue(Request $request, $bu, $pro, $id) {
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
        prolinerevenue::create([
            'name' => $request->name,
            'proline_id' => $id,
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

    public function postAddProfix(Request $request, $bu, $pro, $id) {
        if(Session('total_amount') <= 0) {
            return redirect()->back()->with('error', 'Negative profits cannot divide profits.');
        }
        $this->validate($request,
        [
            'name' => 'required|min:2|max:255',
            'docnum' => 'required|min:6|max:255',
            'date' => 'required',
            'remark' => 'required|max:3|regex:/^([0-9\s\-\+\(\)]*)$/',
            'remark' => 'required',
        ]);
        $test = (100-$request->percent)/100;
        $amount = Session('total_amount')*$test;
        prolineprofitshare::create([
            'name' => $request->name,
            'cart_item' => $request->cart_item,
            'proline_id' => $id,
            'docnum' => $request->docnum,
            'percent' => $request->percent,
            'amount' => Session('total_amount')-$amount,
            'total' => Session('total_amount'),
            // 'amount' => $request->amount,
            // 'total' => Session('total_amount'),
            'date' => $request->date,
            'remark' => $request->remark,
            'is_deleted' => 0,
            'created_at' => date(now()),
            'updated_at' => date(now()),
        ]);

        return redirect()->back()->with('success', 'Add profix share successful.');
    }

    public function getProfix($bu, $pro, $id) {
        $prolineprofitshare = prolineprofitshare::find($id);
        if(is_null($prolineprofitshare)) {
            abort('404');
        };
        $prolineprofitshare->delete();

        return redirect()->back()->with('success', 'Delete profix share successful.');
    }
}
