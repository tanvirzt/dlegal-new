<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\TaskCategory;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $data = Task::orderBy('id','desc')->get();
        return view('task.index', compact('data'));
    }

    public function create()
    {
        $categories = TaskCategory::all();
        return view('task.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        Task::create($request->all());

        return redirect()->route('task.index')->with('success','Task has been created.');
    }



    public function show ($id)
    {
        $data = Task::findOrFail($id);
        $categories = TaskCategory::all();
        return view('task.show',compact('data','categories'));
    }

    public function edit ($id)
    {
        $data = Task::findOrFail($id);
        $categories = TaskCategory::all();
        return view('task.edit',compact('data','categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $data = Task::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('task.index')->with('success','Task has been updated.');
    }


    public function destroy($id)
    {
        Task::findOrFail($id)->delete();
        return redirect()->route('task.index')->with('success','Task has been deleted.');
    }

    public function changeStatus(Request $request,$id)
    {

        $data = Task::findOrFail($id);
        $data->update($request->all());

        return redirect()->back()->with('success','Status has been changed.');
    }
}
