<?php

class XMLFileReader
{
    public function read($filePath)
    {
        return fopen($filePath, 'r');
    }
}

class INIFileReader
{
    public function read($filePath)
    {
        return fopen($filePath, 'r');
    }
}

class FileReader
{
    public function read($filePath)
    {
        $extension = substr($filePath, -3);
        switch ($extension) {
            case 'ini':
                $reader = new INIFileReader();
                break;
            case 'xml':
                $reader = new XMLFileReader();
                break;
            default:
                return false;
                break;
        }

        return $reader;
    }
}

$reader = new FileReader();
$reader->read("test.ini");
        $reader = new INIFileReader();
