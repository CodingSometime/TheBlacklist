function defaultTheme() {
	const theme = localStorage.getItem("localTheme") ? localStorage.getItem("localTheme") : "light";
	toggleThemes(theme);
}

function toggleThemes(theme) {
	localStorage.setItem("localTheme", theme);
	document.body.classList.remove("theme-dark");
	document.body.classList.remove("theme-light");
	document.body.classList.add(`theme-${theme}`);
}

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
	return new bootstrap.Tooltip(tooltipTriggerEl);
});

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
	"use strict";

	// Fetch all the forms we want to apply custom Bootstrap validation styles to
	var forms = document.querySelectorAll(".needs-validation");
  var buttonSubmit = document.querySelector("#buttonSubmit");

	// Loop over them and prevent submission
	Array.prototype.slice.call(forms).forEach(function (form) {
		form.addEventListener(
			"submit",
			function (event) {
				if (!form.checkValidity()) {
					event.preventDefault();
					event.stopPropagation();
				}
				console.log(form);
				form.classList.add("was-validated");
			},
			false
		);
	});
})();


function formActionSaveHandler(myForm){
	
}

function formActionRemoveHandler(myForm){
	
}