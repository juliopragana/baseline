<?php if(!class_exists('Rain\Tpl')){exit;}?>
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
              
  
  
              <div class="row" >
                <div class="col-sm-12">
                  <div class="clearfix"><h3 style="text-align: center;"> DESLIGADOS NOS ÚLTIMOS 20 DIAS </h3></div>
                  <div class="card-box">
                    <table class="table deslig dt-responsive nowrap" cellspacing="0"
                      width="100%">
                      <thead>
                        <tr>
                          <th>NOME</th>
                          <th>EMAIL</th>
                          <th>STATUS</th>
                          <!-- <th>STATUS</th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <?php $counter1=-1;  if( isset($usr) && ( is_array($usr) || $usr instanceof Traversable ) && sizeof($usr) ) foreach( $usr as $key1 => $value1 ){ $counter1++; ?>
                        <tr>
                          <th><?php echo htmlspecialchars( $value1["Nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></th>
                          <th><?php echo htmlspecialchars( $value1["Email"], ENT_COMPAT, 'UTF-8', FALSE ); ?></th>
                          <th><?php echo htmlspecialchars( $value1["Status"], ENT_COMPAT, 'UTF-8', FALSE ); ?></th>
                          
                                                    
                         
                        </tr>
                        <?php } ?>
  
                      </tbody>
                    </table>
  
  
  
                  </div>
                </div>
              </div>
  
  
            </div>
          </div>
        </div>
      </div>