<li class="menu-header"></li>


<?php $roles = userLogin()->roles;
if ($roles == 3): ?>
  <li>
    <a href="<?= site_url('admin/dash') ?>" class="dash"><i class="fa fa-home"></i><span>Dashboard</span></a>
  </li>
  <li>
    <a href="<?= site_url('admin/employee_db') ?>" class="nav-link"><i class="	fa fa-users"></i><span>Employee
        Database</span></a>
  </li>
  <li>
    <a href="<?= site_url('admin/periodic_db') ?>" class="nav-link "><i class="	fa fa-calendar"></i><span>Periodic
        Database</span></a>
  </li>
<?php endif ?>

<?php if ($roles == 2): ?>
  <li>
    <a href="<?= site_url('manager/dash') ?>" class="nav-link "><i class="fa fa-home"></i><span>Dashboard</span></a>
  </li>
  <li>
    <a href="<?= site_url('manager/goal_db') ?>" class="nav-link "><i class="fa fa-clipboard"></i><span>Add
        Goal</span></a>
  </li>
  <li>
    <a href="<?= site_url('manager/staff_db') ?>" class="nav-link"><i class="fa fa-edit"></i><span>Assign Rating
        Goal</span></a>
  </li>
  <li>
    <a href="<?= site_url('manager/ratings_db') ?>" class="nav-link "><i class="fa fa-chart-bar"></i><span>KPI Results
        Database</span></a>
  </li>
<?php endif ?>

<?php if ($roles == 1): ?>
  <li>
    <a href="<?= site_url('staff/dash') ?>" class="nav-link "><i class="fa fa-home"></i><span>Dashboard</span></a>
  </li>
  <li>
    <a href="<?= site_url('staff/my_goals') ?>" class="nav-link "><i class="fa fa-tasks"></i><span>My Goals</span></a>
  </li>
  <li>
    <a href="<?= site_url('staff/my_kpi') ?>" class="nav-link "><i class="fa fa-chart-bar"></i><span>My KPI
        Score</span></a>
  </li>
<?php endif ?>