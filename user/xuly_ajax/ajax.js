$(document).ready(function(){
	$('#submit-signout').click(function(e){
		$.confirm({
			icon: 'glyphicon glyphicon-edit',
				title: 'Thông báo',
				content: 'Bạn có muốn đăng xuất không?',
				type: 'red',
				typeAnimated: true,
				buttons: {
				Yes: {
						text: 'Đồng ý',
				   		 btnClass: 'btn-success',
				   		 action:
					  		 function() {
	                    	$.post("#",{thaotac:'dangxuat'}, 
	                        function(data) {
	                            location.reload();
	                        });
	                }
					},
			       Close:{
		        	text: "Quay lại",
			          close: function(){}
					}
				 }

			});
		})
})
											
													