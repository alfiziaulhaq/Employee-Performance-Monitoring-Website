<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Employee performance monitoring</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header ">
        <h4>update periodic time data</h4>
    </div>
    <div class="card-body col-md-6">
        <form action="<?= site_url('admin/update_periodic/') . $periodic->periodic_id ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label>start time</label>
                <input type="date" name="start_time" value="<?= $periodic->start_time ?>" class="form-control datepicker">
            </div>
            <div class="form-group">
                <label>end time</label>
                <input type="date" name="end_time" value="<?= $periodic->end_time ?>" class="form-control datepicker">
            </div>
            <div>
                <h3>Note : </h3>
            <h5>archive this periodic time at the end of this  periodic timeline. after that the manager user can approve all fixed targets for a staff and get staff kpi results.</h5>
                <label class="custom-switch mt-2">
                    <input type="checkbox" name="status_time" value=1 class="custom-switch-input">
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description">archive this periodic time</span>
                </label>
                <label class="custom-switch mt-2">
                    <input type="checkbox" name="agree" value=1 class="custom-switch-input">
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description">re approve to archive this periodic time</span>
                </label>
            </div>
            <div>&nbsp;</div>
            <button type="submit" class="btn btn-icon icon-left btn-primary"><i
                    class="fas fa-paper-plane"></i>&nbsp;save</button>
            &emsp;&emsp;

            <button type="reset" class="btn btn-icon icon-left btn-warning"><i
                    class="fas fa-trash"></i>&nbsp;reset</button>
    </div>

    </form>
</div>
<?= $this->endSection() ?>