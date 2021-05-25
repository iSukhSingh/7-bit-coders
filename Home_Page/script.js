function clicked(e) {
  document.querySelector('#images').click();
}
function preview(e) {
  if (e.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e){
      document.querySelector('#postPreview').setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}

$(document).ready(function(){ 
	$('#form').on('submit', function(event){
		event.preventDefault();
		var formData = $(this).serialize();
		$.ajax({
			url: "post.php",
			method: "POST",
			data: formData,
			dataType: "JSON",
			success:function(response) {
					$('#form')[0].reset();
					display();
			}
		})
	});	
});

function display() {
	$.ajax({
		url:"post.php",
		method:"POST",
		success:function(response) {
			$('#display').html(response);
		}
	})
}

