<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\prolinecategory;

class ProlinecategoryController extends Controller
{
    public function getlist() {
        $prolinecategory = prolinecategory::where('is_deleted', 0)->get();
        return view('admin.config.prolinecategory.list', compact('prolinecategory'));
    }

    public function getadd() {
        return view('admin.config.prolinecategory.add');
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
        prolinecategory::create([
            'name' => $request->name,
            'remark' => $request->remark,
            'is_deleted' => 0,
            'created_at' => date(now()),
            'updated_at' => date(now()),
        ]);

        return redirect()->back()->with('success', 'Add Bu Proline Category successful.');
    }

    public function getedit($id) {
        $prolinecategory = prolinecategory::find($id);
        if(is_null($prolinecategory)) {
            abort('404');
        }
        return view('admin.config.prolinecategory.edit', compact('prolinecategory'));
    }

    public function postedit(Request $request, $id) {
        $prolinecategory = prolinecategory::find($id);
        if(is_null($prolinecategory)) {
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
        $prolinecategory->update([
            'name' => $request->name,
            'remark' => $request->remark,
            'is_deleted' => 0,
            'created_at' => date(now()),
            'updated_at' => date(now()),
        ]);

        return redirect()->back()->with('success', 'Update the name successfully.');
    }

    public function getdelete($id) {
        $prolinecategory = prolinecategory::find($id);
        if(is_null($prolinecategory)) {
            abort('404');
        }
        $prolinecategory->update(['is_deleted' => 1]);

        return redirect()->back()->with('success', 'Delete the Bu Proline Category successfully.');
    }
}
