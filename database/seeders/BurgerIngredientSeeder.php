<?php

namespace Database\Seeders;

use App\Models\BurgerIngredient;
use App\Modules\Helpers\CsvReader;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BurgerIngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvReader = new CsvReader();
        $data = $csvReader->read('burger_ingredients.csv');
        
        foreach ($data as $row) {
            $this->createModel($row);
        }
    }

    private function createModel($row): void
    {
        $model = new BurgerIngredient();

        $model->burger_id = $row['burger_id'];
        $model->ingredient_id = $row['ingredient_id'];

        $model->save();
    }
}
