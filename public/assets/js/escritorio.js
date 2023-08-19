$("#lista-escritorios").DataTable({
  oLanguage: DATATABLE_PTBR,
  ajax: {
    url: "escritorios/getall",
    beforeSend: function () {
      $("#tab-escritorios").LoadingOverlay("show", {
        background: "rgba(165, 190, 100, 0.5)",
      });
    },
    complete: function () {
      $("#tab-escritorios").LoadingOverlay("hide");
    },
  },
  columns: [
    {
      data: "nome",
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
      width: "100px",
      targets: [1],
    },
    {
      width: "70px",
      targets: [2],
    },
    {
      className: "text-center",
      targets: [2],
    },
  ],
});
