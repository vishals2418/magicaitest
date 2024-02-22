function adsenseUpdate(user_id) {
	event.preventDefault();
	"use strict";

	document.getElementById("form_button").disabled = true;
	document.getElementById("form_button").innerHTML = "Please Wait...";

	var formData = new FormData();
	formData.append('status', $("#status").prop('checked') ? 1 : 0);
	formData.append('code', $("#code").val());

	$.ajax({
		type: "post",
		url: "/dashboard/admin/adsense/update/" + user_id,
		data: formData,
		contentType: false,
		processData: false,
		success: function (data) {
			toastr.success('Adsense saved succesfully.');
			document.getElementById("form_button").disabled = false;
			document.getElementById("form_button").innerHTML = "Update";
		},
		error: function (data) {
			var err = data.responseJSON.errors;
			$.each(err, function (index, value) {
				toastr.error(value);
			});
			document.getElementById("form_button").disabled = false;
			document.getElementById("form_button").innerHTML = "Update";
		}
	});
	return false;
}