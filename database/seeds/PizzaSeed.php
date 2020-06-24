<?php

use App\Ingredient;
use App\Pizza;
use App\Price;
use App\Size;
use Illuminate\Database\Seeder;

class PizzaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        for ($i=0; $i<12; $i++){
            factory(Ingredient::class)->create();
        }

        for ($i=0; $i<12; $i++){
            $pizza = factory(Pizza::class)->create();
            for ($j=0; $j<5; $j++){
                $id = random_int(1, 12);
                Ingredient::find($id)->pizzas()->attach($pizza);
            }

            $pizza->sizes()->createMany([
                [
                    'name' => 'medium',
                    'radius' => '35cm',
                    'weight' => '800 g'
                ],
                [
                    'name' => 'XL',
                    'radius'=> '45 cm',
                    'weight'=> '1200 g'
                ]
            ]);
        }
        Size::all()->each(function ($size){
           $size->price()->create(
               factory(Price::class)->state($size->name==='medium'? 'forMediumSize' : 'forXLSize')->raw()
           );
        });
    }
}
