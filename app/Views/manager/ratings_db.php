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
        <h5>
          Filter by periodic time &emsp;=> &emsp; <a href="<?= base_url('manager/periodic_db'); ?>">
            <button type="submit" class="btn btn-icon icon-left btn-primary"><i
                class="fas fa-paper-plane"></i>&nbsp;Open</button>
          </a>
        </h5>
      </div>
      <div class="card-footer bg-whitesmoke">
        <h5>

        </h5>
      </div>

      <div class="card-header">
        <h3>
          <form action="<?= site_url('manager/ratings_filter') ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group"> <label>
                <h5>Filter your staff to showing his KPI results from time to time</h5>
              </label>

              <select class="form-control" name="staff" required>

                <option value=0 style="text-align: center;">--- SELECT ---</option>
                <?php foreach ($employee as $index): ?>
                  <option value="<?= $index->users_id ?>"><?= $index->users_id ?>&emsp;|&emsp;<?= $index->name_user ?>&emsp;|&emsp;<?= $index->job_title ?></option>
                <?php endforeach ?>
              </select>
            </div>

            <button type="submit" class="btn btn-icon icon-left btn-primary"><i
                class="fas fa-paper-plane"></i>&nbsp;Filter</button>
          </form>
        </h3>
      </div>

      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-striped table-md">
            <tbody>
              <tr>
                <th>No</th>
                <th>Name of staff</th>
                <th>User ID</th>
                <th>Start time</th>
                <th>End time</th>
                <th>Periodic ID</th>
                <th>KPI score</th>
                <th>KPI Percentage</th>
                <th>Grade of KPI Percentage</th>
                <th>created at</th>
                <th>View bound goals detail</th>

              </tr>
              <?php foreach ($ratings as $index => $value): ?>
                <tr>
                  <td>
                    <?= $index + 1 ?>
                  </td>
                  <td>
                    <?= $value->name_user ?>
                  </td>
                  <td>
                    <?= $value->users_id ?>
                  </td>
                  <td>
                    <?= $value->start_time ?>
                  </td>
                  <td>
                    <?= $value->end_time ?>
                  </td>
                  <td>
                    <?= $value->periodic_id ?>
                  </td>
                  <td>
                    <?= $value->score_rating ?>
                  </td>
                  <td>
                    <?= "$value->percentage_acc %" ?>
                  </td>
                  <td>
                    <?php $grade = $value->grade_rating;
                    if ($grade == "A") { ?>
                      <div class="badge badge-success">
                        <?= "A" ?>
                      </div>
                    <?php } elseif ($grade == "B") { ?>
                      <div class="badge badge-info">
                        <?= "B" ?>
                      </div>
                    <?php } elseif ($grade == "C") { ?>
                      <div class="badge badge-warning">
                        <?= "C" ?>
                      </div>
                    <?php } elseif ($grade == "D") { ?>
                      <div class="badge badge-danger">
                        <?= "D" ?>
                      </div>
                    <?php }

                    ?>
                  </td>
                  <td>
                    <?= $value->created_at ?>
                  </td>
                  <td class="text-center" style="width:10%">
                    <a href="<?= site_url('manager/ratings_detail/' . $value->rating_id) ?>"
                      class="btn btn-light btn-sm"><i class="fa fa-eye"></i></a>
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