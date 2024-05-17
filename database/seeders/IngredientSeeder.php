<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Modules\Helpers\CsvReader;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvReader = new CsvReader();
        $data = $csvReader->read('ingredients.csv');
        
        foreach ($data as $row) {
            $this->createModel($row);
        }
    }

    private function createModel($row): void
    {
        $model = new Ingredient();

        $model->price = $row['price'];
        $model->vegetarian = $row['vegetarian'];

        $model->save();
    }
}
