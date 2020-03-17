<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dashboard | Vietpro shop</title>
<base href="{{asset('')}}">
<link href="source/backend/giaodienbackend/css/bootstrap.min.css" rel="stylesheet">
<link href="source/backend/giaodienbackend/css/datepicker3.css" rel="stylesheet">
<link href="source/backend/giaodienbackend/css/styles.css" rel="stylesheet">
<script type="text/javascript" src="source/backend/giaodienbackend/ckeditor/ckeditor.js"></script>
<script src="source/backend/giaodienbackend/js/lumino.glyphs.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="admin/home">Vietpro Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> {{Auth::user()->email}} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="logout"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li role="presentation" class="divider"></li>
			@cannot('starr')
			<li class="active"><a href="admin/trangchu"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Trang chủ</a></li>
			<li><a href="admin/product"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Sản phẩm</a></li>
			<li><a href="admin/category"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Danh mục</a></li>
			@endcannot
			<li><a href="admin/khachhang"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Đơn hàng chưa xử lí</a></li>
			<li><a href="admin/process"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Đơn hàng đã xử lí</a></li>
			<li role="presentation" class="divider"></li>
			<li role="presentation" class="divider"></li>
			@cannot('starr')<li><a href="clear/listuser"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Quản lý thành viên</a></li>
			@endcannot
		</ul>
		
	</div><!--/.sidebar-->
		
	@yield('main')
		  

	<script src="source/backend/giaodienbackend/js/jquery-1.11.1.min.js"></script>
	<script src="source/backend/giaodienbackend/js/bootstrap.min.js"></script>
	<script src="source/backend/giaodienbackend/js/chart.min.js"></script>
	<script src="source/backend/giaodienbackend/js/chart-data.js"></script>
	<script src="source/backend/giaodienbackend/js/easypiechart.js"></script>
	<script src="source/backend/giaodienbackend/js/easypiechart-data.js"></script>
	<script src="source/backend/giaodienbackend/js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		});
		function changeImg(input){
		    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
		    if(input.files && input.files[0]){
		        var reader = new FileReader();
		        //Sự kiện file đã được load vào website
		        reader.onload = function(e){
		            //Thay đổi đường dẫn ảnh
		            $('#avatar').attr('src',e.target.result);
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		$(document).ready(function() {
		    $('#avatar').click(function(){
		        $('#img').click();
		    });
		});
		function del_cat(){
		return confirm('Bạn muốn xóa danh mục sản phẩm  ');
	}
	</script>	
</body>

</html>
