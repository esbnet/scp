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
		$TFD = $modelCarencia->getCarenciaTop5Disciplina();
		$TFE = $modelCarencia->getCarenciaTop5Escola();

		// echo '<pre>';
		// dd($TFD);
		// exit('Chegou nos indicaroes');

		$TP = $modelProvido->getTotalProvido();

		$TTC = (intval(($TCR[0]['total'])) + intval($TCT[0]['total']));
		if ($TTC > 0) {
			$EFICIENCIA = (intval($TP[0]['total']) / $TTC) * 100;
		}else{
			$EFICIENCIA = 0;
		}

		$data = [
			'TotalCarenciaReal' => number_format($TCR[0]['total'], 0, '', '.'),
			'TotalCarenciaTemporaria' => number_format($TCT[0]['total'], 0, '', '.'),
			'TotalProvimento' => number_format($TP[0]['total'], 0, '', '.'),
			'Eficiencia' => number_format($EFICIENCIA, 0, '', '.'),
			'TFD' => $TFD,
			'TFE' => $TFE,
			'TTC' => $TTC,
			'title' => 'Dashboard'
		];

		echo view('layout/header', $data);
		echo view('home/index', $data);
		echo view('layout/footer');

	}

	//--------------------------------------------------------------------

}
