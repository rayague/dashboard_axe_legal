<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\FormationInscription;
use App\Models\FormationCategory;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function index()
    {
        $formations = Formation::with('category')
            ->orderBy('populaire', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();
            
        $categories = FormationCategory::all();
        
        return view('services', compact('formations', 'categories'));
    }

    public function inscrire(Request $request, $id)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:50',
            'entreprise' => 'nullable|string|max:255',
            'fonction' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        $validated['formation_id'] = $id;
        $validated['statut'] = 'en_attente';

        $inscription = FormationInscription::create($validated);

        // Return JSON for AJAX requests
        if ($request->ajax() || $request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Votre inscription a été enregistrée avec succès ! Nous vous contacterons bientôt.'
            ]);
        }

        return redirect()->back()->with('success', 'Votre inscription a été enregistrée avec succès !');
    }
}
