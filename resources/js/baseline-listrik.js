$(document).ready(function(){
    $('#wizard').smartWizard({
        contentCache:false,
        onLeaveStep:leaveAStepCallback,
        onFinish:onFinishCallback
    });
        
    function onFinishCallback(){
            
        var lampu = $('#form-listrik').serialize().replace('%5B%5D', '[]');
        var dapur = $('#form-dapur').serialize();
        var rumah_tangga = $('#form-rumah-tangga').serialize();
        var pribadi = $('#form-pribadi').serialize();
        var elektronik = $('#form-elektronik').serialize();
        var komunikasi = $('#form-komunikasi').serialize();
        $.ajax({
            type: 'POST',
            url: SITE_URL+'baseline/finish/listrik',
            data: {
                lampu:lampu,
                dapur:dapur,
                rumah_tangga:rumah_tangga,
                pribadi:pribadi,
                elektronik:elektronik,
                komunikasi:komunikasi
            }
        }).done(function() { 
            window.location.href = SITE_URL+'/baseline/sampah';
        });
        return false;
    }
    function leaveAStepCallback(obj){
        return true;
    }
    
    //-------------------------------------------------------------------------/

    $("#form-listrik").unbind("click").delegate('#btnAddListrik','click',function(){
        var c = $("#pat").html();
        $("#c").append(' <div class="controls cloned" style="margin-left: 407px">'+c+'<a href="#" class="btnDelListrik"><i class="icon-remove"></i></a></div>');
    });
            
    $("#form-listrik").delegate('.btnDelListrik','click',function(){
        $(this).parents("div:first").remove();
        total_listrik();
        return false;
    });
    
    function total_listrik(){
        var s = $("#form-listrik").serialize();
        $.ajax({
            type: 'POST',
            url: SITE_URL+'/baseline/total/lampu',
            data: s
        }).done(function(t) { 
            $("#total_lampu_text").html(t);
            $("#total_lampu").val(t);
        });
        return false;
    }
    $("#btn-total-lampu").click(total_listrik);
    $("#form-listrik").delegate('.recount','blur',total_listrik);
       
});