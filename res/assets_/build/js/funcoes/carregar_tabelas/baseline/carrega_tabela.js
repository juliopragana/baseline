

    function carrega_tabela($url){
      // $('#table_disp').empty().append(data);
       

      var table = $('#table_disp').DataTable({
                     
        "ajax": {
          "url": $url,
          "dataSrc": "",
          "method" : "POST",
        },
        "bProcessing": true,
        
        "columns": [
    
          { "data": "NOME", "className": "text-center" },
          { "data": "CPF", "className": "text-center" , render: function (data, type, row, meta) {
            return type === 'display' ?
            data + '.###-##' 
            : 
            data
          }},
          { "data": "EMAIL", "className": "text-center" },
          { "data": "CARGO", "className": "text-center" },
          // { "data": "FILIAL", "className": "text-center" },
          {
            "data": "ID", "className": "text-center", render: function (data, type, row, meta) {
              return type === 'display' ?
                '<button class="btn btn-info btn-sm visualizar" onclick="vizualizar('+data+')" data-id="' + data + '"><i class="fa fa-info-circle"></i></button>\ '
                :
                data;
            }
          },
        ],
         
        "order": [[ 0, "asc" ]],
        
        "language": {
          "url": "../../res/assets/DataTables/dataTables-pt_br.json"
        }
      });

      // table.ajax.reload();
    }

    function carrega_tabela_lista($url){
      
      var table = $('#lista_cc').DataTable({
        responsive: {
          details: false
        },        
        "ajax": {
          "url": $url,
          "dataSrc": "",
          "method" : "POST",
        },
        "bProcessing": true,
        
        "columns": [
             
          { "data": "CENTRO_CUSTO", "className": "text-center" },
          { "data": "Descricao_Centro_Custos", "className": "text-center" },
          { "data": "DivisaoGCH", "className": "text-center" },
          
          
      ],
        "order": [[ 0, "asc" ]],
         
        
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

