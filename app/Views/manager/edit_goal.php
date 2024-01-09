<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Employee performance monitoring</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="card">
    <div class="card-header ">
        <h4>Assigned goal accomplishment</h4>
    </div>
    <div class="card-body col-md-6">
        <form action="<?= site_url('manager/update/' .$goal->goal_id) ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
                <label>description goal</label>
                <input type="text" name="description" class="form-control" value="<?=$goal->description_goal?>" required>
            </div>
            <div class="form-group">
                <label>value goal &emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</label>
                <input min="" max="100" type="number" id="myinput" required name="value" value="<?=$goal->value_goal?>">

            </div>
            <div class="form-group">
                <label>actual accomplishment &emsp;&emsp;</label>

                <input min="" max="" type="number" id="myacc" name="actual" value="<?=$goal->actual_acc?>" required> %

            </div>
            <div class="form-group">
                <label>note goal</label>
                <input type="text" class="form-control" name="note" value="<?=$goal->note_goal?>" >
            </div>

            <div>
                <label class="custom-switch mt-2">
                    <input type="checkbox" name="status_goal" value=1 class="custom-switch-input">
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description">approve to fixed goal status</span>
                </label> <p></p>
                <label class="custom-switch mt-2">
                    <input type="checkbox" name="agree" value=1 class="custom-switch-input">
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description">re approve to fixed goal status</span>
                </label>
            </div>
            <p></p>
            <button type="submit" class="btn btn-icon icon-left btn-primary"><i
                    class="fas fa-paper-plane"></i>&nbsp;save</button> &emsp;&emsp;&emsp;

            <button type="reset" class="btn btn-icon icon-left btn-warning"><i
                    class="fas fa-edit"></i>&nbsp;reset</button>
    </div>
    </form>
</div>

<?= $this->endSection() ?>