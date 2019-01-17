$(function() {
	$('.policydependentFields').hide();
	
	/*var policy_type_val = $('#policy_type option:selected').text();
	if(policy_type_val == 'Life') {
		$('.policyBlankColumn').hide();
		$('.policydependentFields').hide();
		$('#LifeDiv').show(); 
	} else if (policy_type_val == 'Liability/Umbrella') {
		$('.policyBlankColumn').hide();
		$('.policydependentFields').hide();
		$('#UmbrellaDiv').show();
	} else {
		$('.policyBlankColumn').show();
		$('.policydependentFields').hide();
	}*/
	
	/*//Dynamically show/hide policy specific fields.
	$('#policy_type').change(function(){//alert($('#policy_type option:selected').text());
		var policy_type_value = $('#policy_type option:selected').text();
        if(policy_type_value == 'Life') {
			$('.policyBlankColumn').hide();
			$('.policydependentFields').hide();
            $('#LifeDiv').show(); 
        } else if (policy_type_value == 'Liability/Umbrella') {
			$('.policyBlankColumn').hide();
			$('.policydependentFields').hide();
			$('#UmbrellaDiv').show();
        } else {
			$('.policyBlankColumn').show();
			$('.policydependentFields').hide();
        }
    });*/
	
	$.each($("#policy_type option:selected"), function(){
		//alert($(this).text());
		//countries.push($(this).val());
		var selectedText = $(this).text();
		if(selectedText == 'Life') {
			$('#LifeDiv').show(); 
		}
		if (selectedText == 'Liability/Umbrella') {
			$('#UmbrellaDiv').show(); 
		}
	});
	
	//Dynamically show/hide policy specific fields.
	$('#policy_type').change(function(){
		var lifeFlag = false;
		var umbrellaFlag = false;
		//var countries = [];
		$.each($("#policy_type option:selected"), function(){
			//alert($(this).text());
			//countries.push($(this).val());
			var selectedText = $(this).text();
			if(selectedText == 'Life') {
				lifeFlag = true;
			} else if (selectedText == 'Liability/Umbrella') {
				umbrellaFlag = true;
			}
		});
		
		if(lifeFlag == true)
		{
			$('#LifeDiv').show();
		}
		else {
			$('#LifeDiv').hide();
		}
		
		if(umbrellaFlag == true)
		{
			$('#UmbrellaDiv').show();
		}
		else {
			$('#UmbrellaDiv').hide();
		}
		
		//alert("You have selected the country - " + countries.join(", "));
	});
});