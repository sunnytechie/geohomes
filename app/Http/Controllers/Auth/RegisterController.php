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
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => 'required',
            'country' => 'nullable',
            'user_type' => 'nullable',
            'company_name' => 'nullable',
            'company_type' => 'nullable',
            'website' => 'nullable',
            'address' => 'nullable',
            'city' => 'nullable',
            'zip' => 'nullable',
            'rc_no' => 'nullable',
            'agent_type' => 'nullable',
            'cac' => 'nullable|mimes:jpeg,png,gif,pdf|max:2048',
            'nin_no' => 'nullable|numeric|digits:10',
            'g-recaptcha-response' => 'nullable|captcha',
        ]);

        //if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('cac')) {
            // find out if file is pdf
            $file = $request->file('cac');
            $extension = $file->getClientOriginalExtension();
            if ($extension == "pdf") {
                ////dd("pdf");
                //$filePath = $request->file('cac')->store('public/cac');
                //$pdf = $request->file('cac');
                //$filePath = 'pdfs/cac/' . $pdf->getClientOriginalName();
                //$pdf->move(public_path('pdfs/cac'), $pdf->getClientOriginalName());
                $cac_extention = "pdf";
                // Get the file from the request
                $pdf = $request->file('cac');
                // Use hashName() to generate a unique filename
                $fileName = $pdf->hashName();
                // Combine the random string and the unique filename
                $filePath = 'pdf/uploads/' . $fileName;
                // Move the file to the specified path
                $pdf->move(public_path('pdfs/cac'), $fileName);
            } else {
                ////dd("image");
                //resize image
                //$image = $request->file('cac');
                //$filename = time() . '.' . $image->getClientOriginalExtension();
                //$location = public_path('images/cac/' . $filename);
                //Image::make($image)->resize(800, 400)->save($location);
                //$filePath = 'images/cac/' . $filename;

                $filePath = request('cac')->store('images/cac/', 'public');
                $image = Image::make(public_path("storage/{$filePath}"))
                    ->resize(800, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                $image->save();
                $cac_extention = "image";
            }
        }


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->country = "Nigeria";
        $user->user_type = $request->user_type;
        $user->company_name = $request->company_name;
        $user->company_type = $request->company_type;
        $user->website = $request->website;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->zip = $request->zip;
        $user->email_verified_at = now();
        if ($request->hasFile('cac')) {
            $user->cac = $filePath;
            $user->cac_extention = $cac_extention;
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
            $agent->nin_no = $request->nin_no;
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

    public function coperate() {
        return view('auth.coperate');
    }

}
