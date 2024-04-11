<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Actions\RegisterUserAction;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\RegisterUserRequest;


class UserController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function store(RegisterUserRequest $request, RegisterUserAction $action)
    {

        // Handle image upload
        if ($request->hasFile('profile_image')) {
            $imageName = time() . $request->profile_image->extension();
            Storage::put($imageName, file_get_contents($request->profile_image));
        }

        // Create new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'pronoun' => $request->pronoun,
            'instagram_handle' => $request->instagram_handle,
            'profile_image' => $imageName ?? null,
        ]);

        return redirect()->back()->with('success', 'User registered successfully');
    }
}
