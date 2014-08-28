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

       <title><?php wp_title(''); ?> :: Teciteca</title>


   </head>


   <body>


      <div class="row bg04">

        <nav class="menuGlobal" role="navigation">

              <ul role="menubar">

                  <!-- Elementos individuais da lista -->
                  <li role="menuitem"><a href="#">UFBA</a></li>
                  <li role="menuitem"><a href="#">Belas Artes</a></li>
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
                              <li role="menuitem"><a href="<?php bloginfo( 'url' ) ?>/">Home</a></li>
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

      <div class="row bg05" style="background-image: url('<?php header_image(); ?>');"></div>

      <div class="row bg02">

      <div class="container">


      <!-- Zona do rodapé do site -->
      <section class="row clearfix" id="tabs" role="article">
        
              <!-- zona para colocar widget do intagram -->
              <div class="column twelve blank center"><?php instagram_header(); ?></div>

      </section>

      <div class="container">

            <!-- Zona do corpo de conteúdo do site -->
            <section class="row clearfix" id="main" role="main">


                    <!-- Área de conteúdo central -->
                    <section class="column twelve" id="content" role="article">

                          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                          <div class="post">

                              <article>

                                  <div>

                                      <div class="wrappImage">

                                        <?php
                                        //verifica se existe algum thumbnail para o post
                                        if(has_post_thumbnail()){
                                        the_post_thumbnail('thumb-post'); //retorna o thumbnail para página especificando o tipo da imagem
                                        }else{
                                        //caso não tenha nenhuma thumbnail, retorna uma imagem padrão
                                        echo '<img src="http://adistribuidoramagazine.com.br/wp-content/gallery/tecidos/tecidos.jpg"/>';
                                        }?>

                                      </div>

                                  </div>

                                  <div class="postContent">

                                      <?php the_content(); ?>

                                  </div>

                              </article>

                          </div>
                          <?php endwhile?>

                            <?php else: ?>
                            <section  class="column twelve content">
                              <header role="heading">
                                <h1>Não foi encontrado nenhuma postagem</h1>
                                <h2>Erro 404</h2>
                                <p>Lamentamos mas não foram encontrados artigos.</p>
                              </header>
                            </section>
                            <?php endif; ?>
                          <div class="blank">&nbsp;</div>

                    </section>

            </section>


      </div>
      </div>

<?php get_footer(); ?>