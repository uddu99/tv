<?php
include "config/config.php";
$id = $_GET["id"];
$identity = $_REQUEST["identity"];
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
                horizontal: true,
                hoverPause:true,
                visible: 3,
                auto:10000,
                speed:1000
            });
        });
        </script>

        <script type="text/javascript">
        <!--

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
			

			var lastShortMsgID;
        
			function updateShortMsg()
			{
				if (lastShortMsgID==null || lastShortMsgID == "")
				{
					lastShortMsgID = document.getElementById("shortMsgId").value;
				}
				var param = "id=0";
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
							var shortMsgId = extractXML( xmlStr , "ID" );
							var shortMsg = extractXML( xmlStr , "MSG" );
							//alert(shortMsgId);
							if (shortMsgId != "" && lastShortMsgID != shortMsgId)
							{
								lastShortMsgID = shortMsgId;
								document.getElementById("shortMsgId").value = shortMsgId;
								document.getElementById("shortMsgTxt").innerHTML = shortMsg;
							}
						}
					}
				}
				xmlhttp.open("POST","check_shortmsg.php",true);
				xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xmlhttp.send( param );
			}

			var lastNewsID;
        
			function updateNews()
			{

				if (lastNewsID==null || lastNewsID == "")
				{
					lastNewsID = document.getElementById("newsId").value;
				}
				var param = "id=0";
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
							var newsId = extractXML( xmlStr , "ID" );
							if (newsId != "" && lastNewsID != newsId)
							{
								lastNewsID = newsId;
								document.getElementById("newsId").value = newsId;
								document.getElementById("newsIframe").src = "news.php";
							}
						}
					}
				}
				xmlhttp.open("POST","check_news.php",true);
				xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xmlhttp.send( param );
			}

			function runIntervalFunc()
			{
				setInterval( changeChannel , 3000 );
				setInterval( updateShortMsg , 5000 );
				setInterval( updateNews , 10000 );
			}
        //-->
        </script>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body onload="runIntervalFunc()" class="home">
        <!-- Header -->
        <header id="header">
            <!-- Logo -->
            <h1 id="logo" name="logo"><img src="images/logo.png" width="550" height="119"></h1>
            <!-- Nav -->
            <nav id="nav">
				<?php
				include "shortmsg.php";
				?>
            </nav>
			
        </header>
        <div id="content">
        <div id="newsheader">ข่าว<span>ประชาสัมพันธ์</span></div>
            <!-- tv -->
            <div id="tv">
				<?php
					if (!empty($identity))
						$where = " and a.hotspot_macaddress = '$identity' ";
					else
						$where = " and  a.id = '$id' ";

					//$sql = "select a.id,a.tv_id,tv_url from tb_b_hotspot a , tb_b_tv_channel b where a.tv_id = b.id $where ";
                    $sql = "select tb_b_gallery.code code,tb_b_gallery_items.img_file img_file from tb_b_gallery join tb_b_gallery_items on tb_b_gallery.id = tb_b_gallery_items.gallery_id where status = 'Y' ";
					//echo $sql;
					$db->send_cmd($sql);
					
					//$hotspotId = $row["id"];
					//$tvid = $row["tv_id"];
					//$tvurl = $row["tv_url"];
					//echo $tvurl;
				?>
                <p>
                    <div id="slideshow">
                    <?php
                        while($row = $db->get_result())
                        {
                    ?>
                       <div>
                         <img src="backend/attachfiles/<?=$row["code"]?>/<?=$row["img_file"]?>" width = "745" height = "645" align = "center">
                       </div>
                    <?php
                        }
                    ?>
                    </div>

                    <style>
                        #slideshow { 
                            position: relative; 
                            width: 750px; 
                            height: 650px; 
                            padding: 3px; 
                            box-shadow: 0 0 20px rgba(0,0,0,0.4); 
                        }

                        #slideshow > div { 
                            position: absolute; 
                            top: 2px; 
                            left: 2px; 
                            right: 2px; 
                            bottom: 2px; 
                        }
                    </style>

                    <script>
                        $("#slideshow > div:gt(0)").hide();

                        setInterval(function() { 
                          $('#slideshow > div:first')
                            .fadeOut(1000)
                            .next()
                            .fadeIn(1000)
                            .end()
                            .appendTo('#slideshow');
                        },  3000);
                    </script>
                </p>
			</div>
			<input type = "hidden" name = "hotspotId" id = "hotspotId" value = "<?=$hotspotId?>">
			<input type = "hidden" name = "identity" id = "identity" value = "<?=$identity?>">
			<input type = "hidden" name = "tvid" id = "tvid" value = "<?=$tvid?>">
			<input type = "hidden" name = "shortMsgId" id = "shortMsgId" value = "<?=$shortMsgId?>">
			<input type = "hidden" name = "newsId" id = "newsId" value = "<?=$newsId?>">
			<!-- -->
            <?php
			include "news.php";
			?>
                <div id="topnews">
                <div id="all">
                <div class="newsticker-jcarousellite">
                    <ul>
                      <?php
						$sql = "select * from tb_b_news where status = 'Y' and show_date is not null order by show_date desc limit 0,4";
						$db->send_cmd($sql);
						while ($row=$db->get_result())
						{
						?>
						 <li>
							<div class="thumbnail">
							<img src="backend/attachfiles/<?=$row["image"]?>">
							</div>
							<div class="info">
							<a href="#"><?=$row["title_".$curLang]?></a>
							</div>
							<div class="clear"></div>
						</li>
						<?php
						}
						?>
                    </ul>
                </div>
                </div>
                </div>

	</body>
</html>