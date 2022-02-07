<?php
	define("TITLE", "Team | Claus' Fine Dining");
	
	include('includes/header.php');
?>
	
	<div id="team-members" class="cf">
	
		<h1>Unser Team bei Claus'</h1>
		<p>Wir sind klein, aber oho. Claus' Fine Dining ist seit den Dreißiger Jahren ein Familienbetrieb, und wir sind stolz darauf! Wenn man uns drei zusammenbringt, weiß man nie, was Überraschendes passiert. Aber auf eines können Sie sich verlassen: <strong>Das beste Essen, das Sie je hatten. Jemals.</strong></p>
		
		<hr>
		
		<?php foreach ($teamMembers as $member) { ?>
			
			<div class="member">
				<img src="images/<?php echo $member["img"]; ?>.png" alt="<?php echo $member["name"]; ?>">
				<h2><?php echo $member["name"]; ?></h2>
				<p><?php echo $member["bio"]; ?></p>
			</div><!-- member -->
		
		<?php } ?>
		
	</div><!-- team-members -->
	
	<hr>
			
<?php include('includes/footer.php'); ?>