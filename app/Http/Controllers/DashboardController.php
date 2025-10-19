<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    // GESTION - Formations
    public function ajouterFormation()
    {
        return view('dashboard.formations.ajouter');
    }

    public function storeFormation(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'duree' => 'required|integer|min:1',
            'prix' => 'required|integer|min:0',
            'niveau' => 'required|string|in:debutant,intermediaire,avance,expert',
            'description' => 'required|string',
            'objectifs' => 'nullable|string',
            'category_id' => 'nullable|exists:formation_categories,id',
            'nombre_lecons' => 'nullable|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'populaire' => 'nullable|boolean',
        ]);

        // Gérer l'upload de l'image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('formations', 'public');
            $validated['image'] = $imagePath;
        }

        // Convertir le checkbox populaire en boolean
        $validated['populaire'] = $request->has('populaire');

        Formation::create($validated);

        return redirect()->route('dashboard.formations.liste')
            ->with('success', 'Formation ajoutée avec succès');
    }

    public function listeFormations(Request $request)
    {
        $query = Formation::latest();

        // Recherche
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('titre', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filtrage par niveau
        if ($request->has('niveau') && $request->niveau != '') {
            $query->where('niveau', $request->niveau);
        }

        // Filtrage par prix
        if ($request->has('prix_min')) {
            $query->where('prix', '>=', $request->prix_min);
        }
        if ($request->has('prix_max')) {
            $query->where('prix', '<=', $request->prix_max);
        }

        // Pagination
        $formations = $query->paginate(10);

        return view('dashboard.formations.liste', [
            'formations' => $formations,
            'search' => $request->search,
            'niveau_filter' => $request->niveau,
            'prix_min' => $request->prix_min,
            'prix_max' => $request->prix_max
        ]);
    }

    // Gestion du formulaire de contact
    public function contactForm()
    {
        // Récupérer les paramètres du formulaire depuis la configuration
        $settings = [
            'require_phone' => config('contact.require_phone', false),
            'intro_text' => config('contact.intro_text', ''),
            'notification_email' => config('contact.notification_email', ''),
            'confirmation_message' => config('contact.confirmation_message', 'Merci pour votre message. Nous vous répondrons dans les plus brefs délais.')
        ];

        return view('dashboard.messages.contact-form', compact('settings'));
    }

    public function updateContactForm(Request $request)
    {
        $validated = $request->validate([
            'require_phone' => 'boolean',
            'intro_text' => 'nullable|string',
            'notification_email' => 'required|email',
            'confirmation_message' => 'required|string'
        ]);

        // Mettre à jour la configuration
        config(['contact.require_phone' => $request->has('require_phone'),
                'contact.intro_text' => $request->intro_text,
                'contact.notification_email' => $request->notification_email,
                'contact.confirmation_message' => $request->confirmation_message]);

        return redirect()->route('dashboard.messages.contact-form')
            ->with('success', 'Les paramètres du formulaire ont été mis à jour.');
    }

    public function exportFormations(Request $request, $format)
    {
        $formations = Formation::latest()->get();

        if ($format === 'pdf') {
            $pdf = \PDF::loadView('exports.formations', compact('formations'));
            return $pdf->download('formations.pdf');
        }

        if ($format === 'excel') {
            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename=formations.csv',
                'Pragma' => 'no-cache',
                'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
                'Expires' => '0'
            ];

            $callback = function() use ($formations) {
                $file = fopen('php://output', 'w');
                fputcsv($file, ['Titre', 'Description', 'Durée', 'Prix', 'Niveau', 'Objectifs']);

                foreach ($formations as $formation) {
                    fputcsv($file, [
                        $formation->titre,
                        $formation->description,
                        $formation->duree,
                        $formation->prix,
                        $formation->niveau,
                        $formation->objectifs
                    ]);
                }
                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
        }

        return redirect()->back()->with('error', 'Format d\'export non supporté');
    }

    public function editFormation(Formation $formation)
    {
        return view('dashboard.formations.edit', compact('formation'));
    }

    public function updateFormation(Request $request, Formation $formation)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'duree' => 'required|integer|min:1',
            'prix' => 'required|integer|min:0',
            'niveau' => 'required|string|in:debutant,intermediaire,avance,expert',
            'description' => 'required|string',
            'objectifs' => 'nullable|string',
        ]);

        $formation->update($validated);

        return redirect()->route('dashboard.formations.liste')
            ->with('success', 'Formation mise à jour avec succès');
    }

    public function deleteFormation(Formation $formation)
    {
        $formation->delete();
        return redirect()->route('dashboard.formations.liste')
            ->with('success', 'Formation supprimée avec succès');
    }

    public function inscriptionsFormations(Request $request)
    {
        $query = \App\Models\FormationInscription::with('formation');

        // Filtrer par statut si demandé
        if ($request->has('statut') && $request->statut != '') {
            $query->where('statut', $request->statut);
        }

        // Recherche
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nom', 'like', "%{$search}%")
                  ->orWhere('prenom', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('telephone', 'like', "%{$search}%")
                  ->orWhereHas('formation', function($subq) use ($search) {
                      $subq->where('titre', 'like', "%{$search}%");
                  });
            });
        }

        $inscriptions = $query->latest()->paginate(15);

        return view('dashboard.formations.inscriptions', compact('inscriptions'));
    }

    // GESTION - Utilisateurs
    public function clients(Request $request)
    {
        $query = User::where('role', 'client');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        $clients = $query->latest()->paginate(10);
        return view('dashboard.utilisateurs.clients', compact('clients'));
    }

    public function storeClient(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|string|max:20',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => Hash::make($validated['password']),
            'role' => 'client',
        ]);

        return redirect()->route('dashboard.utilisateurs.clients')
            ->with('success', 'Client ajouté avec succès');
    }

    public function updateClient(Request $request, User $client)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$client->id,
            'phone' => 'nullable|string|max:20',
        ]);

        $client->update($validated);

        return redirect()->route('dashboard.utilisateurs.clients')
            ->with('success', 'Client mis à jour avec succès');
    }

    public function deleteClient(User $client)
    {
        if ($client->role !== 'client') {
            return redirect()->route('dashboard.utilisateurs.clients')
                ->with('error', 'Vous ne pouvez supprimer que des clients');
        }

        $client->delete();

        return redirect()->route('dashboard.utilisateurs.clients')
            ->with('success', 'Client supprimé avec succès');
    }

    public function avocats()
    {
        return view('dashboard.utilisateurs.avocats');
    }

    public function administrateurs()
    {
        return view('dashboard.utilisateurs.administrateurs');
    }

    public function rolesPermissions()
    {
        return view('dashboard.utilisateurs.roles-permissions');
    }

    // GESTION - Legal Tech
    public function legalTech()
    {
        return view('dashboard.legal-tech.index');
    }

    // SERVICES JURIDIQUES - Consultations
    public function historiqueConsultations()
    {
        $consultations = \App\Models\Consultation::orderBy('created_at', 'desc')->paginate(20);
        $totalConsultations = \App\Models\Consultation::count();
        $pendingConsultations = \App\Models\Consultation::whereNull('status')->orWhere('status', 'pending')->count();
        $completedConsultations = \App\Models\Consultation::where('status', 'completed')->count();
        
        return view('dashboard.consultations.historique', compact('consultations', 'totalConsultations', 'pendingConsultations', 'completedConsultations'));
    }

    public function planningConsultations()
    {
        return view('dashboard.consultations.planning');
    }

    public function affectationsConsultations()
    {
        return view('dashboard.consultations.affectations');
    }

    // SERVICES JURIDIQUES - Rendez-vous
    public function nouveauRdv()
    {
        return view('dashboard.rendez-vous.nouveau');
    }

    public function planningRdv()
    {
        return view('dashboard.rendez-vous.planning');
    }

    public function confirmationsRdv()
    {
        return view('dashboard.rendez-vous.confirmations');
    }

    public function historiqueRdv()
    {
        return view('dashboard.rendez-vous.historique');
    }

    // SERVICES JURIDIQUES - Services
    public function servicesJuridiques()
    {
        return view('dashboard.services-juridiques');
    }

    // PARTENARIATS & ÉVÉNEMENTS - Partenariats
    public function candidaturesPartenariats()
    {
        return view('dashboard.partenariats.candidatures');
    }

    public function offresPartenariats()
    {
        return view('dashboard.partenariats.offres');
    }

    public function suiviPartenariats()
    {
        return view('dashboard.partenariats.suivi');
    }

    // PARTENARIATS & ÉVÉNEMENTS - Événements
    public function creerEvenement()
    {
        return view('dashboard.evenements.creer');
    }

    public function participantsEvenements()
    {
        return view('dashboard.evenements.participants');
    }

    public function webinaires()
    {
        return view('dashboard.evenements.webinaires');
    }

    public function replays()
    {
        return view('dashboard.evenements.replays');
    }

    // CONTENU & COMMUNICATION - Contenu du site
    public function pageAccueil()
    {
        return view('dashboard.contenu.accueil');
    }

    public function aPropos()
    {
        return view('dashboard.contenu.a-propos');
    }

    public function servicesPage()
    {
        return view('dashboard.contenu.services');
    }

    public function mediatheque()
    {
        return view('dashboard.contenu.mediatheque');
    }

    // CONTENU & COMMUNICATION - Messages & Contact
    public function demandesMessages()
    {
        return view('dashboard.messages.demandes');
    }

    public function formulaires()
    {
        return view('dashboard.messages.formulaires');
    }

    public function newsletter()
    {
        return view('dashboard.messages.newsletter');
    }
}
