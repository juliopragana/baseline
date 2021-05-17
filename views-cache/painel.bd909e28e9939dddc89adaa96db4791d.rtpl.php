<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3 id="titulo">Lista completa de nomes</h3>
         
        </div>

        <!-- <div class="title_right">
          <div class="col-md-8 col-sm-8 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Pesquisar nome">
              <span class="input-group-btn">
                <button class="btn btn-dark" onclick="buscarpornome()" type="button">Buscar</button>
              </span>
            </div>
          </div>
        </div> -->
      </div>

      <div class="clearfix"></div>

      <div class="row">
        

        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
                <h5 id='titulo_sub_area'></h5>
                <!-- <div id="subareas">

                </div> -->
                <div id="subareas">

                </div>
             
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box">
                <table id="table_disp" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        
                        <th>NOME</th>
                        <th>CPF</th>
                        <th>EMAIL</th>
                        <th>DATA_NASCIMENTO</th>
                        <th>CARGO</th>
                        <th>SEXO</th>
                        <th>FILIAL</th>
                        <th>CENTRO_CUSTO</th>
                        <th>DESCRICAO_CENTRO_CUSTO</th>
                        <th>DATA_ADMISSAO</th>
                        <th>EMPRESA</th>
                        <th>AREA</th>
                        <th>DIVISAO_GCH</th>
                        <th>SINDICATO</th>
                        <th>AÇÃO</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      
                    </tbody>
                  </table>

              
              
            </div>
          </div>
        </div>
      </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade bs-example-modal-lg" id="infoFunc" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        
         <div class="modal-header" style="background-color: #2B4B5D;">
          <h4 class="modal-title text-light text-center " id="myModalLabel">Informações sobre o colaborador</h4>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" class="text-light">×</span>
          </button>

       </div>
       
        <div class="modal-body" id="informacoes">
          
          <!-- <h5>Nome Completo: <b>Fulano de Tal</b></h5> -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>

      </div>
    </div>
  </div>


  <div class="modal fade bs-example-modal-lg" id="listacc" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content p-2">
        
       
        <table id="lista_cc" class="table table-striped table-sm table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
             <tr>
                <th>Nº de Centro de Custo</th>
                <th>Nome do Centro de Custo</th>
                <th>Área</th>
              </tr>
          </thead>
          <tbody>
            
            
          </tbody>
        </table>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>

      </div>
    </div>
  </div>