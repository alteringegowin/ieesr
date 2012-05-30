<div style="width:720px;">
    <div style="float: right;">
        <img src="<?php echo $themes ?>img/bus.png" height="48" width="48"  />
    </div>
    <h3>Transportasi Jarak Jauh</h3>
    <p>Lorem Ipsum Dolor sit amet</p>
    <form id="jarak-jauh" class="form-horizontal modalForm transjauh">
        <fieldset>	   		
            <div class="control-group">
                <label class="control-label" for="input01">Jenis Penerbangan</label>
                <div class="controls">
                    <label for="domestik" class="radio inline">
                        <input name="jenis" type="radio" id="inlineCheckbox1" value="domestik"> Domestik
                    </label>
                    <label for="internasional" class="radio inline">
                        <input name="jenis" type="radio" id="inlineCheckbox2" value="internasional"> Internasional
                    </label>
                </div>
            </div>
            <div id="domestik">
                <div class="control-group">
                    <label class="control-label" for="input01">Tipe Pesawat</label>
                    <div class="clonedInput">
                        <select id="select01" class="span2">
                            <option>Boeing 737-600</option>
                            <option>Boeing 737-700</option>                
                        </select>
                        &nbsp;Jumlah Transit:
                        <input class="span1" id="" size="16" type="text" />
                    </div>
                    <input type="button" style="float:right" class="btn btn-mini btn-primary" id="btnAdd" value="Tambah" />
                    <input type="button" style="float:right" class="btn btn-mini btn-primary" id="btnDel" value="Delete" />
                </div>
            </div>
            <div id="internasional">
                <div class="control-group">
                    <label class="control-label" for="input01">Tipe Pesawat</label>
                    <div class="controls">
                        <select id="select01" class="span2">
                            <option>Boeing 737-800</option>
                            <option>Boeing 737-900</option>                
                        </select>
                        &nbsp;Jumlah Transit:
                        <input class="span1" id="" size="16" type="text" />
                    </div>
                </div>
            </div>
        </fieldset>
    </form>
</div>
<script>
    $(document).ready(function(){
 
        $("input[name$='jenis']").click(function(){
 
            var radio_value = $(this).val();
 
            if(radio_value=='domestik') {
                $("#domestik").show();
                $("#internasional").hide();
            }
            else if(radio_value=='internasional') {
                $("#internasional").show();
                $("#domestik").hide();
            }
        });
 
        $("#domestik").hide();
        $("#internasional").hide();
 
    });
    $(document).ready(function(){
        $('#btnAdd').click(function() {
            var num		= $('.clonedInput').length;
            var newNum	= new Number(num + 1);

            var newElem = $('#input' + num).clone().attr('id', 'input' + newNum);

            newElem.children(':first').attr('id', 'name' + newNum).attr('name', 'name' + newNum);
            $('#input' + num).after(newElem);
            $('#btnDel').attr('disabled','');

            if (newNum == 100)
                $('#btnAdd').attr('disabled','disabled');
        });

        $('#btnDel').click(function() {
            var num	= $('.clonedInput').length;

            $('#input' + num).remove();
            $('#btnAdd').attr('disabled','');

            if (num-1 == 1)
                $('#btnDel').attr('disabled','disabled');
        });

        $('#btnDel').attr('disabled','disabled');
    })

</script>