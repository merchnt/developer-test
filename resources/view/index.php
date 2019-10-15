<!doctype html>
<html lang="en">
<head>
    <title>Developer Test</title>
    <link href="/css/bootstrap.css" rel="stylesheet">
</head>

<div class="container">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Surname</th>
            <th scope="col">Email</th>
            <th scope="col">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($users)): ?>
            <?php foreach ($users as $user) : ?>
            <tr>
                <th scope="row"><?= $user['id'] ?></th>
                <td><?= $user['first_name'] ?></td>
                <td><?= $user['surname'] ?></td>
                <td><?= $user['email'] ?></td>
                <td>
                    <a class="btn btn-sm btn-warning" href="/user/<?= $user['id'] ?>" role="button">Edit</a>
                    <button type="button" class="btn btn-sm btn-danger btn-user-delete" data-user-id="<?= $user['id'] ?>">Delete</button>
                </td>
            </tr>
            <?php endforeach ?>
        <?php else: ?>
        <tr>
            <td colspan="5" class="text-center">No users available.</td>
        </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/app.js"></script>
</body>
</html>