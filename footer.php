</section> <!-- /.container --> 
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script>
var $ =jQuery.noConflict();
$(document).ready(function(){
	$(".menushow").click(function(e){
		e.preventDefault();
		//$(this).find("span").html("x");
		$(".menupanel").toggle();
	});
//	console.log( "document loaded" );
}); 
</script>
</body> 
</html>
