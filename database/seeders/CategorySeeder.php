<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\Image;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Catégories de premier niveau
        $meubles = Category::create([
            'name' => 'Meubles',
            'description' => 'Découvrez notre collection de meubles pour chaque pièce de votre maison.'
        ]);
        
        $electromenager = Category::create([
            'name' => 'Électroménager',
            'description' => 'Appareils électroménagers pour faciliter votre quotidien.'
        ]);
        
        $decoration = Category::create([
            'name' => 'Décoration',
            'description' => 'Accessoires décoratifs pour personnaliser votre intérieur.'
        ]);
        
        // Sous-catégories de Meubles
        $tables = Category::create([
            'name' => 'Tables',
            'description' => 'Tables de salle à manger, tables basses et bureaux.',
            'parent_id' => $meubles->id
        ]);
        
        $chaises = Category::create([
            'name' => 'Chaises',
            'description' => 'Chaises de salle à manger, fauteuils et tabourets.',
            'parent_id' => $meubles->id
        ]);
        
        $canapes = Category::create([
            'name' => 'Canapés',
            'description' => 'Canapés, divans et fauteuils pour votre salon.',
            'parent_id' => $meubles->id
        ]);
        
        // Sous-catégories d'Électroménager
        $cuisine = Category::create([
            'name' => 'Cuisine',
            'description' => 'Équipements électroménagers pour votre cuisine.',
            'parent_id' => $electromenager->id
        ]);
        
        $lavage = Category::create([
            'name' => 'Lavage',
            'description' => 'Machines à laver, sèche-linge et lave-vaisselle.',
            'parent_id' => $electromenager->id
        ]);
        
        // Sous-catégories de Décoration
        $luminaires = Category::create([
            'name' => 'Luminaires',
            'description' => 'Lampes, suspensions et appliques pour éclairer votre intérieur.',
            'parent_id' => $decoration->id
        ]);
        
        $tapis = Category::create([
            'name' => 'Tapis',
            'description' => 'Tapis et carpettes pour tous les espaces.',
            'parent_id' => $decoration->id
        ]);
    }
}