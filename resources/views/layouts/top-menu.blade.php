<header class="main-header">
	<nav class="navbar navbar-fixed-top warnaGradien">
		<div class="container">
			<div class="navbar-header">
				<a href="#" class="navbar-brand">POS Cloud</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
					<i class="fa fa-bars"></i>
				</button>
			</div>

<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
				<ul class="nav navbar-nav">
					<li>
						<a href="#" class="Menu-Block"><i class="glyphicon glyphicon-home"></i><span class="spanText"> Dashboard</span></a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle Menu-Block" data-toggle="dropdown">
							<i class="glyphicon glyphicon-duplicate"></i> 
							<div class="parent-drop">
								<span class="spanText">Master Data </span>
								<span class="caret"></span>
							</div>
						</a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ URL('divisi') }}">Divisi</a></li>
							<li><a href="{{ URL('departemen') }}">Departemen</a></li>
							<li><a href="{{ URL('kategori') }}">Kategori</a></li>
							<li><a href="{{ URL('subkategori') }}">Subkategori</a></li>
							<li><a href="{{ URL('barang') }}">Barang</a></li>
							<li><a href="{{ URL('distributor') }}">Distributor</a></li>
							<li><a href="{{ URL('distributordivisi') }}">Distributor Divisi</a></li>
							<li><a href="{{ URL('metodepembayaran') }}">Metode Pembayaran</a></li>
							<li><a href="{{ URL('operator') }}">Operator</a></li>
							<li><a href="{{ URL('pelanggan') }}">Pelanggan</a></li>
						</ul>
					</li>
				</ul>
			</div>
<!-- /.navbar-collapse -->
<!-- Navbar Right Menu -->
<div class="navbar-custom-menu">
<ul class="nav navbar-nav">

<!-- User Account Menu -->
<li class="dropdown user user-menu ">
<!-- Menu Toggle Button -->
<a href="#" class="dropdown-toggle customUser" data-toggle="dropdown">
<!-- The user image in the navbar-->
<img src="{{ asset('AdminLte/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
<!-- hidden-xs hides the username on small devices so only the image appears. -->
<span class="hidden-xs">Alexander Pierce</span>
</a>
<ul class="dropdown-menu">
<!-- The user image in the menu -->
<li class="user-header">
<img src="{{ asset('AdminLte/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

<p>
Alexander Pierce - Web Developer
<small>Member since Nov. 2012</small>
</p>
</li>
<!-- Menu Body -->
<li class="user-body">
<div class="row">
<div class="col-xs-4 text-center">
<a href="#">Followers</a>
</div>
<div class="col-xs-4 text-center">
<a href="#">Sales</a>
</div>
<div class="col-xs-4 text-center">
<a href="#">Friends</a>
</div>
</div>
<!-- /.row -->
</li>
<!-- Menu Footer-->
<li class="user-footer">
<div class="pull-left">
<a href="#" class="btn btn-default btn-flat">Profile</a>
</div>
<div class="pull-right">
<a href="#" class="btn btn-default btn-flat">Sign out</a>
</div>
</li>
</ul>
</li>
</ul>
</div>
<!-- /.navbar-custom-menu -->
</div>
<!-- /.container-fluid -->
</nav>
</header>