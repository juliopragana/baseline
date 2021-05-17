//função que carrega a DataTable de linhas disponíveis
$(function () {


    // $.ajax({

    //     type: 'POST',
    
    //     url: '/consulta',
    
    //     data: {  },
    
    //     success: function (data) {
    
    //         console.log(data);
    //     }
    
    //   });    

var table = $('#table_disp').DataTable({
    "ajax": {
      "url": "/consulta",
      "dataSrc": "",
      "method" : "POST",
    },
    "bProcessing": true,
    "columns": [

      { "data": "nome", "className": "text-center" },
      { "data": "cpf", "className": "text-center" },
      { "data": "email", "className": "text-center" },
      { "data": "status_usuario_correto", "className": "text-center" },
      {
        "data": "id_clientes", "className": "text-center", render: function (data, type, row, meta) {
          return type === 'display' ?
            '<button class="btn btn-info btn-sm visualizar" onclick="vizualizar(' + data + ')" data-id="' + data + '"><i class="fas fa-eye"></i></button>\
                  <button class="btn btn-warning btn-sm" onclick="editar('+ data + ')" data-id="' + data + '"><i class="fas fa-edit"></i></button>\
                  <button class="btn btn-danger btn-sm" onclick="deletar('+ data + ')" data-id="' + data + '"><i class="fas fa-ban"></i></button>\
                  '
            :
            data;
        }
      },
    ]
  });


});