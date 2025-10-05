<?php
// app/Http/Controllers/Admin/PlanController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Importante para manejar archivos
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PlanController extends Controller
{
    // Muestra la lista de todos los planes
    public function index(): View
    {
        $planes = Plan::latest()->get(); // Obtiene los planes, los más nuevos primero
        return view('pages.admin.index', ['planes' => $planes]);
    }

    // Muestra el formulario para crear un nuevo plan
    public function create(): View
    {
        return view('pages.admin.create');
    }

    // Guarda el nuevo plan en la base de datos
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        // Guarda la imagen y obtiene la ruta
        $imagePath = $request->file('image')->store('planes', 'public');

        Plan::create([
            'name' => $request->name,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('planes.index')->with('success', 'Plan creado exitosamente.');
    }

    // Muestra el formulario para editar un plan existente
    public function edit(Plan $plan): View
    {
        return view('pages.admin.edit', ['plan' => $plan]);
    }

    // Actualiza el plan en la base de datos
    public function update(Request $request, Plan $plan): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $plan->name = $request->name;

        if ($request->hasFile('image')) {
            // Borra la imagen antigua
            Storage::disk('public')->delete($plan->image_path);
            // Guarda la nueva imagen
            $plan->image_path = $request->file('image')->store('planes', 'public');
        }

        $plan->save();

        return redirect()->route('planes.index')->with('success', 'Plan actualizado exitosamente.');
    }

    // Elimina un plan
    public function destroy(Plan $plan): RedirectResponse
    {
        // Borra la imagen del almacenamiento
        Storage::disk('public')->delete($plan->image_path);
        // Borra el registro de la base de datos
        $plan->delete();

        return redirect()->route('planes.index')->with('success', 'Plan eliminado exitosamente.');
    }
}