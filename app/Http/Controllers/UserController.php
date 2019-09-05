<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;

class UserController extends Controller
{
    public function getlist() {
        $users = DB::table('users')->where('id', Auth::id())->first();
        $role = json_decode($users->roles);
    	$users = DB::table('users')->get();

    	return view('admin.user.list', compact('users', 'role'));
    }

    public function getadd() {
        $users = DB::table('users')->where('id', Auth::id())->first();
        $role = json_decode($users->roles);
    	return view('admin.user.add', compact('role'));
    }

    public function postadd(Request $request) {
    	$this->validate($request,
    		[
    			'name' => 'required',
    			'email' => 'required|email|unique:users,email',
    			'phone' => 'required',
    			'address' => 'required',
    			'password' => 'required',
    			'roles' => 'required',
    		],	
    		[
    			'name.required' => 'Tên thành viên không được để trống.',
    			'email.required' => 'Địa chỉ email không được để trống.',
    			'email.email' => 'Email không hợp lệ.',
    			'email.unique' => 'Email này đã được đăng ký.',
    			'phone.required' => 'Số điện thoại không được để trống.',
    			'password' => 'Mật khẩu không được để trống.',
    			'roles.required' => 'Quyền truy cập không được để trống.',
    		]);
    	foreach($request->roles as $key => $value) {
    		if(!array_key_exists($value,config('master_admin.quyen'))) {
				abort('404');
    		}
    	}
    	$data = [
    		'name' => $request->name,
    		'email' => $request->email,
    		'phone' => $request->phone,
    		'address' => $request->address,
    		'password' => hash::make($request->password),
    		'roles' => json_encode($request->roles),
    		'created_at' => date('Y-m-d H:m:s'),
    		'updated_at' => date('Y-m-d H:m:s'),
    	];
    	DB::table('users')->insert($data);

    	return redirect()->back()->with('thongbao','Thêm tài khoản thành công.');
    }

    public function getedit($id) {
        $users = DB::table('users')->where('id', Auth::id())->first();
        $role = json_decode($users->roles);
    	$user = DB::table('users')->where('id', $id)->first();
    	if(is_null($user)) {
    		abort('404');
    	}

    	return view('admin.user.edit', compact('user', 'role'));
    }

    public function postedit(Request $request, $id) {
    	$this->validate($request,
    		[
    			'name' => 'required|name',
    			'phone' => 'required',
    			'address' => 'required',
    		],	
    		[
    			'name.required' => 'Tên thành viên không được để trống.',
    			'phone.required' => 'Số điện thoại không được để trống.',
    		]);

    	$user = DB::table('users')->where('id', $id);
    	$data = [
    		'name' => $request->name,
    		'phone' => $request->phone,
    		'address' => $request->address,
    		'roles' => json_encode($request->roles),
    		'created_at' => date('Y-m-d H:m:s'),
    		'updated_at' => date('Y-m-d H:m:s'),
    	];
    	if(!is_null($request->passwordre)) {
    		$data['password'] = hash::make($request->passwordre);
    	}
    	$user->update($data);

    	return redirect()->back()->with('thongbao', 'Sửa thành viên thành công.');
    }

    public function getdelete($id) {
    	$user = DB::table('users')->where('id', $id);
    	if(is_null($user)) {
    		abort('404');
    	}
    	$user->delete();

    	return redirect()->back()->with('thongbao', 'Xóa thành viên thành công.');
    }
}