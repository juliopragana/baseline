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
        <h3>LISTAR POR ÁREAS</h3>
        <ul class="nav side-menu">
          <li><a onclick="carregar_todos()"> 
            
            TODAS 
            <?php $counter1=-1;  if( isset($qtd) && ( is_array($qtd) || $qtd instanceof Traversable ) && sizeof($qtd) ) foreach( $qtd as $key1 => $value1 ){ $counter1++; ?>
            <span class="badge badge-primary"><?php echo htmlspecialchars( $value1["QTD"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
            <?php } ?>
          </a>
         </li>
          <?php $counter1=-1;  if( isset($cc) && ( is_array($cc) || $cc instanceof Traversable ) && sizeof($cc) ) foreach( $cc as $key1 => $value1 ){ $counter1++; ?>
          <li><a href="#" onclick="carregar_por_gcc('<?php echo htmlspecialchars( $value1["DivisaoGCH"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')"> <?php echo htmlspecialchars( $value1["DivisaoGCHUPPER"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <span class="badge badge-primary"><?php echo htmlspecialchars( $value1["QTD"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span></a>
            <ul class="nav child_menu" id="sub_menu_areas">
              <!-- <li><a href="#" id="sub_menu_areas"></a></li> -->
              <!-- <li><a href="#"></a>Teste</li>
              <li><a href="#"></a>Test2e</li> -->
            </ul>
          </li>
          <?php } ?>
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