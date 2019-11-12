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
             <th scope="col">Autor</th>
            <th scope="col">Tytuł</th>
            <th scope="col">DOI</th>
            <th scope="col">Punkty</th>
			 <th scope="col">Konferencja</th>
			  <th scope="col">Data publikacji</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($articles as $article): ?>
            <tr>
                <th scope="row"><?= $article->getId() ?></th>
                <td><?= $article->getAuthor() ?></td>
                <td><?= $article->getTitle() ?></td>
                <td><?= $article->getDoi() ?></td>
                <td><?= $article->getMinipoint() ?></td>
				<td><?= $article->getConference() ?></td>
				<td><?= $article->getPublicdate() ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

