      <div class="row bg03">
      <div class="container">

            <!-- Zona do rodapé do site -->
            <div id="menuFooter" class="row clearfix">

                    <div class="blank"></div>

                    <ul class="menubar">

                        <!-- Elementos individuais da lista -->
                          <li role="menuitem"><a href="<?php bloginfo( 'url' ) ?>/">Home</a></li>
                          <?php wp_list_pages('title_li='); ?>

                    </ul>

                    <!-- links para perfis sociais da teciteca -->
                    <ul class="social">

                          <li class="center"><a href="#"><img src="<?php bloginfo('template_directory'); ?>/imgs/icons/twitter.png"></a></li>
                          <li class="center"><a href="https://www.facebook.com/teciteca.fan"><img src="<?php bloginfo('template_directory'); ?>/imgs/icons/facebook.png"></a></li>
                          <li class="center"><a href="#"><img src="<?php bloginfo('template_directory'); ?>/imgs/icons/plus.png"></a></li>
                          <li class="center"><a href="https://www.youtube.com/user/TecitecaUFBA"><img src="<?php bloginfo('template_directory'); ?>/imgs/icons/youtube.png"></a></li>
                          <li class="center"><a href="http://instagram.com/teciteca"><img src="<?php bloginfo('template_directory'); ?>/imgs/icons/instagram.png"></a></li>

                    </ul>

            </div>

            <footer class="row clearfix" id="footer" role="complementary">
              
                    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer') ) : ?><?php endif; ?>

            </footer>

            <div class="blank"></div>

            <div class="blank center"><a href="<?php bloginfo( 'url' ) ?>/"><img src="<?php bloginfo('template_directory'); ?>/imgs/logos/logo_teciteca.png"></a><!-- logo da teciteca --></div>


            <div class="blank"></div>


      </div>
      </div>


      <div class="ass">

          <small>© 2014 Todos os direiros reservados - Desenvolvido pela Equipe Teciteca</small>

      </div>

   </body>

   <script>

      $('#menu').hide(); //Hide children by default

          $('.menuTitle').click(function(){
              $('#menu').slideToggle('fast');
      });

  </script>

  <script>
  function initialize()
  {
  var mapProp = {
    center:new google.maps.LatLng(-12.9915908,-38.5213286),
    zoom:19,
    mapTypeId:google.maps.MapTypeId.ROADMAP
    };
  var map=new google.maps.Map(document.getElementById("googleMap")
    ,mapProp);
  }

  google.maps.event.addDomListener(window, 'load', initialize);
  map.setTilt(0);

  </script>

</html>