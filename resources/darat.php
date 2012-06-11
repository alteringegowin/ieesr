<?php include('header.php')?>
<div id="main" class="container">
 <!-- Smart Wizard -->
  		<div id="wizard" class="swMain">
  			<ul>

  				<li><a href="#step-1">
                <label class="stepNumber">1</label>
                <span class="stepDesc">
                   Transportasi Darat<br />
                </span>
	            </a>
            </li>
  				<li><a href="#step-1">
                <label class="stepNumber">2</label>
                <span class="stepDesc">
                   Transportasi Non Darat<br />
                </span>
	            </a>
            </li>
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
			contentURL:'service-transport.php',
			contentCache:false,
			onFinish:onFinishCallback
		});
		function onFinishCallback(){
			$('.buttonFinish').click(function(){
				window.location('listrik.php');
			});
		}
	});
</script>
<?php include('footer.php')?>