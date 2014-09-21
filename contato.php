<?php
/*
Template Name: Contato
*/
?>
<!DOCTYPE html>
<html  xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

   <head>
       <meta charset="utf-8"/>
       <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

       <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

       <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/icon.png" >
       <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

       <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); wp_head(); ?>

       <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/teciteca.js"></script>
       <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>

       <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53fdfbe70bb5bb74"></script>

      <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->

       <title><?php wp_title(''); ?> :: Teciteca</title>


   </head>


   <body>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '646608545453782',
      xfbml      : true,
      version    : 'v2.1'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

      <div class="row bg04">

        <nav class="menuGlobal" role="navigation">

              <ul role="menubar">

                  <!-- Elementos individuais da lista -->
                  <li role="menuitem"><a href="https://www.ufba.br/">UFBA</a></li>
                  <li role="menuitem"><a href="http://www.belasartes.ufba.br/">Belas Artes</a></li>
                  <li role="menuitem"><a href="#">Lab Griot</a></li>
              
              </ul>

        </nav>

      </div>


      <!-- Elemento centralizador em linha -->
      <div class="row bg01">
      <!-- Área de navegação do site -->
      <div class="container">

            <!-- Zona de cabeçalho do site -->
            <header class="row clearfix" id="header" role="heading">

              
                    <!-- Área do Logo da TECITECA -->
                    <section class="column two" role="banner">

                          <div class="logoBar">

                            <a href="<?php bloginfo( 'url' ) ?>/"><img src="<?php bloginfo('template_directory'); ?>/imgs/logos/logo_teciteca.png"></a><!-- logo da teciteca -->

                          </div>
                          
                    </section>
                    
                    <!-- Área navegação -->
                    <nav class="column two menubar" role="navigation">

                          <div class="menuTitle"><h1><a href="#"><img src="<?php bloginfo('template_directory'); ?>/imgs/icons/menu.png"><span> Menu</span></a></h1></div>
                           <ul id="menu" class="logoBar" role="menubar">

                              <!-- Elementos individuais da lista -->
                              <li role="menuitem"><a href="<?php bloginfo( 'url' ) ?>/">Institucional</a></li>
                              <?php wp_list_pages('title_li='); ?>
                          
                          </ul>

                    </nav>

                    <!-- Área nome da página -->
                    <section class="column four center" role="banner">

                          <div class="logotitle center">

                            <a href="<?php bloginfo( 'url' ) ?>/"><h1><?php wp_title(''); ?></h1></a><!-- titulo da página -->

                          </div>
                          
                    </section>
                    
                    <!-- Área da pesquisa -->
                    <section class="column four" role="search">

                          <?php get_search_form(); ?>
                          
                    </section>
                    
            </header>

      </div>
      </div>

      <?php
      function h($str) {
        return htmlentities($str);
      }

      function noempty($str) {
        if (preg_match('/[a-z]/', $str))
          return true;
        else
          return false;
      }

          $name     =   $_POST['nome']; //pega os dados que foi digitado no ID Nome.
          $email     =   $_POST['email']; //pega os dados que foi digitado no ID email.
          $message  =   $_POST['msg']; //pega os dados que foi digitado no ID Messagem.
       
          while(list($campo, $valor) = each($_POST)){
              if($campo != "submit"){
       
                $corpo  = 'Prezado Administrador,' . "\r\n\r\n";
                $corpo .= 'A mensagem abaixo foi enviada através do formulário de contato em ' .date("d/m/Y \à\s H:i:s"). "\r\n\r\n";
                $corpo .= 'MENSAGEM' . "\r\n";
                $corpo .= '-----------------------' . "\r\n";

                $corpo .= "Nome: " .$name . "\n";
                $corpo .= "E-mail: " .$email . "\n";
                $corpo .= "Comentários: " .$message . "\n";

              }
       
          }    
       
          $corpo .= '-----------------------' . "\r\n\r\n";
          $corpo .= 'Atenciosamente,' . "\r\n";
          $corpo .= get_option('blogname') . "\r\n";
          $corpo .= $siteurl . "\r\n\r\n\r\n\r\n";


      if (isset($_POST['enviar'])) {
        if (!noempty($_POST['nome']) or !noempty($_POST['assunto']) or !is_email($_POST['email']) or !noempty($_POST['msg'])) {
          $_SESSION['info'] = 'Preencha todos campos corretamente.';
        }
        
        else {
          $headers = 'From: ' . $_POST['email'] . "\r\n" .
              'Reply-To: ' . $_POST['email']  . "\r\n" .
              'X-Mailer: PHP/' . phpversion();

          if(@mail(get_bloginfo('admin_email'), $_POST['assunto'], $corpo, $headers)) {
            $_SESSION['info'] = 'E-mail enviado com sucesso.';
            exit;
          } else {
            $_SESSION['info'] = 'Erro no servidor.';
          }
        }
      }
      ?>

      <div class="row bg05" style="background-image: url('<?php header_image(); ?>');"></div>

      <div class="row bg02">

      <div class="container">

      <div class="container">

            <!-- Zona do corpo de conteúdo do site -->
            <section class="row clearfix" id="main" role="main">


                    <!-- Área de conteúdo central -->
                    <section class="column six post" role="article">

                        <div class="row">&nbsp;</div>

                        <h2>Envie sua mensagem</h2>

                        <form role="form" method="post" action="">

                            <?php
                              if (isset($_SESSION['info'])) {
                                echo '<div class="info">' . $_SESSION['info'] . '';
                                unset($_SESSION['info']);
                              }
                            ?>

                            <div class="form-group">
                              <label for="nome">* Nome</label>
                              <input type="text" class="form-control" name="nome" value="<?php echo h(@$_POST['nome']) ?>" id="nome" placeholder="Qual o seu nome?" />
                            </div>
                            <div class="form-group">
                              <label for="email">* E-mail</label>
                              <input type="email" class="form-control" name="email" value="<?php echo h(@$_POST['email']) ?>" id="email"  placeholder="Qual o seu E-mail?"/>
                            </div>
                            <div class="form-group">
                              <label for="assunto">* Assunto</label>
                              <input type="text" class="form-control" name="assunto" value="<?php echo h(@$_POST['assunto']) ?>" id="assunto"  placeholder="Do que se trata essa mensagem?"/>
                            </div>
                            <div class="form-group">
                              <label for="msg">* Mensagem</label>
                              <textarea class="form-control" name="msg" rows="5"><?php echo h(@$_POST['msg']) ?></textarea>
                            </div>
                            <div class="form-group">
                              <input type="reset" class="btn btn-default" name="enviar" value="Limpar" />
                              <input type="submit" class="btn btn-default" name="enviar" value="Enviar" />
                            </div>
                        </form>

                        <div class="blank">&nbsp;</div>

                    </section>
                    
                    <section class="column six" role="aplication">

                        <div class="row post">

                            <p>
                                <small><strong>End.:</strong> Rua Araújo Pinho, 16-202. Canela - Salvador - Bahia</small><br>
                                <small><strong>E-mail:</strong> teciteca.ufba@gmail.com</small><br>
                                <small><strong>Telefone:</strong> Breve <!--+55 (71) 0000-0000--></small><br>
                            </p>

                        </div>

                        <div class="row">&nbsp;</div>

                        <div id="googleMap" style="width:100%;height:380px;"></div>

                    </section>

            </section>


      </div>
      </div>

<?php get_footer(); ?>