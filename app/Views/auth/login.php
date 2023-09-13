<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Sign In</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <?php require 'navbar/_nav.php';?>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <!-- Login Form -->
        <div class="card">
          <div class="card-header">
            <h1 class="text-center">Login</h1>
          </div>
          <div class="card-body">
            <form action="<?= base_url('auth/check') ?>" method="post" autocomplete="off">
              <?= csrf_field() ?>
              <?php if (!empty(session()->getFlashdata('fail'))): ?>
                <div class="alert alert-danger">
                  <?= session()->getFlashdata('fail'); ?>
                </div>
              <?php endif ?>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email"
                  value="<?= set_value('email') ?>" autocomplete="nope">
                <span class="text-danger">
                  <?= isset($validation) ? display_error($validation, 'email') : '' ?>
                </span>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password"
                  value="<?= set_value('password') ?>" autocomplete="new-password">
                <span class="text-danger">
                  <?= isset($validation) ? display_error($validation, 'password') : '' ?>
                </span>
              </div>
              <a href="<?= site_url('auth/register') ?>" class="link_1">Have no Account, create new account</a>
              <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Include Bootstrap JS and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>