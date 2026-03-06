<?php

/**
 * Détermine l'ordre du prochain clic (inverse l'ordre si on est sur la même colonne).
 */
function getNextOrder(string $column, string $currentSort, string $currentOrder): string
{
    if ($column === $currentSort) {
        return $currentOrder === 'ASC' ? 'DESC' : 'ASC';
    }
    return 'ASC';
}
?>

<div class="admin-header">
    <h2>Administration des articles</h2>

    <nav class="admin-nav">
        <a href="index.php?action=admin" class="nav-link">
            Édition
        </a>
        <a href="index.php?action=showArticleList" class="nav-link active">
            Monitoring
        </a>
    </nav>
</div>

<div class="table-container">
    <table class="admin-table">
        <thead>
            <tr>
                <th class="<?= $currentSort === 'title' ? 'active-column' : '' ?>">
                    <a href="index.php?action=showArticleList&sort=title&order=<?= getNextOrder('title', $currentSort, $currentOrder) ?>">
                        Titre
                        <span class="sort-icon <?= $currentSort === 'title' ? 'active' : '' ?>">
                            <?= ($currentSort === 'title' && $currentOrder === 'DESC') ? '▼' : '▲' ?>
                        </span>
                    </a>
                </th>

                <th class="<?= $currentSort === 'views' ? 'active-column' : '' ?>">
                    <a href="index.php?action=showArticleList&sort=views&order=<?= getNextOrder('views', $currentSort, $currentOrder) ?>">
                        Vues
                        <span class="sort-icon <?= $currentSort === 'views' ? 'active' : '' ?>">
                            <?= ($currentSort === 'views' && $currentOrder === 'DESC') ? '▼' : '▲' ?>
                        </span>
                    </a>
                </th>

                <th class="<?= $currentSort === 'number_comments' ? 'active-column' : '' ?>">
                    <a href="index.php?action=showArticleList&sort=number_comments&order=<?= getNextOrder('number_comments', $currentSort, $currentOrder) ?>">
                        Commentaires
                        <span class="sort-icon <?= $currentSort === 'number_comments' ? 'active' : '' ?>">
                            <?= ($currentSort === 'number_comments' && $currentOrder === 'DESC') ? '▼' : '▲' ?>
                        </span>
                    </a>
                </th>

                <th class="<?= $currentSort === 'date_creation' ? 'active-column' : '' ?>">
                    <a href="index.php?action=showArticleList&sort=date_creation&order=<?= getNextOrder('date_creation', $currentSort, $currentOrder) ?>">
                        Date de publication
                        <span class="sort-icon <?= $currentSort === 'date_creation' ? 'active' : '' ?>">
                            <?= ($currentSort === 'date_creation' && $currentOrder === 'DESC') ? '▼' : '▲' ?>
                        </span>
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($articles)): ?>
                <tr>
                    <td colspan="4" style="text-align: center;">Aucun article trouvé.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($articles as $article): ?>
                    <tr>
                        <td class="cell-title"><?= htmlspecialchars($article->getTitle()) ?></td>
                        <td class="cell-number"><?= $article->getViews() ?></td>
                        <td class="cell-number">
                            <a href="index.php?action=showArticle&id=<?= $article->getId() ?>#comments-section">
                                <?= $article->getNumberComments() ?>
                            </a>
                        </td>
                        <td class="cell-date"><?= $article->getDateCreation()->format('d/m/Y H:i') ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
