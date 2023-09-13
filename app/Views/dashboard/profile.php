<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>

<body>

    <!-- partial:index.partial.html -->
    <div class="container">
        <div class="row" style="margin-Top: 40px">
            <div class="col-md-4 col-md-offset-4" >
                <h4><?= $title; ?></h4><br>
                <table class="table table-hover" >
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class= "hover"><?= ucfirst($userInfo['name']); ?></td>
                            <td class= "hover"><?= $userInfo['email'];?></td>
                            <td class= "hover"><a href="<?= site_url('auth/logout'); ?>">LogOut</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- partial -->
    <script src="<?= base_url('assets/js/script.css') ?>"></script>
</body>

</html>