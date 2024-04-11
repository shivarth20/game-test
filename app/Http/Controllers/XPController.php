<?php

declare(strict_types = 1);

// app/Http/Controllers/XPController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\AwardXPRequest;

class XPController extends Controller
{
    public function awardXP(AwardXPRequest $request)
    {

        // Find the user by ID
        $user = User::findOrFail($request->user_id);

        // Award XP to the user
        $user->xp += $request->xp;
        $user->save();

        // Return a success response
        return response()->json(['message' => 'XP awarded successfully'], 200);
    }
}

