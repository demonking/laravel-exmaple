<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\ProfileRequest;
use App\Http\Requests\Profile\UpdateProfileRequest;
use Illuminate\Database\UniqueConstraintViolationException;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function view(Profile $profile)
    {
        /*Wenn noch kein Profil angelegt wurde, müssten wir es erzeugen lassen*/
        if(Auth::user()->profile==null) {
            return redirect()->intended(route('profile.create'));
        }
        $this->authorize('view', $profile);
        return view("profile.view",['profile' => $profile]);
    }
    public function create()
    {
        //$this->authorize('create');
        $profile = new Profile();
        return view("profile.create",['profile' => $profile]);
    }

    public function edit(Profile $profile)
    {
        $this->authorize('edit', $profile);
        return view("profile.edit",['profile' => $profile]);
    }

    public function store(ProfileRequest $request)
    {

        $validated = $request->validated();
        if($validated) {
            if($request->has('avatar')) {
                $avatarName = time() . '.' . $request->avatar->getClientOriginalExtension();
                $request->file('avatar')->move(public_path('avatar'), $avatarName);
                $validated['avatar'] = url('avatar/'. $avatarName);
            }
            try {
                $validated['user_id'] = Auth::id();
                $profile = Profile::create($validated);
                return redirect()->route('profile.view',['profile' => $profile])
                    ->withSuccess('Profil wurde gespeichert!');

            }catch(UniqueConstraintViolationException $e) {
                error_log($e->getMessage());
            }
        }

        return redirect()->back()->withInput();
    }

    public function update(ProfileRequest $request,Profile $profile)
    {
        $validated = $request->validated();
        if($validated) {
            if($request->has('avatar')) {
                $avatarName = 'user'. Auth::id() . '-avatar.' . $request->avatar->getClientOriginalExtension();
                $request->file('avatar')->move(public_path('avatar'), $avatarName);
                $validated['avatar'] = 'avatar/'. $avatarName;
            }
            $profile->update($validated);
            return redirect()->route('profile.view',['profile' => $profile])
                    ->withSuccess('Profil wurde gespeichert!');
        }

        return redirect()->back()->withInput();
    }

}
