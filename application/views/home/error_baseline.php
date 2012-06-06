<?php $df = $this->session->flashdata('baselinedata'); ?>
<div class="alert alert-danger">
    <h2 class="alert-heading">ERROR!</h2>
    <p>Anda Telah Mengisikan baseline pada tanggal <?php echo date('Y-m-d', strtotime($df->commitment_created)) ?></p>
    <p><a href="#" class="btn btn-danger">Hapus data ini terlebih dahulu</a></p>
    <p><a href="<?php echo site_url('komitmen')?>" class="btn btn-info">Download Komitmen</a></p>
</div>