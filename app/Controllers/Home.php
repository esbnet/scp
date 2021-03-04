<?php

namespace App\Controllers;

use App\Models\CarenciaModel;

class Home extends BaseController
{
	public function index()
	{

		$modelCarencia = new CarenciaModel();

		$TCR = $modelCarencia->getTotalCarenciaReal();
		$TCT = $modelCarencia->getTotalCarenciaTemporaria();

		$data = [
			'TotalCarenciaReal' => number_format($TCR[0]['Total'], 0, '', '.'),
			'TotalCarenciaTemporaria' => number_format($TCT[0]['Total'], 0, '', '.'),
			'title' => 'Titulo exemplo'
		];

		// echo('<pre>');
		// print_r($data['totalcarenciareal']);
		// exit('Chegou -------------------');

		echo view('layout/header', $data);
		echo view('home/index', $data);
		echo view('layout/footer');
	}

	//--------------------------------------------------------------------

}
