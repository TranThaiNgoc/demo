<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\renvenuecategory;

class RenvenuecategoryController extends Controller
{
    public function getlist() {
        $renvenuecategory = renvenuecategory::where('is_deleted', 0)->get();
        return view('admin.config.renvenuecategory.list', compact('renvenuecategory'));
    }

    public function getadd() {
        return view('admin.config.renvenuecategory.add');
    }

    public function postadd(Request $request) {
        $this->validate($request,
        [
            'name' => 'required|min:2|max:32',
        ],
        [
            'name.required' => 'Please do not leave the name blank.',
            'name.min' => 'Invalid name with length.',
            'name.max' => 'Invalid name with length.',
        ]);
        renvenuecategory::create([
            'name' => $request->name,
            'remark' => $request->remark,
            'is_deleted' => 0,
            'created_at' => date(now()),
            'updated_at' => date(now()),
        ]);

        return redirect()->back()->with('success', 'Add Bu Envenue Category successful.');
    }

    public function getedit($id) {
        $renvenuecategory = renvenuecategory::find($id);
        if(is_null($renvenuecategory)) {
            abort('404');
        }
        return view('admin.config.renvenuecategory.edit', compact('renvenuecategory'));
    }

    public function postedit(Request $request, $id) {
        $renvenuecategory = renvenuecategory::find($id);
        if(is_null($renvenuecategory)) {
            abort('404');
        }
        $this->validate($request,
        [
            'name' => 'required|min:2|max:32',
        ],
        [
            'name.required' => 'Please do not leave the name blanRe.',
            'name.min' => 'Invalid name with length.',
            'name.max' => 'Invalid name with length.',
        ]);
        $renvenuecategory->update([
            'name' => $request->name,
            'remark' => $request->remark,
            'is_deleted' => 0,
            'created_at' => date(now()),
            'updated_at' => date(now()),
        ]);

        return redirect()->back()->with('success', 'Update the name successfully.');
    }

    public function getdelete($id) {
        $renvenuecategory = renvenuecategory::find($id);
        if(is_null($renvenuecategory)) {
            abort('404');
        }
        $renvenuecategory->update(['is_deleted' => 1]);

        return redirect()->back()->with('success', 'Delete the Bu Renvenue Category successfully.');
    }
}
