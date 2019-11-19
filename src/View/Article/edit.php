<div class="jumbotron">

    <div class="container">

        <h2>Edycja artykułu</h2>

        <form method="get" action="/index.php?action=article_create">
            <input type="hidden" value="article_create" name="action">
            <input type="hidden" value="<?= $article->getId() ?>" name="id">
            <div class="form-group row">
                <label for="author" class="col-sm-2 col-form-label">Autor</label>
                <div class="col-sm-10">
                    <input type="text" step="1" class="form-control" id="author" name="author" placeholder="Autor" value="<?= $article->getAuthor() ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Tytuł</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Tytuł" value="<?= $article->getTitle() ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="doi" class="col-sm-2 col-form-label">DOI</label>
                <div class="col-sm-10">
                    <input type="text" step="1" class="form-control" id="doi" name="doi" placeholder="DOI" value="<?= $article->getDoi() ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="minipoint" class="col-sm-2 col-form-label">Punkty</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="minipoint" name="minipoint" placeholder="Punkty" value="<?= $article->getMinipoint() ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="conference" class="col-sm-2 col-form-label">Konferencja</label>
                <div class="col-sm-10">
                    <input type="text" step="1" class="form-control" id="conference" name="conference" placeholder="Konferencja" value="<?= $article->getConference() ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="publicdate" class="col-sm-2 col-form-label">Data publikacji</label>
                <div class="col-sm-10">
                    <input type="date" step="1" class="form-control" id="publicdate" name="publicdate" placeholder="Data publikacji" value="<?= $article->getPublicdate() ?>">
                </div>
            </div>
            <div class="form-group row">

                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-primary" value="Zapisz">
                    </div>
                </div>
        </form>