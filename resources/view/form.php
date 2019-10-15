<!doctype html>
<html lang="en">
<head>
    <title>Developer Test</title>
    <link href="/css/bootstrap.css" rel="stylesheet">
</head>

<div class="container">
    <form id="user-form">
        <div class="form-group">
            <label for="first-name">First Name</label>
            <input type="text" class="form-control" name="first_name" id="first-name" <?php if (isset($user)): ?>
                value="<?=$user['first_name']?>" <?php endif; ?> />
        </div>
        <div class="form-group">
            <label for="surname">Surname</label>
            <input type="text" class="form-control" name="surname" id="surname" <?php if (isset($user)): ?>
                value="<?=$user['surname']?>" <?php endif; ?> />
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" <?php if (isset($user)): ?>
                value="<?=$user['email']?>" <?php endif; ?> />
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" id="username" <?php if (isset($user)): ?>
                value="<?=$user['username']?>" <?php endif; ?> />
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" />
        </div>
        <?php if (isset($user)): ?>
        <input type="hidden" id="user-id" value="<?=$user['id']?>" />
        <?php endif; ?>
        <button class="btn btn-primary btn-user-form">Submit</button>
    </form>
</div>

<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/app.js"></script>
</body>
</html>