<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>
<title>Employee performance monitoring</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <h1> My Goals List </h1> &emsp; <h5>(on this active perioidc time)</h5>
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
                <th>Status</th>
                <th>Note</th>
                <th>Created at</th>
                <th>Updated at</th>

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
                    <?php $status = $value->status_goal;
                    if ($status == 3) { ?>
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
                  <td>
                    <?= $value->note_goal ?>
                  </td>
                  </td>
                  <td>
                    <?= $value->created_at ?>
                  </td>
                  <td>
                    <?= $value->updated_at ?>
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