<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\ScheduleCategory;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $data = Schedule::orderBy('id','desc')->get();
        return view('schedule.index', compact('data'));
    }
    public function create()
    {
        $categories = ScheduleCategory::all();
        return view('schedule.create',compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        Schedule::create($request->all());

        return redirect()->route('schedule.index')->with('success','Schedule has been created.');
    }
    public function show ($id)
    {
        $data = Schedule::findOrFail($id);
        $categories = ScheduleCategory::all();
        return view('schedule.show',compact('data','categories'));
    }
    public function edit ($id)
    {
        $data = Schedule::findOrFail($id);
        $categories = ScheduleCategory::all();
        return view('schedule.edit',compact('data','categories'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $data = Schedule::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('schedule.index')->with('success','Schedule has been updated.');
    }
    public function destroy($id)
    {
        Schedule::findOrFail($id)->delete();
        return redirect()->route('schedule.index')->with('success','Schedule has been deleted.');
    }

    public function changeStatus(Request $request,$id)
    {

        $data = Schedule::findOrFail($id);
        $data->update($request->all());

        return redirect()->back()->with('success','Status has been changed.');
    }

}
