<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\status;

class StatusController extends Controller
{
    public function getlist() {
        $status = status::where('is_deleted', 0)->get();
        return view('admin.config.status.list', compact('status'));
    }

    public function getadd() {
        return view('admin.config.status.add');
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
        status::create([
            'name' => $request->name,
            'remark' => $request->remark,
            'is_deleted' => 0,
            'created_at' => date(now()),
            'updated_at' => date(now()),
        ]);

        return redirect()->back()->with('success', 'Add Bu Envenue Category successful.');
    }

    public function getedit($id) {
        $status = status::find($id);
        if(is_null($status)) {
            abort('404');
        }
        return view('admin.config.status.edit', compact('status'));
    }

    public function postedit(Request $request, $id) {
        $status = status::find($id);
        if(is_null($status)) {
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
        $status->update([
            'name' => $request->name,
            'remark' => $request->remark,
            'is_deleted' => 0,
            'created_at' => date(now()),
            'updated_at' => date(now()),
        ]);

        return redirect()->back()->with('success', 'Update the name successfully.');
    }

    public function getdelete($id) {
        $status = status::find($id);
        if(is_null($status)) {
            abort('404');
        }
        $status->update(['is_deleted' => 1]);

        return redirect()->back()->with('success', 'Delete the Bu Renvenue Category successfully.');
    }
}
