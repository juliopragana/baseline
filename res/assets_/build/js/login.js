$("#password").keyup(function(event) {
  var alert = document.getElementById("alert"); 
  alert.innerHTML = '';
  if (event.keyCode === 13) {
      $("#btn_login").click();
  }
});

$("#password").keyup(function(event){
  var alert = document.getElementById("alert"); 
  alert.innerHTML = '';
});

var formAnim = {
	$form: $('#form'),
	animClasses: ['face-up-left', 'face-up-right', 'face-down-left', 'face-down-right', 'form-complete', 'form-error'],
	resetClasses: function() {
		var $form = this.$form;
		
		$.each(this.animClasses, function(k, c) {
			$form.removeClass(c);
		});
	},
	faceDirection: function(d) {
		this.resetClasses();
		
		d = parseInt(d) < this.animClasses.length? d : -1;
		
		if(d >= 0) {
			this.$form.addClass(this.animClasses[d]);
		} 
	}
}

var $input = $('#user, #password'),
		$submit = $('#submit'),
		focused = false,
		completed = false;


$input.focus(function() {
	focused = true;
	
	if(completed) {
		formAnim.faceDirection(1);
	} else {
		formAnim.faceDirection(0);
	}
});

$input.blur(function() {
	formAnim.resetClasses();
});

$input.on('input paste keyup', function() {
	completed = true;
	
	$input.each(function() {
		if(this.value == '') {
			completed = false;
		}
	});
	
	if(completed) {
		formAnim.faceDirection(1);
	} else {
		formAnim.faceDirection(0);
	}
});


$("#btn_login").click(function() {

  
  var user = $("#user").val();
  var pass = $("#password").val();


	focused = true;
	formAnim.resetClasses();
	
 
  
		$.ajax({

			type: 'POST',

			url: '/login',

			data: { user: user, pass: pass},

			success: function (data) {
				
				if (data == "unauthorized access"){
				var alert = document.getElementById("alert"); 
				alert.innerHTML = '<span>\
									Usuário ou senha inválidos\
									</span>'
				} else if(data == "without permission"){
				var alert = document.getElementById("alert"); 
				alert.innerHTML = '<span2>\
									Você não tem permissão de acesso\
									</span2>'
				} else{
				//   if(completed) {
				//   	$submit.css('pointer-events', 'none');
				//   	setTimeout(function() {
				//   		formAnim.faceDirection(4);
				//   		$input.val('');
				//   		completed = false;

				//   		setTimeout(function() {
				//   			$submit.css('pointer-events', '');
				//   			formAnim.resetClasses();
				//   		}, 2000);
				//   	}, 1000);
				//   } else {
				//   	setTimeout(function() {
				//   		formAnim.faceDirection(5);

				//   		setTimeout(function() {
				//   			formAnim.resetClasses();
				//   		}, 2000);
				//   	}, 1000);
				//   }
				window.location.href ='/controller';
				}
				
			}
		});

	// if(completed) {
	// 	$submit.css('pointer-events', 'none');
	// 	setTimeout(function() {
	// 		formAnim.faceDirection(4);
	// 		$input.val('');
	// 		completed = false;

	// 		setTimeout(function() {
	// 			$submit.css('pointer-events', '');
	// 			formAnim.resetClasses();
	// 		}, 2000);
	// 	}, 1000);
	// } else {
	// 	setTimeout(function() {
	// 		formAnim.faceDirection(5);

	// 		setTimeout(function() {
	// 			formAnim.resetClasses();
	// 		}, 2000);
	// 	}, 1000);
	// }
});


$(function() {
	setTimeout(function() {
		if(!focused) {
			$input.eq(0).focus();
		}
	}, 2000);
})





// function login(){
  

//   $.ajax({

//       type: 'POST',
  
//       url: '/login',
  
//       data: { user: user, pass: pass},
  
//       success: function (data) {
          
//           if (data == "unauthorized access"){
//             var alert = document.getElementById("alert"); 
//             alert.innerHTML = '<div class="alert alert-danger" role="alert" style="background-color: red; color: #fff;">\
//                                 Usuário ou senha inválidos\
//                               </div>'
//           } else if(data == "without permission"){
//             var alert = document.getElementById("alert"); 
//             alert.innerHTML = '<div class="alert alert-danger" role="alert" style="background-color: red; color: #fff;">\
//                                 Você não tem permissão de acesso\
//                               </div>'
//           } else{
//             window.location.href ='/painel';
//           }
          
//       }
//   });

// }