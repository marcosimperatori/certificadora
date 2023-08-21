<div class="col-8 mx-auto">
  <div class="card border-secondary">
    <div class="card-header bg-light">
      <h4 class="text-primary">Cadastro do cliente</h4>
    </div>
    <div class="card-body">
      <div class="form-group col-lg-12">
        <label for="razao" class="form-label mt-2">Razão Social</label>
        <input type="text" class="form-control" id="razao" aria-describedby="razao" name="razao" value="<?php echo esc($cliente->razao); ?>" placeholder="Informe a razão social">
      </div>
      <div class="row">
        <div class="form-group col-lg-4">
          <label for="uf" class="form-label mt-2">CNPJ</label>
          <input type="text" class="form-control" id="cnpj" placeholder="Digite o CNPJ">
          <div id="response2" class="mt-2"></div>
        </div>

        <div class="form-group col-lg-8">
          <label for="email" class="form-label mt-2">Email</label>
          <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="<?php echo esc($cliente->email); ?>" placeholder="Digite o email do cliente">
        </div>

        <div class="form-group col-lg-2">
          <label for="uf" class="form-label mt-2">UF</label>
          <select type="select" class="form-select" name="uf" id="uf">
          </select>
          <div id="response2" class="mt-2"></div>
        </div>

        <div class="form-group col-lg-10">
          <label for="cidade" class="form-label mt-2">Cidade</label>
          <select type="select" class="form-select" name="cidade" id="cidade">
          </select>
          <div id="response2" class="mt-2"></div>
        </div>



      </div>
      <div class="custom-control custom-checkbox">
        <div class="form-check mt-2 d-flex justify-content-end">
          <input type="hidden" name="ativo" value="0">
          <input type="checkbox" name="ativo" id="ativo" value="1" <?php if ($cliente->ativo == true) : ?> checked <?php endif;  ?> class="custom-control-input">
          <label for="ativo" class="custom-control-label">&nbsp;Cliente ativo</label>
        </div>
      </div>
    </div>
  </div>
</div>