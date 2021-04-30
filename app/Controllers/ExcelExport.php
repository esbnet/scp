<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LancamentoCarenciaModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExcelExport extends Controller
{

    public function index()
    {
        $model = new LancamentoCarenciaModel();

        $carencias = $model->getCarencia();
        
        $fileName = 'Carencia.xlsx';
        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Id');
        $sheet->setCellValue('B1', 'UE');
        $sheet->setCellValue('C1', 'Disciplina');
        $rows = 2;

        foreach ($carencias as $carencia) {
            $sheet->setCellValue('A' . $rows, $carencia['id']);
            $sheet->setCellValue('B' . $rows, $carencia['ue_id']);
            $sheet->setCellValue('C' . $rows, $carencia['disciplina_id']);
            $rows++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save("upload/" . $fileName);
        header("Content-Type: application/vnd.ms-excel");
        redirect(base_url() . "/upload/" . $fileName);

    }
}
