<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>
<title>Employee performance monitoring</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <h1>KPI Results Database</h1>
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
        Filter KPI Results Based On Periodic Time
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
                <th>View Filter Result</th>
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
                    <a href="<?= site_url('manager/ratings_periodic/' . $value->periodic_id) ?>"
                      class="btn btn-light btn-sm"><i class="fas fa-eye"></i></a>
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