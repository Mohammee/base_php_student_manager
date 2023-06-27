<?php

namespace App\Traits;

trait LogTrait
{


    public function log(string $message)
    {
        $this->writeMessage($message);
    }

    public function writeMessage($message)
    {
        $file = __DIR__ . '/../Log/Logable.txt';

        $fileHandler = fopen($file, 'a');

        if ($fileHandler) {
            fwrite($fileHandler, date('Y-m-d g:i A') . ' - ' . $message . PHP_EOL);
            fclose($fileHandler);
        }
    }


}