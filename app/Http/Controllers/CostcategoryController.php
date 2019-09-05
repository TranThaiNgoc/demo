<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\costcategory;

class CostcategoryController extends Controller
{
    public function getlist() {
        $costcategory = costcategory::where('is_deleted', 0)->get();
        return view('admin.config.costcategory.list', compact('costcategory'));
    }

    public function getadd() {
        return view('admin.config.costcategory.add');
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
        costcategory::create([
            'name' => $request->name,
            'remark' => $request->remark,
            'is_deleted' => 0,
            'created_at' => date(now()),
            'updated_at' => date(now()),
        ]);

        return redirect()->back()->with('success', 'Add Bu Cost Category successful.');
    }

    public function getedit($id) {
        $costcategory = costcategory::find($id);
        if(is_null($costcategory)) {
            abort('404');
        }
        return view('admin.config.costcategory.edit', compact('costcategory'));
    }

    public function postedit(Request $request, $id) {
        $costcategory = costcategory::find($id);
        if(is_null($costcategory)) {
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
        $costcategory->update([
            'name' => $request->name,
            'remark' => $request->remark,
            'is_deleted' => 0,
            'created_at' => date(now()),
            'updated_at' => date(now()),
        ]);

        return redirect()->back()->with('success', 'Update the name successfully.');
    }

    public function getdelete($id) {
        $costcategory = costcategory::find($id);
        if(is_null($costcategory)) {
            abort('404');
        }
        $costcategory->update(['is_deleted' => 1]);

        return redirect()->back()->with('success', 'Delete the Bu Cost Category successfully.');
    }
}
