<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Employee performance monitoring</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="col-sm-30 col-sm-offset-30 col-lg-30 col-lg-offset-10 main">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <h1>
          <li class="active">Dashboard</li>
        </h1>
      </ol>
    </div>
    <!--/.row-->
    <div class="col-30 mb-20">
      <div class="hero text-white hero-bg-image hero-bg-parallax"
        data-background="<?= base_url() ?>/template/assets/img/unsplash/andre-benz-1214056-unsplash.jpg"
        style="background-image: url(&quot;<?= base_url() ?>/template/assets/img/unsplash/andre-benz-1214056-unsplash.jpg&quot;);">
        <div class="hero-inner">
          <h2>Welcome,
            <?= userLogin()->name_user ?>
          </h2><br>
          <p class="lead">
          <h5>My profile</h5>
          </p>
          <p class="lead">username :
            <?= userLogin()->username ?>
          </p>
          <p class="lead">users ID :
            <?= userLogin()->users_id ?>
          </p>
          <p class="lead">Role :
            <?php $roles = userLogin()->roles;
            if ($roles == 3) {
              echo "Admin";
            } else if ($roles == 2) {
              echo "Manager";
            } else {
              echo "Staff";
            }
            ?>
          </p>
          <p class="lead">Job title:
            <?= userLogin()->job_title ?>
          </p>
          <p class="lead">Gender :
            <?php $genders = userLogin()->gender;
            if ($genders == 1) {
              echo "Male";
            } else {
              echo "Female";
            }
            ?>
          </p>
          <p class="lead">No.telephone :
            <?= userLogin()->no_telp ?>
          </p>
          <p class="lead">Address :
            <?= userLogin()->address ?>
          </p>
          <br>

          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Your Staff</h4>
                  </div>
                  <div class="card-body">
                    <?= $staff; ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                  <i class="fas fa-info-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Goal To Approved</h4>
                  </div>
                  <div class="card-body">
                    <?php $count = count($total);
                    echo $count ?>

                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Active Goal to Rated</h4>
                  </div>
                  <div class="card-body">
                    <?php $count = count($active);
                    echo $count ?>

                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-check"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Fixed Goal </h4>
                  </div>
                  <div class="card-body">
                    <?php $count = count($fixed);
                    echo $count ?>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
  <!--/.main-->

  <?= $this->endSection() ?>