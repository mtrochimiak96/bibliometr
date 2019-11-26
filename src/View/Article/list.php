<div class="jumbotron text-center">
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Dostępne artykuły</h1>
    </div>
    
    <style>
        a
        {
            color:green;
        }
    </style>

    <div class="container">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <?php if ($author_check) { ?><th scope="col">Autor</th><?php } ?>
                    <?php if ($title_check) { ?><th scope="col">Tytuł</th><?php } ?>
                    <?php if ($doi_check) { ?><th scope="col">DOI</th><?php } ?>
                    <?php if ($shares_check) { ?><th scope="col">Udziały</th><?php } ?>
                    <?php if ($minipoint_check) { ?><th scope="col">Punkty</th><?php } ?>
                    <?php if ($conference_check) { ?><th scope="col">Konferencja</th><?php } ?>
                    <?php if ($publicdate_check) { ?><th scope="col">Data publikacji</th><?php } ?>
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === "admin") { ?>
                        <th scope="col">Edytuj artykuł</th>
                        <th scope="col">Usuń artykuł</th>
                    <?php } elseif (isset($_SESSION['name'])) { ?>
                        <th scope="col">Edytuj artykuł</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articles as $article) : ?>
                    <tr>
                        <th scope="row"><?= $article->getId() ?></th>
                        <?php if ($author_check) { ?><td><?= $article->getAuthor() ?></td><?php } ?>
                        <?php if ($title_check) { ?><td><?= $article->getTitle() ?></td><?php } ?>
                        <?php if ($doi_check) { ?><td><?= $article->getDoi() ?></td><?php } ?>
                        <?php if ($shares_check) { ?><td><?= $article->getShares() ?></td><?php } ?>
                        <?php if ($minipoint_check) { ?><td><?= $article->getMinipoint() ?></td><?php } ?>
                        <?php if ($conference_check) { ?><td><?= $article->getConferenceValue() ?></td><?php } ?>
                        <?php if ($publicdate_check) { ?><td><?= $article->getPublicdate() ?></td><?php } ?>
                        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === "admin") { ?>
                            <td><a href="index.php?action=article_edit&id=<?= $article->getId() ?>">Edytuj</a></td>
                            <td><a href="index.php?action=article_delete&id=<?= $article->getId() ?>">Usuń</a></td>
                        <?php } elseif (isset($_SESSION['name']) && (explode(", ", $article->getAuthor())[0] === $_SESSION['name'])) { ?>
                            <td><a href="index.php?action=article_edit&id=<?= $article->getId() ?>">Edytuj</a></td>
                        <?php } ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>