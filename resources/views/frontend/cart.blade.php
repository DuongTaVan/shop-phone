@extends('frontend.master')
@section('content')
<link rel="stylesheet" type="text/css" href="source/frontend/css/cart.css">
<script type="text/javascript" src="source/frontend/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
	function updateCart(qty, rowId){
		//alert(qty);
		$(document).ready(function(){
			//alert(qty);
			$.get(
			"clear/update",
			{ qty:qty, rowId:rowId },
			function(){
				location.reload();
				//alert('123');
			}
		);
		});
		
	};
</script>
<div id="abc"></div>
<div id="wrap-inner">
						<div id="list-cart">
							<h3>Giỏ hàng</h3>
							@if(Cart::count()==0) <h1>Giỏ hàng rỗng</h1>
							@else			
							<form>
								<table class="table table-bordered .table-responsive text-center">
									<tr class="active">
										<td width="11.111%">Ảnh mô tả</td>
										<td width="22.222%">Tên sản phẩm</td>
										<td width="22.222%">Số lượng</td>
										<td width="16.6665%">Đơn giá</td>
										<td width="16.6665%">Thành tiền</td>
										<td width="11.112%">Xóa</td>
									</tr>
									@foreach($data as $prr)
									<tr>
										<td><img height="200px", width="180px" class="img-responsive" src="../storage/app/avatar/{{$prr->options->img}}"></td>
										<td>{{$prr->name}}</td>
										<td>
											<div class="form-group">
												<input class="form-control" type="number" value="{{ $prr->qty }}" onchange="updateCart(this.value, '{{ $prr->rowId }}')">
											</div>
										</td>
										<td><span class="price">{{number_format($prr->price)}}</span></td>
										<td><span class="price">{{number_format($prr->price*$prr->qty)}}</span></td>
										<td><a href="clear/delete/{{$prr->rowId}}">Xóa</a></td>
									</tr>
									@endforeach
								</table>
								<div class="row" id="total-price">
									<div class="col-md-6 col-sm-12 col-xs-12">										
											Tổng thanh toán: <span class="total-price">{{$total}} đ</span>
																													
									</div>
									<div class="col-md-6 col-sm-12 col-xs-12">
										<a href="clear/home" class="my-btn btn">Mua tiếp</a>
										<a href="clear/show" class="my-btn btn">Cập nhật</a>
										<a href="clear/destroy" class="my-btn btn">Xóa giỏ hàng</a>
									</div>
								</div>
							</form> 
							          	                	
						</div>

						<div id="xac-nhan">
							<h3>Xác nhận mua hàng</h3>
							<form action="clear/complete" method="POST">
								@csrf
								<div class="form-group">
									<label for="email">Email address:</label>
									<input required type="email" class="form-control" id="email" name="email">
								</div>
								<div class="form-group">
									<label for="name">Họ và tên:</label>
									<input required type="text" class="form-control" id="name" name="name">
								</div>
								<div class="form-group">
									<label for="phone">Số điện thoại:</label>
									<input required type="number" class="form-control" id="phone" name="phone">
								</div>
								<div class="form-group">
									<label for="add">Địa chỉ:</label>
									<input required type="text" class="form-control" id="add" name="address">
								</div>
								<div class="form-group text-right">
									<button type="submit" class="btn btn-default">Thực hiện đơn hàng</button>
								</div>
							</form>
						</div>
						@endif  
</div>
@endsection