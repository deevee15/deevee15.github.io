$(document).ready(function() {
    $("#form_login").submit(function() {
		$.ajax({
			type: "POST",
			url: "/settings/singin.php",
			data: $(this).serialize()
		}).done(function() {
			$(this).find("input").val("");
			if(data==''){
                alert("введите логин епты");
            }
			$("#form_login").trigger("reset");
		});
		return false;
	});
	
});