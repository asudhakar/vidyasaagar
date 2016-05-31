<?php 
	session_start();
	function landingPageSessionCheck(){
		if(empty($_SESSION["userDetails"])){
			header('location:view/login.php');
		}
	}

	function getCount($data){
		return count($data);
	}

	function loginPageSessionCheck(){
		if(!empty($_SESSION["userDetails"])){
			header('location: ../index.php');
		}
	}

	function extractUserDetails($details){
		$base64unserialized_details = base64_decode($details);
		$unserialized_details = unserialize($base64unserialized_details);
		return $unserialized_details;
	}
	function createSession($data){
		$userDetails['id'] = '1';
	 	$userDetails['username'] = 'vidyasaagar';
	 	$userDetails['email'] = 'vidyasaagar@gmail.com';
	 	$userDetails['password'] = 'jayam1234';
	 	$userDetails['admin'] = '1';
		$_SESSION["userDetails"] = base64_encode(serialize($userDetails));
		if(isset($_SESSION['userDetails'])){
			return true;
		}
		return false;
	}

	function isAdmin($user_details){
		$admin_stats = $user_details['admin'];
		if($admin_stats != 1){
			return true;
		} else{
			return false;
		}
	}
	
	function realEscape(&$data){
		mysqli_real_escape_string($data);
	}

	function isValidateUser($username, $password){
		realEscape($username);
		realEscape($password);
		if($username == "vidyasaagar" && $password == "vidyasaagar"){
			return createSession($username);
		}else{
			return false;
		}
	}

	function logOut(){
		session_start();
		session_destroy();   
	    header('Location:login.php');  
	}

	function executeQuery($query, $link){
		return mysqli_query($link, $query);
	}
	function db_connect_local(){
		$connection = mysqli_connect('localhost', "root", "palaniM@67", "jayam");
			if (!$connection) {
			    die("Connection failed: " . mysqli_connect_error());
			    exit();
			}
			return $connection;
	}

	function getAffectedRows($link){
		return mysqli_affected_rows($link);
	}

	function executeQueryFrontEnd($query){
		return mysqli_query(frontEndDBConnection(), $query);
	}

	function removeDuplicates($array){
		return array_unique($array, SORT_REGULAR);
	}

	function getChangeLogMeta($result){
		$changeLogMeta = array();
		while($row = mysqli_fetch_assoc($result)) {
			$changeLogMeta[] = $row;
		}
		return $changeLogMeta;
	}

	function getSlugsAndName(){
		return array(
				"change-log" => "IWP Admin Panel",
				"iwp-client-plugin" => "IWP Client Plugin",
				"broken-link-checker-change-log" => "Broken Link Checker",
				"client-plugin-branding" => "Client Plugin Branding",
				"client-reporting" => "Client Reporting",
				"backup-to-repositories" => "Cloud Backup",
				"code-snippets" => "Code Snippets",
				"duo-security" => "Duo Security &#45; 2 Factor Authentication",
				"enterprise" => "Enterprise",
				"file-uploader" => "File Uploader",
				"google-analytics" => "Google Analytics",
				"google-pagespeed" => "Google Page Speed",
				"google-webmaster" => "Google Webmaster",
				"install-clone-wordpress" => "Install/Clone Wordpress",
				"ithemes-security" => "IThemes Security",
				"manage-comments" => "Manage Comments",
				"manage-users" => "Manage Users",
				"publish-posts-pages-links" => "Publish Posts, Pages & Links",
				"schedule-backups" => "Schedule Backups",
				"malware-scanner-sucuri" => "Sucuri Malware Scanner",
				"uptime-monitor-uptime-robot" => "Uptime Monitor",
				"wordfence" => "Wordfence Security",
				"wp-maintenance" => "WP Maintenance",
				"wp-vulns" => "WPVulns",
				"staging" => "staging"
			);
	}

	function getDistinctInAppAddonsAndSlug(){
		return array(
				"IWPAdminPanel" => "change-log",
				"IWPClient" => "iwp-client-plugin",
				"brokenLinks" => "broken-link-checker-change-log",
				"clientPluginBranding" => "client-plugin-branding",
				"clientReporting" => "client-reporting",
				"backupRepository" => "backup-to-repositories",
				"codeSnippets" => "code-snippets",
				"duoSecurity" => "duo-security",
				"fileEditor" => "file-uploader",
				"googleAnalytics" => "google-analytics",
				"googlePageSpeed" => "google-pagespeed",
				"googleWebMasters" => "google-webmaster",
				"installClone" => "install-clone-wordpress",
				"ithemesSecurity" => "ithemes-security",
				"manageComments" => "manage-comments",
				"manageUsers" => "manage-users",
				"bulkPublish" => "publish-posts-pages-links",
				"multiUser" => "enterprise",
				"scheduleBackup" => "schedule-backups",
				"malwareScanningSucuri" => "malware-scanner-sucuri",
				"uptimeMonitorUptimeRobot" => "uptime-monitor-uptime-robot",
				"wordFence" => "wordfence",
				"wpOptimize" => "wp-maintenance",
				"WPVulns" => "wp-vulns",
				"staging" => "staging"
			);
	}

	function showDropDown($name){
		if(empty($name)){
			$id =  'id="viewControl"';
			$option = '<option value="all">All</option>';
		} else{
			$id =  ' ';
			$option = ' ';
		}
		$htmlHeader = '<select class="form-control"'. $id .'name="categoriesOption">'.$option;
		$htmlFooter = '</select>';
		$slugsAndName = getSlugsAndName();
		foreach ($slugsAndName as $addonSlug => $addonName) {
			if($name == $addonSlug)
			{
				$selectedContent = 'selected="selected"';
			} else{
				$selectedContent = " ";
			}
			$htmlMiddle = $htmlMiddle.'<option value='.$addonSlug .' '. $selectedContent.' >' .$addonName. '</option>';
		}
		return $htmlHeader.' '.$htmlMiddle.' '.$htmlFooter;
	}

	function getTimeAndDate(){
		return date("Y-m-d h:i:s");
	}

	function publish($selectedValues){
		$url = 'http://staging.service.infinitewp.com/service/ChangeLog/app/publish.php';
		$data = array('selectedValues' => $selectedValues);
		// use key 'http' even if you send the request to https://...
		$options = array(
		    'http' => array(
		        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		        'method'  => 'POST',	
		        'content' => http_build_query($data),
		    ),
		);
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		if ($result === FALSE) { echo "error"; }
	}

	
	function delete_file($path){
		if (!unlink($path))
		{
		  echo ("Error deleting $path");
		}
		else
		{
		  // echo ("Deleted $path");
		}
	}
