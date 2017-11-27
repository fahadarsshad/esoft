	</div><!--row wrapper-->
		<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>
		<script src="<?php echo base_url(); ?>js/materialize.min.js"></script>
		<script>
			$(document).ready(function(){
				$(".button-collapse").sideNav();
				$('select').material_select();
				$('#search-product').on('blur',function (e) {
                	
                    var prCode = $(this).val();
                    jQuery.ajax({
					type: "GET",
					url: "<?php echo base_url(); ?>" + "index.php/product/get_product_ajax/"+prCode,
					dataType: 'json',
					success: function(res){
						if (res)
						{
							 
								console.log(res.product_id);
								$('#invoice_table').append('<tr><td><input type="text"  name="code" id="code" value="'+res.product_code+'" ></td><td><input type="text"  name="prname" id="prname" value="'+res.product_name+'" ></td><td><input type="text"  name="prtype" id="prtype" value="'+res.product_shead+'" ></td><td><input type="text"  name="prsize" id="prsize" value="'+res.product_size_id+'" ></td><td><input type="text"  name="prcolor" id="prcolor" value="'+res.product_color_id+'" ></td><td><input type="text"  name="prprice" id="prprice" value="'+res.product_wprice+'" ></td><td><input type="text"  name="prqty" id="prqty" value="" ></td><td><input type="text"  name="pramount" id="pramount" value="" ></td><td id="remove">Remove</td></tr>');
							
						}
					}
				});
                });
                
                $('#invoice_table').on('click','td#remove',function(){
                     $(this).parent().remove();
                        return false;
                });
                
                $('#save').on('click',function(){
                	var table = new Array(); 
                	var table = $('table#invoice_table tr').map(function() {
					  return $(this).find('td input').map(function() {
					    return $(this).val();
					  }).get();
					}).get();
                	
                	jQuery.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>" + "index.php/product/save_product_ajax",
					data:{table_array:table},
					dataType: 'json',
					success: function(res){
						if (res)
						{
							console.log(res); 
									
						}
					}
				});
                		
                });
                
                $('#invoice_table').on('blur','td input#prqty',function(){
                     var prprice = parseInt($(this).closest('tr').find('#prprice').val());
                     var prqty = parseInt($(this).val());
                     var pramount = prprice * prqty;
                     $(this).closest('tr').find('#pramount').val(pramount);
                });
                
			});
		</script>
				
	</body>
</html>