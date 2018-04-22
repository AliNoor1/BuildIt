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
			
			<div style="width:860px; height:255px; margin-left:10px; overflow:hidden">
				<div style="width:600px; height:255px; float:left">
					Select a door:</br>
					<input type="radio" id="door1" name="doortype" value="simple" onClick="changeDoor()">6-Panel Primed Premium Steel Door Slab - 36" x 80", $99.96<br>
					<input type="radio" id="door2" name="doortype" value="nicer" onClick="changeDoor()">6-Panel Primed Inswing Steel Door with Brickmould - 30" x 80", $174.00<br>
					<input type="radio" id="door3" name="doortype" value="double" onClick="changeDoor()">Smooth Carrara Core Primed Molded Composite Double Door - 60" x 80", $415.25<br>
					<script>
						function changeDoor(){
							if (document.getElementById("door1").checked){
								document.getElementById("picture").src = "simpledoor.jpg"; } 
							else if (document.getElementById("door2").checked){ 
								document.getElementById("picture").src = "nicerdoor.jpg"; } 
							else if (document.getElementById("door3").checked){ 
								document.getElementById("picture").src = "doubledoor.jpg"; }
						}
					</script>
					
					<p></p>
					Select a window:</br>
					<input type="radio" id="window1" name="windowtype" value="sliding1" onClick="changeWindow()">Right-Hand Sliding Vinyl Window - 23.5" x 23.5", $101.46"<br>
					<input type="radio" id="window2" name="windowtype" value="sliding2" onClick="changeWindow()">Right-Hand Sliding Vinyl Window - 35.5" x 35.5", $204.25<br>
					<input type="radio" id="window3" name="windowtype" value="sliding3" onClick="changeWindow()">Right-Hand Sliding Vinyl Window - 47.5" x 47.5", $238.36<br>
					<input type="radio" id="window4" name="windowtype" value="hung1" onClick="changeWindow()">Single Hung Vinyl Window - 23.5" x 47.5", $159.06<br>
					<input type="radio" id="window5" name="windowtype" value="hung2" onClick="changeWindow()">Single Hung Vinyl Window - 23.5" x 35.5", $135.76<br>
					<input type="radio" id="window6" name="windowtype" value="hung3" onClick="changeWindow()">Single Hung Vinyl Window - 35.5" x 35.5", $165.23<br>
					<input type="radio" id="window7" name="windowtype" value="casement" onClick="changeWindow()">Left-Hand Casement Vinyl Window - 23.5" x 35.5, $185.00<br>
					<script>
						function changeWindow(){
							if (document.getElementById("window1").checked){
								document.getElementById("picture").src = "sliding1.jpg"; } 
							else if (document.getElementById("window2").checked){ 
								document.getElementById("picture").src = "sliding1.jpg"; }
							else if (document.getElementById("window3").checked){ 
								document.getElementById("picture").src = "sliding1.jpg"; } 
							else if (document.getElementById("window4").checked){ 
								document.getElementById("picture").src = "hung1.jpg"; } 
							else if (document.getElementById("window5").checked){ 
								document.getElementById("picture").src = "hung1.jpg"; } 
							else if (document.getElementById("window6").checked){ 
								document.getElementById("picture").src = "hung1.jpg"; } 
							else if (document.getElementById("window7").checked){ 
								document.getElementById("picture").src = "casement.jpg"; }
						}
					</script>
				</div>
				<div style="width:260px; height:255px; float:left; text-align:center; margin-top:3px;">
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
								
						var topStyle = 1;
						var doorLocation = 1;
						
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
							if (doorLocation == 1){ //front side
								dataMatrix[dataCount] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth-1.5)+yshift,zshift);
								dataMatrix[dataCount+1] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth-1.5)+yshift,zDM*7+zshift); // left
								dataMatrix[dataCount+2] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth+1.5)+yshift,zshift);
								dataMatrix[dataCount+3] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth+1.5)+yshift,zDM*7+zshift); // right
								dataMatrix[dataCount+4] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth-1.5)+yshift,zDM*7+zshift);
								dataMatrix[dataCount+5] = new Array(DM*baseDepth+xshift,DM*(0.5*baseWidth+1.5)+yshift,zDM*7+zshift); // top
							}
							else if (doorLocation == 2){ //front side
								dataMatrix[dataCount] = new Array(DM*(0.5*baseDepth-1.5)+xshift,yshift,zshift);
								dataMatrix[dataCount+1] = new Array(DM*(0.5*baseDepth-1.5)+xshift,yshift,zDM*7+zshift); // left
								dataMatrix[dataCount+2] = new Array(DM*(0.5*baseDepth+1.5)+xshift,yshift,zshift);
								dataMatrix[dataCount+3] = new Array(DM*(0.5*baseDepth+1.5)+xshift,yshift,zDM*7+zshift); // right
								dataMatrix[dataCount+4] = new Array(DM*(0.5*baseDepth-1.5)+xshift,yshift,zDM*7+zshift);
								dataMatrix[dataCount+5] = new Array(DM*(0.5*baseDepth+1.5)+xshift,yshift,zDM*7+zshift); // top
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
									dataMatrixF[dataCount] = new Array(0,(0.5*baseWidth-1.5)*DMF+yshift,zshift);
									dataMatrixF[dataCount+1] = new Array(0,(0.5*baseWidth-1.5)*DMF+yshift,7*DMF+zshift);
									dataMatrixF[dataCount+2] = new Array(0,(0.5*baseWidth+1.5)*DMF+yshift,zshift);
									dataMatrixF[dataCount+3] = new Array(0,(0.5*baseWidth+1.5)*DMF+yshift,7*DMF+zshift);
									dataMatrixF[dataCount+4] = new Array(0,(0.5*baseWidth-1.5)*DMF+yshift,7*DMF+zshift);
									dataMatrixF[dataCount+5] = new Array(0,(0.5*baseWidth+1.5)*DMF+yshift,7*DMF+zshift);
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
						    <img onclick="if (baseWidth < 15) {baseWidth++;Build();drawData();BuildF();drawDataF();BuildT();drawDataT(); }" src="up_arrow.jpeg" id="up" />
						    <img onclick="if (baseWidth > 3) {baseWidth--;Build();drawData();BuildF();drawDataF();BuildT();drawDataT(); }" src="down_arrow.jpeg" id="down" />
							</p>
						</div>

						<div id="incdec1" style="float:left; margin-left:50px; margin-left:10px;">
						    <p>Base depth:
							<input type="text" value="8" style="width:30px; height:25px; text-align:center; vertical-align: middle;" name="incdec1"/>
						    <img onclick="if (baseDepth < 15) {baseDepth++;Build();drawData();BuildF();drawDataF();BuildT();drawDataT(); }" src="up_arrow1.jpeg" id="up1" />
						    <img onclick="if (baseDepth > 3) {baseDepth--;Build();drawData();BuildF();drawDataF();BuildT();drawDataT(); }" src="down_arrow1.jpeg" id="down1" />
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
								$("#incdec input").val(parseInt($("#incdec input").val())+1);
							}
					    });
					    $("#down").on('click',function(){
							if (parseInt($("#incdec input").val()) > 3){
								$("#incdec input").val(parseInt($("#incdec input").val())-1);
							}
					    });
					});
					$(document).ready(function(){
					    $("#up1").on('click',function(){
							if (parseInt($("#incdec1 input").val()) < 15){
								$("#incdec1 input").val(parseInt($("#incdec1 input").val())+1);
							}
					    });
					    $("#down1").on('click',function(){
					        if (parseInt($("#incdec1 input").val()) > 3){
								$("#incdec1 input").val(parseInt($("#incdec1 input").val())-1);
							}
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
					<div id="doorlocation" style="float:left; clear:left; margin-left:80px">
						<p>Door Location: 
							<button type="button" onclick="doorLocation = 1;Build();drawData();doorLocation2 = 1;BuildF();drawDataF();">Front</button>
							<button type="button" onclick="if (Height > 6) {doorLocation = 2;Build();drawData();doorLocation2 = 2;BuildF();drawDataF(); }">Side</button>
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