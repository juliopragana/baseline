

function carrega_tabela($url) {
  // $('#table_disp').empty().append(data);


  var table = $('#table_disp').DataTable({

    "ajax": {
      "url": $url,
      "dataSrc": "",
      "method": "POST",
    },
    "bProcessing": true,

    "columns": [
      
      { "data": "NOME", "className": "text-center" },
      { "data": "CPF", "className": "text-center" },
      { "data": "EMAIL", "className": "text-center" },
      { "data": "DT_NASC", "className": "text-center" },
      { "data": "CARGO", "className": "text-center" },
      { "data": "SEXO", "className": "text-center" },
      { "data": "FILIAL", "className": "text-center" },
      { "data": "CENTRO_CUSTO", "className": "text-center" },
      { "data": "Descricao_Centro_Custos", "className": "text-center" },
      { "data": "DT_ADMISSAO", "className": "text-center" },
      { "data": "EMPRESA", "className": "text-center" },
      { "data": "area", "className": "text-center" },
      { "data": "DivisaoGCH", "className": "text-center" },
      { "data": "SINDICATO", "className": "text-center" },
      {
        "data": "ID", "className": "text-center", render: function (data, type, row, meta) {
          return type === 'display' ?
            '<button class="btn btn-info btn-sm visualizar" onclick="vizualizar(' + data + ')" data-id="' + data + '"><i class="fa fa-info-circle"></i></button>\ '
            :
            data;
        }
      },
    ],
    "columnDefs": [

      { "visible": false, "targets": [3] },
      { "visible": false, "targets": [5] },
      { "visible": false, "targets": [6] },
      { "visible": false, "targets": [7] },
      { "visible": false, "targets": [8] },
      { "visible": false, "targets": [9] },
      { "visible": false, "targets": [10] },
      { "visible": false, "targets": [11] },
      { "visible": false, "targets": [12] },
      { "visible": false, "targets": [13] }

    ],

    responsive: {
      details: {
        type: 'column',
        target: -1
      }
    },
    "order": [[0, "asc"]],
    dom: 'Bfrtip',
    buttons: [

      // {
      //   extend: 'copyHtml5',
      //   text: 'Copiar'
      // },
      {
        extend: 'excelHtml5',
      },

      {
        extend: 'csv',
      },



    ],

    "language": {
      "url": "../../res/assets/DataTables/dataTables-pt_br.json"
    }
  });

  // table.ajax.reload();
}

function carrega_tabela_lista($url) {

  var table = $('#lista_cc').DataTable({
    responsive: {
      details: false
    },
    "ajax": {
      "url": $url,
      "dataSrc": "",
      "method": "POST",
    },
    "bProcessing": true,

    "columns": [

      { "data": "CENTRO_CUSTO", "className": "text-center" },
      { "data": "Descricao_Centro_Custos", "className": "text-center" },
      { "data": "DivisaoGCH", "className": "text-center" }

    ],
    "order": [[0, "asc"]],


    "language": {
      "url": "../../res/assets/DataTables/dataTables-pt_br.json"
    }
  });
  // table.ajax.reload();
  // table.destroy();
}






    // function limpa_tabela(){
    //   $('#table_disp').empty().append(data);
    // }

    // function atualiza_tabela(){

    // }


// carrega_tabela('/consulta');

