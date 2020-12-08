<?php

namespace App\Http\Controllers\Auth;

use App\Bussiness;
use App\Http\Controllers\Controller;
use App\PaymentDetails;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Role;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use LVR\CreditCard\CardCvc;
use LVR\CreditCard\CardExpirationDate;
use LVR\CreditCard\CardExpirationYear;
use LVR\CreditCard\CardNumber;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function registerBusiness(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        if ($request->has('type') && $request->type == "business") {
            // Business owner operation
            $validated = $this->validate($request,[
                'business_name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'lat' => 'required',
                'lon' => 'required',
                'card_name' => 'required|string|max:255',
                'card_no' => ['required',new CardNumber],
                // 'expiry_date' => ['required',new CardExpirationDate('m-y')],
                'expiry_date' => 'required|date_format:m-Y',
                'cvc' => ['required',new CardCvc($request->card_no)]
            ]);
            event(new Registered($user = $this->create($request->all())));
            $validated['user_id'] = $user->id;
            $validated['doesShip'] = 0;
            $validated['name'] = $request->business_name;
            Bussiness::create($validated);
            PaymentDetails::create($validated);
            $role = Role::where('name','Business')->first();
            $user->roles()->attach($role);
            $this->guard()->login($user);
            return redirect()->back();
        }else if($request->has('type') && $request->type == "company"){
            // company owner operation
            dd($request->all(), 'print');
        }else {
            // general user operation
            event(new Registered($user = $this->create($request->all())));
            $this->guard()->login($user);
            return redirect()->route('home');
        }
    }
}
