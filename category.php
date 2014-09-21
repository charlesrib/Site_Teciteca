<?php get_header(); ?>
      </div>

      <div class="row bg05" style="background-image: url('<?php header_image(); ?>');"></div>

      <div class="row bg02">

      <div class="container">


      <!-- Zona do rodapé do site -->
      <section class="row clearfix tpurple" role="article">
        
            <h1 class="tpurple"><?php _e( 'Categoria: ', 'your-theme' ); ?><?php single_cat_title() ?></h1>

      </section>

      <div class="container">

            <!-- Zona do corpo de conteúdo do site -->
            <section class="row clearfix" id="main" role="main">


                    <!-- Área de conteúdo central -->
                    <section class="column nine" id="content" role="article">

                          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                          <div class="post <?php post_class(); ?>"  id="post-<?php the_ID(); ?>">

                              <?php if ( $post->post_type == 'post' ) { ?>
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
                              <?php } ?>

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