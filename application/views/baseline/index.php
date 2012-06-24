<div id="main" class="container">
    <!-- Smart Wizard -->
    <div id="wizard" class="swMain">
        <ul>
            <li>
                <a href="#step-1">
                    <label class="stepNumber">1</label>
                    <span class="stepDesc">Penerangan<br /></span>
                </a>
            </li>
            <li><a href="#step-2">
                    <label class="stepNumber">2</label>
                    <span class="stepDesc">
                        Peralatan Dapur<br />
                    </span>
                </a>
            </li>
            <li>
                <a href="#step-3">
                    <label class="stepNumber">3</label>
                    <span class="stepDesc">
                        Peralatan Rumah Tangga<br />
                    </span>                   
                </a>
            </li>
            <li>
                <a href="#step-4">
                    <label class="stepNumber">4</label>
                    <span class="stepDesc">
                        Peralatan Pribadi<br />
                    </span>                   
                </a>
            </li>
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
            <?php $this->load->view('baseline/step-1') ?>          			
        </div>

        <div id="step-2">
            
        </div>                      
        <div id="step-3">
            
        </div>
        <div id="step-4">
        </div>
        <div id="step-5">
            
        </div>
        <div id="step-6">
        </div>
    </div>
    <!-- End SmartWizard Content --> 

</div>
<script>
    $(document).ready(function(){
        $('#wizard').smartWizard({
            contentCache:false,
            onLeaveStep:leaveAStepCallback,
            onFinish:onFinishCallback
        });
        
        function onFinishCallback(){
            
            var f = $('#form-komunikasi').serialize();
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('create/submit') ?>/6/step-6",
                data: f
            }).done(function() { 
                //window.location.href = '<?php echo site_url('create/sampah') ?>';
            });
            return false;
        }
        function leaveAStepCallback(obj){
            return true;
        }
            
       
    });
</script>