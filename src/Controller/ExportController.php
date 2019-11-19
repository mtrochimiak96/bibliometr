<?php

namespace src\Controller;

require_once 'vendor/autoload.php';

class ExportController
{
    public static function exportAction($articles, $selectors)
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $sekcja = $phpWord->addSection();
        $sekcja->addText(htmlspecialchars('Bibilometr\Jumbotron'), [
            "size" => 35,
            "bold" => true
        ]);
        $tabela = $sekcja->addTable();

        if ($articles) {
            $tabela->addRow();
            foreach ($selectors as $method) {
                $method = substr($method, 3);
                $tabela->addCell()->addText(\htmlspecialchars($method), ['bold' => true]);
            }
            foreach ($articles as $article) {
                $tabela->addRow();
                foreach ($selectors as $method) {
                    $tabela->addCell()->addText(\htmlspecialchars($article->$method()));
                }
            }
            $file = "artykul.docx";
            header("Content-Description: File Transfer");
            header('Content-Disposition: attachment; filename="' . $file . '"');
            header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
            header('Content-Transfer-Encoding: binary');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Expires: 0');
            $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
            $xmlWriter->save("php://output");
        }
    }
}
