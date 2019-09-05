<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\itemcategory;

class ItemcategoryController extends Controller
{
    public function getlist() {
        $itemcategory = itemcategory::where('is_deleted', 0)->get();
        return view('admin.config.itemcategory.list', compact('itemcategory'));
    }

    public function getadd() {
        return view('admin.config.itemcategory.add');
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
        itemcategory::create([
            'name' => $request->name,
            'remark' => $request->remark,
            'is_deleted' => 0,
            'created_at' => date(now()),
            'updated_at' => date(now()),
        ]);

        return redirect()->back()->with('success', 'Add Bu Item Category successful.');
    }

    public function getedit($id) {
        $itemcategory = itemcategory::find($id);
        if(is_null($itemcategory)) {
            abort('404');
        }
        return view('admin.config.itemcategory.edit', compact('itemcategory'));
    }

    public function postedit(Request $request, $id) {
        $itemcategory = itemcategory::find($id);
        if(is_null($itemcategory)) {
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
        $itemcategory->update([
            'name' => $request->name,
            'remark' => $request->remark,
            'is_deleted' => 0,
            'created_at' => date(now()),
            'updated_at' => date(now()),
        ]);

        return redirect()->back()->with('success', 'Update the name successfully.');
    }

    public function getdelete($id) {
        $itemcategory = itemcategory::find($id);
        if(is_null($itemcategory)) {
            abort('404');
        }
        $itemcategory->update(['is_deleted' => 1]);

        return redirect()->back()->with('success', 'Delete the Bu Item Category successfully.');
    }
}
