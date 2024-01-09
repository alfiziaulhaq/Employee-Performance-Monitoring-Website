<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Employee performance monitoring</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card">
  <div class="card-header ">
    <h4>update employee data</h4>
  </div>
  <div class="card-body col-md-6">
    <form action="<?= site_url('admin/update_employee/' . $user->users_id) ?>" method="post">
      <?= csrf_field() ?>
      <input type="hidden" name="_method" value="PUT">
      <div class="form-group">
        <label>username</label>
        <input type="text" name="username" placeholder="your current username is ' <?= $user->username ?> '"
          class="form-control" onkeypress="return event.charCode != 32">
      </div>
      <div>
        <label class="custom-switch mt-2">
          <input type="checkbox" name="change_username" value=1 class="custom-switch-input">
          <span class="custom-switch-indicator"></span>
          <span class="custom-switch-description">change to new username</span>
        </label>
      </div>
      <br>
      <br>
      <div class="form-group">
        <label>password</label>

        <input type="text" name="password_user" placeholder="change your password" class="form-control"
          onkeypress="return event.charCode != 32">
      </div>
      <div>
        <label class="custom-switch mt-2">
          <input type="checkbox" name="change_password" value=1 class="custom-switch-input">
          <span class="custom-switch-indicator"></span>
          <span class="custom-switch-description">change to new password</span>
        </label>
      </div>
      <br>
      <div class="form-group">
        <label>name</label>
        <input type="text" name="name_user" value="<?= $user->name_user ?>" class="form-control" required>
      </div>
      <div class="form-group">
        <label>job title</label>
        <input type="text" name="job_title" value="<?= $user->job_title ?>" class="form-control invoice-input" required>
      </div>
      <div class="form-group">
        <label>address</label>
        <input type="text" name="address" value="<?= $user->address ?>" class="form-control purchase-code" required
          placeholder="">
      </div>

      <div class="form-group">
        <label>no.telphone</label>
        <input type="text" name="no_telp" value="<?= $user->no_telp ?>" class="form-control datemask" required
          placeholder="">
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
      <?php if($user->roles==1){?>
      <div class="form-group">
        <label>Evaluator </label>

        <select class="form-control" name="evaluator_id" required>

          <option value=0>---select---</option>
          <?php foreach ($manager as $index): ?>
            <option value="<?= $index["users_id"] ?>"><?= $index["users_id"] ?>&emsp;|&emsp;<?= $index["name_user"] ?>&emsp;|&emsp;<?= $index["job_title"] ?></option>
          <?php endforeach ?>
        </select>

      </div>
      <?php }?>
      <button type="submit" class="btn btn-icon icon-left btn-primary"><i
          class="fas fa-paper-plane"></i>&nbsp;save</button>
      &emsp;&emsp;

      <button type="reset" class="btn btn-icon icon-left btn-warning"><i class="fas fa-trash"></i>&nbsp;reset</button>
  </div>
  </form>
</div>
<?= $this->endSection() ?>