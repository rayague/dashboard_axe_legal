<?php

namespace App\Http\Controllers;

use App\Models\DocumentRequest;
use Illuminate\Http\Request;

class DocumentRequestController extends Controller
{
    // Afficher toutes les demandes (Dashboard)
    public function index()
    {
        $demandes = DocumentRequest::latest()->paginate(20);
        return view('dashboard.document-requests.index', compact('demandes'));
    }

    // Afficher une demande spécifique
    public function show(DocumentRequest $documentRequest)
    {
        return view('dashboard.document-requests.show', compact('documentRequest'));
    }

    // Soumettre une nouvelle demande (depuis legal-tech page)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'document_type' => 'required|string|in:immobilier,travail,entreprise',
            'document_title' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:20',
            'entreprise' => 'nullable|string|max:255',
            'description' => 'required|string|min:20',
        ], [
            'nom.required' => 'Le nom est obligatoire.',
            'prenom.required' => 'Le prénom est obligatoire.',
            'email.required' => 'L\'email est obligatoire.',
            'email.email' => 'L\'email doit être valide.',
            'telephone.required' => 'Le téléphone est obligatoire.',
            'description.required' => 'La description est obligatoire.',
            'description.min' => 'La description doit contenir au moins 20 caractères.',
        ]);

        DocumentRequest::create($validated);

        return response()->json([
            'success' => true,
            'message' => '✅ Votre demande a été envoyée avec succès ! Nous vous contacterons dans les plus brefs délais.'
        ]);
    }

    // Mettre à jour le statut d'une demande
    public function updateStatut(Request $request, DocumentRequest $documentRequest)
    {
        $validated = $request->validate([
            'statut' => 'required|in:en_attente,en_cours,traite,rejete',
            'note_admin' => 'nullable|string'
        ]);

        $documentRequest->update($validated);

        return redirect()->back()->with('success', 'Statut mis à jour avec succès !');
    }

    // Supprimer une demande
    public function destroy(DocumentRequest $documentRequest)
    {
        $documentRequest->delete();
        return redirect()->route('dashboard.document-requests.index')
            ->with('success', 'Demande supprimée avec succès !');
    }
}
