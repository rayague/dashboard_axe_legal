<?php

namespace App\Http\Controllers;

use App\Models\FormationCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FormationCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = FormationCategory::withCount('formations')->latest()->get();
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'required|string|max:100',
            'color' => 'required|string|max:7',
        ]);

        // Générer automatiquement le slug
        $validated['slug'] = Str::slug($validated['nom']);

        FormationCategory::create($validated);

        return redirect()->route('dashboard.categories.index')
            ->with('success', 'Catégorie créée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(FormationCategory $category)
    {
        $formations = $category->formations()->latest()->paginate(10);
        return view('dashboard.categories.show', compact('category', 'formations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FormationCategory $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FormationCategory $category)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'required|string|max:100',
            'color' => 'required|string|max:7',
        ]);

        // Générer automatiquement le slug
        $validated['slug'] = Str::slug($validated['nom']);

        $category->update($validated);

        return redirect()->route('dashboard.categories.index')
            ->with('success', 'Catégorie mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FormationCategory $category)
    {
        // Vérifier si des formations utilisent cette catégorie
        if ($category->formations()->count() > 0) {
            return redirect()->route('dashboard.categories.index')
                ->with('error', 'Impossible de supprimer cette catégorie car elle est utilisée par ' . $category->formations()->count() . ' formation(s)');
        }

        $category->delete();

        return redirect()->route('dashboard.categories.index')
            ->with('success', 'Catégorie supprimée avec succès');
    }
}
