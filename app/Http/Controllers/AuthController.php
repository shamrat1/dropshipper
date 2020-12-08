<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    function login(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);

        $credentials = request(['email', 'password']);
        
        if (!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);

        
        $token->save();
        // dd($token);
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);

        if($request->isCompany){
            $request->validate([
                'company_name' => 'required|string',
                'company_address' => 'required|string',
                'lat' => 'required',
                'lon' => 'required',
                'company_image' => 'nullable|image|mimes:jpeg,png'
            ]);
        }

        if ($request->isBusiness){
            $request->validate([
                'business_name' => 'required|string',
                'business_image' => 'nullable|image|mimes:jpeg,png',
                'business_description' => 'nullable|string',
                'opening_hours' => 'nullable|string',
                'isShipping' => 'nullable|boolean',
                'max_ship_time' => Rule::requiredIf($request->isShipping),
                'delivery_areas' => Rule::requiredIf($request->isShipping),
                'delivery_cost' => [Rule::requiredIf($request->isShipping),'integer'],
                'delivery_cost' => [Rule::requiredIf($request->isShipping),'integer',],
            ]);
        }
        return response()->json($request->all());
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
