<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Click;
use Illuminate\Http\Request;

class ClickController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(['identifier' => 'required|string|max:255']);

        Click::create([
            'button_identifier' => $request->identifier,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return response()->json(['status' => 'success'], 201);
    }
}