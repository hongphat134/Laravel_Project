@extends('admin.layouts.master')
@section('content')
	<form action="{{ route('category.postEdit',[$cat->id]) }}" method="post">
		{{csrf_field()}}
		<div class="control-group">
			Cat name: <input type="text" name="txtCatName" class="form-control" value="{{$cat->cat_name}}">
		</div>
		<div class="control-group">
			Cat Description: <textarea name="txtCatDes" id="ckeditor" cols="30" rows="10">{{$cat->cat_des}}</textarea>  
		</div>
		<div class="control-group">
			<button type="submit" class="form-control btn btn-primary">Lưu</button>
		</div>
	</form>
	<script>
		$('#ckeditor').ckeditor();
	</script>
@endsection