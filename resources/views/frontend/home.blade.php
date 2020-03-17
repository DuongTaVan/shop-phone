@extends('frontend.master')
@section('content')


					<div id="wrap-inner">
						<div class="products">
							<h3>sản phẩm nổi bật</h3>
							<div class="product-list row">
								@foreach($spnb as $sp)
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img height="250px" width="150px" src="../storage/app/avatar/{{$sp->prod_img}}" class="img-thumbnail"></a>
									<p><a href="#">{{$sp->prod_name}}</a></p>
									<p class="price">{{number_format($sp->prod_price)}} VND</p>	  
									<div class="marsk">
										<a href="clear/chitiet/{{$sp->prod_id}}">Xem chi tiết</a>
									</div>                                    
								</div>
								@endforeach
							</div>                	                	
						</div>

						<div class="products">
							<h3>sản phẩm mới</h3>
							<div class="product-list row">
								@foreach($spm as $spm)
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img height="250px" width="150px" src="../storage/app/avatar/{{$spm->prod_img}}" class="img-thumbnail"></a>
									<p><a href="#">{{$spm->prod_name}}</a></p>
									<p class="price">{{number_format($spm->prod_price)}}VND</p>	  
									<div class="marsk">
										<a href="clear/chitiet/{{$spm->prod_id}}">Xem chi tiết</a>
									</div>                      	                        
								</div>
								@endforeach
							</div>    
						</div>
					</div>
					<div>
						@can('test')
							<p>abcd</p>
						@endcan
					</div>

@endsection
