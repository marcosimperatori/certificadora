<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClienteModel;

class Cliente extends BaseController
{
    private $clienteModel;

    public function __construct()
    {
        $this->clienteModel = new ClienteModel();
    }
    public function index()
    {
        return view('cliente/index');
    }

    public function getAll()
    {
        //garatindo que este método seja chamado apenas via ajax
        if (!$this->request->isAJAX()) {
            return redirect()->back();
        }
        $atributos = ['clientes.id', 'clientes.razao', 'clientes.ativo', 'municipio.nome as cidade', 'municipio.uf'];
        $clientes = $this->clienteModel->select($atributos)
            ->join('municipio', 'municipio.id = clientes.cidade')
            ->orderBy('nome', 'asc')->findAll();
        $data = [];

        foreach ($clientes as $cliente) {
            $id = password_hash($cliente->id, PASSWORD_DEFAULT);
            $data[] = [
                'razao'   => $cliente->razao,
                'cidade' => $cliente->cidade . "/" . $cliente->uf,
                'ativo'  => ($cliente->ativo == true ? '<i class="fa fa-toggle-on text-info-emphasis"></i>&nbsp;Ativo' : '<i class="fa fa-toggle-off text-secondary"></i>&nbsp;Inativo'),
                'acoes'  => '<a  href="' . base_url("escritorios/editar/$id") . '" title="Editar"><i class="fas fa-edit text-success"></i></a> &nbsp; 
                <a  href="' . base_url("escritorios/excluir/$id") . '" title="Excluir"><i class="fas fa-trash-alt text-danger"></i></a>'
            ];
        }

        $retorno = [
            'data' => $data
        ];

        return $this->response->setJSON($retorno);
    }

    public function listarCidades()
    {
        //garatindo que este método seja chamado apenas via ajax
        if (!$this->request->isAJAX()) {
            return redirect()->back();
        }

        $municipio = new \App\Models\MunicipioModel();

        $busca = $this->request->getVar('q');
        $retorno = $municipio->select('id, codigo_ibge, nome, uf')
            ->like('nome', $busca)
            ->orderBy('nome', 'ASC')
            ->findAll();

        $data = [
            'data' => $retorno
        ];

        return $this->response->setJSON($data);
    }
}
