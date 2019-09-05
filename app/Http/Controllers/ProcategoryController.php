<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\procategory;

class ProcategoryController extends Controller
{
    public function getlist() {
        $procategory = procategory::where('is_deleted', 0)->get();
        return view('admin.config.procategory.list', compact('procategory'));
    }

    public function getadd() {
        return view('admin.config.procategory.add');
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
        procategory::create([
            'name' => $request->name,
            'remark' => $request->remark,
            'is_deleted' => 0,
            'created_at' => date(now()),
            'updated_at' => date(now()),
        ]);

        return redirect()->back()->with('success', 'Add Bu Product Category successful.');
    }

    public function getedit($id) {
        $procategory = procategory::find($id);
        if(is_null($procategory)) {
            abort('404');
        }
        return view('admin.config.procategory.edit', compact('procategory'));
    }

    public function postedit(Request $request, $id) {
        $procategory = procategory::find($id);
        if(is_null($procategory)) {
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
        $procategory->update([
            'name' => $request->name,
            'remark' => $request->remark,
            'is_deleted' => 0,
            'created_at' => date(now()),
            'updated_at' => date(now()),
        ]);

        return redirect()->back()->with('success', 'Update the name successfully.');
    }

    public function getdelete($id) {
        $procategory = procategory::find($id);
        if(is_null($procategory)) {
            abort('404');
        }
        $procategory->update(['is_deleted' => 1]);

        return redirect()->back()->with('success', 'Delete the Bu Product Category successfully.');
    }
}
