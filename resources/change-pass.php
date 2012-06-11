
<?php include('header.php')?>
    <div class="container dashboard">
      <div class="row">
        <div class="span3">
          
          <div class="well" style="padding: 8px 0;">
	        <ul class="nav nav-list">
	        	<li class=""><a href="dashboard.php"><i class="icon-home"></i> Dashboard</a></li>
		        <li class="active"><a href="profile.php"><i class="icon-white icon-user"></i> Profile</a></li>
		        <li><a href="#"><i class="icon-lock"></i> Ganti Password</a></li>
		        <li><a href="#"><i class="icon-download-alt"></i> Download Komitmen (PDF)</a></li>
		        <li><a href="#"><i class="icon-off"></i> Logout</a></li>
	        </ul>
	      </div>
	      
	      <div class="well">
	      	<h3>Emisi</h3>      		
      		<div class="alert alert-success">
          		<p>Emisi Harian anda: <br /><strong>16091.263</strong></p>
				<p>Emisi Tahunan Anda: <br /><strong>5873310.995</strong></p>
				<p>Emisi Listrik : <br /><strong>0.000</strong></p>
				<p>Emisi Sampah : <br /><strong>0.000</strong></p>
				<p>Emisi Transportasi : <br /><strong>0.000</strong></p>
			</div>
	      </div>
        </div><!--/span-->
        <div class="span9">
          <!-- dashboard container -->
          <div class="profileContainer">
	        <!-- /dashboard header -->
            <div class="profileHeader">
	            <h3>Data Profile</h3>
	            <hr />
            </div>
	        <!-- /dashboard header -->
	        
	        <!-- dashboard Content -->
            <div class="profileContent">
	            <div class="row">
		            	
		            
		            <div class="span9">
		            <form class="form-horizontal">
				        <fieldset>
				          <div class="control-group">
				            <label class="control-label" for="input01">Old Password</label>
				            <div class="controls">
				              <input type="password" class="input-xlarge" id="input01">
				            </div>
				          </div>
				          <div class="control-group">
				            <label class="control-label" for="input01">New Password</label>
				            <div class="controls">
				              <input type="password" class="input-xlarge" id="input01">
				            </div>
				          </div>
				          <div class="control-group">
				            <label class="control-label" for="input01">Confirm Password</label>
				            <div class="controls">
				              <input type="password" class="input-xlarge" id="input01">
				            </div>
				          </div>
				          
				          <div class="form-actions">
				            <button type="submit" class="btn btn-info">Change Password</button>
				            <button class="btn btn-warning">Cancel</button>
				          </div>
				        </fieldset>
				      </form>
		            </div>
	            </div>
            </div>
            <!-- /dashboard content -->
            
          </div>
          <!-- /dashboard container -->
            
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->
<?php include('footer.php')?>