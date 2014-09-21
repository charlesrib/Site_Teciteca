<?php
/*
Template Name: Blog
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

      <div class="row bg05" style="background-image: url('<?php header_image(); ?>');"></div>

      <div class="row bg02">

      <div class="container">

      <div class="container">

            <!-- Zona do corpo de conteúdo do site -->
            <section class="row clearfix" id="main" role="main">


                    <!-- Área de conteúdo central -->
                    <section class="column nine" id="content" role="article">

                          <?php query_posts('showposts=6'); ?>
                          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                          <div class="post <?php post_class(); ?>"  id="post-<?php the_ID(); ?>">

                              <header role="heading">
                                  <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?><?php edit_post_link(' | Editar'); ?></a></h1>
                                  <h2><?php the_subtitle(); ?></h2>
                              </header>


                              <article>

                                  <div>

                                      <h3 class="date"><span><?php the_time('d') ?></span> de <span><?php the_time('M') ?></span> de <span><?php the_time('Y') ?></span></h3>
                                      <h3 class="code"><?php echo get_the_category_list(' '); ?></h3>
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

                              </article>

                              <footer role="complementary">

                                  <ul class="row clearfix tagcloud">
                                      <h3>Tags: </h3>
                                      <li><?php echo the_tags(' '); ?></li>
                                  </ul>

                              </footer>

                          </div>
                          <?php endwhile?>

                          <?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
                          <ul class="row clearfix btPrevNext">

                              <li class="column six right"><?php previous_post_link( '%link', '<strong>&laquo;</strong> Anterior' ) ?></li>
                              <li class="column six left"><?php next_post_link( '%link', 'Proximo <strong>&raquo;</strong>' ) ?></li>
                              <?php } ?>

                          </ul>

                          <?php else: ?>
                          <section  class="column twelve post">
                            <header role="heading">

                              <h1>Não foi encontrada nenhuma postagem</h1>
                              <h2>Erro 404</h2>

                              <p><?php _e( 'Desculpe, não encontramos nenhuma fonte corresponde aos itens pesquisados. Por favor, tente novamente com palavras-chave diferentes.', 'your-theme' ); ?></p>
                              
                              <?php get_search_form(); ?>   

                            </header>
                            <div class="row">&nbsp;</div>

                          </section>
                          <?php endif; ?>

                    <div class="blank">&nbsp;</div>
                    </section>


                    <!-- Barra lateral do site -->
                    <?php get_sidebar(); ?> 



            </section>


      </div>
      </div>

<?php get_footer(); ?>