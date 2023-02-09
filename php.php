<?php
//phpinfo();
function getArchive($fileId) {
    if ($handle = opendir('/var/www/files/')) {
        echo "Дескриптор каталога: $handle\n";
        echo "Элементы:\n";

        /* Именно такой способ чтения элементов каталога является правильным. */
        while (false !== ($entry = readdir($handle))) {
            if (strstr($entry, ".zip")) {
                echo "$entry\n";
                $parts = explode("-", $entry);
                if ($parts[1] < $fileId && $parts[2] > $fileId){
                    echo $entry;
                    return $entry;
                }
            }
        }

        closedir($handle);
    }
}

function extractFile($archive_name, $file_name) {
    $zip = new \ZipArchive;

    if ($zip->open("/var/www/files/{$archive_name}") === true) {
        $zip->extractTo('/var/www/files/storage/app/public/', ["{$file_name}.fb2"]);
        $zip->close();
        echo 'Unzipped Process Successful!';
    }
}


$fileId = 214673;
$archive = getArchive($fileId);
extractFile($archive, $fileId);
