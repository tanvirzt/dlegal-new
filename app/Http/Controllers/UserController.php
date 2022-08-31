<?php

namespace App\Http\Controllers;

use App\Models\SetupCompany;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Hash;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->is_owner_admin == '1') {
            $data = User::orderBy('id','DESC')->get();
        } else {
            $data = User::where('is_owner_admin','!=','1')->orderBy('id','DESC')->get();
        }
        return view('user_management.users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        $company = SetupCompany::pluck('company_name', 'id')->all();
        return view('user_management.users.create',compact('roles','company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        request_array($request->all());

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
//            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        if ($request->hasfile('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            $original_name = $file->getClientOriginalName();
            $name = time() . rand(1, 100) . $original_name;
            $file->move(public_path('files/profile_photo_path'), $name);
            $input['profile_photo_path'] = $name;
        }

        $input['is_owner_admin'] = !empty($request->is_owner_admin) ? 1 : 0;
        $input['is_companies_superadmin'] = !empty($request->is_companies_superadmin) ? 1 : 0;
        $input['is_companies_admin'] = !empty($request->is_companies_admin) ? 1 : 0;

        $user = User::create($input);

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $query = DB::table('users');
        if (Auth::user()->is_owner_admin == '1') {
            $query2 = $query;
        } else {
            $query2 = $query->where('is_owner_admin','!=','1');
        }

        $permissions_data = $query2->where('id', $id)->count();

        if ($permissions_data == 1){
            $user = User::find($id);
        }else{
            return view('errors.403');
        }

        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        $company = SetupCompany::pluck('company_name', 'id')->all();

        return view('user_management.users.edit',compact('user','roles','userRole', 'company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
//            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $input['is_owner_admin'] = !empty($request->is_owner_admin) ? 1 : 0;
        $input['is_companies_superadmin'] = !empty($request->is_companies_superadmin) ? 1 : 0;
        $input['is_companies_admin'] = !empty($request->is_companies_admin) ? 1 : 0;

        $user = User::find($id);

        if ($request->hasfile('profile_photo_path')) {

            if($user->profile_photo_path != null){
                $file_path = 'files/profile_photo_path/'.$user->profile_photo_path;
                if(file_exists($file_path)){
                    unlink($file_path);
                }
            }

            $file = $request->file('profile_photo_path');
            $original_name = $file->getClientOriginalName();
            $name = time() . rand(1, 100) . $original_name;
            $file->move(public_path('files/profile_photo_path'), $name);
            $input['profile_photo_path'] = $name;
        }


        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success','User deleted successfully');
    }

    public function add_permissions($id)
    {
        $query = DB::table('users');
        if (Auth::user()->is_owner_admin == '1') {
            $query2 = $query;
        } else {
            $query2 = $query->where('is_owner_admin','!=','1');
        }

        $permissions_data = $query2->where('id', $id)->count();

        if ($permissions_data == 1){
            $user = User::find($id);
        }else{
            return view('errors.403');
        }


        $all_permissions = Permission::get();
        $permission = Permission::get();
//        $user = User::find($id);
        $permission_groups = User::getPermissionGroups();
        return view('user_management.users.user_permissions',compact('permission_groups','all_permissions','permission','user'));

    }

    public function save_users_permissions(Request $request, $id)
    {

        $user = User::where('id', $id)->first(); // uses the \App\User model
        $user->givePermissionTo($request->input('permission')); // stores the relationship
        return redirect()->route('users.index')
            ->with('success','Users Permission Added successfully');
    }

}
