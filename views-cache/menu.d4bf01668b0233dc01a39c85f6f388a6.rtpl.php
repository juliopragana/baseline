<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title text-center" style="border: 0;">
      <a href="/baseline" class="site_title"><span>BASELINE</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
  
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <!-- <h3>MENU</h3> -->
        <ul class="nav side-menu">
          <li><a href="/proximos-desligados"> 
              PRÓXIMOS DESLIGADOS
              </a>
         </li>
         <li><a href="/ja-desligados"> 
              USUÁRIOS JÁ DESLIGADOS
          </a>
     </li>
          
        </ul>
      </div>
      

    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons
    <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
    </div> -->
    <!-- /menu footer buttons -->
  </div>
</div>

<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
          <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
        <ul class=" navbar-right">
          <li class="nav-item dropdown open" style="padding-left: 15px;">
            <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
              <?php echo htmlspecialchars( $user, ENT_COMPAT, 'UTF-8', FALSE ); ?>
            </a>
            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
              <!-- <a class="dropdown-item"  href="#"><i class="fa fa-undo pull-right"></i> sasd</a> -->
              <a class="dropdown-item"  href="/logout"><i class="fa fa-sign-out pull-right"></i> Sair</a>
            </div>
          </li>

          <li role="presentation" class="nav-item ">
            <a href="#" class="info-number">
              <button type="button" class="btn btn-success btn-sm" onclick="carrega_lista_cc()">Listar Centro de Custo</button>
              
            </a>
            
          </li>
        </ul>
      </nav>
    </div>
  </div>