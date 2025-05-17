<h1><?php echo $article_name ?></h1>
<p><?php echo trim_max($article_body) ?></p>
<p>Créé il y'a <?php echo timespan(strtotime($article_modified)) ?></p>