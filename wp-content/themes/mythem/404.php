<?php get_header('post'); ?>

<div class="error404">
    <h1 style="text-align: center;">Ошибка 404! <a href="/"> На главную!</a></h1>
</div>

<?php http_response_code(404); ?>
<?php get_footer(); ?>