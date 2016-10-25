				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<!-- #section:basics/sidebar.layout.shortcuts -->
						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>

						<!-- /section:basics/sidebar.layout.shortcuts -->
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="active">
						<a href="dash.php?hp=home">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>
					<?php
					if($_SESSION[level]=='penjualan')
					{
					?>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Penjualan </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
							<a href="" class="dropdown-toggle">
								<i class="menu-icon fa fa-caret-right"></i>
								Penjualan Dompul
								<b class="arrow fa fa-angle-down"></b>
							</a>
							<b class="arrow"></b>
							<ul class="submenu">
							  
							  <li class="">
									<a href="dash.php?hp=penjualan-dompul">
										<i class="menu-icon fa fa-caret-right"></i>
										Invoice Dompul
									</a>
									<b class="arrow"></b>
								</li>
							  <li class="">
									<a href="dash.php?hp=penjualan-list-dompul">
										<i class="menu-icon fa fa-caret-right"></i>
										List Invoice Dompul
									</a>
									<b class="arrow"></b>
								</li>
							</ul>
							</li>
							<li class="">
							<a href="dash.php?hp=monitoring-upload">
									<i class="menu-icon fa fa-caret-right"></i>
									Monitoring Upload
							</a>
								<b class="arrow"></b>
							</li>
							<li class="">
							<a href="" class="dropdown-toggle">
								<i class="menu-icon fa fa-caret-right"></i>
								Laporan Penjualan
								<b class="arrow fa fa-angle-down"></b>
							</a>
							<b class="arrow"></b>
							<ul class="submenu">
							  
							  <li class="">
									<a href="dash.php?hp=laporan-pj-dompul">
										<i class="menu-icon fa fa-caret-right"></i>
										Dompet Pulsa
									</a>
									<b class="arrow"></b>
								</li>
								<li class="">
									<a href="dash.php?hp=laporan-pj-dompul-head">
										<i class="menu-icon fa fa-caret-right"></i>
										Dompet Pulsa Head
									</a>
									<b class="arrow"></b>
								</li>
							</ul>
							</li>
						</ul>
					</li>
					
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> Persediaan </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
						<li class="">
							<a href="" class="dropdown-toggle">
								<i class="menu-icon fa fa-caret-right"></i>
								Dompet Pulsa
								<b class="arrow fa fa-angle-down"></b>
							</a>
							<b class="arrow"></b>
							<ul class="submenu">
							  <li class="">
									<a href="dash.php?hp=mutasi-dompul">
										<i class="menu-icon fa fa-caret-right"></i>
										Mutasi Dompul
									</a>
									<b class="arrow"></b>
								</li>
							</ul>
						</li>
						</ul>
					</li>
					<?php
					}
					else if($_SESSION[level]=='pembelian')
					{
					?>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-shopping-cart"></i>
							<span class="menu-text"> Pembelian </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
												
						<li class="">
							<a target="_blank" href="dash.php?hp=order-pembelian">
									<i class="menu-icon fa fa-caret-right"></i>
									Order Pembelian
							</a>
							<b class="arrow"></b>
						</li>
							<b class="arrow"></b>
							
						</ul>
					</li>
					<?php
					}
					else if($_SESSION[level]=='persediaan')
					{
					?>
						<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> Persediaan </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
						<li class="">
							<a href="" class="dropdown-toggle">
								<i class="menu-icon fa fa-caret-right"></i>
								Dompet Pulsa
								<b class="arrow fa fa-angle-down"></b>
							</a>
							<b class="arrow"></b>
							<ul class="submenu">
							  <li class="">
									<a href="dash.php?hp=mutasi-dompul">
										<i class="menu-icon fa fa-caret-right"></i>
										Mutasi Dompul
									</a>
									<b class="arrow"></b>
								</li>
							</ul>
						</li>
						</ul>
						</li>
					<?php
					}
					else if($_SESSION[level]=='head')
					{
					?>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Penjualan </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
							<a href="" class="dropdown-toggle">
								<i class="menu-icon fa fa-caret-right"></i>
								Penjualan Dompul
								<b class="arrow fa fa-angle-down"></b>
							</a>
							<b class="arrow"></b>
							<ul class="submenu">
							  
							  <li class="">
									<a href="dash.php?hp=penjualan-dompul">
										<i class="menu-icon fa fa-caret-right"></i>
										Invoice Dompul
									</a>
									<b class="arrow"></b>
								</li>
							  <li class="">
									<a href="dash.php?hp=penjualan-list-dompul">
										<i class="menu-icon fa fa-caret-right"></i>
										List Invoice Dompul
									</a>
									<b class="arrow"></b>
								</li>
							</ul>
							</li>
							<li class="">
							<a href="dash.php?hp=monitoring-upload">
									<i class="menu-icon fa fa-caret-right"></i>
									Monitoring Upload
							</a>
								<b class="arrow"></b>
							</li>
							<li class="">
							<a href="" class="dropdown-toggle">
								<i class="menu-icon fa fa-caret-right"></i>
								Laporan Penjualan
								<b class="arrow fa fa-angle-down"></b>
							</a>
							<b class="arrow"></b>
							<ul class="submenu">
							  
							  <li class="">
									<a href="dash.php?hp=laporan-pj-dompul">
										<i class="menu-icon fa fa-caret-right"></i>
										Dompet Pulsa
									</a>
									<b class="arrow"></b>
								</li>
								<li class="">
									<a href="dash.php?hp=laporan-pj-dompul-head">
										<i class="menu-icon fa fa-caret-right"></i>
										Dompet Pulsa Head
									</a>
									<b class="arrow"></b>
								</li>
							</ul>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> Persediaan </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
						<li class="">
							<a href="" class="dropdown-toggle">
								<i class="menu-icon fa fa-caret-right"></i>
								Dompet Pulsa
								<b class="arrow fa fa-angle-down"></b>
							</a>
							<b class="arrow"></b>
							<ul class="submenu">
							  <li class="">
									<a href="dash.php?hp=mutasi-dompul">
										<i class="menu-icon fa fa-caret-right"></i>
										Mutasi Dompul
									</a>
									<b class="arrow"></b>
								</li>
							</ul>
						</li>
						<li class="">
							<a href="dash.php?hp=transfer-dompul">
									<i class="menu-icon fa fa-caret-right"></i>
									Transfer Dompul
							</a>
								<b class="arrow"></b>
						</li>                        
						</ul>
						</li>
					
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Master </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
                            <li class="">
							<a href="dash.php?hp=master-canvaser">
									<i class="menu-icon fa fa-caret-right"></i>
									Master Canvaser
							</a>
								<b class="arrow"></b>
							</li>
                            <li class="">
							<a href="dash.php?hp=master-counter">
									<i class="menu-icon fa fa-caret-right"></i>
									Master Kios
							</a>
								<b class="arrow"></b>
							</li>
							<li class="">
							<a href="dash.php?hp=master-hpsubdompul">
									<i class="menu-icon fa fa-caret-right"></i>
									Master HP Sub Dompul
							</a>
								<b class="arrow"></b>
							</li>
							<li class="">
							<a href="dash.php?hp=upload-dompul">
									<i class="menu-icon fa fa-caret-right"></i>
									Upload Dompul
							</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<?php
					}
					else if($_SESSION[level]=='keuangan')
					{
					?>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa  fa-money"></i>
							<span class="menu-text"> Keuangan </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
						<li class="">
							<a href="dash.php?hp=piutang">
							<i class="menu-icon fa fa-caret-right"></i>
								Hutang
							</a>
							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="dash.php?hp=piutang">
							<i class="menu-icon fa fa-caret-right"></i>
								Piutang
							</a>
							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="" class="dropdown-toggle">
								<i class="menu-icon fa fa-caret-right"></i>
								Penerimaan
								<b class="arrow fa fa-angle-down"></b>
							</a>
							<b class="arrow"></b>
							<ul class="submenu">
								<li class="">
									<a href="dash.php?hp=bkm">
										<i class="menu-icon fa fa-caret-right"></i>
										Kas
									</a>

									<b class="arrow"></b>
								</li>
								<li class="">
									<a href="dash.php?hp=bbm">
										<i class="menu-icon fa fa-caret-right"></i>
										Bank
									</a>
									<b class="arrow"></b>
								</li>
								<li class="">
									<a href="dash.php?hp=daftar-bkm">
										<i class="menu-icon fa fa-caret-right"></i>
										Cari Data Kas
									</a>
									<b class="arrow"></b>
								</li>
								<li class="">
									<a href="dash.php?hp=daftar-bbm">
										<i class="menu-icon fa fa-caret-right"></i>
										Cari Data Bank
									</a>
									<b class="arrow"></b>
								</li>
							</ul>
						</li>
						<li class="">
							<a href="" class="dropdown-toggle">
								<i class="menu-icon fa fa-caret-right"></i>
								Pengeluaran
								<b class="arrow fa fa-angle-down"></b>
							</a>
							<b class="arrow"></b>
							<ul class="submenu">
								<li class="">
									<a href="dash.php?hp=bkk">
										<i class="menu-icon fa fa-caret-right"></i>
										Kas
									</a>

									<b class="arrow"></b>
								</li>
								<li class="">
									<a href="dash.php?hp=bbk">
										<i class="menu-icon fa fa-caret-right"></i>
										Bank
									</a>
									<b class="arrow"></b>
								</li>
								<li class="">
									<a href="dash.php?hp=daftar-bkm">
										<i class="menu-icon fa fa-caret-right"></i>
										Cari Data Kas
									</a>
									<b class="arrow"></b>
								</li>
								<li class="">
									<a href="dash.php?hp=daftar-bbm">
										<i class="menu-icon fa fa-caret-right"></i>
										Cari Data Bank
									</a>
									<b class="arrow"></b>
								</li>
							</ul>
						</li>
						<li class="">
							<a href="" class="dropdown-toggle">
								<i class="menu-icon fa fa-caret-right"></i>
								Bon Sementara
								<b class="arrow fa fa-angle-down"></b>
							</a>
							<b class="arrow"></b>
							<ul class="submenu">
								<li class="">
									<a href="dash.php?hp=bs">
										<i class="menu-icon fa fa-caret-right"></i>
										Bon Sementara
									</a>

									<b class="arrow"></b>
								</li>
								<li class="">
									<a href="dash.php?hp=perlengkapan-ibadah">
										<i class="menu-icon fa fa-caret-right"></i>
										Bank
									</a>
									<b class="arrow"></b>
								</li>
								<li class="">
									<a href="dash.php?hp=perlengkapan-ibadah">
										<i class="menu-icon fa fa-caret-right"></i>
										Cari Data
									</a>
									<b class="arrow"></b>
								</li>
							</ul>
						</li>
						</ul>
					</li>
					<?php
					}
					else if($_SESSION[level]=='admin')
					{
					?>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Master </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
							<a href="dash.php?hp=master-user">
									<i class="menu-icon fa fa-caret-right"></i>
									Master User
							</a>
								<b class="arrow"></b>
							</li>
                        	<li class="">
							<a href="dash.php?hp=master-ho">
									<i class="menu-icon fa fa-caret-right"></i>
									Master HO
							</a>
								<b class="arrow"></b>
							</li>
                            <li class="">
							<a href="dash.php?hp=master-bo">
									<i class="menu-icon fa fa-caret-right"></i>
									Master BO
							</a>
								<b class="arrow"></b>
							</li>
                            <li class="">
							<a href="dash.php?hp=master-canvaser">
									<i class="menu-icon fa fa-caret-right"></i>
									Master Canvaser
							</a>
								<b class="arrow"></b>
							</li>
                            <li class="">
							<a href="dash.php?hp=master-counter">
									<i class="menu-icon fa fa-caret-right"></i>
									Master Kios
							</a>
								<b class="arrow"></b>
							</li>
							<li class="">
							<a href="dash.php?hp=master-hargadompul">
									<i class="menu-icon fa fa-caret-right"></i>
									Master Harga Dompul
							</a>
								<b class="arrow"></b>
							</li>
							<li class="">
							<a href="dash.php?hp=master-hpdompul">
									<i class="menu-icon fa fa-caret-right"></i>
									Master HP Dompul
							</a>
								<b class="arrow"></b>
							</li>
							<li class="">
							<a href="dash.php?hp=master-hpsubdompul">
									<i class="menu-icon fa fa-caret-right"></i>
									Master HP Sub Dompul
							</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<?php
					}
					?>
				</ul><!-- /.nav-list -->

				<!-- #section:basics/sidebar.layout.minimize -->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>