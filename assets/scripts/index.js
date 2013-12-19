var Index = function() {
	cleardata=function(){
			$("#studid").val("");
				$("#studname").val("");
				$("#email").val("");
				$("#dob").val("");
				$("#phoneno").val("");
				$("#collegename").val("");
				$("#address1").val("");
				$("#address2").val("");
				$("#country").val("");
				$("#state").val("");
				$("#city").val("");

				$('.alert-error', $('#form_sample_1')).hide();
				$("#form_sample_1").validate().resetForm();
				$(".error").removeClass("error");
				$(".success").removeClass("success");
	};
	return {
		InitTable : function() {
			if (!jQuery().dataTable) {
				return;
			}
			// begin first table
			$('#sample_1').dataTable({
				"aoColumns" : [{
					"bSortable" : true
				}, {
					"bSortable" : true
				}, {
					"bSortable" : true
				}, {
					"bSortable" : false
				}, {
					"bSortable" : true
				}, {
					"bSortable" : false
				}, {
					"bSortable" : false
				}],
				"aLengthMenu" : [[5, 15, 20, -1], [5, 15, 20, "All"] // change per page values here
				],
				// set the initial value
				"iDisplayLength" : 5,
				"sDom" : "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
				"sPaginationType" : "bootstrap",
				"oLanguage" : {
					"sLengthMenu" : "_MENU_ records per page",
					"oPaginate" : {
						"sPrevious" : "Prev",
						"sNext" : "Next"
					}
				},
				"aoColumnDefs" : [{
					'bSortable' : false,
					'aTargets' : [0]
				}]
			});

			jQuery('#sample_1_wrapper .dataTables_filter input').addClass("m-wrap medium");
			// modify table search input
			jQuery('#sample_1_wrapper .dataTables_length select').addClass("m-wrap small");
			// modify table per page dropdown

		},
		InitValidation : function() {
			var form1 = $('#form_sample_1');
			var error1 = $('.alert-error', form1);
			var success1 = $('.alert-success', form1);

			form1.validate({
				errorElement : 'span', //default input error message container
				errorClass : 'help-inline', // default input error message class
				focusInvalid : false, // do not focus the last invalid input
				ignore : "",
				rules : {
					studname : {
						required : true,
						maxlength : 50
					},
					email : {
						required : true,
						email : true,
						maxlength : 50
					},
					dob : {
						required : true,
					},
					phoneno : {
						required : true,
						maxlength : 13,
						digits : true
					},
					collegename : {
						required : true,
						maxlength : 50
					},
					address1 : {
						required : true,
						maxlength : 100
					},
					address2 : {
						required : false,
						maxlength : 100
					},
					country : {
						required : true
					},
					state : {
						required : true
					},
					city : {
						required : true
					}
				},

				invalidHandler : function(event, validator) {//display error alert on form submit
					success1.hide();
					error1.show();
					App.scrollTo(error1, -200);
				},

				highlight : function(element) {// hightlight error inputs
					$(element).closest('.help-inline').removeClass('ok');
					// display OK icon
					$(element).closest('.control-group').removeClass('success').addClass('error');
					// set error class to the control group
				},

				unhighlight : function(element) {// revert the change done by hightlight
					$(element).closest('.control-group').removeClass('error');
					// set error class to the control group
				},

				success : function(label) {
					label.addClass('valid').addClass('help-inline ok')// mark the current input as valid and display OK icon
					.closest('.control-group').removeClass('error').addClass('success');
					// set success class to the control group
				},

				submitHandler : function(form) {
					success1.show();
					form.submit();
					error1.hide();
				}
			});
			
			
			
		},
		Inituidesign : function() {
			$("#tab2link").click(function() {
				cleardata();
			});
			$("#btncancel").click(function() {
				$("#tab1link").click();
			});
			
			$('.date-picker').datepicker({
				format:"dd-mm-yyyy"
			});
            
			$("#country").change(function() {
				$('#state').html('');
				$("#state").append("<option value=''>Select...</option>");
				$.ajax({
					url : $("#country").data("basepath")+"controller/state/" + $("#country").val(),
					dataType : 'json',
					async : false,
					success : function(json) {
						if (json) {
							$.each(json.StateList, function(i, item) {
								$("#state").append("<option value='" + item.stateId + "'>" + item.stateName + "</option>");
							});
						}
					}
				});
				$("#state").change();
			});
			
			$("#state").change(function() {
				$('#city').html('');
				$("#city").append("<option value=''>Select...</option>");
				$.ajax({
					url : $("#state").data("basepath")+"controller/city/" + $("#state").val(),
					dataType : 'json',
					async : false,
					success : function(json) {
						if (json) {
							$.each(json.CityList, function(i, item) {
								$("#city").append("<option value='" + item.cityId + "'>" + item.cityName + "</option>");
							});
						}
					}
				});
			});
		}
	};

}();

function UpdateStudeInfo(studId) {
	cleardata();
	$.ajax({
		url : $("#editlink").data("basepath")+"controller/index/" + studId,
		dataType : 'json',
		async : true,
		success : function(json) {
			if (json) {
				$("#studid").val(json.StudList.studID);
				$("#studname").val(json.StudList.studName);
				$("#email").val(json.StudList.studEmail);
				//$("#dob").val(json.StudList.studDOB);
				$("#dob").parent().data({date:"'"+json.StudList.studDOB+"'"}).datepicker('update').children("input").val(json.StudList.studDOB);  
				$("#phoneno").val(json.StudList.studPhoneNo);
				$("#collegename").val(json.StudList.studCollegeName);
				$("#address1").val(json.StudList.studAddress1);
				$("#address2").val(json.StudList.studAddress2);
				$("#country").val(json.StudList.countryID);
				$("#country").change();
				$("#state").val(json.StudList.stateId);
				$("#state").change();
				$("#city").val(json.StudList.studCity);
				
				$('#tab1link').parent().removeClass("active");
				$('#portlet_tab1').removeClass("active");
				$('#portlet_tab2').addClass("active");
			}
		}
	});
}
