<div class="jumbotron">

    <div class="container">

        <h2>Publikacja artykułu</h2>

        <form method="get" action="/index.php?action=article_create">
            <input type="hidden" value="article_create" name="action">
            <div class="form-group row">
                <label for="author" class="col-sm-2 col-form-label">Autor</label>
                <div class="col-sm-10">
                    <input type="text" step="1" class="form-control" id="author" name="author" placeholder="Autor">
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
                <label for="minipoint" class="col-sm-2 col-form-label">Punkty</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="minipoint" name="minipoint" placeholder="Punkty">
                </div>
            </div>
            <div class="form-group row">
                <label for="conference" class="col-sm-2 col-form-label">Konferencja</label>
                <div class="col-sm-10">
                    <input type="text" step="1" class="form-control" id="conference" name="conference" placeholder="Konferencja">
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
                        <button type="submit" class="btn btn-primary">Zapisz</button>
                    </div>
                </div>
        </form>
