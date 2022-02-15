// set default page load toggle theme color
function defaultTheme() {
	const theme = localStorage.getItem("localTheme") ? localStorage.getItem("localTheme") : "light";
	toggleThemes(theme);
}

// change theme color > light or dark
function toggleThemes(theme) {
	localStorage.setItem("localTheme", theme);
	document.body.classList.remove("theme-dark");
	document.body.classList.remove("theme-light");
	document.body.classList.add(`theme-${theme}`);
}

// for formatting date from th to en before commit!
function dateformat(strDate) {
	try {
		const d = new Date(strDate.split("/").reverse().join("-"));
		const dd = d.getDate();
		const mm = d.getMonth() + 1;
		const yy = d.getFullYear();
		const newdate = yy + "/" + mm + "/" + dd;
		return newdate;
		
	} catch (error) {
		return null;
	}
}

// for bootstap tooltips
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
	return new bootstrap.Tooltip(tooltipTriggerEl);
});

// custom validate bootstrap form-control validation highlight colors
// JavaScript for disabling form submissions if there are invalid fields
(function () {
	"use strict";

	// Fetch all the forms we want to apply custom Bootstrap validation styles to
	var forms = document.querySelectorAll(".needs-validation");

	// Loop over them and prevent submission
	Array.prototype.slice.call(forms).forEach(function (form) {
		form.addEventListener(
			"submit",
			function (event) {
				if (!form.checkValidity()) {
					event.preventDefault();
					event.stopPropagation();
				}
				form.classList.add("was-validated");
			},
			false
		);
	});
})();
