<?php

namespace Database\Seeders;

use App\Models\FormationCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FormationCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'nom' => 'Droit des Entreprises',
                'slug' => 'droit-entreprises',
                'description' => 'Formations sur la création, gestion et structuration juridique des entreprises',
                'icon' => 'fa-building',
                'color' => '#667eea',
            ],
            [
                'nom' => 'Fiscalité',
                'slug' => 'fiscalite',
                'description' => 'Formations sur la fiscalité des entreprises et l\'optimisation fiscale',
                'icon' => 'fa-coins',
                'color' => '#f093fb',
            ],
            [
                'nom' => 'Contrats',
                'slug' => 'contrats',
                'description' => 'Formations sur la rédaction et négociation de contrats',
                'icon' => 'fa-file-contract',
                'color' => '#4facfe',
            ],
            [
                'nom' => 'Contentieux',
                'slug' => 'contentieux',
                'description' => 'Formations sur le contentieux commercial et la résolution de litiges',
                'icon' => 'fa-gavel',
                'color' => '#43e97b',
            ],
            [
                'nom' => 'Immobilier',
                'slug' => 'immobilier',
                'description' => 'Formations sur le droit immobilier et les transactions',
                'icon' => 'fa-home',
                'color' => '#fa709a',
            ],
            [
                'nom' => 'Droit du Numérique',
                'slug' => 'droit-numerique',
                'description' => 'Formations sur le droit numérique, RGPD et propriété intellectuelle',
                'icon' => 'fa-laptop-code',
                'color' => '#30cfd0',
            ],
        ];

        foreach ($categories as $category) {
            FormationCategory::create($category);
        }
    }
}
