<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model {
    use HasFactory;

    protected $primaryKey = 'id';


    private static function getArchive($fileId) {
        if ($handle = opendir('/var/www/files/')) {
            while (false !== ($entry = readdir($handle))) {
                if($entry == 'd.fb2-009373-367300.zip'){continue;}
                if (strstr($entry, ".zip")) {
                    $parts = explode("-", pathinfo($entry)["filename"]);

                    //print_r($parts);
                    if ($parts[1] < $fileId &&  $fileId < $parts[2] ) {
                        //echo $entry;
                        return $entry;
                    }
                }
            }
            closedir($handle);
        }
    }

    public static function extractFile($fileId) {
        $zip = new \ZipArchive;

        $archive_name = self::getArchive($fileId);


        if ($zip->open("/var/www/files/{$archive_name}") === true) {
            try{
                $zip->extractTo(storage_path()."/app/public", ["{$fileId}.fb2"]);

            } catch (\Exception $e){
                echo $e->getMessage();
            }
            $zip->close();
        } else {
            echo "!!";
        }
        return $fileId;
    }
}
