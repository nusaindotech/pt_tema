    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
	<link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
	<style type="text/css">

		.rowover 
		{
			background-color: #3399ff;
			cursor: hand;
			color: white;
		}

	</style>
          <section>
		   <p align="center"><h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data Barang</h2></p>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                        
                          <div class="panel-body">
                                <div class="adv-table">
                                    <table  class="display table table-bordered" id="example">
                                      <thead>
                                      <tr>
                                          <th width="10%">No.</th>
                                          <th width="100px">Nama Barang</th>
                                      </tr>
                                      </thead>
                                      <tbody>
										 <?php 
						
											include "../../auth/autho.php";
											
											$tampil=mysql_query("select * from tb_barang order by id_barang ASC");
											$no=1;
											while ($row=mysql_fetch_array($tampil)){
										?>
											<tr bgcolor="fefefe" title="Pilih Customer" style="cursor:pointer" onMouseOver="this.className='rowover';" onMouseOut="this.className='rowselected-even';"
												onClick="window.close();
												javascript:window.opener.document.getElementById('id_barang').value='<?php echo $row['id_barang'];?>';
												javascript:window.opener.document.getElementById('nama_barang').value='<?php echo $row['nama_barang'];?>'">
												
												<td height="26" align="center" class="text"><font size="2.3 em"><?php echo $row['id_barang'];?></font></td>
												<td align="left" class="text"><font size="2.3 em"><?php echo $row['nama_barang'];?></font></td>
											
											</tr>
										<?php 
											$no++;
											} 
										?>
   
                                      </tbody>
                                      <tfoot>
                                      
                                      </tfoot>
									</table>
                                </div>
                          </div>
                          </div>
                          </div>
                </section>
                </section>
				
	<script src="js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
	
	<script type="text/javascript" charset="utf-8">
          $(document).ready(function() {
              $('#example').dataTable( {
                  "aaSorting": [[ 4, "desc" ]]
              } );
          } );
    </script>