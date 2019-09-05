<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bucategory;
use App\bu;
use App\procategory;
use App\produce;
use App\itemcategory;
use App\costcategory;
use App\provarcost;
use App\profixcost;
use App\prorevenue;
use App\proprofitshare;
use App\unit;
use App\prolinecategory;
use App\proline;
use App\prolinevarcost;
use App\prolinefixcost;
use App\prolinerevenue;
use App\prolineprofitshare;
use Session;
use DB;

class ProduceController extends Controller
{
    public function getEditProduce($bu, $id) {
        $produce = produce::find($id);
        if(is_null($produce)) {
            abort('404');
        }
        $proline = DB::table('proline')->where('pro_id',$id)->get()->toArray();
        if(count($proline) > 0) {
            foreach($proline as $k => $v) {
                $prolines[] = $v->id;
            }
            $prolinevarcost = prolinevarcost::whereIn('proline_id', $prolines)->get();
            $prolinefixcost = prolinefixcost::whereIn('proline_id', $prolines)->get();
            $prolinerevenue = prolinerevenue::whereIn('proline_id', $prolines)->get();
            $prolinefitshare = prolineprofitshare::whereIn('proline_id', $prolines)->get();
            $total_prolinefixcost = 0;
            foreach($prolinefixcost as $key => $value) {
                $total_prolinefixcost += ($value->total);
            }
            $total_prolinevarcost = 0;
            foreach($prolinevarcost as $key => $value) {
                $total_prolinevarcost += ($value->total);
            }
            $total_prolinerevenue = 0;
            foreach($prolinerevenue as $key => $value) {
                $total_prolinerevenue += ($value->amount);
            }
            $total_prolinefitshare = 0;
            foreach($prolinefitshare as $key => $value) {
                $total_prolinefitshare += ($value->amount);
            }
            $data = [
                'itemcart' => itemcategory::all(),
                'costcart' => costcategory::all(),
                'procategory' => procategory::all(),
                'prolinecategory' => prolinecategory::all(),
                'bu' => bu::find($bu),
                'pro' => $produce,
                'unit' => unit::where('is_deleted', 0)->get(),
                'provarcost' => provarcost::where('pro_id', $produce->id)->get(),
                'profixcost' => profixcost::where('pro_id', $produce->id)->get(),
                'prorevenue' => prorevenue::where('pro_id', $produce->id)->get(),
                'proprofitshare' => proprofitshare::where('pro_id', $produce->id)->get(),
                'proline' => proline::where('pro_id', $produce->id)->get(),
                'prolinevarcost' => $prolinevarcost,
                'prolinefixcost' => $prolinefixcost,
                'prolinerevenue' => $prolinerevenue,
                'prolinefitshare' => $prolinefitshare,
                'total_prolinefixcost' => $total_prolinefixcost,
                'total_prolinevarcost' => $total_prolinevarcost,
                'total_prolinerevenue' => $total_prolinerevenue,
                'total_prolinefitshare' => $total_prolinefitshare,
            ];
        }else{
            $data = [
            'itemcart' => itemcategory::all(),
            'costcart' => costcategory::all(),
            'procategory' => procategory::all(),
            'prolinecategory' => prolinecategory::all(),
            'bu' => bu::find($bu),
            'pro' => $produce,
            'unit' => unit::where('is_deleted', 0)->get(),
            'provarcost' => provarcost::where('pro_id', $produce->id)->get(),
            'profixcost' => profixcost::where('pro_id', $produce->id)->get(),
            'prorevenue' => prorevenue::where('pro_id', $produce->id)->get(),
            'proprofitshare' => proprofitshare::where('pro_id', $produce->id)->get(),
            'proline' => proline::where('pro_id', $produce->id)->get(),
            ];
        }
        $total_profixcost = 0;
        foreach($data['profixcost'] as $key => $value) {
            $total_profixcost += ($value->total);
        }
        $total_provarcost = 0;
        foreach($data['provarcost'] as $key => $value) {
            $total_provarcost += ($value->total);
        }
        $total_prorevenue = 0;
        foreach($data['prorevenue'] as $key => $value) {
            $total_prorevenue += ($value->amount);
        }
        $total_profitshare = 0;
        foreach($data['proprofitshare'] as $key => $value) {
            $total_profitshare += ($value->amount);
        }
        $total_amount = $total_prorevenue - ($total_profixcost+$total_provarcost);
        Session::put('total_amount', $total_amount);
        return view('admin.themes.pro.detail', $data, compact('total_profixcost', 'total_provarcost', 'total_prorevenue', 'total_profitshare'));
    }

    public function postEditProduct(Request $request, $bu, $id) {
        $produce = produce::find($id);
            if(is_null($produce)) {
                abort('404');
            }
        $this->validate($request,
        [
            'name' => 'required|min:2|max:255',
            'code' => 'required|min:8|max:10',
            'address' => 'required',
            'follow' => 'required|integer',
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
            'follow.integer' => 'Follow has an invalid length.',
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
        $produce->update([
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
            'updated_at' => date(now()),
        ]);

        return redirect()->back()->with('success', 'Update produce successfully.');
    }

    public function postAddVariable(Request $request, $bu, $id) {
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
        provarcost::create([
            'pro_id' => $id,
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

    public function getDeleteAvariable($bu, $id) {
        $provarcost = provarcost::find($id);
        if(is_null($provarcost)) {
            abort('404');
        }
        $provarcost->delete();

        return redirect()->back()->with('success', 'Delete variable successful.');
    }

    public function postAddFixed(Request $request, $bu, $id) {
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
        profixcost::create([
            'pro_id' => $id,
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

    public function getDeleteFixed($bu, $id) {
        $profixcost = profixcost::find($id);
        if(is_null($profixcost)) {
            abort('404');
        }
        $profixcost->delete();

        return redirect()->back()->with('success', 'Delete fixed cost successful.');
    }

    public function postAddRevenue(Request $request, $bu, $id) {
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
        prorevenue::create([
            'name' => $request->name,
            'pro_id' => $id,
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

    public function getDeleteRevenue($bu, $id) {
        $prorevenue = prorevenue::find($id);
        if(is_null($prorevenue)) {
            abort('404');
        }
        $prorevenue->delete();

        return redirect()->back()->with('success', 'Delete Revenue successful.');
    }

    public function postAddProfix(Request $request, $bu, $id) {
        if(Session('total_amount') <= 0) {
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
        proprofitshare::create([
            'name' => $request->name,
            'cart_item' => $request->cart_item,
            'pro_id' => $id,
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

    public function getDeleteProdic($bu, $id) {
        $proprofitshare = proprofitshare::find($id);
        if(is_null($proprofitshare)) {
            abort('404');
        }
        $proprofitshare->delete();

        return redirect()->back()->with('success', 'Delete profix share successful.');
    }

    public function postAddProline(Request $request, $bu, $id) {
        $this->validate($request,
        [
            'name' => 'required|min:2|max:255',
            'code' => 'required|min:8|max:10',
            'address' => 'required',
            'follow' => 'required',
            'mail' => 'required|email'  ,
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
        proline::create([
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
            'created_at' => date(now()),
            'updated_at' => date(now()),
        ]);

        return redirect()->back()->with('success', 'Add a successful company.');
    }

    public function getDeleteProline($bu, $id) {
        $proline = proline::find($id);
        if(is_null($proline)) {
            abort('404');
        }
        $proline->delete();

        return redirect()->back()->with('success', 'Delete proline successful.');
    }
}