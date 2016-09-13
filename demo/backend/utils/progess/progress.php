<style>
	.progress{
		position:absolute;
		top:50%;
		left:50%;
		display:none;
	}
</style>
<div id="loaderImage" class = "progress" ></div>
	<script type="text/javascript">
		var cSpeed=7;
		var cWidth=150;
		var cHeight=160;
		var cTotalFrames=29;
		var cFrameWidth=150;
		var cImageSrc='utils/progress/images/sprites.png';
		
		var cImageTimeout=false;
		var cIndex=0;
		var cXpos=0;
		var cPreloaderTimeout=false;
		var SECONDS_BETWEEN_FRAMES=0;
		
		function startAnimation(){
			
			document.getElementById('loaderImage').style.backgroundImage='url('+cImageSrc+')';
			document.getElementById('loaderImage').style.width=cWidth+'px';
			document.getElementById('loaderImage').style.height=cHeight+'px';
			
			//FPS = Math.round(100/(maxSpeed+2-speed));
			FPS = Math.round(100/cSpeed);
			SECONDS_BETWEEN_FRAMES = 1 / FPS;
			
			cPreloaderTimeout=setTimeout('continueAnimation()', SECONDS_BETWEEN_FRAMES/1000);
			
		}
		
		function continueAnimation(){
			
			cXpos += cFrameWidth;
			//increase the index so we know which frame of our animation we are currently on
			cIndex += 1;
			 
			//if our cIndex is higher than our total number of frames, we're at the end and should restart
			if (cIndex >= cTotalFrames) {
				cXpos =0;
				cIndex=0;
			}
			
			if(document.getElementById('loaderImage'))
				document.getElementById('loaderImage').style.backgroundPosition=(-cXpos)+'px 0';
			
			cPreloaderTimeout=setTimeout('continueAnimation()', SECONDS_BETWEEN_FRAMES*1000);
		}
		
		function stopAnimation(){//stops animation
			clearTimeout(cPreloaderTimeout);
			cPreloaderTimeout=false;
		}
		
		function imageLoader(s, fun)//Pre-loads the sprites image
		{
			clearTimeout(cImageTimeout);
			cImageTimeout=0;
			genImage = new Image();
			genImage.onload=function (){cImageTimeout=setTimeout(fun, 0)};
			genImage.onerror=new Function('alert(\'Could not load the image\')');
			genImage.src=s;
		}
		//The following code starts the animation
		new imageLoader(cImageSrc, 'startAnimation()');

		function processing(status)
		{
			var loaderObj = document.getElementById("loaderImage");
			if (status == "stop")
			{
				loaderObj.style.display = "none";
			}
			else
			{
				loaderObj.style.display = "block";
			}
			
		}
	</script>