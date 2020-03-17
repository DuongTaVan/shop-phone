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
					<div class="panel-heading">Đơn hàng chưa xử lí</div>
					
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
							
								<table class="table table-bordered" style="margin-top:20px;">	
									
									<thead>
										<tr class="bg-primary">
											<th width="3%">STT</th>
											<th width="30%">Tên khách hàng</th>
											<th>Email</th>
											<th width="20%">Phone</th>
											<th>Địa chỉ</th>
											<th>Đơn hàng</th>
										</tr>
									</thead>
									
									<tbody>
										@foreach($user as $pr)
										<tr>
											<td>{{$pr->or_id}}</td>
											<td>{{$pr->or_name}}</td>
											<td>{{$pr->or_email}}</td>
											<td>{{$pr->or_phone}}</td>
											<td>{{$pr->or_address}}</td>
											<td><a href="admin/chitietdonhang/{{$pr->or_id}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Chi tiết</a></td>

											
										</tr>
										@endforeach

									</tbody>
									
								</table>
								
					
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	@endsection