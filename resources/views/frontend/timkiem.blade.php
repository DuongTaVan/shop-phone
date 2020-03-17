@extends('frontend.master')
@section('content')


					<div id="wrap-inner">
						<div class="products">
							<h3>Tìm thấy {{count($product)}} sản phẩm</h3>
							<div class="product-list row">
								@foreach($product as $sp)
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img height="250px" width="150px" src="../storage/app/avatar/{{$sp->prod_img}}" class="img-thumbnail"></a>
									<p><a href="#">{{$sp->prod_name}}</a></p>
									<p class="price">{{number_format($sp->prod_price)}}</p>	  
									<div class="marsk">
										<a href="clear/chitiet/{{$sp->prod_id}}">Xem chi tiết</a>
									</div>                                    
								</div>
								@endforeach
								<div style="margin: auto;">{{ $product->links() }}</div>
							</div>                	                	
						</div>

						
					</div>
					

@endsection
