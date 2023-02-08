<?php

function getArchive($fileId) {
    if ($handle = opendir('/var/www/files/')) {
        //echo "Дескриптор каталога: $handle\n";
        //echo "Элементы:\n";

        /* Именно такой способ чтения элементов каталога является правильным. */
        while (false !== ($entry = readdir($handle))) {
            if (strstr($entry, ".zip")) {
          ///      echo "$entry\n";
                $parts = explode("-", $entry);
                if ($parts[1] < $fileId && $parts[2] > $fileId){
                    //echo $entry;
                    return $entry;
                }
            }
        }

        closedir($handle);
    }
}

function extractFile($archive_name, $file_name) {
    $zip = new ZipArchive;

    if ($zip->open("/var/www/files/{$archive_name}") === true) {
        //$zip->extractTo('/var/www/html/storage/app/public', ["{$file_name}.fb2"]);
        $zip->extractTo("/tmp", ["{$file_name}.fb2"]);
        $zip->close();
        //echo 'Unzipped Process Successful!';

        $file = file_get_contents("/tmp/{$file_name}.fb2");
        header("Content-type: application/xml-dtd");
        header("Content-length: " . strlen($file));
        header("Content-disposition: attachment; filename=super-muper-file-name.fb2");

        echo $file;
    }
}


$fileId = 658467;
$archive = getArchive($fileId);
extractFile($archive, $fileId);
