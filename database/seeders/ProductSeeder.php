<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\Image;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Tables
        $tableId = Category::where('name', 'Tables')->first()->id;
        
        $table1 = Product::create([
            'name' => 'Table à manger Stockholm',
            'description' => '<p>Table à manger en chêne massif avec finition naturelle.</p><ul><li>Dimensions: 180 x 90 x 75 cm</li><li>Matériau: Chêne massif</li><li>Style: Scandinave</li><li>Nombre de couverts: 6-8 personnes</li></ul>',
            'price' => 599.99,
            'active' => true,
            'category_id' => $tableId
        ]);
        
        $this->createProductImage($table1, 'products/table-stockholm-1.jpg');
        $this->createProductImage($table1, 'products/table-stockholm-2.jpg');
        
        $table2 = Product::create([
            'name' => 'Bureau Milan',
            'description' => '<p>Bureau moderne en bois et métal avec tiroirs intégrés.</p><ul><li>Dimensions: 120 x 60 x 75 cm</li><li>Matériaux: MDF laqué et pieds en métal</li><li>Couleur: Blanc et noir</li><li>Nombre de tiroirs: 2</li></ul>',
            'price' => 349.99,
            'active' => true,
            'category_id' => $tableId
        ]);
        
        $this->createProductImage($table2, 'products/bureau-milan-1.jpg');
        
        $table3 = Product::create([
            'name' => 'Table basse Paris',
            'description' => '<p>Table basse élégante avec plateau en verre et structure en métal.</p><ul><li>Dimensions: 100 x 60 x 40 cm</li><li>Matériaux: Verre trempé et métal chromé</li><li>Style: Contemporain</li></ul>',
            'price' => 249.99,
            'active' => true,
            'category_id' => $tableId
        ]);
        
        $this->createProductImage($table3, 'products/table-basse-paris-1.jpg');
        $this->createProductImage($table3, 'products/table-basse-paris-2.jpg');
        
        // Chaises
        $chaiseId = Category::where('name', 'Chaises')->first()->id;
        
        $chaise1 = Product::create([
            'name' => 'Chaise de salle à manger Bella',
            'description' => '<p>Chaise élégante et confortable pour votre salle à manger.</p><ul><li>Dimensions: 45 x 55 x 90 cm</li><li>Matériaux: Structure en bois de hêtre et assise en tissu</li><li>Couleur: Gris</li></ul>',
            'price' => 89.99,
            'active' => true,
            'category_id' => $chaiseId
        ]);
        
        $this->createProductImage($chaise1, 'products/chaise-bella-1.jpg');
        
        $chaise2 = Product::create([
            'name' => 'Fauteuil de bureau ergonomique',
            'description' => '<p>Fauteuil de bureau professionnel avec support lombaire et têtière.</p><ul><li>Hauteur réglable: 110-130 cm</li><li>Matériaux: Maille respirante et structure en métal</li><li>Couleur: Noir</li><li>Caractéristiques: Accoudoirs réglables, inclinaison du dossier</li></ul>',
            'price' => 199.99,
            'active' => true,
            'category_id' => $chaiseId
        ]);
        
        $this->createProductImage($chaise2, 'products/fauteuil-bureau-1.jpg');
        $this->createProductImage($chaise2, 'products/fauteuil-bureau-2.jpg');
        
        // Canapés
        $canapeId = Category::where('name', 'Canapés')->first()->id;
        
        $canape1 = Product::create([
            'name' => 'Canapé d\'angle convertible Oslo',
            'description' => '<p>Canapé d\'angle convertible avec coffre de rangement.</p><ul><li>Dimensions: 250 x 200 x 85 cm</li><li>Matériaux: Structure en bois, revêtement en tissu</li><li>Couleur: Gris anthracite</li><li>Couchage: 140 x 200 cm</li></ul>',
            'price' => 899.99,
            'active' => true,
            'category_id' => $canapeId
        ]);
        
        $this->createProductImage($canape1, 'products/canape-oslo-1.jpg');
        $this->createProductImage($canape1, 'products/canape-oslo-2.jpg');
        
        // Cuisine
        $cuisineId = Category::where('name', 'Cuisine')->first()->id;
        
        $cuisine1 = Product::create([
            'name' => 'Robot de cuisine multifonction',
            'description' => '<p>Robot de cuisine multifonction avec nombreux accessoires.</p><ul><li>Puissance: 1000W</li><li>Capacité du bol: 4,5L</li><li>Fonctions: Pétrir, mixer, hacher, râper</li><li>Accessoires inclus: Fouet, crochet pétrisseur, batteur plat</li></ul>',
            'price' => 349.99,
            'active' => true,
            'category_id' => $cuisineId
        ]);
        
        $this->createProductImage($cuisine1, 'products/robot-cuisine-1.jpg');
        
        // Luminaires
        $luminaireId = Category::where('name', 'Luminaires')->first()->id;
        
        $luminaire1 = Product::create([
            'name' => 'Suspension design Cosmos',
            'description' => '<p>Suspension au design contemporain pour votre salon ou salle à manger.</p><ul><li>Diamètre: 50 cm</li><li>Matériaux: Métal et verre</li><li>Couleur: Noir et doré</li><li>Ampoule: E27 (non incluse)</li></ul>',
            'price' => 129.99,
            'active' => true,
            'category_id' => $luminaireId
        ]);
        
        $this->createProductImage($luminaire1, 'products/suspension-cosmos-1.jpg');
        
        // Test fonction 404
        $produitDesactive = Product::create([
            'name' => 'Produit en rupture de stock',
            'description' => '<p>Ce produit est actuellement indisponible.</p>',
            'price' => 99.99,
            'active' => false,
            'category_id' => $tableId
        ]);
    }
    
    private function createProductImage($product, $path)
    {
        $product->images()->create([
            'path' => $path
        ]);
    }
}
