<h2>Peralatan Dapur</h2>
<hr />
<div style="clear:both"></div>
<div class="well formInfo">
	<div class="imgInfo">
	<a href="pop/rice-cooker.php" class="pop fancybox.ajax">
		<img src="img/icons/rice-cooker.png" width="40"  />
		<p>Rice Cooker</p>
	</a>
	</div>
	<div class="imgInfo">
		<a href="pop/microwave.php" class="pop fancybox.ajax">
			<img src="img/icons/microwave.png" width="70"  />
			<p>Microwave</p>
		</a>
	</div>
	
	<div class="imgInfo">
		<img src="img/icons/kulkas.png" width="30"  />
		<p>Kulkas</p>
	</div>
	
	<div class="imgInfo">
		<img src="img/icons/freezer.png" width="50"  />
		<p>Freezer</p>
	</div>
	
	<div style="clear:both"></div>
</div>
<form class="form-horizontal modalForm">
	  <fieldset>
		    <div class="control-group">
		      <label class="control-label" for="input01">1. Pemakaian kulkas &gt; 300 lt </label>
		      <div class="controls">
		      		<label class="radio inline">
		                <input type="radio" id="inlineCheckbox1" value="option1" > ya
					</label>
					<label class="radio inline">
	                	<input type="radio" id="inlineCheckbox2" value="option2"> Tidak
	                </label>
		    	</div>
	   		</div>
	   		<div class="control-group">
			    <label class="control-label" for="input01">2. Pemakaian kulkas 300 - 500 lt</label>
			  	<div class="controls">
		      		<label class="radio inline">
		                <input type="radio" id="inlineCheckbox1" value="option1" > ya
					</label>
					<label class="radio inline">
	                	<input type="radio" id="inlineCheckbox2" value="option2"> Tidak
	                </label>
		    	</div>
	   		</div>
	   		
	   		<div class="control-group">
		      <label class="control-label" for="input01">3. Pemakaian kulkas &lt; 500 lt</label>
		      <div class="controls">
		      		<label class="radio inline">
		                <input type="radio" id="inlineCheckbox1" value="option1" > ya
					</label>
					<label class="radio inline">
	                	<input type="radio" id="inlineCheckbox2" value="option2"> Tidak
	                </label>
		    	</div>
	   		</div>
	   		
	   		<div class="control-group">
		      <label class="control-label" for="input01">4. Freezer (Pendingin daging/es krim)</label>
		      <div class="controls">
		      		<label class="radio inline">
		                <input type="radio" id="inlineCheckbox1" value="option1" > ya
					</label>
					<label class="radio inline">
	                	<input type="radio" id="inlineCheckbox2" value="option2"> Tidak
	                </label>
		    	</div>
	   		</div>
	   		
	   		<div class="control-group">
		      <label class="control-label" for="input01">5. Rice Cooker</label>
		      <div class="controls">
	              <div class="input-append">
	                <input class="span1" id="" size="16" type="text"><span class="add-on">jam</span>
	              </div>
	          </div>
	   		</div>
	   		
	   		<div class="control-group">
		      <label class="control-label" for="input01">6. Microwave Oven</label>
		      <div class="controls">
	              <div class="input-append">
	                <input class="span1" id="" size="16" type="text"><span class="add-on">jam</span>
	              </div>
	          </div>
	   		</div>
	   	
	   		
	  </fieldset>
	</form>
	<?php include('includes/total.php')?>
	<script>
		$(document).ready(function(){
			$( "#radio" ).buttonset();
			$('#pop').popover({
				placement: 'left'
			})
	});
	</script>