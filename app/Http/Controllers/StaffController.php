<?php

namespace App\Http\Controllers;


use App\Staff;
use App\User;
use App\Http\Traits\NewCompanyUserPasswordNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    use NewCompanyUserPasswordNotification;
    public function index()
    {
        $company = auth()->user()->company;
        $staff = Staff::where('company_id',$company->id)->with('user')->get();
        // dd($company);
        return view('admin.staff.index',compact('staff'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'limit' => 'required|numeric'
        ]);
        $company = auth()->user()->company;
        $password = mt_rand(10000000, 99999999);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($password);
        $user->save();
        
        $staff = new Staff();
        $staff->company_id = $company->id;
        $staff->user_id = $user->id;
        $staff->limit = $request->limit;

        $staff->save();
        // event(new Registered($user));
        // $this->passwordMail($user,$password);
        return redirect()->back()->with('success','New Staff Created.');

    }
}
