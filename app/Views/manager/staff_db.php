<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>
<title>Employee performance monitoring</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <h1>Your Staff List</h1>
  </div>
  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">X</button>
        <b>SUCCESS !</b>
        <?= session()->getFlashdata('success') ?>
      </div>

    </div>
  <?php endif ?>
  <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">X</button>
        <b>FAILED !!</b>
        <?= session()->getFlashdata('error') ?>
      </div>
    </div>
  <?php endif ?>

  <div class="section-body">

    <div class="card">

      <div class="card-header">
        <h3>
          choose your staff to view his goals list and to give approval
        </h3>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-striped table-md">
            <tbody>
              <tr>
                <th>No</th>
                <th>Username</th>
                <th>User_id</th>
                <th>Name of employee</th>
                <th>Job title</th>
                <th>Role</th>
                <th>No.telp</th>
                <th>Gender</th>
                <th>Address</th>
                <th>View list of goal</th>
              </tr>
              <?php foreach ($employee as $index => $value): ?>
                <tr>
                  <td>
                    <?= $index + 1 ?>
                  </td>
                  <td>
                    <?= $value->username ?>
                  </td>
                  <td>
                    <?= $value->users_id ?>
                  </td>

                  <td>
                    <?= $value->name_user ?>
                  </td>
                  <td>
                    <?= $value->job_title ?>
                  </td>
                  <td>
                  <?php $roles = $value->roles;
                    if ($roles == 3) { ?>
                      <div class="badge badge-danger">
                        <?= "Admin"; ?>
                      </div>
                    <?php } else if ($roles == 2) { ?>
                        <div class="badge badge-warning">
                        <?= "Manager"; ?>
                        </div>
                    <?php } else { ?>
                        <div class="badge badge-success">
                        <?= "Staff"; ?>
                        </div>
                    <?php }
                    ?>
                  </td>
                  <td>
                    <?= $value->no_telp ?>
                  </td>
                  <td>
                    <?php $genders = $value->gender;
                    if ($genders == 1) {
                      echo "Male";
                    } else {
                      echo "Female";
                    }
                    ?>
                  </td>
                  <td>
                    <?= $value->address ?>
                  </td>


                  <td class="text-center" style="width:10%">
                    <a href="<?= site_url('manager/show/' . $value->users_id) ?>" class="btn btn-light btn-sm"><i
                        class="fa fa-eye"></i></a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
</section>
<?= $this->endSection() ?>