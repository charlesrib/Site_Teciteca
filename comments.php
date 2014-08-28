<?php
// Do not delete these lines
    if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die ('Please do not load this page directly. Thanks!');
 
    if ( post_password_required() ) { ?>
        <p class="nocomments">Este artigo está protegido por password. Insira-a para ver os comentários.</p>
    <?php
        return;
    }
?>
 
<div id="comments">
    <h3>Comentários <span class="label label-default right"><?php comments_number('0', '1', '%' );?></span></h3>
 
    <?php if ( have_comments() ) : ?>
 
    <ol class="commentlist">
        <?php wp_list_comments('avatar_size=64&type=comment'); ?>
    </ol>
 
        <?php if ($wp_query->max_num_pages > 1) : ?>
        <div class="pagination">
        <ul>
            <li class="older"><?php previous_comments_link('Anteriores'); ?></li>
            <li class="newer"><?php next_comments_link('Novos'); ?></li>
        </ul>
    </div>
    <?php endif; ?>
 
    <?php endif; ?>
 
    <?php if ( comments_open() ) : ?>
 
    <div id="respond">

            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
            <fieldset>
                <?php if ( $user_ID ) : ?>
 
                <div class="panel panel-success">
                    <div class="panel-heading">Você está comentando como:</div>
                    <div class="panel-body ">
                        <p><a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a> | <a href="<?php echo wp_logout_url(); ?>" title="Sair desta conta">Sair desta conta <span class="glyphicon glyphicon-remove"></span></a></p>
                    </div>
                </div>
 
                <?php else : ?>
 
                <div class="form-group">
                    <label for="author">*Nome:</label>
                    <input type="text" class="form-control" name="author" id="author" value="<?php echo $comment_author; ?>" placeholder="Qual o seu nome?">
                </div>
                <div class="form-group">
                    <label for="email">*Email:</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $comment_author_email; ?>"  placeholder="Qual o seu email?">
                </div>
                <div class="form-group">
                    <label for="url">Site | Blog | Página no Facebook:</label>
                    <input type="text" class="form-control" name="url" id="url" value="<?php echo $comment_author_url; ?>" placeholder="Possui alguma página na Web?">
                </div>
  
                <?php endif; ?>
 
                <div class="form-group">
                    <label for="comment">*Mensagem:</label>
                    <textarea class="form-control" name="comment" id="comment" rows="5" cols=""></textarea>
                    <input class="btn btn-default" type="reset" value="Limpar" />
                    <input class="btn btn-default" type="submit" value="Enviar" />
                </div>
 
                <?php comment_id_fields(); ?>
                <?php do_action('comment_form', $post->ID); ?>
            </fieldset>
        </form>
        <button type="button" class="btn btn-default"><?php cancel_comment_reply_link('Cancelar'); ?></button>
        </div>
    <?php else : ?>
    <h3>Comentários fechados para este post!</h3>
<?php endif; ?>
</div>