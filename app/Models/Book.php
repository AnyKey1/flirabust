<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ZipArchive;

class Book extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    public static function extractFile($fileId)
    {
        $zip = new ZipArchive;

        $archive_name = self::getArchive($fileId);

        if ($zip->open("/var/www/files/{$archive_name}") === true) {
            try {
                $zip->extractTo(storage_path() . "/app/public", ["{$fileId}.fb2"]);

            } catch (Exception $e) {
                echo $e->getMessage();
            }
            $zip->close();
        } else {
            return false;
        }
        return true;
    }

    private static function getArchive($fileId)
    {
        if ($handle = opendir('/var/www/files/')) {
            while (false !== ($entry = readdir($handle))) {
                if (strstr($entry, ".zip")) {
                    $parts = explode("-", pathinfo($entry)["filename"]);
                    if ($parts[1] < $fileId && $fileId < $parts[2]) {
                        return $entry;
                    }
                }
            }
            closedir($handle);
        }
    }

    public function getTagsAttribute($value)
    {
        return array_map("trim", explode(',', $value));
    }

    public function getCategoryAttribute($value)
    {
        return explode(':', $value);
    }

    public function getAuthorNameAttribute($value)
    {
        $res = [];
        $authors = explode(":", $value);

        foreach ($authors as $author) {
            $res[] = str_replace(",", " ", $author);
        }

        return implode("; ", $res);
    }

}
