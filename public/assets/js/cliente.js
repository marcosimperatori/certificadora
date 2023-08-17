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

$("#id_cidade").selectize({
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
      url: "clientes/consulta_cidade",
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
