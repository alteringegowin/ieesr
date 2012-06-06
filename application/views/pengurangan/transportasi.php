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
            <li><a href="#step-2">
                    <label class="stepNumber">2</label>
                    <span class="stepDesc">
                        Transportasi Non Darat<br />
                    </span>
                </a>
            </li>
        </ul>

        <?php $this->load->view('pengurangan/transportasi-darat') ?>
        <?php $this->load->view('pengurangan/transportasi-udara') ?>


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
            var form1 = $("#jarak-dekat").serialize();
            var form2 = $("#non-darat").serialize();
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('pengurangan/submit') ?>/darat",
                data: form1
            }).done(function() { 
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('pengurangan/submit') ?>/udara",
                    data: form2
                }).done(function() { 
                    window.location.href = '<?php echo site_url('pengurangan/confirm') ?>';
                });   
            });
            
            return false;
        }
        
        function leaveAStepCallback(obj){
            var step = obj.attr('rel');
            if(step == 1){
                var form1 = $("#jarak-dekat").serialize();
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('pengurangan/submit') ?>/darat",
                    data: form1
                });  
            }else{
                var form2 = $("#non-darat").serialize();
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('pengurangan/submit') ?>/udara",
                    data: form2
                });  
            }
            return true;
        }
        
        $("input[name$='tipe']").click(function(){
            var radio_value = $(this).val();
            if(radio_value == 'pribadi'){
                $("#select_umum").hide();
                $("#select_pribadi").show();
                $("#jarak_or_konsumsi").show();
            }else if(radio_value == 'umum'){
                $("#select_pribadi").hide();
                $("#select_umum").show();
                $("#jarak_or_konsumsi").show();
            }
            if(radio_value=='jarak') {
                $("#jarak").show();
                $("#hidden_jarak").show();
                $("#hidden_konsumsi").hide();
            }
            else if(radio_value=='mingguan') {
                $("#jarak").show();
                $("#hidden_jarak").hide();
                $("#hidden_konsumsi").show();
            }
        });
 
        //$("#konsumsi").blur(function(){
        $("#jarak-dekat").delegate('#konsumsi','blur',function(){
            var input = $(this).val();
            var tipe = $("input[name='tipe']:checked").val();
            if(tipe == 'umum'){
                var vehicle = $('#select_umum').val();
            }else{
                var vehicle = $('#select_pribadi').val();
            }
            $.post('<?php echo site_url('transportasi/hitung_konsumsi_darat') ?>', {id:vehicle,f:input}, function(r){
                $("#total_darat").val(r);
                $("#total_darat_text").html(r);
            })
            
        })
        $("#jarak-dekat").delegate('#jarak_tempuh','blur',function(){
            var input = $(this).val();
            var tipe = $("input[name='tipe']:checked").val();
            if(tipe == 'umum'){
                var vehicle = $('#select_umum').val();
            }else{
                var vehicle = $('#select_pribadi').val();
            }
            $.post('<?php echo site_url('transportasi/hitung_jarak_darat') ?>', {id:vehicle,f:input}, function(r){
                $("#total_darat").val(r);
                $("#total_darat_text").html(r);
            })
        })
        
        
        
        $("#step-2").delegate('input[name=jenis_penerbangan]','click',function(){
            var radio_value = $(this).val();
            var domestik = '<option value="1">Boeing 737-600</option><option value="2">Boeing 737-700</option>';
            var internasional = '<option value="3">Boeing 737-800</option><option value="4">Boeing 737-900</option>    ';
            $("#after-jenis-penerbangan").show();
            if( radio_value=='domestik') {
                $("#tipe_pesawat").html(domestik);
            }
            else if(radio_value=='internasional') {
                $("#tipe_pesawat").html(internasional);
            }
        });
        
        $("#step-2").delegate('#jumlah_penumpang','blur',hitungUdara);
        $("#step-2").delegate('#tipe_pesawat','change',hitungUdara);
        function hitungUdara(){
            var input = $('#jumlah_penumpang').val();
            var jenis = $("#tipe_pesawat").val();
            $.post('<?php echo site_url('transportasi/hitung_pesawat') ?>', {jenis:jenis,penumpang:input}, function(r){
                $("#total_pesawat").val(r);
                $("#total_pesawat_text").html(r);
                
            })
        }
 
        //$("#after-jenis-penerbangan").hide();
 
    });
    
    
            
</script>