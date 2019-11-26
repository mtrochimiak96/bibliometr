<div class="jumbotron">

    <div class="container">

        <h2>Publikacja artykułu</h2>

        <form method="get" action="/index.php?action=article_create">
            <input type="hidden" value="article_create" name="action">
            <div class="form-group row">
                <label for="author" class="col-sm-2 col-form-label">Autor</label>
                <div class="col-sm-10">
                    <input type="text" step="1" class="form-control" id="author" name="author" value="<?= $_SESSION['name'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Tytuł</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Tytuł">
                </div>
            </div>
            <div class="form-group row">
                <label for="doi" class="col-sm-2 col-form-label">DOI</label>
                <div class="col-sm-10">
                    <input type="text" step="1" class="form-control" id="doi" name="doi" placeholder="DOI">
                </div>
            </div>
            <div class="form-group row">
                <label for="shares" class="col-sm-2 col-form-label">Współautorzy</label>
                <div class="col-sm-10">
                    <input type="text" step="1" class="form-control" id="shares" name="shares" placeholder="Udziały">
                </div>
            </div>
            <div class="form-group row">
                <label for="minipoint" class="col-sm-2 col-form-label">Punkty</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="minipoint" name="minipoint" placeholder="Punkty">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <label class="form-check-label col-sm-2 col-form-label" for="conference">Konferencja</label>
                    <input class="form-check-input" type="radio" name="conftype" value="conference" id="conference" checked>
                </div>
                <div class="col-sm-10">
                    <label class="form-check-label col-sm-2 col-form-label" for="magazine">Czasopismo</label>
                    <input class="form-check-input" type="radio" name="conftype" value="magazine" id="magazine">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <input type="text" step="1" class="form-control" id="confvalue" name="confvalue">
                </div>
            </div>
            <div class="form-group row">
                <label for="publicdate" class="col-sm-2 col-form-label">Data publikacji</label>
                <div class="col-sm-10">
                    <input type="date" step="1" class="form-control" id="publicdate" name="publicdate" placeholder="Data publikacji">
                </div>
            </div>
            <div class="form-group row">

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-success">Zapisz</button>
                    </div>
                </div>
        </form>