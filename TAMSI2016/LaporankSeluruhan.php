<?php include 'Header.php'; ?>
<ul class="breadcrumb">
        <li>
            <a href="#">Laporan</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Laporan Keseluruhan</h2>
            </div>
            <div class="box-content row">
                <div class="col-lg-12 col-md-12">
                    <div class="col-lg-12 col-md-12"> 
                
                <form method="post" id="form" target="_blank" action="Laporan/LSeluruh.php">
                 <div class="form-group has-success col-md-4">
                    <label class="control-label" >Bulan Awal</label>
                        <div class="form-control has-success">
                        <input type="hidden" name="hari" value="<?php echo $hariini; ?>">
                        <select id="bulanM" name="Bulan"  tabindex="2" >
                            <?php for($i=1; $i<=12; $i++) {
                            ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php } ?>
                        </select>
                        <select id="tahunM" name="Tahun" tabindex="2" >
                            <?php for($i=1999; $i<=2040; $i++) {
                            ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php } ?>
                        </select>
                        </div>

                         </br>
                            <div class="control-group">
                            <div class="controls">
                            <button type="submit" class="btn btn-primary ">Cetak</button>
                            <button type="reset" class="btn">Batal</button>
                            </div>
                            </div>
                </div>
                <div class="form-group has-success col-md-4">
                    <label class="control-label" >Sampai Bulan</label>
                        <div class="form-control has-success">
                        <select id="bulanA" name="BulanA"  tabindex="2" >
                            <?php for($i=1; $i<=12; $i++) {
                            ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php } ?>
                        </select>
                        <select id="tahunA" name="TahunA" tabindex="2" >
                            <?php for($i=1999; $i<=2040; $i++) {
                            ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php } ?>
                        </select>
                        </div>
                </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'Footer.php'; ?>