<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3 id="titulo">Lista de desligados</h3>

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

            
          </div>
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="clearfix"> 
                  <h3 style="text-align: center;">PRÓXIMOS DELISGADOS</h3>
               </div>
                <div class="card-box">
                  
                  <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                    width="100%">
                    <thead>
                      <tr>
                        <th>NOME</th>
                        <th>CPF</th>
                        <th>CARGO</th>
                        <th>CENTRO CUSTO</th>
                        <th>DESCRIÇÃO CC</th>
                        <th>FILIAL</th>
                        <th>EMPRESA</th>
                        <th>DATA DE DEMISSÃO</th>
                        <th>SITUAÇÃO</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                                         
                      <?php $counter1=-1;  if( isset($novosDeslig) && ( is_array($novosDeslig) || $novosDeslig instanceof Traversable ) && sizeof($novosDeslig) ) foreach( $novosDeslig as $key1 => $value1 ){ $counter1++; ?>
                      <tr>
                       
                        

                        <th><?php echo htmlspecialchars( $value1["NOME"], ENT_COMPAT, 'UTF-8', FALSE ); ?></th>
                        <th><?php echo htmlspecialchars( $value1["CPF"], ENT_COMPAT, 'UTF-8', FALSE ); ?></th>
                        <th><?php echo htmlspecialchars( $value1["CARGO"], ENT_COMPAT, 'UTF-8', FALSE ); ?></th>
                        <th><?php echo htmlspecialchars( $value1["CENTRO_CUSTO"], ENT_COMPAT, 'UTF-8', FALSE ); ?></th>
                        <th><?php echo htmlspecialchars( $value1["DESCRICAO_CC"], ENT_COMPAT, 'UTF-8', FALSE ); ?></th>
                        <th><?php echo htmlspecialchars( $value1["FILIAL"], ENT_COMPAT, 'UTF-8', FALSE ); ?></th>
                        <th><?php echo htmlspecialchars( $value1["EMPRESA"], ENT_COMPAT, 'UTF-8', FALSE ); ?></th>
                        <th><?php echo htmlspecialchars( $value1["DT_DEMISSAO_CONVERTIDA"], ENT_COMPAT, 'UTF-8', FALSE ); ?></th>
                        <th></th>

                      </tr>
                      <?php } ?>
                      
                    </tbody>
                   
                   
                    
                  </table>

                  <?php if( $novosDeslig == null ){ ?>
                        
                  <p style="text-align: center; ">
                    Sem bloquedos agendados
                  </p>
          
              

                <?php } ?>

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

