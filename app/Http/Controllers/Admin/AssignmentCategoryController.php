<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AssignmentCategory;
use Illuminate\Http\Request;

class AssignmentCategoryController extends Controller
{
    public function index()
    {
        $data = AssignmentCategory::orderBy('id','desc')->get();
        return view('assignment.assignment_category.index', compact('data'));
    }
    public function create()
    {

        return view('assignment.assignment_category.create');
    }
    public function store(Request $request)
    {

        $request->validate([
            'category_name' => 'required',
            'color' => 'required',
        ]);

        AssignmentCategory::create($request->all());

        return redirect()->route('assignment.category.index')->with('success','Assignment Category has been created.');
    }
    public function edit ($id)
    {
        $data = AssignmentCategory::findOrFail($id);
        return view('assignment.assignment_category.edit',compact('data'));
    }
    public function update(Request $request, $id)
    {
        //dd($request);
        $request->validate([
            'category_name' => 'required',
            'color' => 'required',
        ]);

        $data = AssignmentCategory::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('assignment.category.index')->with('success','Assignment Category has been updated.');
    }

    public function destroy($id)
    {
        AssignmentCategory::findOrFail($id)->delete();
        return redirect()->route('assignment.category.index')->with('success','Assignment Category has been deleted.');
    }
}
