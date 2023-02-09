<?php
//phpinfo();
function getArchive($fileId) {
    if ($handle = opendir('/var/www/files/')) {
        //echo "Дескриптор каталога: $handle\n";
        //echo "Элементы:\n";

        /* Именно такой способ чтения элементов каталога является правильным. */
        while (false !== ($entry = readdir($handle))) {
            if($entry == 'd.fb2-009373-367300.zip'){continue;}
            if (strstr($entry, ".zip")) {
                echo "$entry\n";

                $parts = explode("-", pathinfo($entry)["filename"]);

               print_r($parts);
                if ($parts[1] < $fileId &&  $fileId < $parts[2] ) {
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

    echo "/var/www/html/storage/app/public/{$file_name}.fb2";

    if ($zip->open("/var/www/files/{$archive_name}") === true) {
        for ($i = 0; $i < $zip->count(); $i++) {
            echo "\n " . $zip->getNameIndex($i);
       };

        if ($zip->extractTo('/var/www/html/storage/app/public/', ["{$file_name}.fb2"])) {
            echo 'Unzipped Process Successful!';
            $zip->close();
        } else {
            $zip->getStatusString();
        }
    }
}

$fileId  = 214673;
$archive = getArchive($fileId);
extractFile($archive, $fileId);
