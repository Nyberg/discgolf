
	window.onload = document.getElementById('selectedCourse').style.display = "none";
	window.onload = document.getElementById('addPlayers').style.display = "none";
	window.onload = document.getElementById('showPlayers').style.display = "none";
	window.onload = document.getElementById('startBtn').style.display = "none";
	//window.onload = document.getElementById('CourseRound').style.display = "none";
	
	var courses = ['Skutberget', 'Forshaga', 'Hästhagen', 'Brickeberg', 'Kristinehamn'];
	var coursePar = ['67', '60', '64', '59', '28'];
	var courseRecord = ['60', '50', '58', '51', '20'];
	var par = 0;
	var course;
	var players = ['Albin', 'Alexander', 'Johannes', 'Magnus', 'Simon'];
	var playing = [];
	var holes = ['18', '18', '18', '18', '12'];
	var pars = ['3','3','3','3','3','3','3','3','3','4','3','3','3','3','3','3','3','3'];
	var length = ['80','120','115','70','60','55','100','100','90','140','70','100','82','120','55','78','60','105'];	var check = 0;
	var selectedCourse;
	var selectedPar;
	var check = 0;
	
	function getCourse(check){
		var x = document.getElementById("getCourse").selectedIndex;
    	course = document.getElementsByTagName("option")[x].value;
    	var par = coursePar[x];
    	showCourse(course, par, check);
	}

	function showCourse(course, par){

		var selectedCourse = courses[course];
		var selectedPar = par;
		
		console.log(selectedCourse, selectedPar);
		console.log(course);
		if(check == 0){
		document.getElementById('selectCourse').style.display = "none";
		document.getElementById('selectedCourse').style.display = "";
		document.getElementById('CourseName').innerHTML = courses[course];
		document.getElementById('CoursePar').innerHTML = "Course Par: " + coursePar[course];
		document.getElementById('CourseRecord').innerHTML = "Course Record: " + courseRecord[course];
		document.getElementById('addPlayers').style.display = "";
		document.getElementById('showPlayers').style.display = "";
		check++;
		}else{
		
			showHole(selectedCourse, selectedPar, course);
		}
	}
	
	function addPlayer(){
		var y = document.getElementById("getPlayers").selectedIndex;
		var selectedplayer = document.getElementsByTagName("option")[y].value;
		var player = players[selectedplayer];
		playing.push(player);			
		showPlayers(player);
	}
	
	function showPlayers(player){
		
		var div = document.createElement('div');
		div.className = 'panel panel-stack-first panel-info text-center';
		div.innerHTML = '<p class="shrink">'+player+'</p>';
		div.id = "div";
		document.getElementById('showPlayers').appendChild(div);
		document.getElementById("div").onclick = function(){ removePlayer(player) }; 
}

	function removePlayer(player){	
		var element = document.getElementById('div');
		element.parentNode.removeChild(element);
	}

	function setPlayers(){
		document.getElementById('addPlayers').style.display = "none";
		document.getElementById('startBtn').style.display = "";
		
	}

		
	function startRound(selectedCourse, selectedPar){
		hidenshow();
		getCourse();
		
	}
	
	function hidenshow(){
		document.getElementById('showPlayers').style.display = "none";
		document.getElementById('startBtn').style.display = "none";
	}
	
	function  getSelectedCourse(par, course){
		console.log(pars);
		console.log(course);
	}
	
	function showHole(selectedCourse, selectedPar, course){
			var hole = holes[course];
			console.log(hole);
			
			for(var i = 0; i<pars.length;){ 
			document.getElementById('CourseName').innerHTML = selectedCourse;
			document.getElementById('CoursePar').innerHTML = "Course Par: " + coursePar[course];
			document.getElementById('CourseRecord').innerHTML = "Course Record: " + courseRecord[course];
			}
	}