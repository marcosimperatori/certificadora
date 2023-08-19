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
            $id = encrypt($cliente->id);
            $data[] = [
                'razao'   => $cliente->razao,
                'cidade' => $cliente->cidade . "/" . $cliente->uf,
                'ativo'  => ($cliente->ativo == true ? '<i class="fa fa-toggle-on text-info-emphasis"></i>&nbsp;Ativo' : '<i class="fa fa-toggle-off text-secondary"></i>&nbsp;Inativo'),
                'acoes'  => '<a  href="' . base_url("clientes/editar/$id") . '" title="Editar"><i class="fas fa-edit text-success"></i></a> &nbsp; 
                <a  href="' . base_url("clientes/excluir/$id") . '" title="Excluir"><i class="fas fa-trash-alt text-danger"></i></a>'
            ];
        }

        $retorno = [
            'data' => $data
        ];

        return $this->response->setJSON($retorno);
    }

    public function criar()
    {
        $cliente = new \App\Entities\ClienteEntity();

        $data = [
            'titulo' => "Criando novo cliente",
            'cliente' => $cliente,
            'cidade'  => ''
        ];

        return view('cliente/criar', $data);
    }

    /**
     * Este método tem a finalidade de gravar um registro no banco de dados, este registro é enviado via formData através de uma
     * requisição ajax
     *
     * @return void
     */
    public function cadastrar()
    {
        //garatindo que este método seja chamado apenas via ajax
        if (!$this->request->isAJAX()) {
            return redirect()->back();
        }

        //atualiza o token do formulário
        $retorno['token'] = csrf_hash();

        //recuperando os dados que vieram na requisiçao
        $post = $this->request->getPost();

        //Criando um novo objeto da entidade usuário, ao mesmo tempo ele é populado com os dados que vieram na requisição ajax
        $cliente = new \App\Entities\ClienteEntity($post);

        if ($this->clienteModel->protect(false)->save($cliente)) {

            //captura o id do cliente que acabou de ser inserido no banco de dados
            $retorno['id'] = $this->clienteModel->getInsertID();
            $Novocliente = $this->buscaClienteOu404($retorno['id']);

            $retorno['redirect_url'] = base_url('clientes');

            session()->setFlashdata('sucesso', "O registro ($Novocliente->razao) foi incluído no sistema.");

            return $this->response->setJSON($retorno);
        }

        //se chegou até aqui, é porque tem erros de validação
        $retorno['erro'] = "Verifique os avisos de erro e tente novamente";
        $retorno['erros_model'] = $this->clienteModel->errors();

        return $this->response->setJSON($retorno);
    }

    public function editar($enc_id)
    {
        $id = decrypt($enc_id);
        if (!$id) {
            return redirect()->to('/');
        }

        $cliente = $this->buscaClienteOu404($id);

        $cidade = $this->clienteModel->select('municipio.nome,municipio.uf,municipio.codigo_ibge')
            ->join('municipio', 'municipio.id = clientes.cidade')
            ->where('clientes.cidade', $cliente->cidade)
            ->first();

        // $cidade = '<div class="font-weight-bold text-primary ml-1"><i class="fas fa-long-arrow-alt-right text-secondary"></i>&nbsp;&nbsp;<strong>' . $dadosCidade->nome . "/" . $dadosCidade->uf .
        //     '</strong><br><strong class="text-success mx-3 my-3">&nbsp; Código IBGE: "' . $dadosCidade->codigo_ibge . '</strong></div>';

        $data = [
            'titulo' => "Editando o cliente",
            'cliente' => $cliente,
            'cidade' => $cidade->nome
        ];
        return view('cliente/editar', $data);
    }

    public function atualizar()
    {
        if (!$this->request->isAJAX()) {
            return redirect()->back();
        }

        $retorno['token'] = csrf_hash();
        $post = $this->request->getPost();
        $cliente = $this->buscaClienteOu404($post['id']);
        $cliente->fill($post);

        if ($cliente->hasChanged() == false) {
            $retorno['info'] = "Não houve alteração no registro!";

            return $this->response->setJSON($retorno);
        }

        if ($this->clienteModel->protect(false)->save($cliente)) {
            session()->setFlashdata('sucesso', "O registro: $cliente->razao foi atualizado");
            $retorno['redirect_url'] = base_url('clientes');
            return $this->response->setJSON($retorno);
        }

        //se chegou até aqui, é porque tem erros de validação
        $retorno['erro'] = "Verifique os aviso de erro e tente novamente";
        $retorno['erros_model'] = $this->clienteModel->errors();

        return $this->response->setJSON($retorno);
    }

    /**
     * Método que recupera o cliente
     *
     * @param integer|null $id
     * @return Exception|object
     */
    private function buscaClienteOu404(int $id = null)
    {
        //vai considerar inclusive os registros excluídos (softdelete)
        if (!$id || !$cliente = $this->clienteModel->withDeleted(false)->find($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Cliente não encontrado com o ID: $id");
        }

        return $cliente;
    }

    /**
     * Este método tem como finalidade fazer uma busca no banco de dados de acordo com a query digitada pelo usuário
     *
     * @return void Uma lista de registros encontrados em formato json
     */
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
