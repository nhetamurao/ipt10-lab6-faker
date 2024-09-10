<?php
class FileUtility
{
    public static function writeToFile($filename, $data)
    {
        $file = fopen($filename, 'w');
        if ($file === false) {
            throw new Exception("Unable to open file: $filename");
        }
        fwrite($file, $data);
        fclose($file);
    }

    public static function readFromFile($filename)
    {
        if (!file_exists($filename)) {
            throw new Exception("File does not exist: $filename");
        }
        return file_get_contents($filename);
    }
}