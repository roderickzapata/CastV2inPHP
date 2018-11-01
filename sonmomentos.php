<?php
// Create Chromecast object and give IP and Port
$cc = new Chromecast("217.63.63.259","8009");

// Launch the Chromecast App
$cc->launch("87087D10");

// Wait for the application to be ready
$response = "";
while (!preg_match("/Application status is ready/s",$response)) {
        $response = $cc->getCastMessage();
}

// Connect to the Application
$cc->connect();

// Send the URL
$cc->sendMessage("urn:x-cast:com.chrisridings.piccastr","http://distribution.bbb3d.renderfarming.net/video/mp4/bbb_sunflower_1080p_30fps_normal.mp4");

// Keep the connection alive with heartbeat
while (1==1) {
        $cc->pingpong();
	sleep(10);
}
