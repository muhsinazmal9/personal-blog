<?php

namespace App\Http\Controllers;

use App\Models\ProfileInfo;
use Illuminate\Http\Request;

class ProfileInfoController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(ProfileInfo $profileInfo)
    {
        //
    }

    /**
     * Show the form for editing or creating the about portion.
     */
    public function edit(Request $request)
    {
        return view('profile.about.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update or create the specified resource in storage.
     */
    public function update(Request $request, ProfileInfo $profileInfo)
    {
        // $profileInfo->user->updateOrCreate();
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfileInfo $profileInfo)
    {
        //
    }
}
