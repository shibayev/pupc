<?php
require_once 'TemplateRenderer.php';
$renderer = new TemplateRenderer();

// Set registration variables
$submit = $_POST["submit"];
if (!logged_in()) {
	create_alert("Please log in to see your profile.", 'warning');
	$renderer->redirect('.');
}
else {
	if ($submit) {
		$name = safe($_POST["name"], 'sql');
		$surname = safe($_POST["surname"], 'sql');
		$grade = safe($_POST["grade"], 'sql');
		$school = safe($_POST["school"], 'sql');
		$city = safe($_POST["city"], 'sql');
		$state = safe($_POST["state"], 'sql');
		$country = safe($_POST["country"], 'sql');
		$coach = safe($_POST["coach"], 'sql');
		$hash = safe($_POST["hash"], 'sql');
	
		if (update_profile($name, $surname, $grade, $school, $city, $state, $country, $coach, $hash))
			create_alert("Profile successfully updated.", 'success');
		else
			create_alert("There was a problem updating your profile. Please try again.", 'warning');
	}
	
	print $renderer->render('Profile.html.twig', load_profile());
}
?>
