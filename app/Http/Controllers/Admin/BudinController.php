<?php
// app/Http/Controllers/Admin/BudinController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Budin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Importante para manejar archivos
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class BudinController extends Controller
{
    // Muestra la lista de todos los budines
    public function index(): View
    {
        $budines = Budin::latest()->get(); // Obtiene los budines, los más nuevos primero
        return view('admin.budines.index', compact('budines'));
    }

    // Muestra el formulario para crear un nuevo budin
    public function create(): View
    {
        return view('admin.budines.create');
    }

    // Guarda el nuevo budin en la base de datos
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string', // <-- AÑADIR VALIDACIÓN
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $imagePath = $request->file('image')->store('budines', 'public');

        Budin::create([
            'name' => $request->name,
            'description' => $request->description, // <-- AÑADIR CAMPO AL CREAR
            'image_path' => $imagePath,
        ]);

        return redirect()->route('admin.budines.index')->with('success', 'Budin creado exitosamente.');
    }

    // Muestra el formulario para editar un budin existente
    public function edit(Budin $budin): View
    {
         return view('admin.budines.edit', compact('budin'));
    }

    // Actualiza el budin en la base de datos
    public function update(Request $request, Budin $budin): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string', // <-- AÑADIR VALIDACIÓN
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $budin->name = $request->name;
        $budin->description = $request->description; // <-- AÑADIR CAMPO AL ACTUALIZAR

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($budin->image_path);
            $budin->image_path = $request->file('image')->store('budines', 'public');
        }

        $budin->save();

        return redirect()->route('admin.budines.index')->with('success', 'Budin actualizado exitosamente.');
    }

    // Elimina un budin (Soft Delete)
    public function destroy(Budin $budin): RedirectResponse
    {
        $budin->delete(); // Realiza un Soft Delete, los clics no se tocan.

        // Ya no borramos la imagen para poder restaurar el budin en el futuro.
        return redirect()->route('admin.budines.index')->with('success', 'Budin movido a la papelera exitosamente.');
    }
}