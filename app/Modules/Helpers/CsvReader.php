<?php

namespace App\Modules\Helpers;

class CsvReader
{
    public function read($csv){
        $path = storage_path($csv);
        $file = fopen($path, 'r');

        $columns = fgetcsv($file, 0, ";");
        $data = [];
        while (($line = fgetcsv($file, 0, ";")) !== FALSE) {
            $row = [];
            foreach ($columns as $index => $column) {
                $row[$column] = $line[$index];
            }

            $data[] = $row;
        }

        fclose($file);
        return $data;
    }
}
