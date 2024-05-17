<?php

namespace Database\Seeders;

use App\Models\Burger;
use App\Modules\Helpers\CsvReader;
use Illuminate\Database\Seeder;

class BurgerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvReader = new CsvReader();
        $data = $csvReader->read('burgers.csv');
        
        foreach ($data as $row) {
            $this->createModel($row);
        }
    }

    private function createModel($row): void
    {
        $model = new Burger();

        $model->price = $row['price'];

        $model->save();
    }
}
