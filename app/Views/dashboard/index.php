<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
    <?php require 'dashnav/dashnav.php';?>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-10">
                <h4><?= $title; ?></h4><br>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Log Out</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="hover"><?= ucfirst($userInfo['name']); ?></td>
                            <td class="hover"><?= $userInfo['email']; ?></td>
                            <td class="hover"><a href="<?= site_url('auth/logout'); ?>">Log Out</a></td>
                        </tr>
                    </tbody>
                </table>
                <a href="<?= site_url('dashboard/test') ?>" class="btn btn-primary">Start Test</a>
            </div>
        </div>
    </div>
    <!-- Include Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
