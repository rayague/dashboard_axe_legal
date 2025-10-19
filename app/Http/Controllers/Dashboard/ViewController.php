<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Consultation;
use App\Models\Formation;
use App\Models\DocumentRequest;
use App\Models\FormationInscription;
use Carbon\Carbon;

class ViewController extends Controller
{
    public function index()
    {
        // Statistiques des consultations
        $consultationsThisMonth = Consultation::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        // Revenus annuels (simulé, à adapter selon votre modèle de paiement)
        $revenuAnnuel = Consultation::whereYear('created_at', Carbon::now()->year)
            ->count() * 50000; // Exemple: 50 000 FCFA par consultation

        // Taux de satisfaction (pourcentage de consultations terminées positivement)
        $totalConsultations = Consultation::count();
        $consultationsTerminees = Consultation::where('status', 'completed')->count();
        $tauxSatisfaction = $totalConsultations > 0 ? round(($consultationsTerminees / $totalConsultations) * 100) : 0;

        // Demandes en attente (consultations + demandes de documents)
        $consultationsEnAttente = Consultation::where('status', 'pending')->count();
        $documentsEnAttente = DocumentRequest::where('statut', 'en_attente')->count();
        $demandesEnAttente = $consultationsEnAttente + $documentsEnAttente;

        // Activités récentes (les 5 dernières)
        $activitesRecentes = [];

        // Derniers utilisateurs inscrits
        $derniersUtilisateurs = User::latest()->take(2)->get();
        foreach ($derniersUtilisateurs as $user) {
            $activitesRecentes[] = [
                'icon' => 'fas fa-user-plus',
                'color' => 'success',
                'text' => 'Nouvel utilisateur inscrit: ' . $user->name,
                'time' => $user->created_at->diffForHumans()
            ];
        }

        // Dernières consultations
        $dernieresConsultations = Consultation::latest()->take(2)->get();
        foreach ($dernieresConsultations as $consultation) {
            $activitesRecentes[] = [
                'icon' => 'fas fa-calendar-check',
                'color' => 'primary',
                'text' => 'Consultation: ' . $consultation->type_consultation,
                'time' => $consultation->created_at->diffForHumans()
            ];
        }

        // Dernières formations publiées
        $dernieresFormations = Formation::latest()->take(1)->get();
        foreach ($dernieresFormations as $formation) {
            $activitesRecentes[] = [
                'icon' => 'fas fa-graduation-cap',
                'color' => 'warning',
                'text' => 'Nouvelle formation: ' . $formation->titre,
                'time' => $formation->created_at->diffForHumans()
            ];
        }

        // Dernières inscriptions aux formations (simulé comme paiement)
        $dernieresInscriptions = FormationInscription::latest()->take(1)->get();
        foreach ($dernieresInscriptions as $inscription) {
            $formation = Formation::find($inscription->formation_id);
            if ($formation) {
                $activitesRecentes[] = [
                    'icon' => 'fas fa-credit-card',
                    'color' => 'success',
                    'text' => 'Inscription reçue: ' . number_format($formation->prix, 0, ',', '.') . ' FCFA',
                    'time' => $inscription->created_at->diffForHumans()
                ];
            }
        }

        // Trier par date et limiter à 5
        usort($activitesRecentes, function($a, $b) {
            return strtotime($b['time']) - strtotime($a['time']);
        });
        $activitesRecentes = array_slice($activitesRecentes, 0, 5);

        return view('dashboard.dashboard-home', compact(
            'consultationsThisMonth',
            'revenuAnnuel',
            'tauxSatisfaction',
            'demandesEnAttente',
            'activitesRecentes'
        ));
    }
}

