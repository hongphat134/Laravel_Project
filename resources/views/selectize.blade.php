<link rel="stylesheet" href="public/selectize/selectize.default.css">
<!--[if IE 8]><script src="js/es5.js"></script><![endif]-->
<script src="public/js/jquery.min.js"></script> 
<script src="public/selectize/selectize.min.js"></script>
<!-- Plugin UI -->
<script src="public/selectize/jqueryui.js"></script>

<div id="wrapper">
	<form action="{{ route('plugin') }}" method="get">
	<div class="demo">        
	    <div class="control-group" dir="rtl">
	        <label for="input-tags">Tags:</label>
	        <select name="tag[]" id="select-state" placeholder="Select a state..." multiple>
	        	<option value="Awesome" selected="">Awesome</option>
	        	<option value="Nice">Nice</option>
	        	<option value="Perfect">Perfect</option>
	        </select>
	    </div>	    
	</div>			
	<button type="submit">Send</button>
	</form>
	
</div>

<script>
    $('#select-state').selectize({
    	plugins: ['remove_button'],
        persist: false,
        createOnBlur: true,
        create: true
    });
</script>
