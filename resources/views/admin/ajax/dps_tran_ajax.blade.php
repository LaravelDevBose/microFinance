
<script>
	$( document ).ready(function() {

	    $('#dps_trans select[name="member_id"]').change(function(e){
	    	
			var mem_id = e.target.value;
			$('#dps_trans input[name="member_name"]').val('');
			if(mem_id >=1){
				$.ajax({
					url:'<?= url('/');?>/admin/find/member/'+mem_id,
					type:"GET",
					dataType:'json',
					success:function(data){
						// alert(data);
						console.log(data);
						if(data != 0){
							$('#dps_trans input[name="member_name"]').val(data.mem_name);
							$('#dps_trans input[name="inst_amount"]').val(data.inst_amount);
							$('#dps_trans input[name="crt_balance"]').val(data.balance);
						}else{
							swal({
				              text: "No Data Found",
				              icon: "info",
				              buttons: false,
				              timer: 1500,
				            });
						}
					},error:function(error){
						console.log(error);
						swal({
			              text: "Some Error Found",
			              icon: "error",
			              buttons: false,
			              timer: 1500,
			            });
					}
				});
			}else{
				swal({
	              text: "Select Member Id First.",
	              icon: "warning",
	              buttons: false,
	              timer: 1500,
	            });
			}
		});

		$('.dps_submit').click(function(){

			var mem_id = $('#member_id').val();
			var amount = $('#amount').val();
			alert(mem_id);
			if(mem_id != 0 && amount != 0 && amount != ''){

				$.ajax({
					url:'<?= route("dps.store")?>',
					type:'POST',
					dataType:'html',
					data:$('#dps_trans').serialize(),
					success:function(data){
						$('#tBody').empty();
						if(data != 0){
							$('#tBody').html(data);
							swal({
					              text: "DPS Store Successfully..!",
					              icon: "success",
					              buttons: false,
					              timer: 1800,
					        });
						}else{
							swal({
					              text: "DPS Not Store Successfully..!",
					              icon: "warning",
					              buttons: false,
					              timer: 1800,
					        });
						}
					},error:function(error){
						console.log(error);
						swal({
				              text: "Some Thing Found Wrong",
				              icon: "warning",
				              buttons: false,
				              timer: 1800,
				        });
					}
				});
			}else{
				if(mem_id == 0 || mem_id == ''){
					$('#member_id').css('border','1px solid red');
					swal({
			              text: "Select Member Id First.",
			              icon: "warning",
			              buttons: false,
			              timer: 1800,
			        });
			        return false;
				}

				if(amount == 0 && amount == ''){
					$('#amount').css('border','1px solid red');
					if(amount == 0){
						swal({
				              text: "Zero Is not Valid Amount.",
				              icon: "warning",
				              buttons: false,
				              timer: 1800,
				        });
					}else{
						swal({
				              text: "Amount Field is Required",
				              icon: "warning",
				              buttons: false,
				              timer: 1800,
				        });
					}
					
			        return false;
				}
				return true;
			}
			
			
		});












	});

	

	
</script>



