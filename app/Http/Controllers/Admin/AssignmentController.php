<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\AssignmentCategory;
use App\Models\Counsel;
use App\Models\CriminalCase;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function index()
    {
        $data = Assignment::orderBy('id','desc')->get();
        return view('assignment.index', compact('data'));
    }
    public function create()
    {
        $categories = AssignmentCategory::all();
        $counsels = Counsel::all();
        $services = CriminalCase::all();
        return view('assignment.create',compact('categories','counsels','services'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        Assignment::create($request->all());

        return redirect()->route('assignment.index')->with('success','Assignment has been created.');
    }
    public function show ($id)
    {
        $data = Assignment::findOrFail($id);
        $categories = AssignmentCategory::all();
        $counsels = Counsel::all();
        $services = CriminalCase::all();
        return view('assignment.show',compact('data','categories','counsels','services'));
    }
    public function edit ($id)
    {
        $data = Assignment::findOrFail($id);
        $categories = AssignmentCategory::all();
        $counsels = Counsel::all();
        $services = CriminalCase::all();
        return view('assignment.edit',compact('data','categories','counsels','services'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $data = Assignment::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('assignment.index')->with('success','Assignment has been updated.');
    }
    public function destroy($id)
    {
        Assignment::findOrFail($id)->delete();
        return redirect()->route('assignment.index')->with('success','Assignment has been deleted.');
    }

    public function changeStatus(Request $request,$id)
    {

        $data = Assignment::findOrFail($id);
        $data->update($request->all());

        return redirect()->back()->with('success','Status has been changed.');
    }
}
