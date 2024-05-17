<?php

namespace Database\Seeders;

use App\Models\BurgerLanguage;
use App\Modules\Helpers\CsvReader;
use Illuminate\Database\Seeder;

class BurgerLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvReader = new CsvReader();
        $data = $csvReader->read('burger_languages.csv');
        
        foreach ($data as $row) {
            $this->createModel($row);
        }
    }

    private function createModel($row): void
    {
        $model = new BurgerLanguage();

        $model->item_id = $row['item_id'];
        $model->name = $row['name'];
        $model->description = $row['description'];
        $model->lang = $row['lang'];

        $model->save();
    }
}
