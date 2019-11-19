<div class="jumbotron">
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Artykuły</h1>
        <p class="lead">Baza dostępnych artykułów</p>
    </div>

    <div class="container">

        <div>
            Nie ma artykułu którego szukasz? Stwórz tutaj!

            <a href="/index.php?action=article_create" class="btn btn-primary">Create</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <?php if ($author_check) { ?><th scope="col">Autor</th><?php } ?>
                    <?php if ($title_check) { ?><th scope="col">Tytuł</th><?php } ?>
                    <?php if ($doi_check) { ?><th scope="col">DOI</th><?php } ?>
                    <?php if ($minipoint_check) { ?><th scope="col">Punkty</th><?php } ?>
                    <?php if ($conference_check) { ?><th scope="col">Konferencja</th><?php } ?>
                    <?php if ($publicdate_check) { ?><th scope="col">Data publikacji</th><?php } ?>
                    <th scope="col">Edytuj artykuł</th>
                    <th scope="col">Usuń artykuł</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articles as $article) : ?>
                    <tr>
                        <th scope="row"><?= $article->getId() ?></th>
                        <?php if ($author_check) { ?><td><?= $article->getAuthor() ?></td><?php } ?>
                        <?php if ($title_check) { ?><td><?= $article->getTitle() ?></td><?php } ?>
                        <?php if ($doi_check) { ?><td><?= $article->getDoi() ?></td><?php } ?>
                        <?php if ($minipoint_check) { ?><td><?= $article->getMinipoint() ?></td><?php } ?>
                        <?php if ($conference_check) { ?><td><?= $article->getConference() ?></td><?php } ?>
                        <?php if ($publicdate_check) { ?><td><?= $article->getPublicdate() ?></td><?php } ?>
                        <td><a href="index.php?action=article_edit&id=<?= $article->getId() ?>">Edytuj</a></td>
                        <td><a href="index.php?action=article_delete&id=<?= $article->getId() ?>">Usuń</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
