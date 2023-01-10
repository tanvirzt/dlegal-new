<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Auth;
use Session;
use App\Models\User;
use App\Models\Admin;
use App\Models\CriminalCase;
use App\Models\CriminalCaseStatusLog;
use App\Models\SetupCaseStatus;
use App\Models\SetupCaseTypes;
use App\Models\Task;
use Carbon\Carbon;
use Image;
use stdClass;

class AdminController extends Controller
{
    public function dashboard()
    {
        Session::put('page','dashboard');

        $runningCases_no = CriminalCase::where('case_status_id', 'Running')->where('delete_status', 0)->count();
        $disposedCase_no = CriminalCase::where('case_status_id', 'Disposed')->where('delete_status', 0)->count();

        $appeal_no = CriminalCase::leftJoin('setup_case_types', 'criminal_cases.case_type_id', '=', 'setup_case_types.id')
        ->where('setup_case_types.case_types_name','LIKE','%'.'Appeal'.'%')
        ->where('criminal_cases.delete_status', 0)->count();

        $revision_no = CriminalCase::leftJoin('setup_case_types', 'criminal_cases.case_type_id', '=', 'setup_case_types.id')
        ->where('setup_case_types.case_types_name','LIKE','%'.'Revision'.'%')
        ->where('criminal_cases.delete_status', 0)->count();

        $allCivil_no = CriminalCase::where('case_category_id', 'Civil')->where('case_status_id', 'Running')->where('delete_status', 0)->count();
        $allCriminal_no = CriminalCase::where('case_category_id', 'Criminal')->where('case_status_id', 'Running')->where('delete_status', 0)->count();


        $case_type_setup_Civil = SetupCaseTypes::leftJoin('setup_case_categories','setup_case_types.case_category_id','setup_case_categories.id')
                         ->where('setup_case_categories.case_category','Civil')
                         ->where('setup_case_types.delete_status', 0)
                         ->get();

        $civil_case_type_array=array();

        foreach($case_type_setup_Civil as $d){

          $allCivil_Suit =CriminalCase::leftJoin('setup_case_types', 'criminal_cases.case_type_id', '=', 'setup_case_types.id')
            ->where('setup_case_types.case_types_name',$d['case_types_name'])
            ->where('criminal_cases.case_category_id', 'Civil')
            ->where('criminal_cases.case_status_id', 'Running')
            ->where('criminal_cases.delete_status', 0)->count();
           
            $civilObj =new stdClass();
            $civilObj->x = $d['case_types_name'];
            $civilObj->y = $allCivil_Suit;
            $civilObj->legendEntry_sortOrder = 2;
            $civilObj->attributes_year = 'Civil';

            array_push($civil_case_type_array,$civilObj);
        }

        $case_type_setup_Criminal = SetupCaseTypes::leftJoin('setup_case_categories','setup_case_types.case_category_id','setup_case_categories.id')
                         ->where('setup_case_categories.case_category','Criminal')
                         ->where('setup_case_types.delete_status', 0)
                         ->get();

        $criminal_case_type_array=array();

        foreach($case_type_setup_Criminal as $d){
            $allcriminal_Suit =CriminalCase::leftJoin('setup_case_types', 'criminal_cases.case_type_id', '=', 'setup_case_types.id')
                ->where('setup_case_types.case_types_name',$d['case_types_name'])
                ->where('criminal_cases.case_category_id', 'Criminal')
                ->where('criminal_cases.case_status_id', 'Running')
                ->where('criminal_cases.delete_status', 0)->count();
            
                $criminalObj =new stdClass();
                $criminalObj->x = $d['case_types_name'];
                $criminalObj->y = $allcriminal_Suit;
                $criminalObj->legendEntry_sortOrder = 4;
                $criminalObj->attributes_year = 'Criminal';

                array_push($criminal_case_type_array,$criminalObj);
        }

        $Civil_Criminal_Case_type_Array = array_merge($civil_case_type_array,$criminal_case_type_array);


        
        $currentYear = Carbon::now()->format('Y');
        $cases = array();
        for ($x = 1; $x <= 12; $x++) {
            $case = CriminalCaseStatusLog::whereRaw('YEAR(updated_order_date) ='.$currentYear)
            ->whereRaw('MONTH(updated_order_date) ='.$x)
            ->where('delete_status', 0)->count();
            array_push($cases, $case);  
        }

        $caseFilling= array();

        for ($x = 1; $x <= 12; $x++) {
            $caseF = CriminalCase::whereRaw('YEAR(date_of_filing) ='.$currentYear)
            ->whereRaw('MONTH(date_of_filing) ='.$x)
            ->where('delete_status', 0)->count();
            array_push($caseFilling, $caseF);  
        }
        $caseDisposed= array();

        for ($x = 1; $x <= 12; $x++) {
            $caseF = CriminalCase::whereRaw('YEAR(date_of_filing) ='.$currentYear)
            ->whereRaw('MONTH(date_of_filing) ='.$x)
            ->where('case_status_id', 'Disposed')
            ->where('delete_status', 0)
            ->count();
            array_push($caseDisposed, $caseF);  
        }


       $case_status_setup_civil = SetupCaseStatus::where('delete_status',0)
                         ->where('case_category','Civil')
                          ->get()->toArray();

        $caselogCountArray_civil = array();
        foreach ($case_status_setup_civil as $d) {
            $caseProcedingLog = CriminalCaseStatusLog::leftJoin('setup_case_statuses', 'criminal_case_status_logs.updated_case_status_id', '=', 'setup_case_statuses.id')
                ->leftJoin('criminal_cases', 'criminal_case_status_logs.case_id', 'criminal_cases.id')
                ->where('case_category_id','Civil')
                ->where('case_status_name',$d['case_status_name'])
                ->get()->count();

            // $name =$d['case_status_name'];
            $objectData = new stdClass();
            $objectData->x = $d['case_status_name'];
            $objectData->y = $caseProcedingLog;
            $objectData->legendEntry_sortOrder = 2;
            $objectData->attributes_year = 'Civil';
            array_push($caselogCountArray_civil,$objectData);     
        }
       $case_status_setup_criminal = SetupCaseStatus::where('delete_status',0)
                         ->where('case_category','Criminal')
                          ->get()->toArray();

        $caselogCountArray_Criminal = array();
        foreach ($case_status_setup_criminal as $d) {
            $caseProcedingLog = CriminalCaseStatusLog::leftJoin('setup_case_statuses', 'criminal_case_status_logs.updated_case_status_id', '=', 'setup_case_statuses.id')
                ->leftJoin('criminal_cases', 'criminal_case_status_logs.case_id', 'criminal_cases.id')
                ->where('case_category_id','Criminal')
                ->where('case_status_name',$d['case_status_name'])
                ->get()->count();

            // $name =$d['case_status_name'];

            $objectData = new stdClass();
            $objectData->x = $d['case_status_name'];
            $objectData->y = $caseProcedingLog;
            $objectData->legendEntry_sortOrder = 2;
            $objectData->attributes_year = 'Criminal';
            array_push($caselogCountArray_Criminal,$objectData);     
        }

       

       

        $tasks = Task::orderBy('id','desc')->get();

        return view('admin.admin_dashboard',compact('cases',
        'caseFilling','caseDisposed',
        'runningCases_no','allCivil_no','allCriminal_no','disposedCase_no','appeal_no','revision_no',
        'caselogCountArray_civil',
        'caselogCountArray_Criminal',
        'Civil_Criminal_Case_type_Array',

        'tasks'));
    }

    public function dashboards()
    {
        return view('dashboard');
    }

    public function login(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>";print_r($data);die();

            if(Auth::guard('admin')->attempt(['email'=>$data['email'], 'password'=>$data['password']])){
                return redirect('/admin/dashboard');
            }else{
                Session::flash('error_message', 'Invalid Email or Password!');
                return redirect()->back();
            }
        }
        return view('admin.admin_login');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }

    public function settings()
    {
        Session::put('page','settings');
        $data = Auth::guard('admin')->user();
        // $data = json_decode(json_encode($data));
        return view('admin.admin_settings',compact('data'));
    }

    public function chkCurrentPassword(Request $request)
    {
        $data = $request->all();
        if(Hash::check($data['current_password'], Auth::guard('admin')->user()->password)){
            echo "true";
        }else{
            echo "false";
        }

    }

    public function updateCurrentPassword(Request $request)
    {
        if($request->isMethod('post')){

            $data = $request->all();
            // check current password
            if (Hash::check($data['current_password'],Auth::guard('admin')->user()->password)) {
                // check new and confirm password
                if ($data['new_password']==$data['confirm_password']) {

                // update password

                   Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_password'])]);
                    Session::flash('success_message','Your password updated successfully!');

                }else{
                    Session::flash('error_message','Your new and confirm password is not same!');
                }

            }else{
                Session::flash('error_message','Your current password is not correct!');
            }
            return redirect()->back();
        }

    }

    public function admin_details_update(Request $request)
    {
        Session::put('page','admin_details_update');

        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>";print_r($data);die();
// validation on the input field
            $rules = [
                'name'=>'required|regex:/^[\pL\s\-]+$/u',
                'mobile'=>'required|numeric',
                // 'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];
// validation message for those input fields
            $validMsg = [
                'name.required'=>'Name field is required',
                'name.alpha'=>'Valid Name is required',
                'mobile.required'=>'Mobile field is required',
                'mobile.required'=>'Valid Mobile is required',
            ];
            $this->validate($request,$rules,$validMsg);

            if ($request->hasFile('image')) {
                // get image tmp name
                $img_tmp = $request->file('image');
// check whether the image exists or not
                    if (!empty($data['current_image'])) {
                        $image_path = 'images/admin_images/admin_profile/'.$data['current_image'];
// if file exists then remove it
                        if(file_exists($image_path)){
                            unlink($image_path);
                        }
                    }

// then check the file validity
                if ($img_tmp->isValid()) {
// if file is valid then get the file extension
                    $img_ext = $img_tmp->getClientOriginalExtension();
// make an image name with some random number
                    $img_name = rand(111,99999).'.'.$img_ext;
// declare the storage path where the file have to save
                    $image_path = 'images/admin_images/admin_profile/'.$img_name;
// dave the file into the given path
                    Image::make($img_tmp)->resize(200,200)->save($image_path);

                }
// if the file is already exists and dont want to give an image again
            }else if(!empty($data['current_image'])){

                $img_name = $data['current_image'];
// if image doesnt exists and you also dont want to save any image
            }else{

                $img_name = "";

            }

//save the data into database
            Admin::where('email',Auth::guard('admin')->user()->email)->update(['name'=>$data['name'],'mobile'=>$data['mobile'],'image'=>$img_name]);
// after saving the data give a flash message to the view
            session::flash('success_message','Admin Details updated successfully!');
// after completing the process return to the view page
            return redirect()->back();
        }
// if the request is get then we return the only view page
        return view('admin.admin_update');
    }
}
