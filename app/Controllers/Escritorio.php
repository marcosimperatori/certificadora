<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class Escritorio extends BaseController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function index()
    {
        return view('escritorio/index');
    }

    public function getAll()
    {
        //garatindo que este método seja chamado apenas via ajax
        if (!$this->request->isAJAX()) {
            return redirect()->back();
        }
        $atributos = ['id', 'nome', 'ativo'];
        $escritorios = $this->userModel->select($atributos)->orderBy('nome', 'asc')->findAll();
        $data = [];

        foreach ($escritorios as $escritorio) {
            $data[] = [
                'nome'  => $escritorio->nome,
                'ativo' => ($escritorio->ativo == true ? '<i class="fa fa-toggle-on text-info-emphasis"></i>&nbsp;Ativo' : '<i class="fa fa-toggle-off text-secondary"></i>&nbsp;Inativo'),
                'acoes' => '<a  href="' . base_url("escritorios/editar/$escritorio->id") . '" title="Editar"><i class="fas fa-edit text-success"></i></a> &nbsp; 
                <a  href="' . base_url("escritorios/excluir/$escritorio->id") . '" title="Excluir"><i class="fas fa-trash-alt text-danger"></i></a>'
            ];
        }

        $retorno = [
            'data' => $data
        ];

        return $this->response->setJSON($retorno);
    }
}
