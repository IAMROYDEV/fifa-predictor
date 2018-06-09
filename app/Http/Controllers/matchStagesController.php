<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\matchStage;

class matchStagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
        $matchStage = matchstage::findOrFail($id);
        return view('admin.matchStageShow', ['matchStage' => $matchStage]);
    }

    public function index(Request $request)
    {
        $matchStages = matchStage::all();
        return view('admin.matchStageIndex', ['matchStages' => $matchStages]);
    }

    public function create()
    {
        return view('admin.matchStageAdd');
    }

    public function save(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:match_stages|max:2',
        ]);
        
        if ($validator->fails()) {
            return redirect('/admin/match_stages/add')
                        ->withErrors($validator)
                        ->withInput();
        }

        $params = $request->all();
        $matchStage = new matchstage();
        $matchStage->title = $params['title'];
        if ($matchStage->save()) {
            return redirect()->route('matchStageList');
        }
    }

    public function edit($id)
    {   
        $matchStage = matchstage::findOrFail($id);
        return view('admin.matchStageEdit', ['matchStage' => $matchStage]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:match_stages|max:2',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/match_stages/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();
        }

        $params = $request->all();
        $matchStage = matchstage::findOrFail($id);
        $matchStage->title = $params['title'];
        if ($matchStage->save()) {
            return redirect()->route('matchStageList');
        }
    }

}
