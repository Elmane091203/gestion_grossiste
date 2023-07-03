<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produits')->insert([
            // ordinateurs
            [
                'libelle'=>'Mac Book Pro',
                "prixUnitaire"=>"500000",
                "stock"=>"15",
                "description"=>"Un ordinateur de 8gb ram et beaucoup de capacités",
                "categorie"=>"ordinateurs",
                "image"=>"img/product01.png"
            ],
            [
                'libelle'=>'Mac Book',
                "prixUnitaire"=>"250000",
                "stock"=>"15",
                "description"=>"Un ordinateur de 4gb ram et 500 GB",
                "categorie"=>"ordinateurs",
                "image"=>"img/product03.png"
            ],
            [
                'libelle'=>'Pc msi',
                "prixUnitaire"=>"1300000",
                "stock"=>"4",
                "description"=>"Un pc portable, leger, adapté pour vos reunions et voyages",
                "categorie"=>"ordinateurs",
                "image"=>"img/product06.png"
            ],
            [
                'libelle'=>'Pc portable Asus',
                "prixUnitaire"=>"90000",
                "stock"=>"12",
                "description"=>"Le meilleur pc pour vos enfants",
                "categorie"=>"ordinateurs",
                "image"=>"img/product08.png"
            ],
            // Accessoires
            [
                'libelle'=>'Casque Model 500',
                "prixUnitaire"=>"50000",
                "stock"=>"20",
                "description"=>"Des casques avec une bonne qualité sonnore",
                "categorie"=>"accessoires",
                "image"=>"img/product02.png"
            ],
            [
                'libelle'=>'Casque Sony',
                "prixUnitaire"=>"30000",
                "stock"=>"5",
                "description"=>"Des casques avec une bonne qualité sonnore",
                "categorie"=>"accessoires",
                "image"=>"img/product05.png"
            ],
            // smartphones
            [
                'libelle'=>'Tablette Sony',
                "prixUnitaire"=>"100000",
                "stock"=>"10",
                "description"=>"Une tablette de 8gb ram, bien equipé pour vos travails",
                "categorie"=>"smartphones",
                "image"=>"img/product04.png"
            ],
            [
                'libelle'=>'Samsung Galaxy S9 Edge',
                "prixUnitaire"=>"150000",
                "stock"=>"20",
                "description"=>"A smartphone with 8gb ram and much more feature",
                "categorie"=>"smartphones",
                "image"=>"img/product01.png"
            ],
            // cameras
            [
                'libelle'=>'Digital Camera Rekma',
                "prixUnitaire"=>"35000",
                "stock"=>"15",
                "description"=>"Mini appareil photo numérique HD pour enfants Point and Shoot Appareil photo numérique 1080p 18 MP 2,7 pouces",
                "categorie"=>"cameras",
                "image"=>"img/product08.png"
            ],
        ]);
    }
}
