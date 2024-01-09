<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Employee performance monitoring</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card">
  <div class="card-header ">
    <h4>Insert employee</h4>
  </div>
  <div class="card-body col-md-6">
    <form action="<?= site_url('admin/save_employee') ?>" method="post">
      <?= csrf_field() ?>
      <div class="form-group">
        <label>username</label>
        <input type="text" name="username" class="form-control" required onkeypress="return event.charCode != 32">
      </div>
      <br>
      <div class="form-group">
        <label>password</label>

        <input type="text" name="password_user" class="form-control" required onkeypress="return event.charCode != 32">
      </div>
      <div class="form-group">
        <label>name</label>
        <input type="text" name="name_user" class="form-control" required>
      </div>
      <div class="form-group">
        <label>job title</label>
        <input type="text" name="job_title" class="form-control invoice-input" required>
      </div>
      <div class="form-group">
        <label>address</label>
        <input type="text" name="address" class="form-control purchase-code" required placeholder="">
      </div>

      <div class="form-group">
        <label>no.telphone</label>
        <input type="text" name="no_telp" class="form-control datemask" required placeholder="">
      </div>
      <div class="form-group">
        <label class="form-label">Gender</label>
        <div class="selectgroup selectgroup-pills">
          <label class="selectgroup-item">
            <input type="radio" name="gender" value="1" class="selectgroup-input" required>
            <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-sun"> &nbsp; Male </i></span>
          </label>
          <label class="selectgroup-item">
            <input type="radio" name="gender" value="2" class="selectgroup-input">
            <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-moon">&nbsp; Female </i></span>
          </label>
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">Role</label>
        <div class="selectgroup selectgroup-pills">
          <label class="selectgroup-item">
            <input type="radio" name="roles" value="1" class="selectgroup-input" required>
            <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-code-branch"> &nbsp; staff
              </i></span>
          </label>
          <label class="selectgroup-item">
            <input type="radio" name="roles" value="2" class="selectgroup-input">
            <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-anchor">&nbsp; managaer
              </i></span>
          </label>
          <label class="selectgroup-item">
            <input type="radio" name="roles" value="3" class="selectgroup-input">
            <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-atom">&nbsp; admin </i></span>
          </label>
        </div>
      </div>
      <div class="form-group">
        <label>Evaluator </label>

        <select class="form-control" name="evaluator_id" required>

          <option value=0>---select---</option>
          <?php foreach ($manager as $index): ?>
            <option value="<?= $index["users_id"] ?>"><?= $index["users_id"] ?>&emsp;|&emsp;<?= $index["name_user"] ?>&emsp;|&emsp;<?= $index["job_title"] ?></option>
          <?php endforeach ?>
        </select>
      </div>

      <button type="submit" class="btn btn-icon icon-left btn-primary"><i
          class="fas fa-paper-plane"></i>&nbsp;save</button>
      &emsp;&emsp;

      <button type="reset" class="btn btn-icon icon-left btn-warning"><i class="fas fa-trash"></i>&nbsp;reset</button>
  </div>
  </form>
</div>
<?= $this->endSection() ?>