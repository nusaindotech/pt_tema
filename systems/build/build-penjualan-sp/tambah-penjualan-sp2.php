<?php
	session_start();
	$id_bo=$_SESSION[id_bo];
	$idpenjualan	=$_GET['idpenjualan'];
	$idcanvaser		=$_GET['idcanvaser'];
	
	$tglsekarang = date('Y-m-d');

	$a2=mysql_query("SELECT * from tb_penjualan_sp where id_penjualan_sp='$idpenjualan'");
	$row2=mysql_fetch_array($a2);	
?>

	<div class="modal" id="myModal" role="dialog">
              <div class="modal-dialog">
			<form action="../systems/dash.php?hp=tampil-penjualan-ro" method="GET" class="form-horizontal" role="form">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Penjualan SP</h4>
                  </div>
                  <div class="modal-body overflow-visible">
                  <div class="box-body">
				  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Tanggal</label>
						<div class="col-sm-8">
                        <input type="text" name="tgl" class="form-control" value="<?php echo $tglsekarang; ?>" readonly>
                      </div>
                  </div>
				  
				  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Kios</label>
						<div class="col-sm-8">
						<input type="hidden" name="hp" class="form-control" value="<?php echo 'tampil-penjualan-ro'; ?>">
                        <input type="hidden" name="idpenjualan" class="form-control" value="<?php echo $idpenjualan; ?>">
                        <input type="hidden" name="idcanvaser" class="form-control" value="<?php echo $idcanvaser; ?>">
                        <select class="form-control" name="idkios" id="idkios" >
                          <option value="">--Pilih Kios--</option>
                          <?php 
								include "../../auth/autho.php";
													
								$query=mysql_query("select id_kios, nama_kios, hp_kios
													from tb_kios
													where id_bo='$id_bo'
													ORDER BY nama_kios ASC");
								while($row=mysql_fetch_array($query))
								{
								?>
                          <option value="<?php  echo $row['id_kios']; ?>">
                          <?php  echo $row['nama_kios']; ?>
                            |
  <?php  echo $row['hp_kios']; ?>
                          </option>
                          <?php
								}
								?>
                        </select>
                        <?php
							
						?>
                      </div>
                  </div>
				  
                  
                  </div><!-- /.box-body -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                  </div>
                </div><!-- /.modal-content -->
			</form>
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

<!-- #section:basics/content.breadcrumbs -->
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">Penjualan</li>
							<li class="active">SP</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						<?php include "container.php"; ?>

						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>
								Detail Penjualan SP</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form action="build/build-penjualan-lainnya/update-lainnya.php" method="POST" class="form-horizontal" role="form">
								  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td>No. Penjualan</td>
                                      <td>:&nbsp;</td>
                                      <td><strong><?php echo $idpenjualan; ?></strong></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
									<tr>
                                      <td>Nama Kasir</td>
                                      <td>:</td>
                                      <td><strong>Samsul</strong></td>
                                      <td>&nbsp;</td>
                                      <td width="12%">Nama Logistic</td>
                                      <td width="1%">:</td>
                                      <td width="20%"><strong>Sueb</strong></td>
                                      <td width="2%">&nbsp;</td>
                                      <td width="11%">Nama PIC</td>
                                      <td width="2%">:</td>
                                      <td width="20%"><strong>Susi</strong></td>
                                      <td width="3%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td colspan="5">&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>ID Canvaser</td>
                                      <td>:</td>
                                      <td>
									  <input name="id" class="input-sm" type="text" id="id_customer" value="<?php echo $idcanvaser; ?>" readonly style="width:120px;"/>
									  </td>
                                      <td>&nbsp;</td>
                                      <td>Nama Canvaser</td>
                                      <td>:</td>
                                      <td>
									  <?php
									  $bantu="select nama_sales
											  from tb_sales
											  where id_sales='$idcanvaser'";
									  $hasil_bantu=mysql_query($bantu);
									  $data_bantu=mysql_fetch_array($hasil_bantu);
									  ?>
									  <input name="nama_sales" class="input-sm" type="text" id="nama_sales" value="<?php echo $data_bantu[0]; ?>" readonly />
									  </td>
                                      <td>&nbsp;</td>
                                      <td>
									  Tanggal Penjualan
									  </td>
                                      <td>:</td>
                                      <td><input readonly name="tanggaldaftar" class="input-sm" type="text" value="<?php
											echo $row2['tanggal_penjualan_sp'];
											?>" style="width:85px;" /></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                    <td colspan="12">&nbsp;</td>
                                    </tr>
								</table>
                              </form>

								<div class="row">
									<div class="col-xs-12">
									<p>
										<a href="#myModal" data-toggle="modal" class="btn btn-white btn-info btn-bold" >
											<i class="ace-icon fa fa-plus bigger-160"></i>
											Tambah Rincian Invoice
										</a>
									</p>
									<p>
										<table id="simple-table" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th><center>No.</center></th>
													<th><center>Nama RO</center></th>
													<th><center>Nama Item</center></th>
													<th><center>Harga Satuan</center></th>
													<th width="200"><center>Jumlah</center></th>
                                                    <th width="200"><center>Total</center></th>
												</tr>
											</thead>
											<tbody>
											<?php
											$tampil3=mysql_query("select distinct(d.id_kios), k.nama_kios
											from tb_detail_penjualan_sp d, tb_kios k
											where d.id_kios=k.id_kios and d.id_penjualan_sp='$idpenjualan'
											order by d.id_detail_penjualan_sp asc");
											$no=0;
											$nomor=1;
											$jumlahsptotal=0;
											while($row3=mysql_fetch_array($tampil3))
											{
												$tampil4=mysql_query("select d.id_detail_penjualan_sp, d.id_barang, b.nama_barang, d.harga_satuan, d.jumlah_sp, d.harga_total
												from tb_detail_penjualan_sp d, tb_barang b
												where d.id_barang=b.id_barang and d.id_penjualan_sp='$idpenjualan' and d.id_kios='$row3[0]'
												order by d.id_barang asc");						
												while($row4=mysql_fetch_array($tampil4))
												{
													$jumlahsptotal=$jumlahsptotal+$row4[4];
													echo "<tr class='warning'>";
													if($row3[1]!=$catatcounter)
													{
														echo '<td align="center">'.$nomor.'</td>';
														echo '<td>';
														echo $row3[1];
														echo '&nbsp;<div class="hidden-sm hidden-xs btn-group">';
														echo "<a class='btn btn-xs btn-danger' 
														href='build/build-penjualan-sp/hapus-detail-penjualan.php?id=$idpenjualan&id2=$idcanvaser&id3=$row3[0]'>";
														echo '<i class="ace-icon fa fa-trash-o bigger-120"></i></a>';
														echo '</div></td>';
													}
													else if($row3[1]==$catatcounter)
													{
														$bantu_counter=$row[4];
														echo '<td> </td>';
														echo '<td> </td>';
													}
													$catatcounter=$row3[1];
													echo "<td>".$row4[2]."</td>";
													echo "<td align='right'>".number_format($row4[3],0)."</td>";
													$no=$no+$row4[4];
													echo "<td align='center'>".$row4[4]."</td>";
													echo "<td align='right'>".number_format($row4[5],0)."</td>";
													echo "</tr>";
												}
												$nomor++;
												echo '<tr>';
												echo '<td colspan="4">&nbsp;</td>';
												$bantu2="select grand_total_kios, cash_kios, transfer, piutang, id_bank
												from tb_pembayaran_canvaser
												where id_penjualan_sp='$idpenjualan' and id_sales='$idcanvaser' and id_kios='$row3[0]'";
												$hasil_bantu2=mysql_query($bantu2);
												$data_bantu2=mysql_fetch_array($hasil_bantu2);
												echo '<td>Grand Total</td>';
												echo '<td align="right">';
												echo number_format($data_bantu2[0],0);
												echo '</td>';
												echo '</tr>';
												echo '<tr>';
												echo '<td colspan="4">&nbsp;</td>';
												echo '<td>Cash</td>';
												echo '<td align="right">';
												echo number_format($data_bantu2[1],0);
												echo '</td>';
												echo '</tr>';
												echo '<tr>';
												echo '<td colspan="4">&nbsp;</td><td>';
												if($data_bantu2[4]==null)
												{
													echo "Transfer ";
												}
												else
												{
													echo "Transfer "; 
													$bantu3="select nama_bank from tb_bank where id_bank='$data_bantu2[4]'";
													$hasil_bantu3=mysql_query($bantu3);
													$data_bantu3=mysql_fetch_array($hasil_bantu3);
													echo '<span class="label label-success arrowed-in arrowed-in-right">';
													echo $data_bantu3[0];
													echo "</span>";
												}
												echo '</td><td align="right">';
												echo number_format($data_bantu2[2],0);
												echo '</td>';
												echo '</tr>';
												echo '<tr>';
												echo '<td colspan="4">&nbsp;</td>';
												echo '<td>Piutang</td>';
												echo '<td align="right">';
												echo number_format($data_bantu2[3],0);
												echo '</td>';
												echo '</tr>';
											}
											?>
											<tr>
												<td></td>
												<td class="info" align="center">Total SP Yang Diambil</td>
												<?php
												$bantu4="select count(d.ip)
												from tb_detail_pengambilan d, tb_pengambilan_sp p
												where d.id_pengambilan_sp=p.id_pengambilan_sp and p.id_sales='$idcanvaser' and p.tanggal_ambil='$tglsekarang'";
												$hasil_bantu4=mysql_query($bantu4);
												$data_bantu4=mysql_fetch_array($hasil_bantu4);
												?>
												<td class="info" align="center">
												<?php echo $data_bantu4[0];?>
												</td>
												<td class="success" align="center">Total SP Saat Ini</td>
												<td class="success" align="center">
												<?php echo $jumlahsptotal;?>
												</td>
												<td align="center">
												<?php
												if(($data_bantu4[0]==0)||($jumlahsptotal==0))
												{
													echo '<span class="label label-danger arrowed-in arrowed-in-right">';
													echo "Jumlah Tidak Boleh 0";
													echo "</span>";
												}
												else if($data_bantu4[0]==$jumlahsptotal)
												{
													echo '<span class="label label-success arrowed-in arrowed-in-right">';
													echo "Jumlah Sama";
													echo "</span>";
												}
												else if($data_bantu4[0]!=$jumlahsptotal)
												{
													echo '<span class="label label-danger arrowed-in arrowed-in-right">';
													echo "Jumlah Tidak Sama";
													echo "</span>";
												}
												?>
												</td>
											</tr>
											<form action="build/build-penjualan-sp/update-detail-penjualan.php" method="POST" class="form-horizontal" role="form">
											<tr>
												<td colspan="6">
												<?php
												if(($data_bantu4[0]!=$jumlahsptotal)||($data_bantu4[0]==0)||($jumlahsptotal==0))
												{
													echo "&nbsp;";
												}
												else if($data_bantu4[0]==$jumlahsptotal)
												{
												?>
													<a href="build/build-penjualan-sp/cetakpenjualansp.php?id=<?php echo $idpenjualan; ?>&id2=<?php echo $idcanvaser; ?>" target="_blank" class="btn btn-info" >
													<i class="ace-icon fa fa-check bigger-110"></i>
													Cetak
													</a>
													<a href="dash.php?hp=penjualan-sp" class="btn btn-success" >
													Selesai
													</a>	
												<?php
												}
												?>
												</td>
											</tr>
											</form>
											</tbody>
										</table>
								  </div><!-- /.span -->
									</p>
								</div><!-- /.row -->
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
					
					  <script>
							function PopupCenter(pageURL, title,w,h) {
							var left = (screen.width/2)-(w/2);
							var top = (screen.height/3)-(h/2);
							var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
							}
					  </script>