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
		   <script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<p align="center"><h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data Kios</h2></p>
              <div class="row">
                  <div class="col-lg-12">
                        <table width="29%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="11%">&nbsp;</td>
                            <td width="89%"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','100','height','22','src','button1','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','button1' ); //end AC code
</script><noscript>
  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="100" height="22">
    <param name="BGCOLOR" value="" />
    <param name="movie" value="button1.swf" />
    <param name="quality" value="high" />
    <embed src="button1.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="100" height="22" ></embed>
  </object>
</noscript></td>
                          </tr>
                        </table>
  <div class="panel-body">
                                <div class="adv-table">
                                    <table  class="display table table-bordered" id="example">
                                      <thead>
                                      <tr>
                                          <th width="10%">ID Kios</th>
                                          <th width="100px">Nama Kios</th>
                                      </tr>
                                      </thead>
                                      <tbody>
										 <?php 
						
											include "../../auth/autho.php";
											
											$tampil=mysql_query("select * from tb_kios order by nama_kios ASC");
											$no=1;
											while ($row=mysql_fetch_array($tampil)){
										?>
											<tr bgcolor="fefefe" title="Pilih Canvaser" style="cursor:pointer" onMouseOver="this.className='rowover';" onMouseOut="this.className='rowselected-even';"
												onClick="window.close();
												javascript:window.opener.document.getElementById('id_kios').value='<?php echo $row['id_kios'];?>';
												javascript:window.opener.document.getElementById('nama_kios').value='<?php echo $row['nama_kios'];?>'">
												
												<td height="26" align="center" class="text"><font size="2.3 em"><?php echo $row['id_kios'];?></font></td>
												<td align="left" class="text"><font size="2.3 em"><?php echo $row['nama_kios'];?></font></td>
											
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