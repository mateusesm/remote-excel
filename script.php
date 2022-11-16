<?php

require 'phpspreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

$spreadsheet = $reader->load("nome-do-arquivo.xlsx");

$planilha = $spreadsheet->getActiveSheet();

$coluna = $_POST['coluna'];
$quadra = $_POST['quadra'];
$nome = $_POST['nome'];
$dados = $_POST['dados'];

for ($i=1; $i<=342; $i++){

    if (($planilha->getCell('A'.$i)) == $quadra){

        for ($j=2; $j<=346; $j++){

            if (($planilha->getCell('A'.$j)) == $nome){

                $planilha->setCellValue($coluna.$j, $dados);
                 
            };
        };
    };
};

$writer = new Xlsx($spreadsheet);
$writer->save('nome-do-arquivo.xlsx');

header('location: add-data.php');

?>