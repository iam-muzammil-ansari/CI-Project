<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Sign Up</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<?php require 'navbar/_nav.php';?>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <!-- Sign Up Form -->
        <div class="card">
          <div class="card-header">
            <h1 class="text-center">Sign Up</h1>
          </div>
          <div class="card-body">
            <form action="<?= base_url('auth/save') ?>" method="post" autocomplete="off">
              <?= csrf_field(); ?>
              <?php if (!empty(session()->getFlashdata('fail'))): ?>
                <div class="alert alert-danger">
                  <?= session()->getFlashdata('fail'); ?>
                </div>
              <?php endif ?>

              <?php if (!empty(session()->getFlashdata('success'))): ?>
                <div class="alert alert-success">
                  <?= session()->getFlashdata('success'); ?>
                </div>
              <?php endif ?>
              <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full name"
                  autocomplete="nope" value="<?= set_value('name'); ?>">
                <span class="text-danger">
                  <?= isset($validation) ? display_error($validation, 'name') : '' ?>
                </span>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email"
                  autocomplete="nope" value="<?= set_value('email'); ?>">
                <span class="text-danger">
                  <?= isset($validation) ? display_error($validation, 'email') : '' ?>
                </span>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password"
                  autocomplete="new-password" value="<?= set_value('password'); ?>">
                <span class="text-danger">
                  <?= isset($validation) ? display_error($validation, 'password') : '' ?>
                </span>
              </div>
              <div class="form-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword"
                  placeholder="Confirm password" value="<?= set_value('cpassword'); ?>">
                <span class="text-danger">
                  <?= isset($validation) ? display_error($validation, 'cpassword') : '' ?>
                </span>
              </div>
              <a href="<?= site_url('auth') ?>" class="link_1">I already have an account, login now</a>
              <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary btn-block">Sign up</button>
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