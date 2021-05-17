<?php if(!class_exists('Rain\Tpl')){exit;}?>
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3 id="titulo">Rateio de Impressão</h3>
      </div>
    </div>
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h5 id='titulo_sub_area'>Valor total da Nota - R$ 5.030,65</h5>
            </div>
          </div>
          <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                  <div class="card-box">
                    <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr style="text-align: center;">
                          <th>Usuário</th>
                          <th>Nome</th>
                          <th>Departamento</th>
                          <th>CC</th>
                          <th>PG Color</th>
                          <th style="background-color:#47B071; color:#fff">Custo Color (R$)</th>
                          <th>PG P&B</th>
                          <th style="background-color:#47B071; color:#fff">Custo P&B (R$)</th>
                          <th style="background-color:#ff9933; color:#fff">Custo Rateio</th>
                          <th style="background-color:#015C1F; color:#fff">Custo Total (R$)</th>    
                        </tr>
                      </thead>
                      <tbody>
                        <?php $counter1=-1;  if( isset($resultado) && ( is_array($resultado) || $resultado instanceof Traversable ) && sizeof($resultado) ) foreach( $resultado as $key1 => $value1 ){ $counter1++; ?>
                        <tr>
                          <td style="text-align: center;"><?php echo htmlspecialchars( $value1["Usuario"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                          <td style="text-align: center;"><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                          <td style="text-align: center;"><?php echo htmlspecialchars( $value1["Departamento"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                          <td style="text-align: center;"><?php echo htmlspecialchars( $value1["CENTRO_CUSTO"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                          <td style="text-align: center;"><?php echo htmlspecialchars( $value1["TotalPaginasColoridas"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                          <td style="text-align: center;"><b>R$<?php echo htmlspecialchars( $value1["TotalPaginasColoridas"] * 0.59, ENT_COMPAT, 'UTF-8', FALSE ); ?></b></td>
                          <td style="text-align: center;"><?php echo htmlspecialchars( $value1["TotalPaginasCinzas"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                          <td style="text-align: center;"><b>R$<?php echo htmlspecialchars( $value1["TotalPaginasCinzas"] * 0.06, ENT_COMPAT, 'UTF-8', FALSE ); ?></b></td>
                          <td style="text-align: center;"><b>R$<?php echo htmlspecialchars( $valorRateio, ENT_COMPAT, 'UTF-8', FALSE ); ?></b></td>
                          <td style="text-align: center;"><b>R$<?php echo htmlspecialchars( $value1["TotalPaginasCinzas"] * 0.06 + $value1["TotalPaginasColoridas"] * 0.59 + $valorRateio, ENT_COMPAT, 'UTF-8', FALSE ); ?></b></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                      <tfooter>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="background-color:#47B071; color:#fff">Total Colorido</td>
                          
                          <td style="font-size: 13pt;"><b>R$<?php echo htmlspecialchars( $custoColor, ENT_COMPAT, 'UTF-8', FALSE ); ?></b></td>
                         
                          <td style="background-color:#47B071; color:#fff">Total PB</td>
                          <td style="font-size: 13pt;"><b>R$<?php echo htmlspecialchars( $custoPB, ENT_COMPAT, 'UTF-8', FALSE ); ?></b></td>
                          <td  style="font-size: 13pt;background-color:#015C1F; color:#fff">R$<?php echo htmlspecialchars( $custoTotal, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        </tr>
                      </tfooter>
                    </table>
                   <?php echo htmlspecialchars( $valorR, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                  </div>
                </div>
            </div>
           </div>
         </div>
      </div>




    </div>
  </div>




