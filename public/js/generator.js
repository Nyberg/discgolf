	/* Number generator */
	window.onload = document.getElementById('metrics-forms').style.display = "none";
	
	var num = 0;
	var num1;
	var num2;
	var metrics3 = ['centimeter', 'feet','meter', "kilometer", "mile"];
	var metrics4 = ['1','34.48','100','100000','140000'];
	
	function getNumber(){
	
		var input = document.getElementById("inputNum").value;
		var number = input;
    	updateGeneration(number);	
	}
	
		function updateGeneration(number){
		
			var x = document.getElementById("getOption").selectedIndex;
    		var metric1 = document.getElementsByTagName("option")[x].value;
    		var y = document.getElementById("getSecondOption").selectedIndex;
			var metric2 = document.getElementsByTagName("option")[y].value;
			
			var calc = (number * metrics4[metric1]) / metrics4[metric2];
			
			document.getElementById('genNumber').value = calc.toFixed(3);;
			checkMetrics2(calc, metric1, metric2);	
			checkMetrics1(number, metric1, metric2);	
	} 

	function checkMetrics2(calc, metric1, metric2){
		
		if(calc < 1){
			document.getElementById('metric-2').innerHTML = metrics3[metric2];
		} 
		else{
			document.getElementById('metric-2').innerHTML = metrics3[metric2] + "s";
		}
	
	}
	
	function checkMetrics1(number, metric1, metric2){
		console.log(metric1);
		if(number <= 1){
			document.getElementById('metric-1').innerHTML = metrics3[metric1];
		}else{
			document.getElementById('metric-1').innerHTML = metrics3[metric1] + "s";
		}
	
	}
	
	function startGenerator(){
	
	getOption();

	function showForms(num1, num2){
		window.onload = document.getElementById('metrics-forms').style.display = "";	
		document.getElementById('metric-1').innerHTML = metrics3[num1];
		document.getElementById('metric-2').innerHTML = metrics3[num2];
	}
	
	function getOption() {
    var x = document.getElementById("getOption").selectedIndex;
    //console.log(document.getElementsByTagName("option")[x].value);
    var num1 = document.getElementsByTagName("option")[x].value;
    getSecondOption(num1);
}

	function getSecondOption(num1){
	var y = document.getElementById("getSecondOption").selectedIndex;
	var num2 = document.getElementsByTagName("option")[y].value;
	//console.log(num1 + " hej " + num2);
	
	showForms(num1, num2);
	}
	
	}