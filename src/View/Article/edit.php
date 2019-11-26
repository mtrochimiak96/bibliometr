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
                <label for="shares" class="col-sm-2 col-form-label">Współautorzy</label>
                <div class="col-sm-10">
                    <input type="text" step="1" class="form-control" id="shares" name="shares" placeholder="Udziały" value="<?= $article->getShares() ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="minipoint" class="col-sm-2 col-form-label">Punkty</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="minipoint" name="minipoint" placeholder="Punkty" value="<?= $article->getMinipoint() ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <label class="form-check-label col-sm-2 col-form-label" for="conference">Konferencja</label>
                    <input class="form-check-input" type="radio" name="conftype" value="conference" id="conference" <?= $article->getConferenceType() === "conference" ? "checked" : "" ?>>
                </div>
                <div class="col-sm-10">
                    <label class="form-check-label col-sm-2 col-form-label" for="magazine">Czasopismo</label>
                    <input class="form-check-input" type="radio" name="conftype" value="magazine" id="magazine" <?= $article->getConferenceType() === "magazine" ? "checked" : "" ?>>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <input type="text" step="1" class="form-control" id="confvalue" name="confvalue" value="<?= $article->getConferenceValue() ?>">
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