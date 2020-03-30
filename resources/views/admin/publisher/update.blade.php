@extends('admin.layouts.master')
@section('content')
	<form action="{{ route('publisher.postEdit',[$pub->id]) }}" method="post">
		{{csrf_field()}}
		<div class="control-group">
			Pub name: <input type="text" name="txtPubName" class="form-control" value="{{$pub->pub_name}}">
		</div>
		<div class="control-group">
			Pub Description: <textarea name="txtPubDes" id="ckeditor" cols="30" rows="10">{{$pub->pub_des}}</textarea>  
		</div>
		<div class="control-group">
			<button type="submit" class="form-control btn btn-primary">Lưu</button>
		</div>
	</form>
	<script>
		$('#ckeditor').ckeditor();
	</script>
@endsection