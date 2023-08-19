$(document).ready(function () {
  $("#lista-clientes").DataTable({
    oLanguage: DATATABLE_PTBR,
    ajax: {
      url: "clientes/getall",
      beforeSend: function () {
        $("#tab-clientes").LoadingOverlay("show", {
          background: "rgba(165, 190, 100, 0.5)",
        });
      },
      complete: function () {
        $("#tab-clientes").LoadingOverlay("hide");
      },
    },
    columns: [
      {
        data: "razao",
      },
      {
        data: "cidade",
      },
      {
        data: "ativo",
      },
      {
        data: "acoes",
      },
    ],
    deferRender: true,
    processing: false,
    language: {
      processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',
    },
    responsive: true,
    autoWidth: false,
    pagingType: $(window).width() < 768 ? "simple" : "simple_numbers",
    pageLength: 10,
    columnDefs: [
      {
        width: "180px",
        targets: [1],
      },
      {
        width: "100px",
        targets: [2],
      },
      {
        width: "70px",
        targets: [3],
      },
      {
        className: "text-center",
        targets: [3],
      },
    ],
  });
});

function setDados(){
  
}

$("#cidade").selectize({
  valueField: "id",
  labelField: "nome",
  searchField: "nome",
  placeholder: "Pesquisar cidade",
  maxItems: 1,
  render: {
    option: function (item, escape) {
      return (
        '<div class="font-weight-bold text-primary ml-1"><i class="fas fa-long-arrow-alt-right text-secondary"></i>&nbsp;&nbsp;' +
        "<strong>" +
        item.nome +
        "/" +
        item.uf +
        "</strong>" +
        '<br><strong class="text-success mx-3 my-3">' +
        "&nbsp; Código IBGE: " +
        item.codigo_ibge +
        "</strong>" +
        "</div>"
      );
    },
  },
  load: function (query, callback) {
    if (query.length < 2) return callback();
    $.ajax({
      url: "consulta_cidade",
      data: {
        q: query,
      },
      dataType: "json",
      success: function (response) {
        callback(response.data);
      },
    });
  },
});

$("#form_cad_cliente").on("submit", function (e) {
  e.preventDefault();

  if ($(this).hasClass("insert")) {
    url = "cadastrar";
  } else if ($(this).hasClass("update")) {
    url = "atualizar";
  }

  $.ajax({
    type: "POST",
    url: url,
    data: new FormData(this),
    dataType: "json",
    contentType: false,
    cache: false,
    processData: false,
    beforeSend: function () {
      $("#response").html("");
      $("#form_cad_cliente").LoadingOverlay("show", {
        background: "rgba(165, 190, 100, 0.5)",
      });
    },
    success: function (response) {
      $("[name=csrf_test_name]").val(response.token);
      if (response.erro) {
        if (response.erros_model) {
          exibirErros(response.erros_model);
        }
      } else {
        window.location.href = response.redirect_url;
      }
    },
    error: function () {
      alert("falha ao executar a operação");
    },
    complete: function () {
      $("#form_cad_cliente").LoadingOverlay("hide");
    },
  });
});
