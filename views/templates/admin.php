<?php

/**
 * Affichage de la partie admin : liste des articles avec un bouton "modifier" pour chacun.
 * Et un formulaire pour ajouter un article.
 */
?>

<div class="admin-header">
    <h2>Administration des articles</h2>

    <nav class="admin-nav">
        <a href="index.php?action=admin" class="nav-link active">
            Édition
        </a>
        <a href="index.php?action=showArticleList" class="nav-link">
            Monitoring
        </a>
    </nav>
</div>

<div class="adminArticle">

    <?php foreach ($articles as $article) { ?>

        <div class="articleLine">

            <div class="title"><?= $article->getTitle() ?></div>

            <div class="content"><?= $article->getContent(200) ?></div>

            <div><a class="submit" href="index.php?action=showUpdateArticleForm&id=<?= $article->getId() ?>">Modifier</a></div>

            <div><a class="submit" href="index.php?action=deleteArticle&id=<?= $article->getId() ?>" <?= Utils::askConfirmation("Êtes-vous sûr de vouloir supprimer cet article ?") ?>>Supprimer</a></div>

        </div>

    <?php } ?>

</div>

<a class="submit" href="index.php?action=showUpdateArticleForm">Ajouter un article</a>
