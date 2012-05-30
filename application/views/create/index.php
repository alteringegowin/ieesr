<div id="main" class="container">
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
            contentURL:'<?php echo site_url('create/step') ?>',
            contentCache:false,
            onLeaveStep:leaveAStepCallback,
            onFinish:onFinishCallback
        });
        
        function onFinishCallback(){
            
            var f = $('#form-komunikasi').serialize();
            console.log(f);
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('create/submit') ?>/6/step-6",
                data: f
            });  
            window.location.href = '<?php echo site_url('sampah') ?>';
            return false;
        }
        function leaveAStepCallback(obj){
            var step = obj.attr('rel');
            
            switch(step)
            {
                case '1':
                    for(i=0;i<10;i++)
                    {
                        var e = $("#input-"+i);
                        if(e.is(":visible")){
                        }else{
                            var c = 'items-'+i+'-daya';
                            $("#"+c).val(0);
                        }
                    }
                    var f = $('#listrik').serialize();
                    break;
                case '2':
                    var f = $('#form-dapur').serialize();
                    break;
                case '3':
                    var f = $('#form-rumah-tangga').serialize();
                    break;
                case '4':
                    var f = $('#form-pribadi').serialize();
                    break;
                case '5':
                    var f = $('#form-elektronik').serialize();
                    break;
                case '6':
                    var f = $('#form-komunikasi').serialize();
                    break;
                default:
            }
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('create/submit') ?>/"+step+'/step-'+step,
                data: f
            });  
            return true;
        }
            
       
    });
</script>