<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body class="hold-transition skin-blue layout-top-nav">
	<div class="wrapper">
		@include('layouts.top-menu')
		<div class="content-wrapper">
			<div class="container" style="margin-top: 65px">
				@yield('content')
			</div>
		</div>
		<footer class="main-footer">
			<div class="container">
				<div class="pull-right hidden-xs">
					<b>Version</b> 2.4.0
				</div>
				<strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
				reserved.
			</div>
		<!-- /.container -->
		</footer>
	</div>
</body>
</html>
@include('layouts.foot')
@yield('jsmaster')