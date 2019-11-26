<div class="jumbotron">

    <div class="container">

        <h2>Edycja użytkownika</h2>

        <form method="get" action="/index.php?action=user_create">
            <input type="hidden" value="user_create" name="action">
            <input type="hidden" value="<?= $user->getId() ?>" name="id">
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Imię i nazwisko</label>
                <div class="col-sm-10">
                    <input type="text" step="1" class="form-control" id="name" name="name" placeholder="Imię i nazwisko" value="<?= $user->getName() ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= $user->getEmail() ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Hasło</label>
                <div class="col-sm-10">
                    <input type="password" step="1" class="form-control" id="password" name="password" placeholder="password" value="<?= $user->getPassword() ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="affiliation" class="col-sm-2 col-form-label">Afiliacja</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="affiliation" name="affiliation" placeholder="Afiliacja" value="<?= $user->getAffiliation() ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="role" class="col-sm-2 col-form-label">Rola</label>
                <div class="col-sm-10">
                    <select class="form-control" id="role" name="role">
                        <option value="user" <?= $user->getRole() === "user" ? "selected" : "" ?>>Użytkownik</option>
                        <option value="admin" <?= $user->getRole() === "admin" ? "selected" : "" ?>>Admin</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">

                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-primary" value="Zapisz">
                    </div>
                </div>
        </form>