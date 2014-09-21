<?php get_header(); ?>
      </div>

      <div class="row bg05" style="background-image: url('<?php header_image(); ?>');"></div>

      <div class="row bg02">

      <div class="container">


      <!-- Zona do rodapé do site -->
      <!-- <section class="row clearfix tabs" id="tabs" role="article">
        
            zona para colocar o slider 

            <ul>
                <li><a href="#tb1">Tab 01</a></li>
                <li><a href="#tb2">Tab 02</a></li>
                <li><a href="#tb3">Tab 03</a></li>
                <li><a href="#tb4">Tab 04</a></li>
                <li><a href="#tb5">Tab 05</a></li>
            </ul>

            <section>
                <div id="tb1">textos ou imagens 01</div>
                <div id="tb2">textos ou imagens 02</div>
                <div id="tb3">textos ou imagens 03</div>
                <div id="tb4">textos ou imagens 04</div>
                <div id="tb5">textos ou imagens 05</div>
            </section>


      </section>-->

      <div class="container">

            <!-- Zona do corpo de conteúdo do site -->
            <section class="row clearfix" id="main" role="main">


                    <!-- Área de conteúdo central -->
                    <section class="column nine" id="content" role="article">

                          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                          <div class="post">

                              <header role="heading">
                                  <h1><?php the_title(); ?><?php edit_post_link(' | Editar'); ?></h1>
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

                                  <div class="postContent">

                                      <?php the_content(); ?>
                                      
                                      <div class="addthis_sharing_toolbox"></div>

                                  </div>

                              </article>

                              <footer role="complementary">

                                  <div class="cardPost">

                                      <?php if ( function_exists( 'get_author_bio_box' ) ) echo get_author_bio_box(); ?>

                                  </div>

                                  <ul class="row clearfix tagcloud">
                                      <h3>Tags: </h3>
                                      <li><?php echo the_tags(' '); ?></li>
                                  </ul>

                                  <hr>

                                  <ul class="row clearfix btPrevNext">

                                      <li class="column six right"><?php previous_post_link( '%link', '<strong>&laquo;</strong> Anterior' ) ?></li>
                                      <li class="column six left"><?php next_post_link( '%link', 'Proximo <strong>&raquo;</strong>' ) ?></li>

                                  </ul>

                                  <div class="blank"><?php comments_template(); ?></div>

                              </footer>

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

                    </section>


                    <!-- Barra lateral do site -->
                    <?php get_sidebar(); ?> 


            </section>


      </div>
      </div>

<?php get_footer(); ?>