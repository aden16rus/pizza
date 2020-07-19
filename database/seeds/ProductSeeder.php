<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pizzas = [
            [
                'title' => 'CALZONE',
                'description' => 'Pepperoni, sausage, meatball, olives, bacon, mushrooms, fresh tomato, onions, garlic, peppers, ham, broccoli, jalapeno, spinach, anchovies, red roasted peppers, artichoke hearts, sun dried tomatoes, pineapple, chicken, feta cheese, shrimp',
                'image' => '/storage/products/1.png',
                'price' => 10,
            ],
            [
                'title' => 'CHICKEN RANCH',
                'description' => 'Chicken, diced fresh tomato, bacon, garlic, mozzarella & side of ranch dressing',
                'image' => '/storage/products/2.png',
                'price' => 12,
            ],
            [
                'title' => 'TIMES SQUARE',
                'description' => 'Sun dried tomatoes, broccoli, olives, artichoke, garlic & oil…white',
                'image' => '/storage/products/3.png',
                'price' => 12,
            ],
            [
                'title' => 'LITTLE ITALY',
                'description' => 'Red roasted peppers, sausage, pepperoni, basil & mozzarella cheese',
                'image' => '/storage/products/4.png',
                'price' => 12,
            ],
            [
                'title' => 'MAYOR GIULIANI',
                'description' => 'Tomatoes, pepperoncini peppers,garlic, ricotta cheese & pesto sauce',
                'image' => '/storage/products/5.png',
                'price' => 12,
            ],
            [
                'title' => 'GRANDMA PIE',
                'description' => 'Thin seasoned crust, plum tomatoes, fresh mozzarella, basil,garlic and olive oil.',
                'image' => '/storage/products/6.png',
                'price' => 12,
            ],
            [
                'title' => 'LATINO CONNECTION',
                'description' => 'Sausage, jalapeno peppers, tomato, onion & olives',
                'image' => '/storage/products/7.png',
                'price' => 12,
            ],
            [
                'title' => 'BROADWAY DELIGHT',
                'description' => 'Eggplant, olives, roasted peppers, broccoli, tomatoes (no cheese)',
                'image' => '/storage/products/8.png',
                'price' => 12,
            ],
            [
                'title' => 'MARGHERITA',
                'description' => 'Fresh mozzarella, basil, fresh diced tomatoes, garlic…white',
                'image' => '/storage/products/9.png',
                'price' => 12,
            ]
        ];

        foreach($pizzas as $pizza) {
            Product::create($pizza);
        }
    }
}
