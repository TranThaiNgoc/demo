<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bucategory;

class BucategoryController extends Controller
{
    public function getlist() {
        $bucategory = bucategory::where('is_deleted', 0)->get();
        return view('admin.config.bucategory.list', compact('bucategory'));
    }

    public function getadd() {
        return view('admin.config.bucategory.add');
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
        bucategory::create([
            'name' => $request->name,
            'remark' => $request->remark,
            'is_deleted' => 0,
            'created_at' => date(now()),
            'updated_at' => date(now()),
        ]);

        return redirect()->back()->with('success', 'Add Bu Category successful.');
    }

    public function getedit($id) {
        $bucategory = bucategory::find($id);
        if(is_null($bucategory)) {
            abort('404');
        }
        return view('admin.config.bucategory.edit', compact('bucategory'));
    }

    public function postedit(Request $request, $id) {
        $bucategory = bucategory::find($id);
        if(is_null($bucategory)) {
            abort('404');
        }
        $this->validate($request,
        [
            'name' => 'required|min:2|max:32',
        ],
        [
            'name.required' => 'Please do not leave the name blank.',
            'name.min' => 'Invalid name with length.',
            'name.max' => 'Invalid name with length.',
        ]);
        $bucategory->update([
            'name' => $request->name,
            'remark' => $request->remark,
            'is_deleted' => 0,
            'created_at' => date(now()),
            'updated_at' => date(now()),
        ]);

        return redirect()->back()->with('success', 'Update the name successfully.');
    }

    public function getdelete($id) {
        $bucategory = bucategory::find($id);
        if(is_null($bucategory)) {
            abort('404');
        }
        $bucategory->update(['is_deleted' => 1]);

        return redirect()->back()->with('success', 'Delete the Bu Category successfully.');
    }
}
