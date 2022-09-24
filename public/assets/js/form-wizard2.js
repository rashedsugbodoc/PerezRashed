$(function() {
	'use strict'
	$('#wizard1').steps({
		headerTag: 'h3',
		bodyTag: 'section',
		autoFocus: true,
		titleTemplate: '<span class="number">#index#<\/span> <span class="title">#title#<\/span>'
	});
	$('#wizard2').steps({
		headerTag: 'h3',
		bodyTag: 'section',
		autoFocus: true,
		onInit :function (event, current) {
		   $('.actions a[href="#finish"]').attr('id', 'submit');
		},
		labels: {
			finish: "Submit",
		},
		titleTemplate: '<span class="number">#index#<\/span> <span class="title">#title#<\/span>',
		onStepChanging: function(event, currentIndex, newIndex) {
			if (currentIndex < newIndex) {
				// Step 1 form validation
				if (currentIndex === 0) {
					var fname = $('#firstname').parsley();
					var lname = $('#lastname').parsley();
					var bdate = $('#bdate').parsley();
					var civil_status = $('#civil_status').parsley();

					if (fname.isValid() && lname.isValid() && bdate.isValid() && civil_status.isValid()) {
						return true;
					} else {
						fname.validate();
						lname.validate();
						bdate.validate();
						civil_status.validate();
					}
				}
				// Step 2 form validation
				if (currentIndex === 1) {
					var address = $('#address').parsley();
					var country = $('#country').parsley();
					var state = $('#state').parsley();
					var city = $('#city').parsley();
					if (address.isValid() && country.isValid() && state.isValid() && city.isValid()) {
						return true;
					} else {
						address.validate();
						country.validate();
						state.validate();
						city.validate();
					}
				}
				// Step 3 from validation
				if (currentIndex === 2) {
					var email = $('#email').parsley();
					
					var password = $('#password').parsley();
					if (email.isValid() && password.isValid()) {
						return true;
					} else {
						email.validate();
						
						password.validate();
					}
				}
				// Always allow step back to the previous step even if the current step is not valid.
			} else {
				return true;
			}
		}
	});
	$('#wizard3').steps({
		headerTag: 'h3',
		bodyTag: 'section',
		autoFocus: true,
		titleTemplate: '<span class="number">#index#<\/span> <span class="title">#title#<\/span>',
		stepsOrientation: 1
	});
});