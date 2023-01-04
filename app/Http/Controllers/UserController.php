<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Models\User;
use App\Models\Role;
use App\Models\Department;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;

use Illuminate\Support\Facades\Auth;

use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index()
    {

            $users = User::all();
            return view('admin.users.list',compact('users'));           
               
    }

    public function create()
    {
        $roles = Role::all();
        $departments = Department::all();
        return view('admin.users.create',compact('roles'),compact('departments'));
    }

    public function edit($id)
    {
        if($id!=1)
        {
        $users = User::find($id);
        $roles = Role::all();

        return view('admin.users.edit',compact('users'))
        ->withRoles($roles)
        ;
        }else{
            return redirect('/user'); 
        }
    }

    public function delete($id)
    {
        if($id!=1)
        {
        $users = User::find($id);   
        $roles = Role::all();
        return view('admin.users.delete',compact('users'))
        ->withRoles($roles)
        ;
        }else{
            return redirect('/user');
        }
    }

    public function store(Request $request)
    {
        //dd($request);

        $department=$request->departmentarray[0];
        $role=$request->rolearray[0];

       
/*
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
*/
            $request->validate([  
               // 'sector_desc'=>'required|max:50|min:1', 
               'name' => ['required', 'string', 'max:255'],
               'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
               'password' => ['required', 'confirmed', Rules\Password::defaults()],
               'user_role_id'=>'nullable|max:50|',
               'user_department_id'=>'nullable|max:50|',
            ]);

            //dd(;
           
            User::create([
    
               // 'sector_desc'=>request('sector_desc'), 
               'name' => $request->name,
               'email' => $request->email,
               'password' => Hash::make($request->password),
               'user_role_id'=>$role,
               'user_department_id'=>$department,               
            ]);

            return redirect('/user');
    }

   public function update(Request $request,$id)
    {
        $none=NULL;

        if($request->rolearray!= NULL)
        {
            $none=$request->rolearray[0];
            //dd($none);
        }

        $users = User::findOrFail($id);
        /*
        
        */
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $users->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_role_id'=>$none, 
        ]);


        return redirect('/user');
    }

    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect('/user');

    }

}
