<?php
// app/Http/Controllers/Admin/PostreController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Postre;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Importante para manejar archivos
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PostreController extends Controller
{
    // Muestra la lista de todos los postres
    public function index(): View
    {
        $postres = Postre::latest()->get(); // Obtiene los postres, los más nuevos primero
        return view('admin.postres.index', compact('postres'));
    }

    // Muestra el formulario para crear un nuevo postre
    public function create(): View
    {
        return view('admin.postres.create');
    }

    // Guarda el nuevo postre en la base de datos
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string', // <-- AÑADIR VALIDACIÓN
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $imagePath = $request->file('image')->store('postres', 'public');

        Postre::create([
            'name' => $request->name,
            'description' => $request->description, // <-- AÑADIR CAMPO AL CREAR
            'image_path' => $imagePath,
        ]);

        return redirect()->route('admin.postres.index')->with('success', 'Postre creado exitosamente.');
    }

    // Muestra el formulario para editar un postre existente
    public function edit(Postre $postre): View
    {
         return view('admin.postres.edit', compact('postre'));
    }

    // Actualiza el postre en la base de datos
    public function update(Request $request, Postre $postre): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string', // <-- AÑADIR VALIDACIÓN
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $postre->name = $request->name;
        $postre->description = $request->description; // <-- AÑADIR CAMPO AL ACTUALIZAR

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($postre->image_path);
            $postre->image_path = $request->file('image')->store('postres', 'public');
        }

        $postre->save();

        return redirect()->route('admin.postres.index')->with('success', 'Postre actualizado exitosamente.');
    }

    // Elimina un postre (Soft Delete)
    public function destroy(Postre $postre): RedirectResponse
    {
        $postre->delete(); // Realiza un Soft Delete, los clics no se tocan.

        // Ya no borramos la imagen para poder restaurar el postre en el futuro.
        return redirect()->route('admin.postres.index')->with('success', 'Postre movido a la papelera exitosamente.');
    }
}