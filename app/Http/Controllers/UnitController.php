<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\unit;

class UnitController extends Controller
{
    public function getlist() {
        $unit = unit::where('is_deleted', 0)->get();
        return view('admin.config.unit.list', compact('unit'));
    }

    public function getadd() {
        return view('admin.config.unit.add');
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
        unit::create([
            'name' => $request->name,
            'remark' => $request->remark,
            'is_deleted' => 0,
            'created_at' => date(now()),
            'updated_at' => date(now()),
        ]);

        return redirect()->back()->with('success', 'Add Unit successful.');
    }

    public function getedit($id) {
        $unit = unit::find($id);
        if(is_null($unit)) {
            abort('404');
        }
        return view('admin.config.unit.edit', compact('unit'));
    }

    public function postedit(Request $request, $id) {
        $unit = unit::find($id);
        if(is_null($unit)) {
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
        $unit->update([
            'name' => $request->name,
            'remark' => $request->remark,
            'is_deleted' => 0,
            'created_at' => date(now()),
            'updated_at' => date(now()),
        ]);

        return redirect()->back()->with('success', 'Update the name successfully.');
    }

    public function getdelete($id) {
        $unit = unit::find($id);
        if(is_null($unit)) {
            abort('404');
        }
        $unit->update(['is_deleted' => 1]);

        return redirect()->back()->with('success', 'Delete the Unit successfully.');
    }
}
