<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TaskCategory;
use Illuminate\Http\Request;

class TaskCategoryController extends Controller
{

    public function index()
    {
        $data = TaskCategory::orderBy('id','desc')->get();
        return view('task.task_category.index', compact('data'));
    }

    public function create()
    {
        return view('task.task_category.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'category_name' => 'required',
            'color' => 'required',
        ]);

        TaskCategory::create($request->all());

        return redirect()->route('task.category.index')->with('success','Task Category has been created.');
    }


    public function edit ($id)
    {
        $data = TaskCategory::findOrFail($id);
        return view('task.task_category.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required',
            'color' => 'required',
        ]);

        $data = TaskCategory::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('task.category.index')->with('success','Task Category has been updated.');
    }


    public function destroy($id)
    {
        TaskCategory::findOrFail($id)->delete();
        return redirect()->route('task.category.index')->with('success','Category has been deleted.');
    }
}
