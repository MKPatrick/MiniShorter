<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">
<head>
<title>Cross-Browser QRCode generator for Javascript</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
<script type="text/javascript" src="/QR/jquery.min.js"></script>
<script type="text/javascript" src="/QR/qrcode.js"></script>
</head>
<body>
<div id="qrcode" style="width:100px; height:100px; margin-top:15px;"></div>

<script>

<?php
echo("var currentIDConvertedToLetters=\"" .$_GET['i'] ."\"")
?>
    </script>

<script type="text/javascript">
var qrcode = new QRCode(document.getElementById("qrcode"), {
	width : 250,
	height : 250
});

function makeCode () {		
    var base_url = window.location.origin;
var link=base_url + "?i=" +currentIDConvertedToLetters;
	
	qrcode.makeCode(link);
}

makeCode();

</script>
</body>