<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Employee performance monitoring</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="card">
    <div class="card-header ">
        <h4>Insert new goal</h4>
    </div>
    <div class="card-body col-md-6">
        <form action="<?= site_url('manager/create') ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
                <label>description goal</label>
                <input type="text" name="description" class="form-control" required>
            </div>
            <div class="form-group">
                <label>value goal &emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</label>
                <input min="" max="100" type="number" id="myinput" placeholder='max 100' required name="value">

            </div>
            <div class="form-group">
                <label>actual accomplishment &emsp;&emsp;</label>

                <input min="" max="" type="number" id="myacc" placeholder='' name="actual"> %

            </div>
            <div class="form-group">
                <label>note goal</label>
                <input type="text" class="form-control" name="note">
            </div>

            <div class="form-group">
                <label>periodic time </label>

                <select class="form-control" name="periodic" required>

                    <option value=0>---select---</option>
                    <?php foreach ($periodic as $index): ?>
                        <?= $start = $index["start_time"];
                        $end = $index["end_time"] ?>
                        <option value="<?= $index["periodic_id"] ?>"><?= $start;
                          echo "/ $end" ?>
                        </option>
                    <?php endforeach ?>
                </select>

            </div>
            <div class="form-group">
                <label>staff </label>

                <select class="form-control" name="staff" required>

                    <option value=0>---select---</option>
                    <?php foreach ($staff as $index): ?>
                        <?= $start = $index["users_id"];
                        $end = $index["name_user"] ?>
                        <option value="<?= $index["users_id"] ?>"><?= $start?>&emsp;|&emsp;<?=
                          $end ?>
                        </option>
                    <?php endforeach ?>
                </select>

            </div>

            <button type="submit" class="btn btn-icon icon-left btn-primary"><i
                    class="fas fa-paper-plane"></i>&nbsp;save</button>

            <button type="reset" class="btn btn-icon icon-left btn-warning"><i
                    class="fas fa-edit"></i>&nbsp;reset</button>
    </div>
    </form>
</div>

<?= $this->endSection() ?>