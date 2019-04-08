<?php

namespace App\Http\Controllers;

use App\ReleaseChangelogs;
use Illuminate\Http\Request;

class ChangelogController extends Controller
{
    public function index() {

        $changelogs = ReleaseChangelogs::all();
        return view('changelogs.index', compact('changelogs'));
    }

    public function delete($id) {

        $changelog = ReleaseChangelogs::find($id);
        $changelog->delete();
        
        return redirect('/changelogs');
    }

    public function create() {
        return view('changelogs.create');
    }

    public function save() {

        request()->validate([
            'version'=>'required|min:3',
            'changes'=>'required|min:3'
        ]);

        $changelog = new ReleaseChangelogs();

        $changelog->version = request('version');
        $changelog->changes = request('changes');
        $changelog->save();
                
        return redirect('/changelogs');
    }

    public function edit($id) {
        
        $changelog = ReleaseChangelogs::find($id);

        return view('changelogs.edit',compact('changelog'));
    }

    public function update($id) {
   
        request()->validate([
            'version'=>'required',
            'changes'=>'required'
        ]);

        $changelog = ReleaseChangelogs::find($id);
        $changelog->version = request('version');
        $changelog->changes = request('changes');
        $changelog->save();

        return redirect('/changelogs');
    
    }
}
