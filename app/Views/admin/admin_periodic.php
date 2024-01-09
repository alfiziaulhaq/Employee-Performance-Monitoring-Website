<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>
<title>Employee performance monitoring</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <h1>periodic time database</h1>
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
          <h3>

            <a href="<?= base_url('admin/add_periodic'); ?>">
              <button type="button" class="btn btn-primary bt-lg "><span class="glyphicon glyphicon-plus"></span>add
                periodic</button>
            </a>
          </h3>
      </div>
      <div class="card-footer bg-whitesmoke">
        <h5>
          current kpi assessment period
        </h5>
      </div>
      <div class="card-body ">
        <?php if ($current != null): ?>
          <h6>periodic id :
            <?= $current->periodic_id ?>
          </h6>
          <h6>start time :
            <?= $current->start_time ?>
          </h6>
          <h6>end time :
            <?= $current->end_time ?>
          </h6>
        <?php endif ?>
      </div>
      <div class="card-footer bg-whitesmoke">
        <h3>Note : </h3>
        <h6>Archive current periodic time at the end of this periodic timeline. after that the manager user can approve all
          fixed targets for a staff and get staff kpi results. To archive, open editing page of active status periodic time.</h6>
      </div>
      <div class="card-header">
        <h3>
          Periodic database history
        </h3>
      </div>

      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-striped table-md">
            <tbody>
              <tr>
                <th>No</th>
                <th>periodic id</th>
                <th>start periodic time</th>
                <th>end periodic time</th>
                <th>status</th>
                <th>Action</th>
              </tr>
              <?php foreach ($periodic as $index => $value): ?>
                <tr>
                  <td>
                    <?= $index + 1 ?>
                  </td>
                  <td>
                    <?= $value->periodic_id ?>
                  </td>
                  <td>
                    <?= $value->start_time ?>
                  </td>
                  <td>
                    <?= $value->end_time ?>
                  </td>
                  <td>
                    <?php $roles = $value->status_time;
                    if ($roles == 2) { ?>
                      <div class="badge badge-danger">
                        <?= "archived"; ?>
                      </div>
                    <?php } else if ($roles == 1) { ?>
                        <div class="badge badge-success">
                        <?= "active"; ?>
                        </div>
                    <?php }
                    ?>
                  </td>


                  <td class="text-center" style="width:10%">
                    <a href="<?= site_url('admin/edit_periodic/' . $value->periodic_id) ?>"
                      class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                    <form action="<?= site_url('admin/delete_periodic/' . $value->periodic_id) ?>" method="post"
                      class="d-inline" onsubmit="return confirm('the data will be deleted ')">
                      <?= csrf_field() ?>
                      <input type="hidden" name="_method" value="DELETE">
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