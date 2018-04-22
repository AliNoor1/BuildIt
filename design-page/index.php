<html>
	<head>
		<meta charset="UTF-8">
		<script src='//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
        <link href="/css/navbar.css" type="text/css" rel="stylesheet">
		<link href="BuildIT_Design_Page_style.css" type="text/css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<title>Design</title>
	<body>

    <!-- NAVIGATION BAR -->
    <?php include $_SERVER['DOCUMENT_ROOT']."/common/navbar.php";?>

	<form method="post" action="index.php" name="registerform" class="registerform">
        <div class="register-input">
			<br></br>
			<label for="projectname">Project Name:</label>
			<input type="text" name="projectname"/>
			<br></br>
			
			<div style="width:860px; height:332px; margin-left:10px; overflow:hidden">
				<div style="width:600px; height:332px; float:left">
					Select a door:</br>
					<input type="radio" id="door1" name="doortype" value="simple" onClick="changeDoor();">6-Panel Primed Premium Steel Door Slab - 36" x 80", $100<br>
					<input type="radio" id="door2" name="doortype" value="nicer" onClick="changeDoor();">6-Panel Primed Inswing Steel Door with Brickmould - 30" x 80", $175<br>
					<input type="radio" id="door3" name="doortype" value="double" onClick="changeDoor();">Smooth Carrara Core Primed Molded Composite Double Door - 60" x 80", $400<br>
					<script>
						function changeDoor(){
							if(doorLocation == 1){
								if (document.getElementById("door1").checked){
									if (parseInt($("#incdec input").val()) > 3){
										document.getElementById("picture").src = "simpledoor.jpg"; 
										doorType=1;Build();drawData();BuildF();drawDataF(); } }
								else if (document.getElementById("door2").checked){ 
									if (parseInt($("#incdec input").val()) > 2){
										document.getElementById("picture").src = "nicerdoor.jpg"; 
										doorType=2;Build();drawData();BuildF();drawDataF(); } }
								else if (document.getElementById("door3").checked){ 
									if (parseInt($("#incdec input").val()) > 5){
										document.getElementById("picture").src = "doubledoor.jpg"; 
										doorType=3;Build();drawData();BuildF();drawDataF();} }
										
								if (parseInt($("#incdec input").val()) < 4 ) { // only door 2 can fit
									if (document.getElementById("door1").checked){
										document.getElementById("door1").checked = false;
										document.getElementById("picture").src = "white-background.jpg"; 
										doorType=0;doorLocation=0;Build();drawData();BuildF();drawDataF(); }
									if (document.getElementById("door3").checked){
										document.getElementById("door3").checked = false;
										document.getElementById("picture").src = "white-background.jpg"; 
										doorType=0;doorLocation=0;Build();drawData();BuildF();drawDataF(); } }
								else if (parseInt($("#incdec input").val()) < 6 ) {
									if (document.getElementById("door3").checked){
										document.getElementById("door3").checked = false;
										document.getElementById("picture").src = "white-background.jpg"; 
										doorType=0;doorLocation=0;Build();drawData();BuildF();drawDataF(); } }
							}
							if(doorLocation == 2){
								if (document.getElementById("door1").checked){
									if (parseInt($("#incdec1 input").val()) > 3){
										document.getElementById("picture").src = "simpledoor.jpg"; 
										doorType=1;Build();drawData();BuildF();drawDataF(); } }
								else if (document.getElementById("door2").checked){ 
									if (parseInt($("#incdec1 input").val()) > 2){
										document.getElementById("picture").src = "nicerdoor.jpg"; 
										doorType=2;Build();drawData();BuildF();drawDataF(); } }
								else if (document.getElementById("door3").checked){ 
									if (parseInt($("#incdec1 input").val()) > 5){
										document.getElementById("picture").src = "doubledoor.jpg"; 
										doorType=3;Build();drawData();BuildF();drawDataF();} }
										
								if (parseInt($("#incdec1 input").val()) < 4 ) { // only door 2 can fit
									if (document.getElementById("door1").checked){
										document.getElementById("door1").checked = false;
										document.getElementById("picture").src = "white-background.jpg"; 
										doorType=0;doorLocation=0;Build();drawData();BuildF();drawDataF(); }
									if (document.getElementById("door3").checked){
										document.getElementById("door3").checked = false;
										document.getElementById("picture").src = "white-background.jpg"; 
										doorType=0;doorLocation=0;Build();drawData();BuildF();drawDataF(); } }
								else if (parseInt($("#incdec1 input").val()) < 6 ) {
									if (document.getElementById("door3").checked){
										document.getElementById("door3").checked = false;
										document.getElementById("picture").src = "white-background.jpg"; 
										doorType=0;doorLocation=0;Build();drawData();BuildF();drawDataF(); } }
							}
						}
						
					</script>
					
					<p></p>
					Select a door location:
					<button type="button" onclick="if(windowLocationF!=1){doorLocation=1;changeDoor();}">Front</button>
					<button type="button" onclick="if(windowLocationL!=1){doorLocation=2;changeDoor();}">Side</button>
					</br>
					
					<p></p>
					Select a window:</br>
					<input type="radio" id="window1" name="windowtype" value="sliding1" onClick="changeWindow()">Right-Hand Sliding Vinyl Window - 24" x 24", $100<br>
					<input type="radio" id="window2" name="windowtype" value="sliding2" onClick="windowType=2;changeWindow()">Right-Hand Sliding Vinyl Window - 32" x 32", $200<br>
					<input type="radio" id="window4" name="windowtype" value="hung1" onClick="windowType=4;changeWindow()">Single Hung Vinyl Window - 24" x 47.5", $150<br>
					<input type="radio" id="window5" name="windowtype" value="hung2" onClick="windowType=5;changeWindow()">Single Hung Vinyl Window - 24" x 32", $120<br>
					<input type="radio" id="window6" name="windowtype" value="hung3" onClick="windowType=6;changeWindow()">Single Hung Vinyl Window - 32" x 32", $160<br>
					<input type="radio" id="window7" name="windowtype" value="casement" onClick="windowType=7;changeWindow()">Left-Hand Casement Vinyl Window - 24" x 32, $180<br>
					
					<p></p>
					Window location:
					<input type="checkbox" id="windowlocF" name="windowloc" onClick="addWindow();">Front  
					<input type="checkbox" id="windowlocL" name="windowloc" onClick="if(doorLocation!=2){addWindow();}">Left  
					<input type="checkbox" id="windowlocB" name="windowloc" onClick="addWindow();">Back  
					<input type="checkbox" id="windowlocR" name="windowloc" onClick="addWindow();">Right  
					
					<script>
						function changeWindow(){
							if (document.getElementById("window1").checked){
								document.getElementById("picture").src = "sliding1.jpg";
								windowType=1;Build();drawData();BuildF();drawDataF(); }
							else if (document.getElementById("window2").checked){ 
								document.getElementById("picture").src = "sliding1.jpg";
								windowType=2;Build();drawData();BuildF();drawDataF(); }
							else if (document.getElementById("window4").checked){ 
								document.getElementById("picture").src = "hung1.jpg";
								windowType=4;Build();drawData();BuildF();drawDataF(); } 
							else if (document.getElementById("window5").checked){ 
								document.getElementById("picture").src = "hung1.jpg";
								windowType=5;Build();drawData();BuildF();drawDataF(); } 
							else if (document.getElementById("window6").checked){ 
								document.getElementById("picture").src = "hung1.jpg";
								windowType=6;Build();drawData();BuildF();drawDataF(); } 
							else if (document.getElementById("window7").checked){ 
								document.getElementById("picture").src = "casement.jpg";
								windowType=7;Build();drawData();BuildF();drawDataF(); }
						}
						
						function addWindow(){
							if (doorLocation != 1){
								if (document.getElementById("windowlocF").checked == true){
									windowLocationF=1;Build();drawData();BuildF();drawDataF(); }
								else if (document.getElementById("windowlocF").checked == false){
									windowLocationF=0;Build();drawData();BuildF();drawDataF(); } }
							else if (doorLocation == 1){
								if (document.getElementById("windowlocF").checked == true){
									document.getElementById("windowlocF").checked = false; } }
							if (doorLocation != 2){
								if (document.getElementById("windowlocL").checked == true){
									windowLocationL=1;Build();drawData();BuildF();drawDataF(); }
								else if (document.getElementById("windowlocL").checked == false){
									windowLocationL=0;Build();drawData();BuildF();drawDataF(); } }
							else if (doorLocation == 2){
								if (document.getElementById("windowlocL").checked == true){
									document.getElementById("windowlocL").checked = false; } }
							
							
							if (document.getElementById("windowlocB").checked == true){
								windowLocationB=1;Build();drawData();BuildF();drawDataF(); }
							else if (document.getElementById("windowlocB").checked == false){
								windowLocationB=0;Build();drawData();BuildF();drawDataF(); }
							if (document.getElementById("windowlocR").checked == true){
								windowLocationR=1;Build();drawData();BuildF();drawDataF(); }
							else if (document.getElementById("windowlocR").checked == false){
								windowLocationR=0;Build();drawData();BuildF();drawDataF(); }
						}
					</script>
				</div>
				<div style="width:260px; height:332px; float:left; text-align:center; margin-top:25px;">
					<img src="white-background.jpg" id="picture">
				</div>
			</div>
			
			<br></br>
			
			<p id="cost" style="margin-left:10px;"></p>
			<div id="mastercontainer" style="width:1000px; height:500px; float:left; margin-left:10px;">
				<div id="container3d" style="width:500px; height:500px; float:left">
					<canvas id="myCanvas" width="500" height="500" style="margin:-2px; border:1px solid #d3d3d3;">
						Your browser does not support the HTML5 canvas tag.
					</canvas>	
					<script>
						pi = Math.PI;
						var dataCount = 0;
						var dataMatrix = new Array();
						var dataMatrixTemp = new Array();
								
						var baseWidth = 6;
						var baseDepth = 8;
						var Rise = 5;
						var Height = 8;
						var doorType = 0; // no door
								
						var topStyle = 1;
						var doorLocation = 0;
						var windowLocationF = 0; // no window
						var windowLocationL = 0;
						var windowLocationB = 0;
						var windowLocationR = 0;
						var windowType = 0;
						
						var Fchecked = 0; // box unchecked
						
						var rX = -pi/4;
						var rY = -11*pi/8;
						var rZ = 10*pi/8;
						var cost = 0;
								
						var DM = 2*12; // dimension multiplier
						var zDM = 2*12*0.6; // z-dimension multiplier
								
						function buildBase(){
							xshift = 1090-0.5*baseDepth*DM;
							yshift = -52-0.5*baseWidth*DM;
							zshift = 60-0.5*(Height+Rise)*zDM;
							dataMatrix = new Array();
							dataMatrixTemp = new Array();
									
							dataMatrix[0] = new Array(xshift,yshift,zshift);
							dataMatrix[1] = new Array(xshift,DM*baseWidth+yshift,zshift); // back wall
							dataMatrix[2] = new Array(xshift,DM*baseWidth+yshift,zshift);
							dataMatrix[3] = new Array(DM*baseDepth+xshift,DM*baseWidth+yshift,zshift); // right wall
							dataMatrix[4] = new Array(DM*baseDepth+xshift,DM*baseWidth+yshift,zshift);
							dataMatrix[5] = new Array(DM*baseDepth+xshift,yshift,zshift); // front wall
							dataMatrix[6] = new Array(DM*baseDepth+xshift,yshift,zshift);
							dataMatrix[7] = new Array(xshift,yshift,zshift);

							for (i=0; i<dataMatrix.length; i++){
								dataMatrixTemp[i] = dataMatrix[i];
							}
						}
								
						function buildTop(){
							xshift = 1090-0.5*baseDepth*DM;
							yshift = -52-0.5*baseWidth*DM;
							zshift = 60-0.5*(Height+Rise)*zDM;
							dataCount = dataMatrix.length;
							dataMatrix[dataCount] = new Array(xshift,DM*baseWidth+yshift,zshift);
							dataMatrix[dataCount+1] = new Array(xshift,DM*baseWidth+yshift,zDM*Height+zshift); // right back corner
							dataMatrix[dataCount+2] = new Array(DM*baseDepth+xshift,DM*baseWidth+yshift,zshift);
							dataMatrix[dataCount+3] = new Array(DM*baseDepth+xshift,DM*baseWidth+yshift,zDM*Height+zshift); // right front corner
							dataMatrix[dataCount+4] = new Array(xshift,DM*baseWidth+yshift,zDM*Height+zshift);
							dataMatrix[dataCount+5] = new Array(DM*baseDepth+xshift,DM*baseWidth+yshift,zDM*Height+zshift); // right wall top
							if (topStyle == 1){ // gable
								dataMatrix[dataCount+6] = new Array(xshift,yshift,zshift);
								dataMatrix[dataCount+7] = new Array(xshift,yshift,zDM*Height+zshift); // left back corner
								dataMatrix[dataCount+8] = new Array(DM*baseDepth+xshift,yshift,zshift);
								dataMatrix[dataCount+9] = new Array(DM*baseDepth+xshift,yshift,zDM*Height+zshift); // left front corner
								dataMatrix[dataCount+10] = new Array(xshift,yshift,zDM*Height+zshift);
								dataMatrix[dataCount+11] = new Array(DM*baseDepth+xshift,yshift,zDM*Height+zshift); // left wall top
								for (i=0; i<baseDepth+1; i++){
									dataMatrix[dataCount+12+4*i] = new Array(DM*i+xshift,yshift,zDM*Height+zshift);
									dataMatrix[dataCount+13+4*i] = new Array(DM*i+xshift,0.5*DM*baseWidth+yshift,zDM*(Height+Rise)+zshift); // front left roof
									dataMatrix[dataCount+14+4*i] = new Array(DM*i+xshift,0.5*DM*baseWidth+yshift,zDM*(Height+Rise)+zshift);
									dataMatrix[dataCount+15+4*i] = new Array(DM*i+xshift,DM*baseWidth+yshift,zDM*Height+zshift); // front right roof
								} // roof panels
								dataCount = dataMatrix.length;
								dataMatrix[dataCount] = new Array(xshift,0.5*DM*baseWidth+yshift,zDM*(Height+Rise)+zshift);
								dataMatrix[dataCount+1] = new Array(DM*baseDepth+xshift,0.5*DM*baseWidth+yshift,zDM*(Height+Rise)+zshift); // top
							}
							else if (topStyle == 2){ // slanted
								dataMatrix[dataCount+6] = new Array(xshift,yshift,zshift);
								dataMatrix[dataCount+7] = new Array(xshift,yshift,zDM*(Height+Rise)+zshift); // left back corner
								dataMatrix[dataCount+8] = new Array(DM*baseDepth+xshift,yshift,zshift);
								dataMatrix[dataCount+9] = new Array(DM*baseDepth+xshift,yshift,zDM*(Height+Rise)+zshift); // left front corner
								dataMatrix[dataCount+10] = new Array(xshift,yshift,zDM*(Height+Rise)+zshift);
								dataMatrix[dataCount+11] = new Array(DM*baseDepth+xshift,yshift,zDM*(Height+Rise)+zshift); // left wall top
								for (i=0; i<baseDepth+1; i++){
									dataMatrix[dataCount+12+2*i] = new Array(DM*i+xshift,yshift,zDM*(Height+Rise)+zshift);
									dataMatrix[dataCount+13+2*i] = new Array(DM*i+xshift,DM*baseWidth+yshift,zDM*Height+zshift); // front left roof
								} // roof panels
							}
							for (i=0; i<dataMatrix.length; i++){
								dataMatrixTemp[i] = dataMatrix[i];
							}
						}
						
						function AddDoor(){
							xshift = 1090-0.5*baseDepth*DM;
							yshift = -52-0.5*baseWidth*DM;
							zshift = 60-0.5*(Height+Rise)*zDM;
							dataCount = dataMatrix.length;
							if (doorLocation == 1){ // fr ont
								if (doorType == 1){ // 36 x 80
									dataMatrix[dataCount] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth-36/(2*12))+yshift,zshift);
									dataMatrix[dataCount+1] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth-36/(2*12))+yshift,zDM*80/12+zshift); // left
									dataMatrix[dataCount+2] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth+36/(2*12))+yshift,zshift);
									dataMatrix[dataCount+3] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth+36/(2*12))+yshift,zDM*80/12+zshift); // right
									dataMatrix[dataCount+4] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth-36/(2*12))+yshift,zDM*80/12+zshift);
									dataMatrix[dataCount+5] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth+36/(2*12))+yshift,zDM*80/12+zshift); // top
								}
								else if (doorType == 2) { // 30 x 80
									dataMatrix[dataCount] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth-30/(2*12))+yshift,zshift);
									dataMatrix[dataCount+1] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth-30/(2*12))+yshift,zDM*80/12+zshift); // left
									dataMatrix[dataCount+2] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth+30/(2*12))+yshift,zshift);
									dataMatrix[dataCount+3] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth+30/(2*12))+yshift,zDM*80/12+zshift); // right
									dataMatrix[dataCount+4] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth-30/(2*12))+yshift,zDM*80/12+zshift);
									dataMatrix[dataCount+5] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth+30/(2*12))+yshift,zDM*80/12+zshift); // top
								}
								else if (doorType == 3) { // 60 x 80
									dataMatrix[dataCount] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth-30/12)+yshift,zshift);
									dataMatrix[dataCount+1] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth-30/12)+yshift,zDM*80/12+zshift); // left
									dataMatrix[dataCount+2] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth+30/12)+yshift,zshift);
									dataMatrix[dataCount+3] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth+30/12)+yshift,zDM*80/12+zshift); // right
									dataMatrix[dataCount+4] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth)+yshift,zshift);
									dataMatrix[dataCount+5] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth)+yshift,zDM*80/12+zshift); // center
									dataMatrix[dataCount+6] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth-30/12)+yshift,zDM*80/12+zshift);
									dataMatrix[dataCount+7] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth+30/12)+yshift,zDM*80/12+zshift); // top
								}
							}
							else if (doorLocation == 2){ // side
								if (doorType == 1){ // 36 x 80
									dataMatrix[dataCount] = new Array(DM*(0.5*baseDepth-36/(2*12))+xshift,yshift,zshift);
									dataMatrix[dataCount+1] = new Array(DM*(0.5*baseDepth-36/(2*12))+xshift,yshift,zDM*80/12+zshift); // left
									dataMatrix[dataCount+2] = new Array(DM*(0.5*baseDepth+36/(2*12))+xshift,yshift,zshift);
									dataMatrix[dataCount+3] = new Array(DM*(0.5*baseDepth+36/(2*12))+xshift,yshift,zDM*80/12+zshift); // right
									dataMatrix[dataCount+4] = new Array(DM*(0.5*baseDepth-36/(2*12))+xshift,yshift,zDM*80/12+zshift);
									dataMatrix[dataCount+5] = new Array(DM*(0.5*baseDepth+36/(2*12))+xshift,yshift,zDM*80/12+zshift); // top
								}
								else if (doorType == 2) { // 30 x 80
									dataMatrix[dataCount] = new Array(DM*(0.5*baseDepth-30/(2*12))+xshift,yshift,zshift);
									dataMatrix[dataCount+1] = new Array(DM*(0.5*baseDepth-30/(2*12))+xshift,yshift,zDM*80/12+zshift); // left
									dataMatrix[dataCount+2] = new Array(DM*(0.5*baseDepth+30/(2*12))+xshift,yshift,zshift);
									dataMatrix[dataCount+3] = new Array(DM*(0.5*baseDepth+30/(2*12))+xshift,yshift,zDM*80/12+zshift); // right
									dataMatrix[dataCount+4] = new Array(DM*(0.5*baseDepth-30/(2*12))+xshift,yshift,zDM*80/12+zshift);
									dataMatrix[dataCount+5] = new Array(DM*(0.5*baseDepth+30/(2*12))+xshift,yshift,zDM*80/12+zshift); // top
								}
								else if (doorType == 3) { // 60 x 80
									dataMatrix[dataCount] = new Array(DM*(0.5*baseDepth-30/12)+xshift,yshift,zshift);
									dataMatrix[dataCount+1] = new Array(DM*(0.5*baseDepth-30/12)+xshift,yshift,zDM*80/12+zshift); // left
									dataMatrix[dataCount+2] = new Array(DM*(0.5*baseDepth+30/12)+xshift,yshift,zshift);
									dataMatrix[dataCount+3] = new Array(DM*(0.5*baseDepth+30/12)+xshift,yshift,zDM*80/12+zshift); // right
									dataMatrix[dataCount+4] = new Array(DM*(0.5*baseDepth)+xshift,yshift,zshift);
									dataMatrix[dataCount+5] = new Array(DM*(0.5*baseDepth)+xshift,yshift,zDM*80/12+zshift); // center
									dataMatrix[dataCount+6] = new Array(DM*(0.5*baseDepth-30/12)+xshift,yshift,zDM*80/12+zshift);
									dataMatrix[dataCount+7] = new Array(DM*(0.5*baseDepth+30/12)+xshift,yshift,zDM*80/12+zshift); // top
								}
							}
							
							
							if (windowLocationF == 1){ // front
								dataCount = dataMatrix.length;
								if (windowType == 1 || windowType == 2){ // sliding
									if (windowType == 1){ dim = 24; }
									else if (windowType == 2){ dim = 32; }
									dataMatrix[dataCount] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth-dim/(2*12))+yshift,zDM*(0.5*Height-dim/(2*12))+zshift);
									dataMatrix[dataCount+1] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth-dim/(2*12))+yshift,zDM*(0.5*Height+dim/(2*12))+zshift); // left
									dataMatrix[dataCount+2] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth+dim/(2*12))+yshift,zDM*(0.5*Height-dim/(2*12))+zshift);
									dataMatrix[dataCount+3] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth+dim/(2*12))+yshift,zDM*(0.5*Height+dim/(2*12))+zshift); // right
									dataMatrix[dataCount+4] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth)+yshift,zDM*(0.5*Height-dim/(2*12))+zshift);
									dataMatrix[dataCount+5] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth)+yshift,zDM*(0.5*Height+dim/(2*12))+zshift); // center
									dataMatrix[dataCount+6] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth-dim/(2*12))+yshift,zDM*(0.5*Height+dim/(2*12))+zshift);
									dataMatrix[dataCount+7] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth+dim/(2*12))+yshift,zDM*(0.5*Height+dim/(2*12))+zshift); // top
									dataMatrix[dataCount+8] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth-dim/(2*12))+yshift,zDM*(0.5*Height-dim/(2*12))+zshift);
									dataMatrix[dataCount+9] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth+dim/(2*12))+yshift,zDM*(0.5*Height-dim/(2*12))+zshift); // bottom
								}
								else if (windowType == 4 || windowType == 5 || windowType == 6){
									if (windowType == 4){ dimH = 24; dimV = 47.5;  }
									else if (windowType == 5){ dimH = 24; dimV = 32; }
									else if (windowType = 6){ dimH = 32; dimV = 32; }
									dataMatrix[dataCount] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth-dimH/(2*12))+yshift,zDM*(0.5*Height-dimV/(2*12))+zshift);
									dataMatrix[dataCount+1] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth-dimH/(2*12))+yshift,zDM*(0.5*Height+dimV/(2*12))+zshift); // left
									dataMatrix[dataCount+2] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth+dimH/(2*12))+yshift,zDM*(0.5*Height-dimV/(2*12))+zshift);
									dataMatrix[dataCount+3] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth+dimH/(2*12))+yshift,zDM*(0.5*Height+dimV/(2*12))+zshift); // right
									dataMatrix[dataCount+4] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth-dimH/(2*12))+yshift,zDM*(0.5*Height)+zshift);
									dataMatrix[dataCount+5] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth+dimH/(2*12))+yshift,zDM*(0.5*Height)+zshift); // center
									dataMatrix[dataCount+6] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth-dimH/(2*12))+yshift,zDM*(0.5*Height+dimV/(2*12))+zshift);
									dataMatrix[dataCount+7] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth+dimH/(2*12))+yshift,zDM*(0.5*Height+dimV/(2*12))+zshift); // top
									dataMatrix[dataCount+8] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth-dimH/(2*12))+yshift,zDM*(0.5*Height-dimV/(2*12))+zshift);
									dataMatrix[dataCount+9] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth+dimH/(2*12))+yshift,zDM*(0.5*Height-dimV/(2*12))+zshift); // bottom
								}
								else if (windowType == 7){
									dataMatrix[dataCount] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth-24/(2*12))+yshift,zDM*(0.5*Height-32/(2*12))+zshift);
									dataMatrix[dataCount+1] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth-24/(2*12))+yshift,zDM*(0.5*Height+32/(2*12))+zshift); // left
									dataMatrix[dataCount+2] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth+24/(2*12))+yshift,zDM*(0.5*Height-32/(2*12))+zshift);
									dataMatrix[dataCount+3] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth+24/(2*12))+yshift,zDM*(0.5*Height+32/(2*12))+zshift); // right
									dataMatrix[dataCount+4] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth-24/(2*12))+yshift,zDM*(0.5*Height+32/(2*12))+zshift);
									dataMatrix[dataCount+5] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth+24/(2*12))+yshift,zDM*(0.5*Height+32/(2*12))+zshift); // top
									dataMatrix[dataCount+6] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth-24/(2*12))+yshift,zDM*(0.5*Height-32/(2*12))+zshift);
									dataMatrix[dataCount+7] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth+24/(2*12))+yshift,zDM*(0.5*Height-32/(2*12))+zshift); // bottom
								}
							}
							if (windowLocationL == 1){ // left
								dataCount = dataMatrix.length;
								if (windowType == 1 || windowType == 2){ // sliding
									if (windowType == 1){ dim = 24; }
									else if (windowType == 2){ dim = 32; }
									dataMatrix[dataCount] = new Array(DM*(0.5*baseDepth-dim/(2*12))+xshift,yshift,zDM*(0.5*Height-dim/(2*12))+zshift);
									dataMatrix[dataCount+1] = new Array(DM*(0.5*baseDepth-dim/(2*12))+xshift,yshift,zDM*(0.5*Height+dim/(2*12))+zshift); // left
									dataMatrix[dataCount+2] = new Array(DM*(0.5*baseDepth+dim/(2*12))+xshift,yshift,zDM*(0.5*Height-dim/(2*12))+zshift);
									dataMatrix[dataCount+3] = new Array(DM*(0.5*baseDepth+dim/(2*12))+xshift,yshift,zDM*(0.5*Height+dim/(2*12))+zshift); // right
									dataMatrix[dataCount+4] = new Array(DM*0.5*baseDepth+xshift,yshift,zDM*(0.5*Height-dim/(2*12))+zshift);
									dataMatrix[dataCount+5] = new Array(DM*0.5*baseDepth+xshift,yshift,zDM*(0.5*Height+dim/(2*12))+zshift); // center
									dataMatrix[dataCount+6] = new Array(DM*(0.5*baseDepth-dim/(2*12))+xshift,yshift,zDM*(0.5*Height+dim/(2*12))+zshift);
									dataMatrix[dataCount+7] = new Array(DM*(0.5*baseDepth+dim/(2*12))+xshift,yshift,zDM*(0.5*Height+dim/(2*12))+zshift); // top
									dataMatrix[dataCount+8] = new Array(DM*(0.5*baseDepth-dim/(2*12))+xshift,yshift,zDM*(0.5*Height-dim/(2*12))+zshift);
									dataMatrix[dataCount+9] = new Array(DM*(0.5*baseDepth+dim/(2*12))+xshift,yshift,zDM*(0.5*Height-dim/(2*12))+zshift); // bottom
								}
								else if (windowType == 4 || windowType == 5 || windowType == 6){
									if (windowType == 4){ dimH = 24; dimV = 47.5;  }
									else if (windowType == 5){ dimH = 24; dimV = 32; }
									else if (windowType = 6){ dimH = 32; dimV = 32; }
									dataMatrix[dataCount] = new Array(DM*(0.5*baseDepth-dimH/(2*12))+xshift,yshift,zDM*(0.5*Height-dimV/(2*12))+zshift);
									dataMatrix[dataCount+1] = new Array(DM*(0.5*baseDepth-dimH/(2*12))+xshift,yshift,zDM*(0.5*Height+dimV/(2*12))+zshift); // left
									dataMatrix[dataCount+2] = new Array(DM*(0.5*baseDepth+dimH/(2*12))+xshift,yshift,zDM*(0.5*Height-dimV/(2*12))+zshift);
									dataMatrix[dataCount+3] = new Array(DM*(0.5*baseDepth+dimH/(2*12))+xshift,yshift,zDM*(0.5*Height+dimV/(2*12))+zshift); // right
									dataMatrix[dataCount+4] = new Array(DM*(0.5*baseDepth-dimH/(2*12))+xshift,yshift,zDM*(0.5*Height)+zshift);
									dataMatrix[dataCount+5] = new Array(DM*(0.5*baseDepth+dimH/(2*12))+xshift,yshift,zDM*(0.5*Height)+zshift); // center
									dataMatrix[dataCount+6] = new Array(DM*(0.5*baseDepth-dimH/(2*12))+xshift,yshift,zDM*(0.5*Height+dimV/(2*12))+zshift);
									dataMatrix[dataCount+7] = new Array(DM*(0.5*baseDepth+dimH/(2*12))+xshift,yshift,zDM*(0.5*Height+dimV/(2*12))+zshift); // top
									dataMatrix[dataCount+8] = new Array(DM*(0.5*baseDepth-dimH/(2*12))+xshift,yshift,zDM*(0.5*Height-dimV/(2*12))+zshift);
									dataMatrix[dataCount+9] = new Array(DM*(0.5*baseDepth+dimH/(2*12))+xshift,yshift,zDM*(0.5*Height-dimV/(2*12))+zshift); // bottom
								}
								else if (windowType == 7){
									dataMatrix[dataCount] = new Array(DM*(0.5*baseDepth-24/(2*12))+xshift,yshift,zDM*(0.5*Height-32/(2*12))+zshift);
									dataMatrix[dataCount+1] = new Array(DM*(0.5*baseDepth-24/(2*12))+xshift,yshift,zDM*(0.5*Height+32/(2*12))+zshift); // left
									dataMatrix[dataCount+2] = new Array(DM*(0.5*baseDepth+24/(2*12))+xshift,yshift,zDM*(0.5*Height-32/(2*12))+zshift);
									dataMatrix[dataCount+3] = new Array(DM*(0.5*baseDepth+24/(2*12))+xshift,yshift,zDM*(0.5*Height+32/(2*12))+zshift); // right
									dataMatrix[dataCount+4] = new Array(DM*(0.5*baseDepth-24/(2*12))+xshift,yshift,zDM*(0.5*Height+32/(2*12))+zshift);
									dataMatrix[dataCount+5] = new Array(DM*(0.5*baseDepth+24/(2*12))+xshift,yshift,zDM*(0.5*Height+32/(2*12))+zshift); // top
									dataMatrix[dataCount+6] = new Array(DM*(0.5*baseDepth-24/(2*12))+xshift,yshift,zDM*(0.5*Height-32/(2*12))+zshift);
									dataMatrix[dataCount+7] = new Array(DM*(0.5*baseDepth+24/(2*12))+xshift,yshift,zDM*(0.5*Height-32/(2*12))+zshift); // bottom
								}
							}
							if (windowLocationB == 1){ // back
								dataCount = dataMatrix.length;
								if (windowType == 1 || windowType == 2){ // sliding
									if (windowType == 1){ dim = 24; }
									else if (windowType == 2){ dim = 32; }
									dataMatrix[dataCount] = new Array(xshift,DM*(0.5*baseWidth-dim/(2*12))+yshift,zDM*(0.5*Height-dim/(2*12))+zshift);
									dataMatrix[dataCount+1] = new Array(xshift,DM*(0.5*baseWidth-dim/(2*12))+yshift,zDM*(0.5*Height+dim/(2*12))+zshift); // left
									dataMatrix[dataCount+2] = new Array(xshift,DM*(0.5*baseWidth+dim/(2*12))+yshift,zDM*(0.5*Height-dim/(2*12))+zshift);
									dataMatrix[dataCount+3] = new Array(xshift,DM*(0.5*baseWidth+dim/(2*12))+yshift,zDM*(0.5*Height+dim/(2*12))+zshift); // right
									dataMatrix[dataCount+4] = new Array(xshift,DM*(0.5*baseWidth)+yshift,zDM*(0.5*Height-dim/(2*12))+zshift);
									dataMatrix[dataCount+5] = new Array(xshift,DM*(0.5*baseWidth)+yshift,zDM*(0.5*Height+dim/(2*12))+zshift); // center
									dataMatrix[dataCount+6] = new Array(xshift,DM*(0.5*baseWidth-dim/(2*12))+yshift,zDM*(0.5*Height+dim/(2*12))+zshift);
									dataMatrix[dataCount+7] = new Array(xshift,DM*(0.5*baseWidth+dim/(2*12))+yshift,zDM*(0.5*Height+dim/(2*12))+zshift); // top
									dataMatrix[dataCount+8] = new Array(xshift,DM*(0.5*baseWidth-dim/(2*12))+yshift,zDM*(0.5*Height-dim/(2*12))+zshift);
									dataMatrix[dataCount+9] = new Array(xshift,DM*(0.5*baseWidth+dim/(2*12))+yshift,zDM*(0.5*Height-dim/(2*12))+zshift); // bottom
								}
								else if (windowType == 4 || windowType == 5 || windowType == 6){
									if (windowType == 4){ dimH = 24; dimV = 47.5;  }
									else if (windowType == 5){ dimH = 24; dimV = 32; }
									else if (windowType = 6){ dimH = 32; dimV = 32; }
									dataMatrix[dataCount] = new Array(xshift,DM*(0.5*baseWidth-dimH/(2*12))+yshift,zDM*(0.5*Height-dimV/(2*12))+zshift);
									dataMatrix[dataCount+1] = new Array(xshift,DM*(0.5*baseWidth-dimH/(2*12))+yshift,zDM*(0.5*Height+dimV/(2*12))+zshift); // left
									dataMatrix[dataCount+2] = new Array(xshift,DM*(0.5*baseWidth+dimH/(2*12))+yshift,zDM*(0.5*Height-dimV/(2*12))+zshift);
									dataMatrix[dataCount+3] = new Array(xshift,DM*(0.5*baseWidth+dimH/(2*12))+yshift,zDM*(0.5*Height+dimV/(2*12))+zshift); // right
									dataMatrix[dataCount+4] = new Array(xshift,DM*(0.5*baseWidth-dimH/(2*12))+yshift,zDM*(0.5*Height)+zshift);
									dataMatrix[dataCount+5] = new Array(xshift,DM*(0.5*baseWidth+dimH/(2*12))+yshift,zDM*(0.5*Height)+zshift); // center
									dataMatrix[dataCount+6] = new Array(xshift,DM*(0.5*baseWidth-dimH/(2*12))+yshift,zDM*(0.5*Height+dimV/(2*12))+zshift);
									dataMatrix[dataCount+7] = new Array(xshift,DM*(0.5*baseWidth+dimH/(2*12))+yshift,zDM*(0.5*Height+dimV/(2*12))+zshift); // top
									dataMatrix[dataCount+8] = new Array(xshift,DM*(0.5*baseWidth-dimH/(2*12))+yshift,zDM*(0.5*Height-dimV/(2*12))+zshift);
									dataMatrix[dataCount+9] = new Array(xshift,DM*(0.5*baseWidth+dimH/(2*12))+yshift,zDM*(0.5*Height-dimV/(2*12))+zshift); // bottom
								}
								else if (windowType == 7){
									dataMatrix[dataCount] = new Array(xshift,DM*(0.5*baseWidth-24/(2*12))+yshift,zDM*(0.5*Height-32/(2*12))+zshift);
									dataMatrix[dataCount+1] = new Array(xshift,DM*(0.5*baseWidth-24/(2*12))+yshift,zDM*(0.5*Height+32/(2*12))+zshift); // left
									dataMatrix[dataCount+2] = new Array(xshift,DM*(0.5*baseWidth+24/(2*12))+yshift,zDM*(0.5*Height-32/(2*12))+zshift);
									dataMatrix[dataCount+3] = new Array(xshift,DM*(0.5*baseWidth+24/(2*12))+yshift,zDM*(0.5*Height+32/(2*12))+zshift); // right
									dataMatrix[dataCount+4] = new Array(xshift,DM*(0.5*baseWidth-24/(2*12))+yshift,zDM*(0.5*Height+32/(2*12))+zshift);
									dataMatrix[dataCount+5] = new Array(xshift,DM*(0.5*baseWidth+24/(2*12))+yshift,zDM*(0.5*Height+32/(2*12))+zshift); // top
									dataMatrix[dataCount+6] = new Array(xshift,DM*(0.5*baseWidth-24/(2*12))+yshift,zDM*(0.5*Height-32/(2*12))+zshift);
									dataMatrix[dataCount+7] = new Array(xshift,DM*(0.5*baseWidth+24/(2*12))+yshift,zDM*(0.5*Height-32/(2*12))+zshift); // bottom
								}
							}
							if (windowLocationR == 1){ // right
								dataCount = dataMatrix.length;
								if (windowType == 1 || windowType == 2){ // sliding
									if (windowType == 1){ dim = 24; }
									else if (windowType == 2){ dim = 32; }
									dataMatrix[dataCount] = new Array(DM*(0.5*baseDepth-dim/(2*12))+xshift,DM*baseWidth+yshift,zDM*(0.5*Height-dim/(2*12))+zshift);
									dataMatrix[dataCount+1] = new Array(DM*(0.5*baseDepth-dim/(2*12))+xshift,DM*baseWidth+yshift,zDM*(0.5*Height+dim/(2*12))+zshift); // left
									dataMatrix[dataCount+2] = new Array(DM*(0.5*baseDepth+dim/(2*12))+xshift,DM*baseWidth+yshift,zDM*(0.5*Height-dim/(2*12))+zshift);
									dataMatrix[dataCount+3] = new Array(DM*(0.5*baseDepth+dim/(2*12))+xshift,DM*baseWidth+yshift,zDM*(0.5*Height+dim/(2*12))+zshift); // right
									dataMatrix[dataCount+4] = new Array(DM*0.5*baseDepth+xshift,DM*baseWidth+yshift,zDM*(0.5*Height-dim/(2*12))+zshift);
									dataMatrix[dataCount+5] = new Array(DM*0.5*baseDepth+xshift,DM*baseWidth+yshift,zDM*(0.5*Height+dim/(2*12))+zshift); // center
									dataMatrix[dataCount+6] = new Array(DM*(0.5*baseDepth-dim/(2*12))+xshift,DM*baseWidth+yshift,zDM*(0.5*Height+dim/(2*12))+zshift);
									dataMatrix[dataCount+7] = new Array(DM*(0.5*baseDepth+dim/(2*12))+xshift,DM*baseWidth+yshift,zDM*(0.5*Height+dim/(2*12))+zshift); // top
									dataMatrix[dataCount+8] = new Array(DM*(0.5*baseDepth-dim/(2*12))+xshift,DM*baseWidth+yshift,zDM*(0.5*Height-dim/(2*12))+zshift);
									dataMatrix[dataCount+9] = new Array(DM*(0.5*baseDepth+dim/(2*12))+xshift,DM*baseWidth+yshift,zDM*(0.5*Height-dim/(2*12))+zshift); // bottom
								}
								else if (windowType == 4 || windowType == 5 || windowType == 6){
									if (windowType == 4){ dimH = 24; dimV = 47.5;  }
									else if (windowType == 5){ dimH = 24; dimV = 32; }
									else if (windowType = 6){ dimH = 32; dimV = 32; }
									dataMatrix[dataCount] = new Array(DM*(0.5*baseDepth-dimH/(2*12))+xshift,DM*baseWidth+yshift,zDM*(0.5*Height-dimV/(2*12))+zshift);
									dataMatrix[dataCount+1] = new Array(DM*(0.5*baseDepth-dimH/(2*12))+xshift,DM*baseWidth+yshift,zDM*(0.5*Height+dimV/(2*12))+zshift); // left
									dataMatrix[dataCount+2] = new Array(DM*(0.5*baseDepth+dimH/(2*12))+xshift,DM*baseWidth+yshift,zDM*(0.5*Height-dimV/(2*12))+zshift);
									dataMatrix[dataCount+3] = new Array(DM*(0.5*baseDepth+dimH/(2*12))+xshift,DM*baseWidth+yshift,zDM*(0.5*Height+dimV/(2*12))+zshift); // right
									dataMatrix[dataCount+4] = new Array(DM*(0.5*baseDepth-dimH/(2*12))+xshift,DM*baseWidth+yshift,zDM*(0.5*Height)+zshift);
									dataMatrix[dataCount+5] = new Array(DM*(0.5*baseDepth+dimH/(2*12))+xshift,DM*baseWidth+yshift,zDM*(0.5*Height)+zshift); // center
									dataMatrix[dataCount+6] = new Array(DM*(0.5*baseDepth-dimH/(2*12))+xshift,DM*baseWidth+yshift,zDM*(0.5*Height+dimV/(2*12))+zshift);
									dataMatrix[dataCount+7] = new Array(DM*(0.5*baseDepth+dimH/(2*12))+xshift,DM*baseWidth+yshift,zDM*(0.5*Height+dimV/(2*12))+zshift); // top
									dataMatrix[dataCount+8] = new Array(DM*(0.5*baseDepth-dimH/(2*12))+xshift,DM*baseWidth+yshift,zDM*(0.5*Height-dimV/(2*12))+zshift);
									dataMatrix[dataCount+9] = new Array(DM*(0.5*baseDepth+dimH/(2*12))+xshift,DM*baseWidth+yshift,zDM*(0.5*Height-dimV/(2*12))+zshift); // bottom
								}
								else if (windowType == 7){
									dataMatrix[dataCount] = new Array(DM*(0.5*baseDepth-24/(2*12))+xshift,DM*baseWidth+yshift,zDM*(0.5*Height-32/(2*12))+zshift);
									dataMatrix[dataCount+1] = new Array(DM*(0.5*baseDepth-24/(2*12))+xshift,DM*baseWidth+yshift,zDM*(0.5*Height+32/(2*12))+zshift); // left
									dataMatrix[dataCount+2] = new Array(DM*(0.5*baseDepth+24/(2*12))+xshift,DM*baseWidth+yshift,zDM*(0.5*Height-32/(2*12))+zshift);
									dataMatrix[dataCount+3] = new Array(DM*(0.5*baseDepth+24/(2*12))+xshift,DM*baseWidth+yshift,zDM*(0.5*Height+32/(2*12))+zshift); // right
									dataMatrix[dataCount+4] = new Array(DM*(0.5*baseDepth-24/(2*12))+xshift,DM*baseWidth+yshift,zDM*(0.5*Height+32/(2*12))+zshift);
									dataMatrix[dataCount+5] = new Array(DM*(0.5*baseDepth+24/(2*12))+xshift,DM*baseWidth+yshift,zDM*(0.5*Height+32/(2*12))+zshift); // top
									dataMatrix[dataCount+6] = new Array(DM*(0.5*baseDepth-24/(2*12))+xshift,DM*baseWidth+yshift,zDM*(0.5*Height-32/(2*12))+zshift);
									dataMatrix[dataCount+7] = new Array(DM*(0.5*baseDepth+24/(2*12))+xshift,DM*baseWidth+yshift,zDM*(0.5*Height-32/(2*12))+zshift); // bottom
								}
							}
							
							
							for (i=0; i<dataMatrix.length; i++){
								dataMatrixTemp[i] = dataMatrix[i];
							}
						}
								
						function Build(){
							buildBase();
							buildTop();
							AddDoor();
						}
								
						function rotateDataX(Xangle,Matrix,MatrixTemp){
							var point = new Array();
							for(i=0;i<Matrix.length;i++){
								point[0] = Matrix[i][0]; point[1] = Matrix[i][1]; point[2] = Matrix[i][2];
								//Rotate X
								MatrixTemp[i][0] = point[0];
								MatrixTemp[i][1] = point[1]*Math.cos(Xangle) - point[2]*Math.sin(Xangle);
								MatrixTemp[i][2] = point[1]*Math.sin(Xangle) +point[2]*Math.cos(Xangle);
							}
						}
						function rotateDataY(Yangle,Matrix,MatrixTemp){
							var point = new Array();
							for(i=0;i<Matrix.length;i++){
								point[0] = MatrixTemp[i][0]; point[1] = MatrixTemp[i][1]; point[2] = MatrixTemp[i][2];
								//Rotate Y
								MatrixTemp[i][0] = point[0]*Math.cos(Yangle) +point[2]*Math.sin(Yangle);
								MatrixTemp[i][1] = point[1];
								MatrixTemp[i][2] = point[2]*Math.cos(Yangle)-point[0]*Math.sin(Yangle);
							}
						}
						function rotateDataZ(Zangle,Matrix,MatrixTemp){
							var point = new Array();
							for(i=0;i<Matrix.length;i++){
								point[0] = MatrixTemp[i][0]; point[1] = MatrixTemp[i][1]; point[2] = MatrixTemp[i][2];
								//Rotate Z
								MatrixTemp[i][0] = point[0]*Math.cos(Zangle)-point[1]*Math.sin(Zangle);
								MatrixTemp[i][1] = point[0]*Math.sin(Zangle) +point[1]*Math.cos(Zangle);
								MatrixTemp[i][2] = point[2];
							}
						}
						
						function drawData(){
							rotateDataX(rX,dataMatrix,dataMatrixTemp);
							rotateDataY(rY,dataMatrix,dataMatrixTemp);
							rotateDataZ(rZ,dataMatrix,dataMatrixTemp);
							var c = document.getElementById("myCanvas");
							var ctx = c.getContext("2d");
							ctx.clearRect(0, 0, c.width, c.height);
							ctx.beginPath();
							for(i=0;i<dataMatrix.length;i=i+2){
								ctx.moveTo(dataMatrixTemp[i][0], dataMatrixTemp[i][1]);
								ctx.lineTo(dataMatrixTemp[i+1][0], dataMatrixTemp[i+1][1]);
							}
							ctx.stroke();
							for(i=0;i<dataMatrix.length;i=i+2){
								cost = cost + Math.sqrt(Math.pow(dataMatrix[i][0]-dataMatrix[i+1][0],2)+Math.pow(dataMatrix[i][1]-dataMatrix[i+1][1],2)+Math.pow(dataMatrix[i][2]-dataMatrix[i+1][2],2));
							}
							document.getElementById("cost").innerHTML = "Cost: $"+Math.floor(cost/10+500);
						}
						Build();
						drawData();
					</script>
				</div>
				
				<div id="2d" style="width:500px; height:500px; float:left">
					<div id="containerfront" style="width:500px; height:250px; float:left">
						<canvas id="myCanvas2" width="500" height="250" style="margin:-2px; border:1px solid #d3d3d3;">
							Your browser does not support the HTML5 canvas tag.
						</canvas>	
						<script>
							pi = Math.PI;
									
							var rXF = pi/2;
							var rYF = pi/2;
							var costF = 0;
							
							var DMF = 2*12*0.58; // dimension multiplier
								
							function buildBaseF(){
								yshift = 250-0.5*baseWidth*DMF;
								zshift = -125-0.5*(Height+Rise)*DMF;
								dataMatrixF = new Array();
								dataMatrixTempF = new Array();
									
								dataMatrixF[0] = new Array(0,yshift,zshift);
								dataMatrixF[1] = new Array(0,DMF*baseWidth+yshift,zshift);
									
								for (i=0; i<dataMatrixF.length; i++){
									dataMatrixTempF[i] = dataMatrixF[i];
								}
							}
									
							function buildTopF(){
								yshift = 250-0.5*baseWidth*DMF;
								zshift = -125-0.5*(Height+Rise)*DMF;
								dataCount = dataMatrixF.length;
								dataMatrixF[dataCount] = new Array(0,DMF*baseWidth+yshift,zshift);
								dataMatrixF[dataCount+1] = new Array(0,DMF*baseWidth+yshift,Height*DMF+zshift);
								if (topStyle == 1){ // gable
									dataMatrixF[dataCount+2] = new Array(0,yshift,zshift);
									dataMatrixF[dataCount+3] = new Array(0,yshift,Height*DMF+zshift);
									dataMatrixF[dataCount+4] = new Array(0,yshift,Height*DMF+zshift);
									dataMatrixF[dataCount+5] = new Array(0,0.5*DMF*baseWidth+yshift,(Height+Rise)*DMF+zshift);
									dataMatrixF[dataCount+6] = new Array(0,0.5*DMF*baseWidth+yshift,(Height+Rise)*DMF+zshift);
									dataMatrixF[dataCount+7] = new Array(0,DMF*baseWidth+yshift,Height*DMF+zshift);
								}
								else if (topStyle == 2){
									dataMatrixF[dataCount+2] = new Array(0,yshift,zshift);
									dataMatrixF[dataCount+3] = new Array(0,yshift,(Height+Rise)*DMF+zshift);
									dataMatrixF[dataCount+4] = new Array(0,yshift,(Height+Rise)*DMF+zshift);
									dataMatrixF[dataCount+5] = new Array(0,DMF*baseWidth+yshift,Height*DMF+zshift);
								}
								
								if (doorLocation == 1){
									dataCount = dataMatrixF.length;
									if (doorType == 1){ // 36 x 80}
										dataMatrixF[dataCount] = new Array(0,(0.5*baseWidth-36/(2*12))*DMF+yshift,zshift);
										dataMatrixF[dataCount+1] = new Array(0,(0.5*baseWidth-36/(2*12))*DMF+yshift,80/12*DMF+zshift);
										dataMatrixF[dataCount+2] = new Array(0,(0.5*baseWidth+36/(2*12))*DMF+yshift,zshift);
										dataMatrixF[dataCount+3] = new Array(0,(0.5*baseWidth+36/(2*12))*DMF+yshift,80/12*DMF+zshift);
										dataMatrixF[dataCount+4] = new Array(0,(0.5*baseWidth-36/(2*12))*DMF+yshift,80/12*DMF+zshift);
										dataMatrixF[dataCount+5] = new Array(0,(0.5*baseWidth+36/(2*12))*DMF+yshift,80/12*DMF+zshift);
									}
									else if (doorType == 2){ // 30 x 80}
										dataMatrixF[dataCount] = new Array(0,(0.5*baseWidth-30/(2*12))*DMF+yshift,zshift);
										dataMatrixF[dataCount+1] = new Array(0,(0.5*baseWidth-30/(2*12))*DMF+yshift,80/12*DMF+zshift);
										dataMatrixF[dataCount+2] = new Array(0,(0.5*baseWidth+30/(2*12))*DMF+yshift,zshift);
										dataMatrixF[dataCount+3] = new Array(0,(0.5*baseWidth+30/(2*12))*DMF+yshift,80/12*DMF+zshift);
										dataMatrixF[dataCount+4] = new Array(0,(0.5*baseWidth-30/(2*12))*DMF+yshift,80/12*DMF+zshift);
										dataMatrixF[dataCount+5] = new Array(0,(0.5*baseWidth+30/(2*12))*DMF+yshift,80/12*DMF+zshift);
									}
									else if (doorType == 3){ // 60 x 80}
										dataMatrixF[dataCount] = new Array(0,(0.5*baseWidth-30/12)*DMF+yshift,zshift);
										dataMatrixF[dataCount+1] = new Array(0,(0.5*baseWidth-30/12)*DMF+yshift,80/12*DMF+zshift);
										dataMatrixF[dataCount+2] = new Array(0,(0.5*baseWidth+30/12)*DMF+yshift,zshift);
										dataMatrixF[dataCount+3] = new Array(0,(0.5*baseWidth+30/12)*DMF+yshift,80/12*DMF+zshift);
										dataMatrixF[dataCount+4] = new Array(0,(0.5*baseWidth)*DMF+yshift,zshift);
										dataMatrixF[dataCount+5] = new Array(0,(0.5*baseWidth)*DMF+yshift,80/12*DMF+zshift);
										dataMatrixF[dataCount+6] = new Array(0,(0.5*baseWidth-30/12)*DMF+yshift,80/12*DMF+zshift);
										dataMatrixF[dataCount+7] = new Array(0,(0.5*baseWidth+30/12)*DMF+yshift,80/12*DMF+zshift);
									}
								}
								
								
								if (windowLocationF == 1){ // front
									dataCount = dataMatrixF.length;
									if (windowType == 1 || windowType == 2){ // sliding
										if (windowType == 1){ dim = 24; }
										else if (windowType == 2){ dim = 32; }
										dataMatrixF[dataCount] = new Array(0,DMF*(0.5*baseWidth-dim/(2*12))+yshift,DMF*(0.5*Height-dim/(2*12))+zshift);
										dataMatrixF[dataCount+1] = new Array(0,DMF*(0.5*baseWidth-dim/(2*12))+yshift,DMF*(0.5*Height+dim/(2*12))+zshift); // left
										dataMatrixF[dataCount+2] = new Array(0,DMF*(0.5*baseWidth+dim/(2*12))+yshift,DMF*(0.5*Height-dim/(2*12))+zshift);
										dataMatrixF[dataCount+3] = new Array(0,DMF*(0.5*baseWidth+dim/(2*12))+yshift,DMF*(0.5*Height+dim/(2*12))+zshift); // right
										dataMatrixF[dataCount+4] = new Array(0,DMF*(0.5*baseWidth)+yshift,DMF*(0.5*Height-dim/(2*12))+zshift);
										dataMatrixF[dataCount+5] = new Array(0,DMF*(0.5*baseWidth)+yshift,DMF*(0.5*Height+dim/(2*12))+zshift); // center
										dataMatrixF[dataCount+6] = new Array(0,DMF*(0.5*baseWidth-dim/(2*12))+yshift,DMF*(0.5*Height+dim/(2*12))+zshift);
										dataMatrixF[dataCount+7] = new Array(0,DMF*(0.5*baseWidth+dim/(2*12))+yshift,DMF*(0.5*Height+dim/(2*12))+zshift); // top
										dataMatrixF[dataCount+8] = new Array(0,DMF*(0.5*baseWidth-dim/(2*12))+yshift,DMF*(0.5*Height-dim/(2*12))+zshift);
										dataMatrixF[dataCount+9] = new Array(0,DMF*(0.5*baseWidth+dim/(2*12))+yshift,DMF*(0.5*Height-dim/(2*12))+zshift); // bottom
									}
									else if (windowType == 4 || windowType == 5 || windowType == 6){
										if (windowType == 4){ dimH = 24; dimV = 47.5;  }
										else if (windowType == 5){ dimH = 24; dimV = 32; }
										else if (windowType = 6){ dimH = 32; dimV = 32; }
										dataMatrixF[dataCount] = new Array(0,DMF*(0.5*baseWidth-dimH/(2*12))+yshift,DMF*(0.5*Height-dimV/(2*12))+zshift);
										dataMatrixF[dataCount+1] = new Array(0,DMF*(0.5*baseWidth-dimH/(2*12))+yshift,DMF*(0.5*Height+dimV/(2*12))+zshift); // left
										dataMatrixF[dataCount+2] = new Array(0,DMF*(0.5*baseWidth+dimH/(2*12))+yshift,DMF*(0.5*Height-dimV/(2*12))+zshift);
										dataMatrixF[dataCount+3] = new Array(0,DMF*(0.5*baseWidth+dimH/(2*12))+yshift,DMF*(0.5*Height+dimV/(2*12))+zshift); // right
										dataMatrixF[dataCount+4] = new Array(0,DMF*(0.5*baseWidth-dimH/(2*12))+yshift,DMF*(0.5*Height)+zshift);
										dataMatrixF[dataCount+5] = new Array(0,DMF*(0.5*baseWidth+dimH/(2*12))+yshift,DMF*(0.5*Height)+zshift); // center
										dataMatrixF[dataCount+6] = new Array(0,DMF*(0.5*baseWidth-dimH/(2*12))+yshift,DMF*(0.5*Height+dimV/(2*12))+zshift);
										dataMatrixF[dataCount+7] = new Array(0,DMF*(0.5*baseWidth+dimH/(2*12))+yshift,DMF*(0.5*Height+dimV/(2*12))+zshift); // top
										dataMatrixF[dataCount+8] = new Array(0,DMF*(0.5*baseWidth-dimH/(2*12))+yshift,DMF*(0.5*Height-dimV/(2*12))+zshift);
										dataMatrixF[dataCount+9] = new Array(0,DMF*(0.5*baseWidth+dimH/(2*12))+yshift,DMF*(0.5*Height-dimV/(2*12))+zshift); // bottom
									}
									else if (windowType == 7){
										dataMatrixF[dataCount] = new Array(0,DMF*(0.5*baseWidth-24/(2*12))+yshift,DMF*(0.5*Height-32/(2*12))+zshift);
										dataMatrixF[dataCount+1] = new Array(0,DMF*(0.5*baseWidth-24/(2*12))+yshift,DMF*(0.5*Height+32/(2*12))+zshift); // left
										dataMatrixF[dataCount+2] = new Array(0,DMF*(0.5*baseWidth+24/(2*12))+yshift,DMF*(0.5*Height-32/(2*12))+zshift);
										dataMatrixF[dataCount+3] = new Array(0,DMF*(0.5*baseWidth+24/(2*12))+yshift,DMF*(0.5*Height+32/(2*12))+zshift); // right
										dataMatrixF[dataCount+4] = new Array(0,DMF*(0.5*baseWidth-24/(2*12))+yshift,DMF*(0.5*Height+32/(2*12))+zshift);
										dataMatrixF[dataCount+5] = new Array(0,DMF*(0.5*baseWidth+24/(2*12))+yshift,DMF*(0.5*Height+32/(2*12))+zshift); // top
										dataMatrixF[dataCount+6] = new Array(0,DMF*(0.5*baseWidth-24/(2*12))+yshift,DMF*(0.5*Height-32/(2*12))+zshift);
										dataMatrixF[dataCount+7] = new Array(0,DMF*(0.5*baseWidth+24/(2*12))+yshift,DMF*(0.5*Height-32/(2*12))+zshift); // bottom
									}
								}
								
								for (i=0; i<dataMatrixF.length; i++){
									dataMatrixTempF[i] = dataMatrixF[i];
								}	
							}
							
									
							function BuildF(){
								buildBaseF();
								buildTopF();
							}
									
							function drawDataF(){
								rotateDataX(rXF,dataMatrixF,dataMatrixTempF);
								rotateDataY(rYF,dataMatrixF,dataMatrixTempF);
								var c2 = document.getElementById("myCanvas2");
								var ctx2 = c2.getContext("2d");
								ctx2.clearRect(0, 0, c2.width, c2.height);
								ctx2.beginPath();
								for(i=0;i<dataMatrixF.length;i=i+2){
									ctx2.moveTo(dataMatrixTempF[i][0], dataMatrixTempF[i][1]);
									ctx2.lineTo(dataMatrixTempF[i+1][0], dataMatrixTempF[i+1][1]);
								}
								ctx2.stroke();
							}
							BuildF();
							drawDataF();
						</script>
					</div>
					<div id="containertop" style="width:500px; height:250px; float:left; clear:left">
						<canvas id="myCanvas1" width="500" height="250" style="margin:-2px; border:1px solid #d3d3d3;">
							Your browser does not support the HTML5 canvas tag.
						</canvas>
						<script>
							pi = Math.PI;
									
							var DMT = 2*12*0.67; // dimension multiplier
									
							function buildTopT(){
								xshift = 250-0.5*baseDepth*DMT;
								yshift = 125-0.5*baseWidth*DMT;
								dataMatrixT = new Array();
								dataMatrixTempT = new Array();
										
								dataMatrixT[0] = new Array(xshift,yshift,0);
								dataMatrixT[1] = new Array(baseDepth*DMT+xshift,yshift,0);
								dataMatrixT[2] = new Array(xshift,baseWidth*DMT+yshift,0);
								dataMatrixT[3] = new Array(baseDepth*DMT+xshift,baseWidth*DMT+yshift,0);
								
								
								for (i=0; i<baseDepth+1; i++){
									dataMatrixT[4+2*i] = new Array(i*DMT+xshift,yshift,0);
									dataMatrixT[5+2*i] = new Array(i*DMT+xshift,baseWidth*DMT+yshift,0);
								}
								
								dataCount = dataMatrixT.length;
								if (topStyle == 1){
									dataMatrixT[dataCount] = new Array(xshift,0.5*baseWidth*DMT+yshift,0);
									dataMatrixT[dataCount+1] = new Array(baseDepth*DMT+xshift,0.5*baseWidth*DMT+yshift,0);
								}
								else if (topStyle == 2){
									dataMatrixT[dataCount] = new Array(xshift,yshift,0);
									dataMatrixT[dataCount+1] = new Array(xshift,yshift,0);
								}
								
								for (i=0; i<dataMatrixT.length; i++){
									dataMatrixTempT[i] = dataMatrixT[i];
								}
							}
									
							function BuildT(){
								buildTopT();
							}
							
									
							function drawDataT(){
								var c1 = document.getElementById("myCanvas1");
								var ctx1 = c1.getContext("2d");
								ctx1.clearRect(0, 0, c1.width, c1.height);
								ctx1.beginPath();
								for(i=0;i<dataMatrixT.length;i=i+2){
									ctx1.moveTo(dataMatrixTempT[i][0], dataMatrixTempT[i][1]);
									ctx1.lineTo(dataMatrixTempT[i+1][0], dataMatrixTempT[i+1][1]);
								}
								ctx1.stroke();
							}
							BuildT();
							drawDataT();
						</script>
					</div>
				</div>
			</div>
			
						<div id="incdec" style="float:left; clear:left; margin-left:10px;">
						    <p>Base width:
							<input type="text" value="6" style="width:30px; height:25px; text-align:center; vertical-align: middle;" name="incdec" />
						    <script>
								function widthIncrease(){
									if (baseWidth<15) {baseWidth++;Build();drawData();BuildF();drawDataF();BuildT();drawDataT();} }
								function widthDecrease(){
									if (doorType == 3 && doorLocation == 1){
										if (baseWidth>6){baseWidth--;Build();drawData();BuildF();drawDataF();BuildT();drawDataT();} }
									else if (doorType == 1 && doorLocation == 1){
										if (baseWidth>4){baseWidth--;Build();drawData();BuildF();drawDataF();BuildT();drawDataT();} }
									else{
										if (baseWidth>3){baseWidth--;Build();drawData();BuildF();drawDataF();BuildT();drawDataT();} }
								}
							</script>
							<img onclick="widthIncrease();" src="up_arrow.jpeg" id="up" />
						    <img onclick="widthDecrease();" src="down_arrow.jpeg" id="down" />
							</p>
						</div>
						

						<div id="incdec1" style="float:left; margin-left:50px; margin-left:10px;">
						    <p>Base depth:
							<input type="text" value="8" style="width:30px; height:25px; text-align:center; vertical-align: middle;" name="incdec1"/>
						    <script>
								function depthIncrease(){
									if (baseDepth<15) {baseDepth++;Build();drawData();BuildF();drawDataF();BuildT();drawDataT();} }
								function depthDecrease(){
									if (doorType == 3 && doorLocation == 2){
										if (baseDepth>6) {baseDepth--;Build();drawData();BuildF();drawDataF();BuildT();drawDataT();} }
									else if (doorType == 1 && doorLocation == 2){
										if (baseDepth>4) {baseDepth--;Build();drawData();BuildF();drawDataF();BuildT();drawDataT();} }
									else{
										if (baseDepth>3) {baseDepth--;Build();drawData();BuildF();drawDataF();BuildT();drawDataT();} }
								}
							</script>
							
							<img onclick="depthIncrease();" src="up_arrow1.jpeg" id="up1" />
						    <img onclick="depthDecrease();" src="down_arrow1.jpeg" id="down1" />
							</p>
						</div>

						<div id="incdec2" style="float:left; clear:left; margin-left:10px;">
						    <p>Height:
							<input type="text" value="8" style="width:30px; height:25px; text-align:center; vertical-align: middle;" name="incdec2"/>
						    <img onclick="if (Height < 11) {Height++;Build();drawData();BuildF();drawDataF();BuildT();drawDataT(); }" src="up_arrow2.jpeg" id="up2" />
						    <img onclick="if (Height > 7) {Height--;Build();drawData();BuildF();drawDataF();BuildT();drawDataT(); }" src="down_arrow2.jpeg" id="down2" />
							</p>
						</div>

						<div id="incdec3" style="float:left; margin-left:81px; margin-left:10px;">
						    <p>Roof rise:
							<input type="text" value="5" style="width:30px; height:25px; text-align:center; vertical-align: middle;" name="incdec3"/>
						    <img onclick="if (Rise < 6) {Rise++;Build();drawData();BuildF();drawDataF();BuildT();drawDataT(); }" src="up_arrow3.jpeg" id="up3" />
						    <img onclick="if (Rise > 2) {Rise--;Build();drawData();BuildF();drawDataF();BuildT();drawDataT(); }" src="down_arrow3.jpeg" id="down3" />
							</p>
						</div>

					<script>
					$(document).ready(function(){
					    $("#up").on('click',function(){
					        if (parseInt($("#incdec input").val()) < 15){
								$("#incdec input").val(parseInt($("#incdec input").val())+1);}
					    });
					    $("#down").on('click',function(){
							if (doorType == 3 && doorLocation == 1){
								if (parseInt($("#incdec input").val()) > 6){
									$("#incdec input").val(parseInt($("#incdec input").val())-1);} }
							else if (doorType == 1 && doorLocation == 1){
								if (parseInt($("#incdec input").val()) > 4){
									$("#incdec input").val(parseInt($("#incdec input").val())-1);} }
							else {
								if (parseInt($("#incdec input").val()) > 3){
									$("#incdec input").val(parseInt($("#incdec input").val())-1);} }	
					    });
					});
					$(document).ready(function(){
					    $("#up1").on('click',function(){
							if (parseInt($("#incdec1 input").val()) < 15){
								$("#incdec1 input").val(parseInt($("#incdec1 input").val())+1);}
					    });
					    $("#down1").on('click',function(){
					        if (doorType == 3 && doorLocation == 2){
								if (parseInt($("#incdec1 input").val()) > 6){
									$("#incdec1 input").val(parseInt($("#incdec1 input").val())-1);} }
							else if (doorType == 1 && doorLocation == 2){
								if (parseInt($("#incdec1 input").val()) > 4){
									$("#incdec1 input").val(parseInt($("#incdec1 input").val())-1);} }
							else {
								if (parseInt($("#incdec1 input").val()) > 3){
									$("#incdec1 input").val(parseInt($("#incdec1 input").val())-1);} }
						});
					});
					$(document).ready(function(){
					    $("#up2").on('click',function(){
							if (parseInt($("#incdec2 input").val()) < 11){
								$("#incdec2 input").val(parseInt($("#incdec2 input").val())+1);
							}
					    });
					    $("#down2").on('click',function(){
							if (parseInt($("#incdec2 input").val()) > 7){
								$("#incdec2 input").val(parseInt($("#incdec2 input").val())-1);
							}
					    });
					});
					$(document).ready(function(){
					    $("#up3").on('click',function(){
					        if (parseInt($("#incdec3 input").val()) < 6){
								$("#incdec3 input").val(parseInt($("#incdec3 input").val())+1);
							}
							
					    });
					    $("#down3").on('click',function(){
					        if (parseInt($("#incdec3 input").val()) > 2){
								$("#incdec3 input").val(parseInt($("#incdec3 input").val())-1);
							}
					    });
					});
					</script>
					<div id="rooftype" style="float:left; clear:left; margin-left:80px">					
						<p>Roof type: 
							<button type="button" onclick="topStyle = 1;Build();drawData();topStyle1 = 1;BuildT();drawDataT();topStyle2 = 1;BuildF();drawDataF();">Gable</button>
							<button type="button" onclick="topStyle = 2;Build();drawData();topStyle1 = 0;BuildT();drawDataT();topStyle2 = 0;BuildF();drawDataF();">Slanted</button>
						</p>
					</div>
						</body>
						</body>

				</div>
				<div id="savecontainer" style="float:left; clear:left; width:100%; height:95px;">
					<input type="submit" name="design" id="design" value="Save" style="font-size:16px; height:45px; width:80px; margin-top:20px; margin-bottom:20px; margin-left:150px;" />
				</div>
        </form>
	</body>	
</html>