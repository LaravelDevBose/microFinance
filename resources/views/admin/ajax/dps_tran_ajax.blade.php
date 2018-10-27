
<script>
	$( document ).ready(function() {
	    $('#dps_trans select[name="mem_id"]').change(function(e){
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
	});

	$('#dps_submit').click(function(){
		
		var res = validation(dps_trans);
		return false;
	});

	function validation(argument) {

		alert($('#'+argument+' #member_name').val());
		return false;
	}
</script>



