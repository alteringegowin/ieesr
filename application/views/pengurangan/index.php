
<!-- Smart Wizard -->
<div id="wizard" class="swMain">
    <ul>
        <li><a href="#step-1">
                <label class="stepNumber">1</label>
                <span class="stepDesc">Penerangan<br /></span>
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
        <?php $this->load->view('pengurangan/listrik-form-1') ?>
    </div>

    <div id="step-2">
        <?php $this->load->view('pengurangan/listrik-form-2') ?>
    </div>                      
    <div id="step-3">
        <?php $this->load->view('pengurangan/listrik-form-3') ?>
    </div>
    <div id="step-4">
        <?php $this->load->view('pengurangan/listrik-form-4') ?>
    </div>
    <div id="step-5">
        <?php $this->load->view('pengurangan/listrik-form-5') ?>    			
    </div>
    <div id="step-6">
        <?php $this->load->view('pengurangan/listrik-form-6') ?>    			
    </div>
</div>
<!-- End SmartWizard Content --> 

</div>
<script>
    $(document).ready(function(){
        $('#wizard').smartWizard({
            contentCache:false,
            onFinish:onFinishCallback
        });
        function onFinishCallback(){
            var c = $('#form-step-1').serialize();
            var d = $('#form-step-2').serialize();
            var e = $('#form-step-3').serialize();
            var f = $('#form-step-4').serialize();
            var g = $('#form-step-5').serialize();
            var h = $('#form-step-6').serialize();
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('pengurangan/submit') ?>/f1",
                data: {f1:c,f2:d,f3:e,f4:f,f5:g,f6:h,f7:h}
            }).done(function() { 
               //window.location.href = '<?php echo site_url('pengurangan/sampah') ?>';
            });   
            return false;
        }
    });
</script>