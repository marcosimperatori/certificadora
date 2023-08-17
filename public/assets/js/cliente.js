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
      data: "nome",
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
