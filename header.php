<!DOCTYPE html>
<html  xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

   <head>
       <meta charset="utf-8"/>
       <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

       <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

       <link rel="shortcut icon" href="icon.png" >
       <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

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
                              <li role="menuitem"><a href="<?php bloginfo( 'url' ) ?>/">Institucinoal</a></li>
                              <?php wp_list_pages('title_li='); ?>
                          
                          </ul>

                    </nav>

                    <!-- Área nome da página -->
                    <section class="column four center" role="banner">

                          <div class="logotitle center">

                            <a href="<?php bloginfo( 'url' ) ?>/"><h1>Teciteca</h1></a><!-- titulo da página -->

                          </div>
                          
                    </section>
                    
                    <!-- Área da pesquisa -->
                    <section class="column four" role="search">

                          <?php get_search_form(); ?>
                          
                    </section>
                    
            </header>

      </div>
      </div>
