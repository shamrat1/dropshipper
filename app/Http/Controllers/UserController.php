<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\User;

class UserController extends Controller
{

   function user(Request $request)
   {
      return response()->json($request->user());
   }

   function userList()
   {
      $Users = User::all();
      return view('admin/user-list', compact('Users'));
   }

   function createUser()
   {
      return view('admin/create-user');
   }

   public function createAccount(Request $request)
   {

      if ($request->password == $request->confirmPassword) {

         $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
         ]);

         //Don't use it because password not 'Hash'
         // $User = User::create($validated);

         User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
         ]);


         return back()->with('success', 'User information insert successfully');
      } else {
         return back()->with('fail', 'Password does\'t match');
      }
   }

   function edit($id)
   {
      $edit_user = User::findOrFail($id);
      $Users = User::all();
      return view('admin/user-edit', compact('edit_user', 'Users'));
   }
   public function updatePassword(Request $request, $id)
   {
      $this->validate($request, [
         'password' => 'required|min:8|confirmed'
      ]);
      User::find($id)->update([
         'password' => Hash::make($request->password)
      ]);

      return redirect()->route('user.index')->with('success', "Password updated successfully.");
   }

   function editNow(Request $request)
   {

      $validated = $request->validate([
         'name' => 'required',
         'email' => 'required'
      ]);
      User::where('id', $request->id)->update([
         'name' => $request->name,
         'email' => $request->email
      ]);

      $Users = User::all();
      return view('admin/user-list', compact('Users'))->with('success', 'Edit Successfully');
   }



   public function delete($id)
   {
      $User = User::find($id)->delete();
      return back()->with('success', 'Delete successfully');
   }

   // $password = Hash::make('yourpassword');

}
