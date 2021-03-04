<?php

namespace App\Models;

use CodeIgniter\Model;

class EscolaModel extends Model
{
	protected $table = 'scp_ue';
	protected $primaryKey = 'id';
	protected $allowedFields = [
		'id',
		'nte_id',
		'ou',
		'ue',
		'municipio',
		'tipo',
		'departamento_administrativo',
		'situacao'
	];

	// protected $validationRules = [
	// 'nte' => 'required|alpha_numeric_space|min_lenght[3]|max_lenght[150]',
	//   'ue_id' => 'required|numeric|min_length[1]|max_lenght[9]|is_unique',
	//   'ou' => 'required|numeric|min_lenght[1]|max_lenght[9]|is_unique',
	//   'ue' => 'required|alpha_numeric_space|min_lenght[3]|max_lenght[200]',
	//   'municipio' => 'required|alpha_numeric_space|min_lenght[3]|max_lenght[150]',
	//   'tipo' => 'required|alpha_numeric_space|min_lenght[3]|max_lenght[50]',
	//   'departamento_administrativo' => 'required|alpha_numeric_space|min_lenght[3]|max_lenght[50]',
	//   //'Situacao'  => 'required|alpha_numeric_space|min_lenght[3]|max_lenght[50)',   
	// ];

	public function getEscolabyName($Ue)
	{

		return $this->asArray()
			->where(['Ue' => $Ue])
			->first();
	}

	public function getEscolabyId($id)
	{

		return $this->asArray()
			->where(['id' => $id])
			->first();
	}

	public function getEscolabyUEId($ueid)
	{
		return $this->asArray()
			->where(" id = $ueid OR ou = $ueid ")
			->first();
	}

	public function getAll()
	{
		return $this->findAll();
	}
}
