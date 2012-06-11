<?php include('header.php')?>

 <!-- Smart Wizard -->
  		<div id="wizard" class="swMain">
  			<ul>
  				<li><a href="#step-1">
                <label class="stepNumber">1</label>
                <span class="stepDesc">
                   Sampah<br />
                </span>
            </a></li>
  			</ul>
			<div id="step-1">	
	            <h2 class="StepTitle">Step 1 Content</h2>           			
	        </div>
	        
  		</div>
<!-- End SmartWizard Content --> 
 	
 </div>
 <script>
	$(document).ready(function(){
        $('#wizard').smartWizard({
			contentURL:'service-sampah.php',
			contentCache:false,
			onFinish:onFinishCallback
		});
		function onFinishCallback(){
			$('.buttonFinish').attr('href', 'http://google.com');
		}
	});
</script>
<?php include('footer.php')?>