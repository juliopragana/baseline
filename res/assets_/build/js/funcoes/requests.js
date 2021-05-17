
function login(){
    var user = $("#user").val();
    var pass = $("#passwd").val();

    $.ajax({

        type: 'POST',
    
        url: '/login',
    
        data: { user: user, pass: pass},
    
        success: function (data) {
            
            if (data == "false"){
                alert('Deu ruim');
            }
            
        }
    });

}


function carregar_todos(){

    var titulo = document.getElementById("titulo");
    titulo.innerHTML = 'Lista completa de nomes';
    var select = document.getElementById("subareas");
    select.innerHTML = '';
    var titulo_sub_area = document.getElementById("titulo_sub_area");
    titulo_sub_area.innerHTML = "";
    $('#table_disp').DataTable().destroy();
     carrega_tabela('/consulta');
    //  $('#table_disp').ajax.reload();
     // var table = $('#table_disp').DataTable();
}

function carregar_por_gcc(gcc){
    var titulo = document.getElementById("titulo");
    titulo.innerHTML = gcc;
    subCentro('/consulta/subcc/'+gcc);
    $('#table_disp').DataTable().destroy();
    carrega_tabela('/consulta/'+gcc);
    // $('#table_disp').ajax.reload();
        // var table = $('#table_disp').DataTable();
}

function carregar_por_cc(cc, ncc){
    // alert('Clicou');
    var titulo = document.getElementById("titulo");
    titulo.innerHTML = cc + ' - ' +ncc;
    // subCentro('/consulta/subcc/'+gcc);
    
    // $('#table_disp').ajax.reload();
    // var table = $('#table_disp').DataTable();

    $('#table_disp').DataTable().destroy();
    carrega_tabela('/consulta/cc/'+cc);
}



function subCentro($url){
    $.ajax({

        type: 'post',

        url: $url,

        success: function (data) {
            var select = document.getElementById("subareas");
            select.innerHTML = '<a href="#" class="badge badge-pill badge-default" id="subareas"></a>';
            var titulo_sub_area = document.getElementById("titulo_sub_area");
            titulo_sub_area.innerHTML = "<H5>Centro de custo</H5>";
            
            // var submenu = document.getElementById("sub_menu_areas");
            // submenu.innerHTML = '<ul class="nav child_menu" id="sub_menu_areas">';

            data = JSON.parse(data);
            // console.log(data);
            // console.log(data);
                    data.forEach(function (item) {
                        $("#subareas").append('<a href="#" class="btn btn-round btn-info btn-sm" id="subareas" onclick="carregar_por_cc('+"'"+item.CENTRO_CUSTO+"'"+','+"'"+item.Descricao_Centro_Custos+"'"+')">'+ item.CENTRO_CUSTO+' - '+item.Descricao_Centro_Custos+'</a>');
                        // console.log(item.NOME_CC);
                        // $("#sub_menu_areas").append('<li><a href="#">'+item.NOME_CC+'</a></li>');
                    });
                
                
            
        }
    });
}

function vizualizar(id){
    var select = document.getElementById("informacoes");
    select.innerHTML = '';

    $.ajax({
        type: 'post',

        url: '/consultar/info/'+id,
        success: function (data) {

            data = JSON.parse(data);
            data.forEach(function (item) {
               
                var select = document.getElementById("informacoes");
                // 
                var num_cpf = item.CPF.length;
                if(num_cpf > 7){
                    item.CPF = item.CPF;
                }else{
                    item.CPF = item.CPF + '.###-##';
                }
                // Conversão Data de Admissão
                let data_admissao = item.DT_ADMISSAO; 
                let data_admissao_convertida = data_admissao.split('-').reverse().join('/');

                // Conversão Data de Nascimento
                let data_nascimento = item.DT_NASC;
                let data_nascimento_convertida = data_nascimento.split('-').reverse().join('/');
                let data_nascimento_abreviada = data_nascimento_convertida.substr(0,5);
                
               

                select.innerHTML = 
                '<div class="x_content">\
                <div class="col-md-12 col-sm-12" style="text-align:center;"><h3>Dados pessoais</h3></div>\
                 <div class="col-md-12 col-sm-12"><p style="padding:4px; border: 1px solid;border-color: #C0C0C0; border-radius: 5px;">Nome Completo: <b>'+item.NOME+'</b></p></div>\
                 <div class="col-md-6 col-sm-12"><p style="padding:4px; border: 1px solid;border-color: #C0C0C0; border-radius: 5px;">CPF: <b>'+item.CPF+'</b></p></div>\
                 <div class="col-md-6 col-sm-12"><p style="padding:4px; border: 1px solid;border-color: #C0C0C0; border-radius: 5px;">Data de Nascimento: <b>'+data_nascimento_abreviada+'/####</b></p></div>\
                 <div class="col-md-6 col-sm-12"><p style="padding:4px; border: 1px solid;border-color: #C0C0C0; border-radius: 5px;">E-mail: <b>'+item.EMAIL+'</b></p></div>\
                 <div class="col-md-6 col-sm-12"><p style="padding:4px; border: 1px solid;border-color: #C0C0C0; border-radius: 5px;">Sexo: <b>'+item.SEXO+'</b></p></div>\
                 <div class="col-md-12 col-sm-12" style="text-align:center;"><h3>Dados profissionais</h3></div>\
                 <div class="col-md-6 col-sm-12"><p style="padding:4px; border: 1px solid;border-color: #C0C0C0; border-radius: 5px;">Data de Admissão: <b>'+data_admissao_convertida+'</b></p></div>\
                 <div class="col-md-12 col-sm-12"><p style="padding:4px; border: 1px solid;border-color: #C0C0C0; border-radius: 5px;">Cargo: <b>'+item.CARGO+'</b></p></div>\
                 <div class="col-md-12 col-sm-12"><p style="padding:4px; border: 1px solid;border-color: #C0C0C0; border-radius: 5px;">Centro de Custo: <b>'+item.CENTRO_CUSTO+' - '+item.Descricao_Centro_Custos+'</b></p></div>\
                 <div class="col-md-12 col-sm-12"><p style="padding:4px; border: 1px solid;border-color: #C0C0C0; border-radius: 5px;">Área: <b>'+item.area+'</b></p></div>\
                 <div class="col-md-12 col-sm-12"><p style="padding:4px; border: 1px solid;border-color: #C0C0C0; border-radius: 5px;">Divisão GCH: <b>'+item.DivisaoGCH+'</b></p></div>\
                 <div class="col-md-12 col-sm-12"><p style="padding:4px; border: 1px solid;border-color: #C0C0C0; border-radius: 5px;">Empresa: <b>'+item.EMPRESA+'</b></p></div>\
                 <div class="col-md-12 col-sm-12"><p style="padding:4px; border: 1px solid;border-color: #C0C0C0; border-radius: 5px;">Sindicato: <b>'+item.SINDICATO+'</b></p></div>\
                </div>\
                 ';
            });

            // var select = document.getElementById("informacoes");
            // select.innerHTML = '<H6>Nome Completo: <b>'+data+'</b></H6>';
        }

    });

    
   
    // console.log(cpf);

    $("#infoFunc").modal();
}

function carrega_lista_cc(){
    $("#listacc").modal();
    // $('#listacc').DataTable().destroy();
    // carrega_tabela_lista();
}