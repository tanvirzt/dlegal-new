<?php

namespace App\Http\Controllers\Admin;
use App\Models\ScheduleCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScheduleCategoryController extends Controller
{
    public function index()
    {
        $data = ScheduleCategory::orderBy('id','desc')->get();
        return view('schedule.schedule_category.index', compact('data'));
    }
    public function create()
    {

        return view('schedule.schedule_category.create');
    }
    public function store(Request $request)
    {

        $request->validate([
            'category_name' => 'required',
            'color' => 'required',
        ]);

        ScheduleCategory::create($request->all());

        return redirect()->route('schedule.category.index')->with('success','Schedule Category has been created.');
    }
    public function edit ($id)
    {
        $data = ScheduleCategory::findOrFail($id);
        return view('schedule.schedule_category.edit',compact('data'));
    }
    public function update(Request $request, $id)
    {
        //dd($request);
        $request->validate([
            'category_name' => 'required',
            'color' => 'required',
        ]);

        $data = ScheduleCategory::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('schedule.category.index')->with('success','Schedule Category has been updated.');
    }

    public function destroy($id)
    {
        ScheduleCategory::findOrFail($id)->delete();
        return redirect()->route('schedule.category.index')->with('success','Schedule Category has been deleted.');
    }
}
