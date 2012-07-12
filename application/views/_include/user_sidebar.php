
<div class="well" style="padding: 8px 0;">
    <?php $this->load->view('_include/user_navigation'); ?>
</div>

<?php get_komitmen_dashboard($user->user_id); ?>
<div class="well">
    <h3>Emisi</h3>      		
    <div class="alert alert-success">
        <p>Emisi Harian anda: <br /><strong>16091.263</strong></p>
        <p>Emisi Tahunan Anda: <br /><strong>5873310.995</strong></p>
        <p>Emisi Listrik : <br /><strong>0.000</strong></p>
        <p>Emisi Sampah : <br /><strong>0.000</strong></p>
        <p>Emisi Transportasi : <br /><strong>0.000</strong></p>
    </div>
</div>