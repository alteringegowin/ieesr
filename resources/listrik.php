<?php include('header.php')?>


 <!-- Smart Wizard -->
  		<div id="wizard" class="swMain">
  			<ul>
  				<li><a href="#step-1">
                <label class="stepNumber">1</label>
                <span class="stepDesc">
                   Penerangan<br />
                </span>
            </a></li>
  				<li><a href="#step-2">
                <label class="stepNumber">2</label>
                <span class="stepDesc">
                   Peralatan Dapur<br />
                </span>
            </a></li>
  				<li><a href="#step-3">
                <label class="stepNumber">3</label>
                <span class="stepDesc">
                   Peralatan Rumah Tangga<br />
                </span>                   
             </a></li>
  			<li><a href="#step-4">
                <label class="stepNumber">4</label>
                <span class="stepDesc">
                   Peralatan Pribadi<br />
                </span>                   
            </a></li>
            <li><a href="#step-5">
                <label class="stepNumber">5</label>
                <span class="stepDesc">
                   Hiburan<br />
                </span>                   
            </a></li>
            <li><a href="#step-6">
                <label class="stepNumber">6</label>
                <span class="stepDesc">
                   Informasi dan Komunikasi<br />
                </span>                   
            </a></li>
  			</ul>
			<div id="step-1">	
	            <h2 class="StepTitle">Step 1 Content</h2>           			
	        </div>
	        
	  		<div id="step-2">
	            <h2 class="StepTitle">Step 2 Content</h2>	         
	        </div>                      
	  		<div id="step-3">
	            <h2 class="StepTitle">Step 3 Content</h2>
	        </div>
	  		<div id="step-4">
	            <h2 class="StepTitle">Step 4 Content</h2>	                			
	        </div>
	        <div id="step-5">
	            <h2 class="StepTitle">Step 5 Content</h2>	                			
	        </div>
	        <div id="step-6">
	            <h2 class="StepTitle">Step 6 Content</h2>	                			
	        </div>
  		</div>
<!-- End SmartWizard Content --> 
 	
 </div>
 <script>
	$(document).ready(function(){
        $('#wizard').smartWizard({
			contentURL:'service-listrik.php',
			contentCache:false,
			onFinish:onFinishCallback
		});
		function onFinishCallback(){
/* 			$('.buttonFinish').attr('href', 'http://google.com'); */
		}
	});
</script>
<?php include('footer.php')?>