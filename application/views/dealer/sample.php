<div class="page-header card">
	<div class="row align-items-end">
		<div class="col-lg-8">
			<div class="page-header-title"> <i class="feather icon-watch bg-c-blue"></i>
				<div class="d-inline">
					<h5>Sample page</h5> <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> </div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="page-header-breadcrumb">
				<ul class=" breadcrumb breadcrumb-title">
					<li class="breadcrumb-item"> <a href="index.html"><i class="feather icon-home"></i></a> </li>
					<li class="breadcrumb-item"> <a href="#!">Sample page</a> </li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="pcoded-inner-content">
	<div class="main-body">
		<div class="page-wrapper">
			<div class="page-body">
				<div class="row">
					<div class="col-sm-12">
						<div class="card">
							<div class="card-header">
								<h5>Hello card</h5>
								<div class="card-header-right">
									<ul class="list-unstyled card-option">
										<li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
										<li><i class="feather icon-maximize full-card"></i></li>
										<li><i class="feather icon-minus minimize-card"></i></li>
										<li><i class="feather icon-refresh-cw reload-card"></i></li>
										<li><i class="feather icon-trash close-card"></i></li>
										<li><i class="feather icon-chevron-left open-card-option"></i></li>
									</ul>
								</div>
							</div>
							<div class="card-block">
								<p> 
								    <?php
								        foreach($details as $detail){
								            echo $detail->id;
								            echo '&nbsp;&nbsp;: &nbsp;&nbsp;'.$detail->name;
								            echo '&nbsp;&nbsp;: &nbsp;&nbsp;'.$detail->email;
								            echo '&nbsp;&nbsp;: &nbsp;&nbsp;'.$detail->password;
								            echo '<br><hr></hr><br>';
								        }
								    
								    ?>
								    
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>