<!DOCTYPE html>
<html  xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

  <head>
       <meta charset="utf-8"/>
       <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
       <meta property="og:image" content="http://www.teciteca.ufba.br/padrao.png" />

       <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

       <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/icon.png" >
       <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
       <link href="http://www.teciteca.ufba.br/padrao.png" rel="image_src" />

       <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); wp_head(); ?>

       <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/teciteca.js"></script>
       <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>

       <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53fdfbe70bb5bb74"></script>


      <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->

       <title><?php wp_title(''); ?></title>
       
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

            <!--<ul class="login">
                <li><a href="#">Login</a></li>
            </ul>-->

      </nav>

    </div>

    <div class="row bg01">
    <!-- Área de navegação do site -->
    <div class="container">

          <!-- Zona de cabeçalho do site -->
          <header class="row clearfix" id="header" role="heading">

                  <!-- Área navegação -->
                  <nav class="column two menubar" role="navigation">

                          <div class="menuTitle"><h1><a href="#"><img src="<?php bloginfo('template_directory'); ?>/imgs/icons/menu.png"><span> Menu</span></a></h1></div>
                           <ul id="menu" class="logoBar" role="menubar">

                              <!-- Elementos individuais da lista -->
                              <li role="menuitem"><a href="<?php bloginfo( 'url' ) ?>/">Institucional</a></li>
                              <?php wp_list_pages('title_li='); ?>
                          
                          </ul>

                  </nav>

                  <div class="center">

                      <ul class="column two topSocial">

                          <li class="center"><a href="https://www.facebook.com/teciteca.fan"><img src="<?php bloginfo('template_directory'); ?>/imgs/icons/facebook.png"></a></li>
                          <li class="center"><a href="https://www.youtube.com/user/TecitecaUFBA"><img src="<?php bloginfo('template_directory'); ?>/imgs/icons/youtube.png"></a></li>
                          <li class="center"><a href="http://instagram.com/teciteca"><img src="<?php bloginfo('template_directory'); ?>/imgs/icons/instagram.png"></a></li>

                      </ul>

                  </div>

                  <!-- Área da pesquisa -->
                  <section class="column eight" role="search">

                        <?php get_search_form(); ?>
                        
                  </section>

          </header>

    </div>
    </div>

    <div class="row bg06" style="background-image: url('<?php header_image(); ?>');">


        <!----><div class="row">&nbsp;</div>
        <!----><div class="row">&nbsp;</div>
        <div class="center">

            <a href="<?php bloginfo( 'url' ) ?>/"><img src="<?php bloginfo('template_directory'); ?>/imgs/logos/logoG.png"></a><!-- logo da teciteca -->

        </div>
        <!----><div class="row">&nbsp;</div>
        <!----><div class="row">&nbsp;</div>


    </div>

    <div class="row bg02">

        <div class="container">

              <!-- Zona do corpo de conteúdo do site -->
              <section class="row clearfix" id="main" role="main">

                      
                      <!-- Área de conteúdo central cat=3&-->

                      <div class="row clearfix homeIntro">

                          <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Institucional') ) : ?><?php endif; ?>

                      </div>

                      <div class="row clearfix postHome">

                          <div class="column twelve center">
                              <h3>Últimas postagens</h3>
                          </div>

                          <?php query_posts('cat=4&showposts=4'); ?>
                          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                          <div class="column three">
                              <div class="thumbnail">
                                  <a href="<?php the_permalink() ?>">

                                      <div class="wpImage">
                                        <?php
                                        //verifica se existe algum thumbnail para o post
                                        if(has_post_thumbnail()){
                                        the_post_thumbnail('thumb-post'); //retorna o thumbnail para página especificando o tipo da imagem
                                        }else{
                                        //caso não tenha nenhuma thumbnail, retorna uma imagem padrão
                                        echo '<img src="http://adistribuidoramagazine.com.br/wp-content/gallery/tecidos/tecidos.jpg"/>';
                                        }?>
                                      </div>

                                      <div class="caption">
                                        <h5><?php the_title(); ?></h5>
                                      </div>
                                  </a>
                              </div>
                          </div>
                          <?php endwhile?>
                          <?php else: ?>
                          <?php endif; ?>

                      </div>

                      <div class="row">&nbsp;</div>

                      <div class="row clearfix eduHome">

                          <div class="column twelve center">
                              <h3>Palestras | Oficinas</h3>
                          </div>

                          <?php query_posts('cat=3&showposts=4'); ?>
                          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                          <div class="column six">
                              <div class="thumbnail">
                                  <a href="<?php the_permalink() ?>">

                                      <div class="wpImage">
                                        <?php
                                        //verifica se existe algum thumbnail para o post
                                        if(has_post_thumbnail()){
                                        the_post_thumbnail('thumb-post'); //retorna o thumbnail para página especificando o tipo da imagem
                                        }else{
                                        //caso não tenha nenhuma thumbnail, retorna uma imagem padrão
                                        echo '<img src="http://adistribuidoramagazine.com.br/wp-content/gallery/tecidos/tecidos.jpg"/>';
                                        }?>
                                      </div>

                                      <div class="caption">
                                        <h5><?php the_title(); ?></h5>
                                      </div>
                                  </a>
                              </div>
                          </div>
                          <?php endwhile?>
                          <?php else: ?>
                          <?php endif; ?>


                      </div>

                      <div class="row">&nbsp;</div>

              </section>


    </div>

<?php get_footer(); ?>