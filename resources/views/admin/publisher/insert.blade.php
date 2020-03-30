@extends('admin.layouts.master')
@section('content')
	<form action="{{ route('publisher.postAdd') }}" method="post">
		{{csrf_field()}}
		<div class="control-group">
			Pub name: <input type="text" name="txtPubName" class="form-control" required>
		</div>
		<div class="control-group">
			Pub Description: <textarea name="txtPubDes" id="ckeditor" cols="30" rows="10"></textarea>  
		</div>
		<div class="control-group">
			<button type="submit" class="form-control btn btn-warning">Thêm</button>
		</div>
	</form>
	<script>
		$('#ckeditor').ckeditor();
	</script>
@endsection