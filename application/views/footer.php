
	</div><!--container-->
</div><!--body-->
<script>
	$(function(){
		$('a.remove').click(function(e){
			e.preventDefault();
			result = confirm("Do you want to remove this?");
			if(result){
				window.location.replace($(this).attr('href'));
			}
		});
	});
</script>
</body>
</html>