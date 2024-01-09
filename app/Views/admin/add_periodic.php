<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Employee performance monitoring</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card">
  <div class="card-header ">
    <h4>Insert periodic time</h4>
  </div>
  <div class="card-body col-md-6">
    <form action="<?= site_url('admin/save_periodic') ?>" method="post">
      <?= csrf_field() ?>
      <div class="form-group">
        <label>start time</label>
        <input type="date" name="start_time" class="form-control datepicker">
      </div>
      <div class="form-group">
        <label>end time</label>
        <input type="date" name="end_time" class="form-control datepicker">
      </div>
      <button type="submit" class="btn btn-icon icon-left btn-primary"><i
          class="fas fa-paper-plane"></i>&nbsp;save</button>
      &emsp;&emsp;

      <button type="reset" class="btn btn-icon icon-left btn-warning"><i class="fas fa-trash"></i>&nbsp;reset</button>
    </form>
  </div>
  <?= $this->endSection() ?>