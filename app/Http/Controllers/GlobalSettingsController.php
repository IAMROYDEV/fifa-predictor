<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GlobalSetting;
use Validator;

class GlobalSettingsController extends Controller
{
    public function index()
    {
        $globalSettings = GlobalSetting::all();
        return view('admin.globalSettingsIndex', ['globalSettings' => $globalSettings]);
    }

    public function store(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'rule' => 'required|unique:global_settings|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->route('admin.globalSettingsList')
                        ->withErrors($validator)
                        ->withInput();
        }

        $params = $request->all();
        $globalSetting = new GlobalSetting();
        $globalSetting->rule = strtoupper($params['rule']);
        $globalSetting->flag = isset($params['flag']) ? 1:0;
        
        if ($globalSetting->save()) {
            return redirect()->route('admin.globalSettingsList');
        }
    }

    public function update(Request $request, $id)
    {
        $globalSetting = GlobalSetting::find($id);
        $globalSetting->flag = isset($params['flag']) ? 1:0;
        
        if ($globalSetting->save()) {
            return redirect()->route('admin.globalSettingsList');
        }
    }
}
