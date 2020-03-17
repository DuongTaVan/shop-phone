@extends('pages.master')
@section('main')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sản phẩm</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Quản lí đơn hàng</div>
					<div style=" background: bisque; color: teal; padding-top: 20px;">
					<div>name: {{$user->or_name}}</div>
					<div>email: {{$user->or_email}}</div>
					<div>phone: {{$user->or_phone}}</div>
					<div>address: {{$user->or_address}}</div>
					</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								
								<table class="table table-bordered" style="margin-top:20px;">	
									
									<thead>
										<tr class="bg-primary">
											<th width="3%">STT</th>
											<th width="30%">Tên Sản phẩm</th>
											<th>Giá sản phẩm</th>
											<th width="20%">Ảnh sản phẩm</th>
											<th>Số lượng</th>
											
										</tr>
									</thead>
									
									<tbody>
										@foreach($chitiet as $pr)
										<tr>
											<td>1</td>
											<td>{{$pr->pro_name}}</td>
											<td>{{number_format($pr->or_price)}} VND</td>
											<td>
												<img width="100px" src="../storage/app/avatar/{{$pr->or_img}}" class="thumbnail">
											</td>
											<td>{{$pr->or_qty}}</td>
											
										</tr>
										@endforeach

									</tbody>
									
								</table>
								<div>	
								<p class="btn btn-primary">Tổng tiền : {{$user->or_total}}</p>
								
								</div>
												
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	@endsection