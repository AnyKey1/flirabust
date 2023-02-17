<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $inp_dir = "/var/www/files/upload";
        $handle = opendir($inp_dir);
        /* Именно такой способ чтения элементов каталога является правильным. */
        while (false !== ($entry = readdir($handle))) {


            if (strpos($entry, ".inp")) {
                echo "\n $entry";
                //$entry = 'fb2-168103-172702.inp';
                $file = fopen($inp_dir."/".$entry, "r");
                while (($string = fgets($file, 1024 * 100)) !== false) {

                    $string = str_replace("'", "\'", $string);
                    $string = str_replace('"', "\"", $string);

                    $fields = explode(chr(0x04), $string);

                    $params['author_name']     = $fields[0];
                    $params['category']        = $fields[1];
                    $params['title']           = $fields[2];
                    $params['serie']           = $fields[3];
                    $params['some_id']         = $fields[4];
                    $params['file_id']         = $fields[5];
                    $params['file_size']       = $fields[6];
                    $params['some_id_7']       = $fields[7];
                    $params['some_id_8']       = $fields[8];
                    $params['format']          = $fields[9];
                    $params['tags']            = $fields[10];
                    $params['some_id_12']      = $fields[11];
                    $params['lang']            = $fields[13];
                    $params['some_id_14']      = $fields[12];

                    dd($params);
/*AUTHOR;
GENRE;
TITLE;
SERIES;
SERNO;
FILE;
SIZE;
LIBID;
DEL;
EXT;
DATE;
INSNO;
FOLDER;
LANG;
LIBRATE;
KEYWORDS;
*/
                    //print_r($params);

                    echo "\n {$params["author_name"]} - {$params["title"]}";
                    try{
                        DB::table('books')->insert($params);
                    } catch (\Exception $e){
                        echo "\n" . $e->getMessage();
                    }
                }
                fclose($file);
            //exit();
            }
        }
    }
}
