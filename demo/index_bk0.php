<?php
include "backend/includes/connectdb.inc.php";
$id = $_GET["id"];
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>จัดซื้อด้วยเงินจากการจำหน่ายอุปกรณ์เครื่องแต่งกายนักศึกษาปี ๒๕๕๓ - ๒๕๕๖</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.poptrox.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
			<link rel="stylesheet" href="css/style-normal.css" />
            <link href="fonts/thsarabunnew.css" rel="stylesheet" type="text/css" />
		</noscript>
        <script src="js/jquery-latest.pack.js" type="text/javascript"></script>
		<script src="js/jcarousellite_1.0.1c4.js" type="text/javascript"></script>
        <script type="text/javascript">
        $(function() {
            $(".newsticker-jcarousellite").jCarouselLite({
                vertical: true,
                hoverPause:true,
                visible: 3,
                auto:10000,
                speed:1000
            });
        });
        </script>
		
		<script type="text/javascript">
        <!--
			var lastTvid;
        
			function changeChannel()
			{
				var hotspotId = document.getElementById("hotspotId").value;
				if (lastTvid==null || lastTvid == "")
				{
					lastTvid = document.getElementById("tvid").value;
				}
				var param = "id="+hotspotId;
				param += "&tvid="+lastTvid;
				var xmlhttp;
				if (window.XMLHttpRequest)
				{// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp=new XMLHttpRequest();
				}
				else
				{// code for IE6, IE5
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange=function()
				{
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						var xmlStr = xmlhttp.responseText;
						if (xmlStr!="")
						{
							var tvid = extractXML( xmlStr , "TVID" );
							if (tvid != "")
							{
								lastTvid = tvid;
								document.getElementById("tvid").value = tvid;
								var objDiv = document.getElementById("tv");
								var tvurl = extractXML( xmlStr , "TVURL" );
								objDiv.innerHTML = tvurl;
							}
						}
					}
				}
				xmlhttp.open("POST","check_channel.php",true);
				xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xmlhttp.send( param );
			}
			function extractXML( xmlStr , xmlTag )
			{
				if (xmlStr==null || xmlStr == "null")
					return;
				var pos = xmlStr.indexOf( "<" + xmlTag + ">" );
				if (pos <= -1)
					return "";
				var beginPos = xmlStr.indexOf( "<" + xmlTag + ">" ) + ("<" + xmlTag + ">").length ;
				var endPos = xmlStr.indexOf( "</" + xmlTag + ">" );
				return xmlStr.substring( beginPos , endPos );
			}
        //-->
        </script>
        
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body onload="setInterval( changeChannel , 3000 )">
        <!-- Header -->
        <header id="header">
            <!-- Logo -->
            <h1 id="logo" name="logo"><img src="images/logo.png" width="550" height="119"></h1>
            <!-- Nav -->
            <nav id="nav">
            <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">มหาวิทยาลัยเทคโนโลยีราชมงคลสุวรรณภูมิ วิทยาเขตนนทบุรี เปิดให้บริการเวลา 08.30 - 22.00 น. ทุกวัน ไม่เว้นวันหยุดราชการ  หมายเลขโทรศัพท์ 02 564 4440-59 ต่อ 1302</marquee>
            </nav>
        </header>
        <div id="content">
            <!-- tv -->
            <div id="tv">
				<?php
					$id = $_GET["id"];
					$sql = "select a.id,a.tv_id,tv_url from tb_b_hotspot a , tb_b_tv_channel b where a.tv_id = b.id and a.id = '$id' ";
					$db->send_cmd($sql);
					$row = $db->get_result();
					$hotspotId = $row["id"];
					$tvid = $row["tv_id"];
					$tvurl = $row["tv_url"];
					echo $tvurl;
				?>
            	
			</div>
            <!-- topnews -->
            <div id="news">
                <div id="newsheader">ข่าว<span>ประชาสัมพันธ์</span></div>
			  <script type="text/javascript">
                
                /***********************************************
                * Memory Ticker script- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
                * This notice MUST stay intact for legal use
                * Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
                ***********************************************/
                
                //configure tickercontents[] to set the messges you wish be displayed (HTML codes accepted)
                //Backslash any apostrophes within your text (ie: I\'m the king of the world!)
                var tickercontents=new Array()
                tickercontents[0]='<img src="news/newsimg1.jpg"><span> สวส. จัดโครงการอบรมหลักสูตรนักบริหารสารสนเทศ มทรส. รุ่นที่ 3 ( MIS RMUTSB 3 rd)</span>'
                tickercontents[1]='<img src="news/newsimg2.jpg"><span> สวท. จัดโครงการ "อบรมเชิงปฏิบัติการ การใช้งานทะเบียนและประมวลผลสำหรับผู้บริหารหน่วยงาน"</span>'
                tickercontents[2]='<img src="news/newsimg3.jpg"><span>ตัวอย่างการแต่งกายของนักศึกษา มทร.สุวรรณภูมิ</span>'
                tickercontents[3]='<img src="news/newsimg4.jpg"><span>รับสมัครสอบคัดเลือกเข้าศึกษาต่อระดับปริญญาตรี 4-5 ปี ประจำปีการศึกษา 2557 (เพิ่มเติม 2)</span>'
                
                var persistlastviewedmsg=1 //should messages' order persist after users navigate away (1=yes, 0=no)?
                var persistmsgbehavior="onload" //set to "onload" or "onclick".
                
                //configure the below variable to determine the delay between ticking of messages (in miliseconds):
                var tickdelay=10000
                
                ////Do not edit pass this line////////////////
                
                var divonclick=(persistlastviewedmsg && persistmsgbehavior=="onclick")? 'onClick="savelastmsg()" ' : ''
                var currentmessage=0
                
                function changetickercontent(){
                if (crosstick.filters && crosstick.filters.length>0)
                crosstick.filters[0].Apply()
                crosstick.innerHTML=tickercontents[currentmessage]
                if (crosstick.filters && crosstick.filters.length>0)
                crosstick.filters[0].Play()
                currentmessage=(currentmessage==tickercontents.length-1)? currentmessage=0 : currentmessage+1
                var filterduration=(crosstick.filters&&crosstick.filters.length>0)? crosstick.filters[0].duration*1000 : 0
                setTimeout("changetickercontent()",tickdelay+filterduration)
                }
                
                function beginticker(){
                if (persistlastviewedmsg && get_cookie("lastmsgnum")!="")
                revivelastmsg()
                crosstick=document.getElementById? document.getElementById("memoryticker") : document.all.memoryticker
                changetickercontent()
                }
                
                function get_cookie(Name) {
                var search = Name + "="
                var returnvalue = ""
                if (document.cookie.length > 0) {
                offset = document.cookie.indexOf(search)
                if (offset != -1) {
                offset += search.length
                end = document.cookie.indexOf(";", offset)
                if (end == -1)
                end = document.cookie.length;
                returnvalue=unescape(document.cookie.substring(offset, end))
                }
                }
                return returnvalue;
                }
                
                function savelastmsg(){
                document.cookie="lastmsgnum="+currentmessage
                }
                
                function revivelastmsg(){
                currentmessage=parseInt(get_cookie("lastmsgnum"))
                currentmessage=(currentmessage==0)? tickercontents.length-1 : currentmessage-1
                }
                
                if (persistlastviewedmsg && persistmsgbehavior=="onload")
                window.onunload=savelastmsg
                
                if (document.all||document.getElementById)
                document.write('<div id="memoryticker" '+divonclick+'></div>')
                if (window.addEventListener)
                window.addEventListener("load", beginticker, false)
                else if (window.attachEvent)
                window.attachEvent("onload", beginticker)
                else if (document.all || document.getElementById)
                window.onload=beginticker
                
                </script>
                <div id="topnews">
                <div id="all">
                <div class="newsticker-jcarousellite">
                    <ul>
                        <li>
                            <div class="thumbnail">
                                <img src="news/1.jpg">
                            </div>
                            <div class="info">
                                <a href="#">สวส. จัดโครงการอบรมหลักสูตรนักบริหารสารสนเทศ มทรส. รุ่นที่ 3 ( MIS RMUTSB 3 rd)</a>
                            </div>
                            <div class="clear"></div>
                        </li>
                        
                        <li>
                            <div class="thumbnail">
                                <img src="news/2.jpg">
                            </div>
                            <div class="info">
                                <a href="#">สวส. จัดโครงการอบรมหลักสูตรนักบริหารสารสนเทศ มทรส. รุ่นที่ 3 ( MIS RMUTSB 3 rd)</a>
                            </div>
                            <div class="clear"></div>
                        </li>
                        <li>
                            <div class="thumbnail">
                                <img src="news/3.jpg">
                            </div>
                            <div class="info">
                                <a href="#">สวส. จัดโครงการอบรมหลักสูตรนักบริหารสารสนเทศ มทรส. รุ่นที่ 3 ( MIS RMUTSB 3 rd)</a>
                            </div>
                            <div class="clear"></div>
                        </li>
                        <li>
                            <div class="thumbnail">
                                <img src="news/4.jpg">
                            </div>
                            <div class="info">
                                <a href="#">สวส. จัดโครงการอบรมหลักสูตรนักบริหารสารสนเทศ มทรส. รุ่นที่ 3 ( MIS RMUTSB 3 rd)</a>
                            </div>
                            <div class="clear"></div>
                        </li>
                        <li>
                            <div class="thumbnail">
                                <img src="news/5.jpg">
                            </div>
                            <div class="info">
                                <a href="#">สวส. จัดโครงการอบรมหลักสูตรนักบริหารสารสนเทศ มทรส. รุ่นที่ 3 ( MIS RMUTSB 3 rd)</a>
                            </div>
                            <div class="clear"></div>
                        </li>
                        <li>
                            <div class="thumbnail">
                                <img src="news/6.jpg">
                            </div>
                            <div class="info">
                                <a href="#">สวส. จัดโครงการอบรมหลักสูตรนักบริหารสารสนเทศ มทรส. รุ่นที่ 3 ( MIS RMUTSB 3 rd)</a>
                            </div>
                            <div class="clear"></div>
                        </li>
                    </ul>
                </div>
                </div>
                </div>
			</div>
            <!-- news -->
        </div>
	</body>
</html>