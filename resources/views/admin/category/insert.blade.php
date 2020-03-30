@extends('admin.layouts.master')
@section('content')
	<form action="{{ route('category.postAdd') }}" method="post">
		{{csrf_field()}}
		<div class="control-group">
			Cat name: <input type="text" name="txtCatName" class="form-control" required>
		</div>
		<div class="control-group">
			Cat Description: <textarea name="txtCatDes" id="ckeditor" cols="30" rows="10"></textarea>  
		</div>
		<div class="control-group">
			<button type="submit" class="form-control btn btn-warning">Thêm</button>
		</div>
	</form>
	<script>
		$('#ckeditor').ckeditor();
	</script>
@endsection