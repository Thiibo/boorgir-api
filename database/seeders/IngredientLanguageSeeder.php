<?php

namespace Database\Seeders;

use App\Models\IngredientLanguage;
use App\Modules\Helpers\CsvReader;
use App\Modules\Helpers\ZipExtractor;
use Illuminate\Database\Seeder;

class IngredientLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvReader = new CsvReader();
        $data = $csvReader->read('ingredient_languages.csv');
        
        foreach ($data as $row) {
            $this->createModel($row);
        }

        $this->createImages();
    }

    private function createModel($row): void
    {
        $model = new IngredientLanguage();

        $model->item_id = $row['item_id'];
        $model->name = $row['name'];
        $model->description = $row['description'];
        $model->lang = $row['lang'];

        $model->save();
    }

    private function createImages(): void
    {
        $zipExtractor = new ZipExtractor();
        $zipExtractor->unzip('ingredients.zip', 'app/images/ingredients');
    }
}
