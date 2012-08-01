<script type="text/javascript">

    function number_format( number, decimals, dec_point, thousands_sep ) {
        // http://kevin.vanzonneveld.net
        // +   original by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
        // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
        // +     bugfix by: Michael White (http://crestidg.com)
        // +     bugfix by: Benjamin Lupton
        // +     bugfix by: Allan Jensen (http://www.winternet.no)
        // +    revised by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)    
        // *     example 1: number_format(1234.5678, 2, '.', '');
        // *     returns 1: 1234.57     
 
        var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
        var d = dec_point == undefined ? "," : dec_point;
        var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
        var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
    
        return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
    }
</script>
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
        <?php $this->load->view('baseline/step-2') ?>     
    </div>                      
    <div id="step-3">
        <?php $this->load->view('baseline/step-3') ?> 
    </div>
    <div id="step-4">
        <?php $this->load->view('baseline/step-4') ?> 
    </div>
    <div id="step-5">
        <?php $this->load->view('baseline/step-5') ?> 

    </div>
    <div id="step-6">
        <?php $this->load->view('baseline/step-6') ?> 
    </div>
</div>
<!-- End SmartWizard Content --> 

<script type="text/javascript" src="<?php echo $themes ?>js/baseline-listrik.js"></script>