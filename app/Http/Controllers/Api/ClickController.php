<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Click;
use Illuminate\Http\Request;

class ClickController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|string', // ej: 'plan', 'pasteleria'
            'id' => 'required|integer',
        ]);

        $modelClass = 'App\\Models\\' . ucfirst($validated['type']);

        // Verificamos que el modelo y el ID existan antes de guardar el clic
        if (!class_exists($modelClass) || !$modelClass::find($validated['id'])) {
            return response()->json(['status' => 'error', 'message' => 'Invalid model.'], 404);
        }

        Click::create([
            'clickable_type' => $modelClass,
            'clickable_id' => $validated['id'],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return response()->json(['status' => 'success'], 201);
    }
}