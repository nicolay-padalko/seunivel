<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class QuestionController extends Controller
{
    function csvArray()
    {
        $csvFile = 'perguntas.csv';
        $csv = $this->csvToArray($csvFile);
        return Inertia::render('Frontend/QuestionOptions')->with('csv', $csv);
    }

    function csvToArray($csvFile)
    {
        $file_to_read = fopen($csvFile, 'r');
        while (!feof($file_to_read)) {
            $lines[] = fgetcsv($file_to_read, 1000, ';');
        }
        fclose($file_to_read);
        return $lines;
    }

    function Write()
    {
        return Inertia::render('Frontend/Write');
    }

    function Interpretation()
    {
        $csvQuestion = 'leitura.csv';
        $read = $this->excelToArray($csvQuestion);
        return Inertia::render('Frontend/Reading')->with('read', $read);
    }

    function excelToArray($csvFile)
    {
        $file_to_read = fopen($csvFile, 'r');
        while (!feof($file_to_read)) {
            $lines[] = fgetcsv($file_to_read, 1000, ';');
        }
        fclose($file_to_read);
        return $lines;
    }

}

