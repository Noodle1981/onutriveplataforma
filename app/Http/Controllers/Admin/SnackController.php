<?php
// app/Http/Controllers/Admin/SnackController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Snack;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Importante para manejar archivos
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class SnackController extends Controller
{
    // Muestra la lista de todos los Snacks
    public function index(): View
    {
        $snacks = Snack::latest()->get(); // Obtiene los snacks, los más nuevos primero
        return view('admin.snacks.index', compact('snacks'));
    }

    // Muestra el formulario para crear un nuevo snack
    public function create(): View
    {
        return view('admin.snacks.create');
    }

    // Guarda el nuevo snack en la base de datos
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string', // <-- AÑADIR VALIDACIÓN
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $imagePath = $request->file('image')->store('snacks', 'public');

        Snack::create([
            'name' => $request->name,
            'description' => $request->description, // <-- AÑADIR CAMPO AL CREAR
            'image_path' => $imagePath,
        ]);

        return redirect()->route('admin.snacks.index')->with('success', 'Snack creado exitosamente.');
    }

    // Muestra el formulario para editar un snack existente
    public function edit(Snack $snack): View
    {
         return view('admin.snacks.edit', compact('snack'));
    }

    // Actualiza el snack en la base de datos
    public function update(Request $request, Snack $snack): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string', // <-- AÑADIR VALIDACIÓN
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $snack->name = $request->name;
        $snack->description = $request->description; // <-- AÑADIR CAMPO AL ACTUALIZAR

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($snack->image_path);
            $snack->image_path = $request->file('image')->store('snacks', 'public');
        }

        $snack->save();

        return redirect()->route('admin.snacks.index')->with('success', 'Snack actualizado exitosamente.');
    }

    // Elimina un snack (Soft Delete)
    public function destroy(Snack $snack): RedirectResponse
    {
        $snack->delete(); // Realiza un Soft Delete, los clics no se tocan.

        // Ya no borramos la imagen para poder restaurar el snack en el futuro.
        return redirect()->route('admin.snacks.index')->with('success', 'Snack movido a la papelera exitosamente.');
    }
}