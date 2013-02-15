<?php
$user = $_POST["user"];
$pass = $_POST["pass"];
$version = $_POST["pass"];


$minecraftSocket = fopen("http://login.minecraft.net/?user=$user&password=$pass&version=$version", "rb");
$minecraftOutput = '';
while (!feof($minecraftSocket)) {
$minecraftOutput = fgets($minecraftSocket, 128);
}
fclose($minecraftSocket);
$values = explode(':', $minecraftOutput);

if(count($values) > 1){
$MinecraftUsername = $values[2];
$sessionID = $values[3];
}else{
alert('Bad Login');
}
?>
<html>
<head>
</head>
<body>

<applet code="net.minecraft.Launcher" archive="https://s3.amazonaws.com/MinecraftDownload/launcher/MinecraftLauncher.jar?v=1357737036000" codebase="/game/" width="854" height="480">
        <param name="separate_jvm" value="true">
        <param name="java_arguments" value="-Xmx1024M -Xms1024M -Dsun.java2d.noddraw=true -Dsun.awt.noerasebackground=true -Dsun.java2d.d3d=false -Dsun.java2d.opengl=false -Dsun.java2d.pmoffscreen=false">
        <param name="userName" value=$MinecraftUsername>
        <param name="latestVersion" value="1357737036000">
        <param name="sessionId" value=$sessionID>
        <param name="downloadTicket" value="0">
</applet>

</body>
</html>
