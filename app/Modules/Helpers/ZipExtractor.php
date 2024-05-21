<?php

namespace App\Modules\Helpers;

use ZipArchive;

class ZipExtractor
{
    public function unzip($zipFile, $targetDirectory){
        $filePath = storage_path($zipFile);
        $directoryPath = storage_path($targetDirectory);
        
        $zip = new ZipArchive();
        $zip->open($filePath);
        $zip->extractTo($directoryPath);
        $zip->close();
    }
}
