<?php if(!class_exists('Rain\Tpl')){exit;}?><link href="../res/assets_/build/css/login.css" rel="stylesheet">

<div class="form" id="form">
  <p class="aligncenter">
    <img src="../res/assets_/build/images/logo_login_.png">
  </p>
    <div class="field user">
      <div class="icon"></div>
      <input class="input" id="user" name="user" type="text" placeholder="Usuário" required='required' autocomplete="off"/>
    </div>
    <div class="field password">
      <div class="icon"></div>
      <input class="input" id="password" name="password" type="password" required='required' placeholder="Senha"/>
    </div>
    <button id='btn_login' class="button" id="submit">LOGIN
      <div class="side-top-bottom"></div>
      <div class="side-left-right"></div>
    </button ><div id="alert"></div>
  </div>
  <script src="../res/assets_/vendors/jquery/dist/jquery.min.js"></script>
  <script src="../res/assets_/build/js/login.js"></script>