@extends('admin.layouts.master')
@section('content')
<form action="{{ route('book.postEdit',[$book->id]) }}" method="post" enctype="multipart/form-data">
	{{csrf_field()}}

    <!-- pattern="[a-zA-Z0-9*\s]+" -->
    <!-- Loại dc kí tự đặc biệt nhưng ko gõ dc kí tự có dấu -->
	<div class="control-group">
		Book name: <input class="form-control" type="text" name="txtBookName" value="{{$book->book_name}}" required>	
	</div>
	 
	 <div class="control-group">
	 	Current Image:
			<img src="/public/images/{{$book->book_img}}" alt="$book->book_name" style="width: 250px; height: 400px; margin:25px 0 25px 0;">	
			
	 </div>
	
	<div class="control-group">
			Book Image: <input id="file_input" name="txtImg" type="file" data-preview-file-type="text">
	</div>
	

	<div class="control-group">
		Book Price: <input class="form-control" type="text" name="txtBookPrice" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{$book->book_price}}" required>
	</div>
        
    <div class="control-group" dir="rtl">
        <label for="input-tags">:Book HighLight</label>
        <select name="txtBookHighlight" class="select-state" placeholder="Select a state..." required>
        	<option value="0">Thông thường</option>
        	<option value="1" {{$book->book_highlight == 1?'selected':''}}>Nổi bật</option>>
        </select>
    </div>	    

    <div class="control-group" dir="rtl">
        <label for="input-tags">:Book Promotion</label>
        <select name="txtBookPromotion" class="select-state" placeholder="Select a state..." required>
        	<option value="0">Thông thường</option>
        	<option value="1" {{$book->book_promotion == 1?'selected':''}}>Khuyến mãi</option>        	
        </select>
    </div>

    <div class="control-group" dir="rtl">
        <label for="input-tags">:Category</label>
        <select name="txtCategory" class="select-state" placeholder="Select a state..." required>
        	@foreach($listCat as $item)
        			<option value="{{$item->id}}" {{$book->cat_id == $item->id ? 'selected' : ''}}>{{$item->cat_name}}</option>
        	@endforeach        	
        </select>
    </div>	

    <div class="control-group" dir="rtl">
        <label for="input-tags">:Publisher</label>
        <select name="txtPublisher" class="select-state" placeholder="Select a state..." required>
        	@foreach($listPub as $item)
        			<option value="{{$item->id}}" {{$book->pub_id == $item->id ? 'selected' : ''}}>{{$item->pub_name}}</option>
        	@endforeach
        </select>
    </div>	

	<div class="control-group">
		Book Quantity: <input class="form-control" type="number" min="1" max="999" name="txtBookQuantity" value="{{$book->book_quantity}}" required>
	</div>

<!--     This is Js editor: <textarea name="txtDes" id="" cols="30" rows="10">{!! old('txtContent') !!}</textarea>
    <script>CKEDITOR.replace('txtDes');</script> -->

	Book Description: <textarea name="txtDes" id="ckeditor" cols="30" rows="10">{{$book->book_description}}</textarea>    
	
    <div class="control-group">
        <button type="submit" class="btn btn-primary form-control">Lưu</button>
    </div>
</form>

    <script type="text/javascript">
    	
        $('#ckeditor').ckeditor();

        $("#file_input").fileinput({
    		'theme': 'fas',
		    'language': 'vi',
		  	'showUpload': false,   			   
		    'allowedFileExtensions': ['jpg', 'png', 'gif']
    	});

	    $('.select-state').selectize({
	    	plugins: ['remove_button'],
	        persist: false,
	        createOnBlur: true,
	        create: true
	    });
    </script>
@stop