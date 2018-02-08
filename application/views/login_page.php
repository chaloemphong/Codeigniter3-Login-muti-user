<br />

<div class="col-md-10">
<div class="panel panel-default">
  <div class="panel-heading">
  <h2>Login Page</h2>
  </div>
<div class="panel-body">
<form action="<?php echo base_url(); ?>login/doLogin" method="post">
    <?php if ($this->session->flashdata()) { ?>
        <div class="alert alert-warning">
            <?= $this->session->flashdata('msg'); ?>
        </div>
    <?php } ?>
    <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" name="email" required class="form-control" id="email">
    </div>
    <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" name="password" required class="form-control" id="pwd">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
   
</form>

  </div>
</div>
</div>