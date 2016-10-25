<!-- #section:basics/content.breadcrumbs -->
					<?php
					session_start();
					$id_ho = $_SESSION[id_ho];
					$id_bo = $_SESSION[id_bo];
					$hu_1 = $_GET['hu1'];
					?>
					<div class="breadcrumbs" id="breadcrumbs">
					<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script language="javascript">
$(function(){

// Fungsi Checkbox Pilih Semua
$("#pilihsemua").click(function () { // Jika Checkbox Pilih Semua di ceklis maka semua sub checkbox akan diceklis juga
$('.pilih').attr('checked', this.checked);
});

// Jika semua sub checkbox diceklis maka Checkbox Pilih Semua akan diceklis juga
$(".pilih").click(function(){

if($(".pilih").length == $(".pilih:checked").length) {
$("#pilihsemua").attr("checked", "checked");
} else {
$("#pilihsemua").removeAttr("checked");
}

});
});
</script>
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">Pengambilan</li>
							<li class="active">Starting Pack</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						<?php include "container.php"; ?>

						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>
								Pengambilan Starting Pack
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
                                <div class="clearfix">
                                <form action="build/build-pengambilan-sp/insert-temp-pengambilan-sp.php" method="POST" class="form-horizontal" role="form">
                                        <div>
                                        <input name="hak_akses" value="<?php echo $_SESSION[hak_akses]; ?>" type="hidden" />
								<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
												<thead>
												<tr>
													<th><center>No</center></th>
                                                    <th><center>HU 1</center></th>
                                                    <th><center>Material Name</center></th>
													<th><center>IP</center></th>
													<th><center>Pilih Semua
													<input type="checkbox" id="pilihsemua"/>
													</center></th>
												</tr>
												</thead>
												<tbody>
												<input name="hu_1" value="<?php echo $hu_1; ?>" type="hidden" />
												<?php 
												include "auth/autho.php";
												$tampil=mysql_query("select material_name, ip
																	from tb_sp
																	where hu_1='$hu_1' and id_kios='0' and id_sales='0' and id_ho='$id_ho'");
												$no=1;
												while ($row=mysql_fetch_array($tampil))
												{
												?>
												<tr>
													<td><center><?php echo $no; ?></center></td>
                                                    <td><center><?php echo $hu_1; ?></center></td>
													<td align="center"><?php echo $row[0]; ?></td>
                                                    <td><center><?php echo $row[1]; ?></center></td>
													<td><center>
													<?php echo "<input type='checkbox' class='pilih' name='pilih2[]' value='$row[1]'>"; ?>
													<input name="tgl_input" value="<?php echo date('Y-m-d'); ?>" type="hidden" />
													</center></td>	
												</tr>
												<?php 
												$no++;
												} 
												?>
												</tbody>
                                                <tr>
                                                	<td colspan="2">&nbsp;</td>
                                                    <td><center>Total</center></td>
                                                    <td><center><?php echo $no-1; ?></center></td>
													<td>&nbsp;</td>
                                                </tr>
											</table>	
                                <br />
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <?php
                                    if($_SESSION[hak_akses]=='3')
									{ ?>
										<td>Pilih Canvaser</td>
                                      	<td>:</td>
                                      	<td><select class="form-control" name="canvaser" style="width:200px;">
										<option value="">--Pilih Canvaser--</option>
										<?php 
										include "../../auth/autho.php";
													
										$query=mysql_query("select id_sales, id_bo, nama_sales from tb_sales
										where id_bo='$id_bo' and status_sales='1'
										ORDER BY nama_sales ASC");
										while($row=mysql_fetch_array($query))
										{
										?>
											<option value="<?php  echo $row['id_sales']; ?>"><?php  echo $row['nama_sales']; ?></option>
										<?php
										}
										?>	
										</select>
                                    	</td>
                                    	<td>&nbsp;</td>
									<?php
									}
									?>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>
                                      <button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Simpan
									   </button>
											&nbsp; &nbsp; &nbsp;
											
                                            </td>
                                      <td>&nbsp;</td>
                                    </tr>
                                  </table>
                                  </div>
                                  </form>
								<div class="row">
									
								</div><!-- /.row -->
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
					</div>
					  <script>
							function PopupCenter(pageURL, title,w,h) {
							var left = (screen.width/2)-(w/2);
							var top = (screen.height/3)-(h/2);
							var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
							}
					  </script>