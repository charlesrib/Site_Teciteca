
<?php

if ( is_user_logged_in() ) { // checar se é um usuário autenticado
show_admin_bar( true ); // mostrar a barra administrativa
}

/**
 * Add support for a custom header image.
 */
require( get_template_directory() . '/inc/custom-header.php' );


// post thumbnail (imagens de topo para postagens)
if ( function_exists( 'add_theme_support' ) ) { 
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 895, 355, true ); // default Post Thumbnail dimensions (cropped)

// additional image sizes
// delete the next line if you do not need additional image sizes
add_image_size( 'category-thumb', 9999, 9999 ); //300 pixels wide (and unlimited height)
}


/* WIDGETS */
 
if (function_exists('register_sidebar'))
{
    register_sidebar(array(
        'name'          => 'Sidebar',
        'before_widget' => '<section>',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => 'Footer',
        'before_widget' => '<section class="column three">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => 'Institucional',
        'before_widget' => '<section class="column six postInst">',
        'after_widget'  => '</section>',
        'before_title'  => '<h1>',
        'after_title'   => '</h1>',
    ));

}


add_theme_support('menus');


/* Search FORM */

function my_search_form($form) {
    $form = '<form method="get" id="searchform" action="' . get_option('home') . '/" >
    <div><label for="s">' . __('Search for:') . '</label>
    <input type="text" value="' . attribute_escape(apply_filters('the_search_query', get_search_query())) . '" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="'.attribute_escape(__('Search')).'" />
    </div>
    </form>';
    return $form;
}




// Retorna outras categorias excepto a atual (redundante)
function cats_meow($glue) {
 $current_cat = single_cat_title( '', false );
 $separator = "\n";
 $cats = explode( $separator, get_the_category_list($separator) );
 foreach ( $cats as $i => $str ) {
  if ( strstr( $str, ">$current_cat<" ) ) {
   unset($cats[$i]);
   break;
  }
 }
 if ( empty($cats) )
  return false;
 
 return trim(join( $glue, $cats ));
} // end cats_meow

 


// Retorna outras tags excepto a atual (redundante)
function tag_ur_it($glue) {
 $current_tag = single_tag_title( '', '',  false );
 $separator = "\n";
 $tags = explode( $separator, get_the_tag_list( "", "$separator", "" ) );
 foreach ( $tags as $i => $str ) {
  if ( strstr( $str, ">$current_tag<" ) ) {
   unset($tags[$i]);
   break;
  }
 }
 if ( empty($tags) )
  return false;
 
 return trim(join( $glue, $tags ));
} // end tag_ur_it



//////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////meta box para botões de download///////////////////////////////////////////

/* Adiciona a meta box para upload do arquivo
 */
add_action( 'add_meta_boxes', 'my_meta_box' );
 
function my_meta_box()
{
    add_meta_box( 'my_meta_uploader', 'Upload de arquivo', 'my_meta_uploader_setup', 'post', 'normal', 'high' );
}
 
/*
 * Adiciona os campos para a meta box de upload
 */
function my_meta_uploader_setup()
{
    global $post;
 
    // Procura o valor da chave 'upload_file'
    $meta = get_post_meta( $post->ID, 'upload_file', true );
    ?>
 
    <p>
        Clique no botão para fazer o upload de um documento. Após o término do upload, clique em <em>Inserir no post</em>.
    </p>
 
    <p>
        <input id="upload_file" type="text" size="80" name="upload_file" style="width: 85%;" value="<?php if( ! empty( $meta ) ) echo $meta; ?>" />
        <input id="upload_file_button" type="button" class="button" value="Fazer upload" />
    </p>
 
    <?php
}



/*
 * Salva os dados da nossa custom meta box
 */
add_action( 'save_post', 'my_meta_uploader_save' );
 
function my_meta_uploader_save( $post_id ) {
 
    if ( ! current_user_can( 'edit_post', $post_id ) ) return $post_id;
 
    // Recebe o valor que foi enviado pelo media uploader
    $arquivo = $_POST['upload_file'];
 
    // Adiciona a chave upload_file ou atualiza seu valor
    add_post_meta( $post_id, 'upload_file', $arquivo, true ) or update_post_meta( $post_id, 'upload_file', $arquivo );
 
    return $post_id;
}


/*
 * Adiciona o script que replica o uploader padrão do WordPress
 */
add_action( 'admin_head', 'my_meta_uploader_script' );
 
/*
 * O novo media uploader, baseado no post e nas discussões do site abaixo
 * http://www.webmaster-source.com/2010/01/08/using-the-wordpress-uploader-in-your-plugin-or-theme/
 */
function my_meta_uploader_script() { ?>
    <script type="text/javascript">
        jQuery(document).ready(function() {
 
            var formfield;
            var header_clicked = false;
 
            jQuery( '#upload_file_button' ).click( function() {
                formfield = jQuery( '#upload_file' ).attr( 'name' );
                tb_show( '', 'media-upload.php?TB_iframe=true' );
                header_clicked = true;
 
                return false;
            });
 
            // Guarda o uploader original
            window.original_send_to_editor = window.send_to_editor;
 
            // Sobrescreve a função nativa e preenche o campo com a URL
            window.send_to_editor = function( html ) {
                if ( header_clicked ) {
                    fileurl = jQuery( html ).attr( 'href' );
                    jQuery( '#upload_file' ).val( fileurl );
                    header_clicked = false;
                    tb_remove();
                }
                else
                {
                    window.original_send_to_editor( html );
                }
            }
 
        });
  </script>
<?php
}
 

/*
 * Download do arquivo
 * Adiciona um parágrafo com um link para o arquivo salvo na meta box
 */
add_filter( 'the_content', 'insert_meta_data' );
 
function insert_meta_data( $content ) {
 
    global $post;
 
    $meta = get_post_meta( $post->ID, 'upload_file', true );
 
    if ( $meta ) {
        $content .= '<div class="row btDownload center">';
        $content .= '<a download href="' . $meta . '" title="Clique para iniciar o download">';
        $content .= '<div><img src="http://www.teciteca.ufba.br/bt_down.png" /></div><div>Faça o download do arquivo</div>';
        $content .= '</a>';
        $content .= '</div>';
    }
 
    return $content;
 
}
 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////


function tamanho_resumo($length) {
return 50; // Altere este número pelo número de palavras do resumo
}
add_filter(‘excerpt_length’, ‘tamanho_resumo’)


?>
