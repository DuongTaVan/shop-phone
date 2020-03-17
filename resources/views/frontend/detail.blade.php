@extends('frontend.master')
@section('content')
<link rel="stylesheet" href="source/frontend/css/details.css">
<div id="wrap-inner">
						<div id="product-info">
							<div class="clearfix"></div>
							<h3>{{$detail->prod_name}}</h3>
							<div class="row">
								<div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
									<img height="280px" width="250px" src="../storage/app/avatar/{{$detail->prod_img}}">
								</div>
								<div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
									<p>Giá: <span class="price">{{number_format($detail->prod_price)}} VND</span></p>
									<p>Bảo hành: {{$detail->prod_wanranty}}</p> 
									<p>Phụ kiện: {{$detail->prod_accessories}}</p>
									<p>Tình trạng:{{$detail->prod_condition}}</p>
									<p>Khuyến mãi: {{$detail->prod_promotion}}</p>
									<p>Trạng thái: @if($detail->prod_status==1)Còn hàng @else Hết hàng @endif</p>
									<p class="add-cart text-center"><a href="clear/dathang/{{$detail->prod_id}}">Đặt hàng online</a></p>
								</div>
							</div>							
						</div>
						<div id="product-detail">
							<h3>Chi tiết sản phẩm</h3>
							<p class="text-justify">{!!$detail->prod_description!!}</p>
						</div>
						<div id="comment">
							<h3>Bình luận</h3>
							<div class="col-md-9 comment">
								<form action="clear/comment/{{$detail->prod_id}}" method="POST">
									@csrf
									<div class="form-group">
										<label for="email">Email:</label>
										<input required type="email" class="form-control" id="email" name="email">
									</div>
									<div class="form-group">
										<label for="name">Tên:</label>
										<input required type="text" class="form-control" id="name" name="name">
									</div>
									<div class="form-group">
										<label for="cm">Bình luận:</label>
										<textarea required rows="10" id="cm" class="form-control" name="content"></textarea>
									</div>
									<div class="form-group text-right">
										<button type="submit" class="btn btn-default">Gửi</button>
									</div>
								</form>
							</div>
						</div>
						<div id="comment-list">
							@foreach($comment as $cm)
							<ul>
								<li class="com-title">
									{{$cm->com_name}}
									<br>
									<span>{{$cm->created_at}}</span>	
								</li>
								<li class="com-details">
									{{$cm->com_content}}
								</li>
							</ul>
							@endforeach
						<div style="margin: auto;">{{ $comment->links() }}</div>
						</div>
</div>		
@endsection			