
<?php include('header.php')?>
    <div class="container dashboard">
      <div class="row">
        <div class="span3">
          
          <div class="well" style="padding: 8px 0;">
	        <ul class="nav nav-list">
	        	<li class="active"><a href="dashboard.php"><i class="icon-home icon-white"></i> Dashboard</a></li>
		        <li class=""><a href="profile.php"><i class="icon-user"></i> Profile</a></li>
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
          <div class="dashboardContainer">
	        <!-- /dashboard header -->
            <div class="dashboardHeader">
            <h3>Selamat Datang, User</h3>
	        <hr />
            </div>
	        <!-- /dashboard header -->
	        
	        <!-- dashboard Content -->
            <div class="dashboardContent">
	            <div class="row">
	            <div class="span3">
		            <div class="well">

					  Profil Emisi Gas Rumah Kaca Langkah berikut ini dimaksudkan untuk menghitung produksi emisi gas rumah kaca dari aktivitas harian yang dilakukan. Silahkan menghitung emisi harian anda.
					  <p><a href="listrik.php" class="btn btn-primary btn-small disabled">Isi Baseline Emisi &raquo;</a></p>
					</div>
	            </div>
	            <div class="span3">
		            <div class="alert alert-success">
					   <p>Anda telah menghitung penggunaan emisi anda, silahkan melanjutkan dengan melakukan komitmen pengurangan emisi</p>
			            <p><a class="btn btn-primary btn-small" href="../iesr3s/listrik.php">Pengurangan Emisi</a>
					</div>
	            </div>
	            <div class="span3">
		            <div class="alert alert-success">
					 <p>Anda telah berkomitmen mengurangi emisi karbon, silakan cetak komitmen Anda di bawah ini</p>
		            <a class="btn btn-primary btn-small" href="#"><i class="icon-download-alt icon-white"></i> Download Komitmen</a>
					</div>
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