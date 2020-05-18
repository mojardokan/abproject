<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script>
	$(document).ready(function(){
		//alert('hello');
		@foreach (App\Models\Category::where('parent_id',NULL)->get() as $parent)
		$("#Category{{$parent->id}}").click(function(){
			var category = $("#Category{{$parent->id}}").val();
		//alert(category);
		$.ajax({
			type: 'get',
			dataType: 'html',
			url: '{{url('/showcategory')}}',
			data: 'category_id=' + category,
			success:function(response){
				console.log(response);
				$("#productData").html(response);
			}
		});
	});
	@endforeach
	});
</script>
