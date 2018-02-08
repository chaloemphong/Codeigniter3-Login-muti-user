<br />
<div class="row">
    <h2>Welcome User, You are successfully logged in. ADmin</h2>
   		Name     : <?php echo $this->session->userdata('name') ?></br>
		Email : <?php echo $this->session->userdata('email') ?></br>
    <div class="col-sm-4">
        <a class="btn btn-danger" href="<?php  echo base_url().'login/logout';?>">Logout</a>
    </div>
</div>