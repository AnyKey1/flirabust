<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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
                dd($e->getMessage());
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
                        //dd($entry);
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

    public static function getSeries(){
        $series =   DB::table('books')
            ->select(DB::raw('count(*) as cnt, serie'))
            ->groupBy('serie')
            //->limit(10)
            ->orderBy("cnt", "desc")
            ->get()
            ->toArray();


        $fille = fopen(storage_path("series.txt"), "w+");

        foreach($series as $s){
            fputs($fille, "\n{$s->cnt},{$s->serie}");
        }
    }

    public static function printSeries(int $page=0){
        $seriesLength = 10;
        $series = file(storage_path("series.txt"));

        return array_map(function($item){
            return explode(",", $item);
        }, array_slice($series, $page*$seriesLength, $seriesLength));
    }

    public static function getCategories(){
        $categories =   DB::table('books')
            ->select(DB::raw('count(*) as cnt, category'))
            ->groupBy('category')
            ->limit(10000)
            ->orderBy("cnt", "desc")
            ->get()
            ->toArray();

        $array = [];
        foreach($categories as $c){
            $cat = explode(":", $c->category);
            foreach ($cat as $cc){
                if (array_key_exists($cc, $array)){
                    $array[$cc] +=1;
                } else {
                    $array[$cc] = $c->cnt;
                }
            }
        }

        $file = fopen(storage_path("categories.txt"), "w+");
        asort( $array,   SORT_REGULAR);
        fwrite($file, json_encode(array_reverse($array)));
    }

}
