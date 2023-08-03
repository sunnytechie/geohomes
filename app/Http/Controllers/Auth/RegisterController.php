<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/';

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
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function userRegister(Request $request) {
        //dd($request->all());
        //validate
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => 'required',
            'country' => 'required',
            'user_type' => '',
            'company_name' => '',
            'company_type' => '',
            'website' => '',
            'address' => 'required',
            'city' => 'required',
            'zip' => '',
            'rc_no' => '',
            'agent_type' => '',
            'cac' => 'nullable|image|max:2048',
        ]);

        if ($request->has('cac')) {
            $imagePath = request('cac')->store('agents', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))
                ->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            $image->save();
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->country = $request->country;
        $user->user_type = $request->user_type;
        $user->company_name = $request->company_name;
        $user->company_type = $request->company_type;
        $user->website = $request->website;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->zip = $request->zip;
        $user->email_verified_at = now();
        if ($request->hasFile('cac')) {
            $user->cac = $imagePath;
            }
        if ($request->user_type == "agent") {
            $user->is_agent = 1;
        }
        if ($request->user_type == "customer") {
            $user->is_customer = 1;
        }
        $user->rc_no = $request->rc_no;
        $user->agent_type = $request->agent_type;
        $user->save();

        //Make user an agent, if agent
        if ($request->user_type == "agent") {
            $agent = new Agent();
            $agent->user_id = $user->id;
            $agent->save();
        }

        //Auth
        event(new Registered($user));
        Auth::login($user);

        //Send email
        //$request->user()->sendEmailVerificationNotification();

        if ($request->user_type == "agent") {
            return redirect()->route('agent.profile', $user->id)->with('message', "Kindly complete your agent profile registration.");
        }

        return redirect()->route('dashboard.index')->with('message', "welcome to Geohomes.");
    }

    public function customer() {
        return view('auth.customer');
    }

    public function agent() {
        return view('auth.agent');
    }

}
