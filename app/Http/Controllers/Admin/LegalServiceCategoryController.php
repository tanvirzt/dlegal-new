<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LegalServiceCategory;
use Illuminate\Http\Request;

class LegalServiceCategoryController extends Controller
{
    public function index(){
        $data = LegalServiceCategory::get();
        return view('legal_service_category.index',compact('data'));
    }
    public function create(){

        return view('legal_service_category.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'legal_service_category' => 'required',
        ]);

        LegalServiceCategory::create($request->all());

        return redirect()->route('legal-service-category.index')->with('success','Legal Service Category has been created.');
    }

    public function destroy(LegalServiceCategory $legal_service_category)
    {
        // Delete the legal service category from the database
        $legal_service_category->delete();
    
        // Redirect the user to the index page with a success message
        return redirect()->route('legal-service-category.index')
            ->with('success', 'Legal service category deleted successfully');
    }
}
