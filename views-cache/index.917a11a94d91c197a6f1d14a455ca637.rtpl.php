<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="top_nav">
    <div class="nav_menu">
       
        <nav class="nav navbar-nav">
        <ul class=" navbar-right">
          <li class="nav-item dropdown open" style="padding-left: 15px;">
            <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
              Teste
            </a>
            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item"  href="/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
            </div>
          </li>

          <!-- <li role="presentation" class="nav-item ">
            <a href="#" class="info-number">
              <button type="button" class="btn btn-success btn-sm" onclick="carrega_lista_cc()">Listar Centro de Custo</button>
              
            </a>
            
          </li> -->
        </ul>
      </nav>
    </div>
  </div>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3> Módulos ativos</h3>
        </div>

        <!-- <div class="title_right">
          <div class="col-md-5 col-sm-5   form-group pull-right top_search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                  <button class="btn btn-default" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div> -->
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Lista de módulos</h2>
              <!-- <ul class="nav navbar-right panel_toolbox"> -->
                <!-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li> -->
                <!-- <li class="dropdown"> -->
                  <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"></a> -->
                  
                <!-- </li>
                
              </ul> -->
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <div class="row">
                
                <div class="col-md-55">
                  <div class="thumbnail">
                    <div class="image view view-first">
                      <img style="width: 100%; display: block;" src="../res/assets_/build/images/modulos/baseline.png" alt="image" />
                      <div class="mask">
                        <p>BASELINE</p>
                        <a href="/baseline">
                        <div class="tools tools-bottom">
                          <h4>Acessar o módulo</h4>
                        </div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-55">
                    <div class="thumbnail">
                      <div class="image view view-first">
                        <img style="width: 100%; display: block;" src="../res/assets_/build/images/modulos/tic-control.png" alt="image" />
                        <div class="mask">
                          <p>TIC - CONTROLE DE MÁQUINAS</p>
                          <a href="/baseline">
                          <div class="tools tools-bottom">
                            <h4>Acessar o módulo</h4>
                          </div>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-55">
                    <div class="thumbnail">
                      <div class="image view view-first">
                        <img style="width: 100%; display: block;" src="../res/assets_/build/images/modulos/facilities-terceiros.png" alt="image" />
                        <div class="mask">
                          <p>FACILITIES - CONTROLE DE TERCEIROS</p>
                          <a href="/baseline">
                          <div class="tools tools-bottom">
                            <h4>Acessar o módulo</h4>
                          </div>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
               
                    
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
