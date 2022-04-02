<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CivilCases;
use App\Models\CriminalCase;
use App\Models\LabourCase;
use App\Models\QuassiJudicialCase;
use App\Models\SupremeCourtCase;
use App\Models\HighCourtCase;
use App\Models\AppellateCourtCase;
use App\Models\LandInformation;
use App\Models\FlatInformation;
use App\Models\SetupExternalCouncil;
use App\Models\SetupInternalCouncil;
use App\Models\SetupExternalCouncilAssociate;
use App\Models\SetupExternalCouncilFile;
use App\Models\SetupExternalCouncilAssociatesFile;
use App\Models\SetupInternalCouncilFiles;
use App\Models\CivilCasesFile;
use App\Models\CriminalCasesFile;
use App\Models\LabourCasesFile;
use App\Models\QuassiJudicialCasesFile;
use App\Models\SupremeCourtCasesFile;
use App\Models\HighCourtCasesFile;
use App\Models\AppellateCourtCasesFile;
use App\Models\LandInformationFile;
use App\Models\FlatInformationFile;
use App\Models\ExternalFile;

class DocManagementController extends Controller
{
    //

    public function document_management()
    {
// litigation management
        $civil_case = CivilCases::with('civil_cases_files')->where('delete_status',0)->get();
        $criminal_case = CriminalCase::with('criminal_cases_files')->where('delete_status',0)->get();
        $labour_case = LabourCase::with('labour_cases_files')->where('delete_status',0)->get();
        $quassi_judicial_case = QuassiJudicialCase::with('quassi_judicial_cases_files')->where('delete_status',0)->get();
        $supreme_court_case = SupremeCourtCase::with('supreme_court_cases_files')->where('delete_status',0)->get();
        $high_court_case = HighCourtCase::with('high_court_cases_files')->where('delete_status',0)->get();
        $appellate_court_case = AppellateCourtCase::with('appellate_court_cases_files')->where('delete_status',0)->get();

// property management
        $land_information = LandInformation::with('land_information_files')->where('delete_status',0)->get();
        $flat_information = FlatInformation::with('flat_information_files')->where('delete_status',0)->get();

        $external_council = SetupExternalCouncil::with('external_council_files')->where('delete_status',0)->get();
        $internal_council = SetupInternalCouncil::with('internal_council_files')->where('delete_status',0)->get();
        $external_council_associates = SetupExternalCouncilAssociate::with('external_council_associates_files')->where('delete_status',0)->get();
        $external_document = ExternalFile::where('delete_status',0)->get();

        // $external_document = json_decode(json_encode($external_document));
        // echo "<pre>";print_r($external_document);die;

        return view('document_management.document_management.document_management',compact('external_council','external_council_associates','internal_council','civil_case','criminal_case','labour_case','quassi_judicial_case','supreme_court_case','high_court_case','appellate_court_case','land_information','flat_information','external_document'));
    }


    public function add_documents()
    {
        return view('document_management.document_management.add_document');
    }

    public function find_admin_setup(Request $request)
    {
        if ($request->admin_setup == "External Council") {
            $data = SetupExternalCouncil::where('delete_status',0)->get();
        } else if ($request->admin_setup == "External Council Associates"){
            $data = SetupExternalCouncilAssociate::where('delete_status',0)->get();
        }else if ($request->admin_setup == "Internal Council"){
            $data = SetupInternalCouncil::where('delete_status',0)->get();
        }
        return response()->json($data);
    }

    public function find_litigation_cases(Request $request)
    {
        if ($request->litigation_cases == "Civil Cases") {
            $data = CivilCases::where('delete_status',0)->get();
        } else if ($request->litigation_cases == "Criminal Cases"){
            $data = CriminalCase::where('delete_status',0)->get();
        }else if ($request->litigation_cases == "Labour Cases"){
            $data = LabourCase::where('delete_status',0)->get();
        }else if ($request->litigation_cases == "Special Quassi - Judicial Cases"){
            $data = QuassiJudicialCase::where('delete_status',0)->get();
        }else if ($request->litigation_cases == "Supreme Court of Bangladesh"){
            $data = SupremeCourtCase::where('delete_status',0)->get();
        }else if ($request->litigation_cases == "High Court Division"){
            $data = HighCourtCase::where('delete_status',0)->get();
        }else if ($request->litigation_cases == "Appellate Court Division"){
            $data = AppellateCourtCase::where('delete_status',0)->get();
        }
        return response()->json($data);
    }

    public function find_property_management(Request $request)
    {
        if ($request->property_management == "Land Information") {
           $data = LandInformation::where('delete_status',0)->get();
        } else if($request->property_management  == "Flat Information") {
           $data = FlatInformation::where('delete_status',0)->get();
        }
        return response()->json($data);
    }

    public function save_document(Request $request)
    {
        // dd($request->all());
//
        $rules = [
            'document_type' => 'required',
            // 'uploaded_document' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf',
        ];

        $validMsg = [
            'document_type.required' => 'Document type field is required',
        ];

        $this->validate($request, $rules, $validMsg);

        if ($request->document_type == "Internal Files") {
            // dd('asdfasdfasdf');

            if ($request->module == "Admin Setup") {
                // dd('admin');

                if ($request->admin_menu == "External Council") {
                    // dd('External Council');
                    // dd($request->all());
                    // 'file' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf|max:2048'
                    if($request->hasfile('uploaded_document'))
                    {
                        foreach($request->file('uploaded_document') as $file)
                        {
                            $original_name = $file->getClientOriginalName();
                            $file_name = time().rand(1,100).$original_name;
                            $file->move(public_path('files/external_council'),$file_name);
                            $files = new SetupExternalCouncilFile();
                            $files->external_council_id = $request->admin_setup_data;
                            $files->uploaded_document = $file_name;
                            $files->save();
                        }
                    }
                } else if ($request->admin_menu == "External Council Associates") {

                    // dd('External Council Associates');

                    if($request->hasfile('uploaded_document'))
                    {
                        foreach($request->file('uploaded_document') as $file)
                        {
                            $original_name = $file->getClientOriginalName();
                            $file_name = time().rand(1,100).$original_name;
                            $file->move(public_path('files/external_council_associates'),$file_name);
                            $files = new SetupExternalCouncilAssociatesFile();
                            $files->external_council_associates_id = $request->admin_setup_data;
                            $files->uploaded_document = $file_name;
                            $files->save();
                        }
                    }

                } else if ($request->admin_menu == "Internal Council") {

                    // dd('Internal Council');

                    if($request->hasfile('uploaded_document'))
                    {
                        foreach($request->file('uploaded_document') as $file)
                        {
                            $original_name = $file->getClientOriginalName();
                            $file_name = time().rand(1,100).$original_name;
                            $file->move(public_path('files/internal_council'),$file_name);
                            $files = new SetupInternalCouncilFiles();
                            $files->internal_council_id = $request->admin_setup_data;
                            $files->uploaded_document = $file_name;
                            $files->save();
                        }
                    }

                }



            } else if ($request->module == "Litigation Mangement"){
            //    dd($request->all());

                if ($request->cases_menu == "Civil Cases") {
                //    dd("Civil Cases");
            //    dd($request->all());

                    if($request->hasfile('uploaded_document'))
                    {
                        foreach($request->file('uploaded_document') as $file)
                        {
                            $original_name = $file->getClientOriginalName();
                            $file_name = time().rand(1,100).$original_name;
                            $file->move(public_path('files/civil_cases'),$file_name);
                            $files = new CivilCasesFile();
                            $files->case_id = $request->litagation_cases;
                            $files->uploaded_document = $file_name;
                            $files->save();
                        }
                    }

                } else if ($request->cases_menu == "Criminal Cases"){
                    // dd("Criminal Cases");

                    if($request->hasfile('uploaded_document'))
                    {
                        foreach($request->file('uploaded_document') as $file)
                        {
                            $original_name = $file->getClientOriginalName();
                            $file_name = time().rand(1,100).$original_name;
                            $file->move(public_path('files/criminal_cases'),$file_name);
                            $files = new CriminalCasesFile();
                            $files->case_id = $request->litagation_cases;
                            $files->uploaded_document = $file_name;
                            $files->save();
                        }
                    }


                }else if ($request->cases_menu == "Labour Cases"){
                    // dd("Labour Cases");
                    if($request->hasfile('uploaded_document'))
                    {
                        foreach($request->file('uploaded_document') as $file)
                        {
                            $original_name = $file->getClientOriginalName();
                            $file_name = time().rand(1,100).$original_name;
                            $file->move(public_path('files/labour_cases'),$file_name);
                            $files = new LabourCasesFile();
                            $files->case_id = $request->litagation_cases;
                            $files->uploaded_document = $file_name;
                            $files->save();
                        }
                    }

                }else if ($request->cases_menu == "Special Quassi - Judicial Cases"){
                    // dd("Quassi Cases");

                    if($request->hasfile('uploaded_document'))
                    {
                        foreach($request->file('uploaded_document') as $file)
                        {
                            $original_name = $file->getClientOriginalName();
                            $file_name = time().rand(1,100).$original_name;
                            $file->move(public_path('files/quassi_judicial_cases'),$file_name);
                            $files = new QuassiJudicialCasesFile();
                            $files->case_id = $request->litagation_cases;
                            $files->uploaded_document = $file_name;
                            $files->save();
                        }
                    }

                }else if ($request->cases_menu == "Supreme Court of Bangladesh"){
                    // dd("Supreme Cases");
                    if($request->hasfile('uploaded_document'))
                    {
                        foreach($request->file('uploaded_document') as $file)
                        {
                            $original_name = $file->getClientOriginalName();
                            $file_name = time().rand(1,100).$original_name;
                            $file->move(public_path('files/supreme_court_cases'),$file_name);
                            $files = new SupremeCourtCasesFile();
                            $files->case_id = $request->litagation_cases;
                            $files->uploaded_document = $file_name;
                            $files->save();
                        }
                    }

                }else if ($request->cases_menu == "High Court Division"){
                    // dd("High Cases");
                    if($request->hasfile('uploaded_document'))
                    {
                        foreach($request->file('uploaded_document') as $file)
                        {
                            $original_name = $file->getClientOriginalName();
                            $file_name = time().rand(1,100).$original_name;
                            $file->move(public_path('files/high_court_cases'),$file_name);
                            $files = new HighCourtCasesFile();
                            $files->case_id = $request->litagation_cases;
                            $files->uploaded_document = $file_name;
                            $files->save();
                        }
                    }

                }else if ($request->cases_menu == "Appellate Court Division"){
                    // dd("Appellate Cases");

                    if($request->hasfile('uploaded_document'))
                    {
                        foreach($request->file('uploaded_document') as $file)
                        {
                            $original_name = $file->getClientOriginalName();
                            $file_name = time().rand(1,100).$original_name;
                            $file->move(public_path('files/appellate_court_cases'),$file_name);
                            $files = new AppellateCourtCasesFile();
                            $files->case_id = $request->litagation_cases;
                            $files->uploaded_document = $file_name;
                            $files->save();
                        }
                    }

                }




            } else if ($request->module == "Property Management"){
            //    dd($request->all());
                if ($request->property_management_menu == "Land Information") {
                    // dd('land');

                    if($request->hasfile('uploaded_document'))
                    {
                        foreach($request->file('uploaded_document') as $file)
                        {
                            $original_name = $file->getClientOriginalName();
                            $file_name = time().rand(1,100).$original_name;
                            $file->move(public_path('files/land_information'),$file_name);
                            $files = new LandInformationFile();
                            $files->land_information_id = $request->p_management;
                            $files->uploaded_document = $file_name;
                            $files->save();
                        }
                    }


                } else if ($request->property_management_menu == "Flat Information"){
                    // dd('flat');

                    if($request->hasfile('uploaded_document'))
                    {
                        foreach($request->file('uploaded_document') as $file)
                        {
                            $original_name = $file->getClientOriginalName();
                            $file_name = time().rand(1,100).$original_name;
                            $file->move(public_path('files/flat_information'),$file_name);
                            $files = new FlatInformationFile();
                            $files->flat_information_id = $request->p_management;
                            $files->uploaded_document = $file_name;
                            $files->save();
                        }
                    }

                }

            }


        } else {
            // dd('others files');

            if($request->hasfile('uploaded_document'))
            {
                foreach($request->file('uploaded_document') as $file)
                {
                    $original_name = $file->getClientOriginalName();
                    $file_name = time().rand(1,100).$original_name;
                    $file->move(public_path('files/external_files'),$file_name);
                    $files = new ExternalFile();
                    $files->file_name = $request->file_name;
                    $files->uploaded_document = $file_name;
                    $files->save();
                }
            }

        }

        session()->flash('success','Files Added Successfully.');
        return redirect()->route('document-management');

    }


    public function download_external_files($id)
    {
        $file = ExternalFile::find($id);
        $path = 'files/external_files/'.$file->uploaded_document;
        return response()->download($path);
    }


    public function external_document()
    {
        // dd('adsf asdf ');

        $external_document = ExternalFile::where('delete_status',0)->get();
        // dd($external_document);
        return view('document_management.document_management.view_external_documents',compact('external_document'));

    }

}
