<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Storage;

class ConfigurationController extends Controller
{
    public function getadd() {
    	$configuration = DB::table('configuration')->where('id', 1)->first();
    	return view('admin.configuration.add', compact('configuration'));
    }

    public function postadd(Request $request) {
    	$this->validate($request, 
    		[
    			'logo_website' => 'image',
    			'banner' => 'image',
    		],
    		[
    			'logo_website.image' => 'Logo website không hợp lệ.',
    			'banner.image' => 'Banner không hợp lệ.',
    		]);
    	$data = [
    		'created_at' => date('Y-m-d H:m:s'),
    	];
    	if($request->hasFile('logo_website'))
        {
            $file = $request->file('logo_website');
            $new_name_image = rand(1,999999) . '-' . $file->getClientOriginalName();
            $path = Storage::putFileAs(
                'public/uploads', $file, $new_name_image
            );
            $image = env('APP_URL').Storage::url($path);
            $data['logo_website'] = $image;
        }
        if($request->hasFile('banner'))
        {
            $file = $request->file('banner');
            $new_name_image = rand(1,999999) . '-' . $file->getClientOriginalName();
            $path = Storage::putFileAs(
                'public/uploads', $file, $new_name_image
            );
            $image = env('APP_URL').Storage::url($path);
            $data['banner'] = $image;
        }
    	DB::table('configuration')->where('id', 1)->update($data);

    	return redirect()->back()->with('thongbao', 'Cấu hình hệ thống thành công.');
    }

}
