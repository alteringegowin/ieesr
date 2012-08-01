<div id="login" class="container">
    <div class="row">	
            <form class="form-horizontal" action="<?php echo current_url() ?>" method="post" >
                <?php if (validation_errors()): ?>
                    <div class="alert alert-error">
                        <?php echo validation_errors(); ?>
                    </div>	
                <?php endif; ?>
                <?php if (isset($error)): ?>
                    <div class="alert alert-error">
                        <?php echo $error; ?>
                    </div>	
                <?php endif; ?>
                <div class="span6">
                    <div class="control-group">
                        <label class="control-label" for="user_name">Nama Lengkap</label>
                        <div class="controls">
                            <input type="text" name="name" value="" id="user_name">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="email">Email</label>
                        <div class="controls">
                            <input type="text" name="email" value="" id="email">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="password">Password</label>
                        <div class="controls">
                            <input type="password" name="password" value="" id="password">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="password_confirm">Ulangi Password Anda</label>
                        <div class="controls">
                            <input type="password" name="password_confirm" value="" id="password_confirm">
                        </div>
                    </div>				

                    <div class="control-group">
                        <label class="control-label">Jenis Kelamin</label>
                        <div class="controls">
                            <label class="radio inline">
                                <input type="radio" name="jenis_kelamin" id="optionsRadios1" value="Laki-laki" checked="">
                                Laki-laki
                            </label>
                            <label class="radio inline">
                                <input type="radio" name="jenis_kelamin" id="optionsRadios2" value="Perempuan">
                                Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Rentang Usia</label>
                        <div class="controls">
                            <select name="usia">
                                <option value="0">--- Pilih Rentang Usia ---</option>
                                <option value="&lt; 18 thn">&lt; 18 thn</option>
                                <option value="18 - 25 thn">18 - 25 thn</option>
                                <option value="25 - 35 thn">25 - 35 thn</option>
                                <option value="35 - 45 thn">35 - 45 thn</option>
                                <option value="&gt; 45 thn">&gt; 45 thn</option>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Pekerjaan</label>
                        <div class="controls">
                            <select name="pekerjaan">
                                <option value="0">--- Pilih Pekerjaan ---</option>
                                <option value="Wiraswasta">Wiraswasta</option>
                                <option value="Karyawan Swasta">Karyawan Swasta</option>
                                <option value="Mahasiswa">Mahasiswa</option>
                                <option value="Pelajar">Pelajar</option>
                                <option value="Guru">Guru</option>
                                <option value="Wartawan">Wartawan</option>
                                <option value="PNS">PNS</option>
                                <option value="NGO/LSM">NGO/LSM</option>
                                <option value="Ibu/Bapak Rumah Tangga">Ibu/Bapak Rumah Tangga</option>
                                <option value="Pekerjaan Domestik">Pekerjaan Domestik</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Domisili</label>
                        <div class="controls">
                            <?php echo form_dropdown('propinsi_id', $ddPropinsi) ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Kota</label>
                        <div class="controls">
                            <input type="text" name="kota" value="" id="kota" class="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Pengeluaran Perbulan</label>
                        <div class="controls">
                            <select name="pengeluaran">
                                <option value="0">--- Pilih Pengeluaran ---</option>
                                <option value="&lt; 1 Juta">&lt; 1 Juta</option>
                                <option value="1 Juta s/d 2,5 Juta">1 Juta s/d 2,5 Juta</option>
                                <option value="2,5 juta s/d 5 juta">2,5 juta s/d 5 juta</option>
                                <option value="5 Juta s/d 10 juta">5 Juta s/d 10 juta</option>
                                <option value="&gt; 10 juta">&gt; 10 juta</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Jenis Tempat Tinggal</label>
                        <div class="controls">
                            <label class="radio inline">
                                <input type="radio" name="tipe_rumah" id="optionsRadios1" value="rumah" checked="checked">
                                Rumah
                            </label>
                            <label class="radio inline">
                                <input type="radio" name="tipe_rumah" id="optionsRadios2" value="kos">
                                Kos
                            </label>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Jumlah Orang Dalam Rumah/Kost</label>
                        <div class="controls">
                            <input type="text" name="total_penghuni" value="" id="total_penghuni" class="span1">
                        </div>
                    </div>
                    </div>
                    <div class="span6">
	                    <p>Berapa Jumlah kendaraan bermotor yang anda miliki</p>
                    <div class="control-group">
                        <label class="control-label">a. Mobil</label>
                        <div class="controls">
                            <div class="input-append">
                                <input class="span1" id="appendedInput" size="16" type="text" name="total_mobil"><span class="add-on">Buah</span>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">b. Motor</label>
                        <div class="controls">
                            <div class="input-append">
                                <input class="span1" id="appendedInput" size="16" type="text" name="total_motor"><span class="add-on">Buah</span>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">c. Lainnya</label>
                        <div class="controls">
                            <input class="span2" id="appendedInput" name="jenis_lainnya" type="text">
                            <div class="input-append">
                                <input class="span1" id="appendedInput" size="16" type="text" name="total_lainnya"><span class="add-on">Buah</span>
                            </div>
                        </div>
                    </div>
                    <p></p>
                    <div class="control-group">
                        <label class="control-label">Berapa jarak tempuh kendaraan ke tempat beraktifitas (kerja / kampus / sekolah / lainnya)</label>
                        <div class="controls">
                            <div class="input-append">
                                <input class="span1" id="appendedInput" size="16" type="text" name="jarak_tempuh"><span class="add-on">Km</span>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">AMDK (Air Minum Dalam Kemasan) yang dikonsumsi dalam 1 minggu (isi 600 ml/botol) ?</label>
                        <div class="controls">
                            <select name="amdk">
                                <option value="">--- Pilih Salah Satu ---</option>
                                <option value="tidak mengkonsumsi">tidak mengkonsumsi</option>
                                <option value="1 s/d 2 botol">1 s/d 2 botol</option>

                                <option value="3 s/d 5 botol">3 s/d 5 botol</option>
                                <option value="&gt; 5 botol">&gt; 5 botol</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Dalam setahun berapa kali Anda bepergian dengan menggunakan pesawat terbang?</label>
                        <div class="controls">
                            <div class="input-append">
                                <input class="span" id="appendedInput" size="16" type="text" name="total_transit"><span class="add-on">Kali</span>
                            </div>
                        </div>
                    </div>
                    </div>
                    <hr />
                    <div class="clearfix"></div>
                    <div class="pull-right" style="margin-right:79px">
                        <a href="<?php echo site_url() ?>" class="btn">
                            Cancel
                        </a>
                        <button type="submit" name="submit" value="login" class="btn btn-warning">
                            Register
                        </button>
                    </div>
                    <br />
                    
            </form>

    </div>
</div>
