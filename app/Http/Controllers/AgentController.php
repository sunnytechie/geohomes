<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class AgentController extends Controller
{
    public function index() {
        $agents = Agent::orderBy('id', 'asc')
                        ->get();

        return view('dashboard.agent.index', compact('agents'));
    }

    public function profile() {
        return view('account.agent.profile');
    }

    public function profileJoin() {
        return view('account.agent.join');
    }

    public function profileUpdate(Request $request) {


        //validate
        $request->validate([
            'agent_brand_name' => 'required',
            'address' => 'required',
            'opening_hours' => '',
            'closing_hours' => '',
            //'tax' => '',
            'about' => 'required',
            'phone' => 'required',
            'name' => 'required',
            'position' => 'required',
            //'social_fb' => '',
            //'social_ig' => '',
            //'social_tt' => '',
            //'social_ld' => '',
            //'office_number' => '',
            //'mobile_number' => '',
            //'fax_number' => '',
            'bank_name' => 'required',
            'bank_account' => 'required',
            'image' => 'nullable|image|max:2048',
            'rc_no' => '',
            'agent_type' => '',
            'cac' => 'nullable|image|max:2048',
            'nin_no' => '',
            'nin' => 'nullable|image|max:2048',
        ]);



        if ($request->has('image')) {
            $imagePath = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(500, 500);
            $image->save();
        }

        if ($request->has('nin')) {
            $imageNinPath = request('nin')->store('agents', 'public');
            $image = Image::make(public_path("storage/{$imageNinPath}"))
                ->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            $image->save();
        }

        if ($request->has('cac')) {
            $imageCACPath = request('cac')->store('agents', 'public');
            $image = Image::make(public_path("storage/{$imageCACPath}"))
                ->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            $image->save();
        }

        $agent = Agent::find(Auth::user()->agent->id);
        $agent->agent_brand_name = $request->agent_brand_name;
        $agent->address = $request->address;
        $agent->opening_hours = $request->opening_hours;
        $agent->closing_hours = $request->closing_hours;
        //$agent->tax = $request->tax;
        $agent->about = $request->about;
        $agent->social_fb = $request->social_fb;
        $agent->social_ig = $request->social_ig;
        $agent->social_tt = $request->social_tt;
        $agent->social_ld = $request->social_ld;
        $agent->office_number = $request->office_number;
        $agent->mobile_number = $request->mobile_number;
        $agent->fax_number = $request->fax_number;
        $agent->bank_name = $request->bank_name;
        $agent->bank_account = $request->bank_account;
        $agent->nin_no = $request->nin_no;
        if ($request->hasFile('nin')) {
        $agent->nin = $imageNinPath;
        }
        $agent->save();

        $user = User::find(Auth::user()->id);
        if ($request->has('image')) {
        $user->image = $imagePath;
        }
        $user->phone = $request->phone;
        $user->name = $request->name;
        $user->position = $request->position;
        $user->agent_profile = 1;
        $user->rc_no = $request->rc_no;
        $user->agent_type = $request->agent_type;
        if ($request->hasFile('cac')) {
            $user->cac = $imageCACPath;
            }
        $user->save();

        return redirect()->route('dashboard.index')->with('message', "Your profile has been updated.");

    }

    public function profileJoinUpdate(Request $request){
        //dd($request->all());

        //validate
        $request->validate([
            'agent_brand_name' => 'required',
            'address' => 'required',
            'opening_hours' => '',
            'closing_hours' => '',
            //'tax' => '',
            'about' => 'required',
            'phone' => 'required',
            'name' => 'required',
            'position' => 'required',
            //'social_fb' => '',
            //'social_ig' => '',
            //'social_tt' => '',
            //'social_ld' => '',
            //'office_number' => '',
            //'mobile_number' => '',
            'bank_name' => 'required',
            'bank_account' => 'required',
            //'fax_number' => '',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',

            'rc_no' => '',
            'agent_type' => '',
            'cac' => 'nullable|image|max:2048',
            'nin_no' => '',
            'nin' => 'nullable|image|max:2048',
        ]);

        if ($request->has('image')) {
            $imagePath = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(500, 500);
            $image->save();
        }

        if ($request->has('nin')) {
            $imageNinPath = request('nin')->store('agents', 'public');
            $image = Image::make(public_path("storage/{$imageNinPath}"))
                ->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            $image->save();
        }

        if ($request->has('cac')) {
            $imageCACPath = request('cac')->store('agents', 'public');
            $image = Image::make(public_path("storage/{$imageCACPath}"))
                ->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            $image->save();
        }

        $agent = new Agent();
        $agent->user_id = Auth::user()->id;
        $agent->agent_brand_name = $request->agent_brand_name;
        $agent->address = $request->address;
        $agent->opening_hours = $request->opening_hours;
        $agent->closing_hours = $request->closing_hours;
        //$agent->tax = $request->tax;
        $agent->about = $request->about;
        //$agent->social_fb = $request->social_fb;
        //$agent->social_ig = $request->social_ig;
        //$agent->social_tt = $request->social_tt;
        //$agent->social_ld = $request->social_ld;
        //$agent->office_number = $request->office_number;
        //$agent->mobile_number = $request->mobile_number;
        $agent->bank_name = $request->bank_name;
        $agent->bank_account = $request->bank_account;
        //$agent->fax_number = $request->fax_number;
        if (Auth::user()->is_admin) {
            $agent->subscribed = 1;
        }
        $agent->nin_no = $request->nin_no;
        if ($request->hasFile('nin')) {
        $agent->nin = $imageNinPath;
        }
        $agent->save();

        //Update user
        $user = User::find(Auth::user()->id);
        if ($request->has('image')) {
            $user->image = $imagePath;
        }
        $user->phone = $request->phone;
        $user->name = $request->name;
        $user->position = $request->position;
        $user->agent_profile = 1;
        $user->is_agent = 1;
        $user->rc_no = $request->rc_no;
        $user->agent_type = $request->agent_type;
        if ($request->hasFile('cac')) {
            $user->cac = $imageCACPath;
            }
        $user->save();


        if (Auth::user()->is_admin) {
            return redirect()->route('dashboard.index')->with('message', "Your profile has been updated.");
        }

        return redirect()->route('dashboard.index')->with('message', "Your profile has been updated to an agent.");
    }

    public function agentupgrade() {
        return view('dashboard.agent.limit');
    }
    /**
     * Display a listing of the resource.
     */

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
