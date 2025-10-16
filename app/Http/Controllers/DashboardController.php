<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // GESTION - Formations
    public function ajouterFormation()
    {
        return view('dashboard.formations.ajouter');
    }

    public function listeFormations()
    {
        return view('dashboard.formations.liste');
    }

    public function inscriptionsFormations()
    {
        return view('dashboard.formations.inscriptions');
    }

    // GESTION - Utilisateurs
    public function clients()
    {
        return view('dashboard.utilisateurs.clients');
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
        return view('dashboard.legal-tech');
    }

    // SERVICES JURIDIQUES - Consultations
    public function historiqueConsultations()
    {
        return view('dashboard.consultations.historique');
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
