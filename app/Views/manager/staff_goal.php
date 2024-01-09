<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>
<title>Employee performance monitoring</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <h1> Goals List Of</h1> &emsp;
    <div><h4>"
      <?php $names = $name->name_user;
      echo $names; ?>"
    </h4> </div>
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
          <?php if ($staff != null): ?>
            <form action="<?= site_url('manager/approve/' . $staff->users_id) ?>" method="post" class="d-inline"
              onsubmit="return confirm('This list goal will to approve!!! ')">
              <?= csrf_field() ?>
              <h6>make sure all goals are assigned to fixed status and admin has archive the active periodic time </h6>
              <button class="btn btn-success btn-sm"><i class="fas fa-plane">APPROVE</i></button>

            </form>
          <?php endif ?>
        </h3>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-striped table-md">
            <tbody>
              <tr>
                <th>No</th>
                <th>Description goal</th>
                <th>Goal_id</th>
                <th>Start time</th>
                <th>End time</th>
                <th>Value goal</th>
                <th>Actual acc</th>
                <th>status</th>
                <th>created at</th>
                <th>updated at</th>
                <th>Action</th>
              </tr>
              <?php foreach ($goal as $index => $value): ?>
                <tr>
                  <td>
                    <?= $index + 1 ?>
                  </td>
                  <td>
                    <?= $value->description_goal ?>
                  </td>
                  <td>
                    <?= $value->goal_id ?>
                  </td>
                  <td>
                    <?= $value->start_time ?>
                  </td>
                  <td>
                    <?= $value->end_time ?>
                  </td>
                  <td>
                    <?= $value->value_goal ?>
                  </td>
                  <td>
                    <?= "$value->actual_acc %" ?>
                  </td>
                  <td>
                  <?php $status= $value->status_goal ;
                      if($status==3){ ?>
                         <div class="badge badge-danger">
                        <?= "Archived"; ?>
                      </div>
                    <?php } else if ($status == 2) { ?>
                        <div class="badge badge-warning">
                        <?= "Fixed"; ?>
                        </div>
                    <?php } else { ?>
                        <div class="badge badge-success">
                        <?= "Active"; ?>
                        </div>
                    <?php }
                    ?> 
                  </td>
                  <td>
                    <?= $value->created_at ?>
                  </td>
                  <td>
                    <?= $value->updated_at ?>
                  </td>


                  <td class="text-center" style="width:10%">
                    <a href="<?= site_url('manager/edit/' . $value->goal_id) ?>" class="btn btn-warning btn-sm"><i
                        class="fas fa-pencil-alt"></i></a>
                    <form action="<?= site_url('manager/delete/' . $value->goal_id) ?>" method="post" class="d-inline"
                      onsubmit="return confirm('the data will be deleted ')">
                      <?= csrf_field() ?>
                      <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>

                    </form>
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