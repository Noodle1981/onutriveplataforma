<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pasteleria; // <-- ¡IMPORTANTE! Usando tu modelo
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PasteleriaController extends Controller
{
    public function index(): View
    {
        $pasteleria = Pasteleria::latest()->get(); // <-- Usando tu modelo
        return view('admin.pasteleria.index', compact('pasteleria'));
    }

    public function create(): View
    {
        return view('admin.pasteleria.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $imagePath = $request->file('image')->store('pasteleria', 'public');

        Pasteleria::create([ // <-- Usando tu modelo
            'name' => $request->name,
            'description' => $request->description,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('admin.pasteleria.index')->with('success', 'Producto de pastelería creado exitosamente.');
    }

    public function edit(Pasteleria $pastelerium): View // <-- Laravel entiende el singular
    {
         return view('admin.pasteleria.edit', compact('pastelerium'));
    }

    public function update(Request $request, Pasteleria $pastelerium): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $pastelerium->name = $request->name;
        $pastelerium->description = $request->description;

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($pastelerium->image_path);
            $pastelerium->image_path = $request->file('image')->store('pasteleria', 'public');
        }

        $pastelerium->save();

        return redirect()->route('admin.pasteleria.index')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy(Pasteleria $pastelerium): RedirectResponse
    {
        Storage::disk('public')->delete($pastelerium->image_path);
        $pastelerium->delete();

        return redirect()->route('admin.pasteleria.index')->with('success', 'Producto eliminado exitosamente.');
    }
}