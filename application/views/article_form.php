<?php //echo validation_errors(); ?>
<h1>Ajouter un article</h1>
<?php echo form_open() ?>
    <div>
        <?php echo form_label('Titre de l\'article', 'article_name') ?><br/>
        <?php echo form_input('article_name', set_value('article_name')) ?>
        <?php echo form_error('article_name'); ?>
    </div>
    <div>
        <?php echo form_label('Contenu de l\'article', 'article_body') ?><br/>
        <?php echo form_textarea('article_body', set_value('article_body')) ?>
        <?php echo form_error('article_body'); ?>
    </div>
    <div>
        <?php echo form_submit('save', 'Enregistrer') ?>
    </div>
<?php echo form_close() ?>