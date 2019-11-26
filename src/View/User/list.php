    <style>
        a
        {
            color:green;
        }
    </style>
<div class="jumbotron text-center">
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Użytkownicy</h1>
    </div>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col">Imię i nazwisko</th>
                    <th scope="col">Afiliacja</th>
                    <th scope="col">Rola</th>
                    <th scope="col">Edytuj</th>
                    <th scope="col">Usuń</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <th scope="row"><?= $user->getId() ?></th>
                        <td><?= $user->getEmail() ?></td>
                        <td><?= $user->getName() ?></td>
                        <td><?= $user->getAffiliation() ?></td>
                        <td><?= $user->getRole() ?></td>
                        <td><a href="index.php?action=user_edit&id=<?= $user->getId() ?>">Edytuj</a></td>
                        <td><a href="index.php?action=user_delete&id=<?= $user->getId() ?>">Usuń</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>