<?php

namespace App\Controllers;

use App\Models\CarenciaModel;
use App\Models\ProvimentoProvidoModel;

class Home extends BaseController
{
	public function index()
	{

		$modelCarencia = new CarenciaModel();
		$modelProvido = new ProvimentoProvidoModel();

		$TCR = $modelCarencia->getTotalCarenciaReal();
		$TCT = $modelCarencia->getTotalCarenciaTemporaria();

		$TP = $modelProvido->getTotalProvido();

		// echo('<pre>');
		// print_r($TCR);
		// print_r($TCT);
		// print_r($TP);
		// exit('Chegou -------------------');

		$TTC = (intval(($TCR[0]['Total'])) + intval($TCT[0]['Total']));
		$EFICIENCIA = (intval($TP[0]['total']) / $TTC) * 100;

		// echo('<pre>');
		// print_r($TTC);
		// echo('<br>');
		// print_r($EFICIENCIA);
		// exit('Chegou -------------------');

		$data = [
			'TotalCarenciaReal' => number_format($TCR[0]['Total'], 0, '', '.'),
			'TotalCarenciaTemporaria' => number_format($TCT[0]['Total'], 0, '', '.'),
			'TotalProvimento' => number_format($TP[0]['total'], 0, '', '.'),
			'Eficiencia' => number_format($EFICIENCIA, 0, '', '.'),
			'title' => 'Titulo exemplo'
		];

		// echo('<pre>');
		// print_r($data['TotalProvimento']);
		// exit('Chegou -------------------');

		echo view('layout/header', $data);
		echo view('home/index', $data);
		echo view('layout/footer');
	}

	//--------------------------------------------------------------------

}
