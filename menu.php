<?php
	define("TITLE", "Speisen | Claus' Fine Dining");
	
	include('includes/header.php');
?>
	
	<div id="menu-items">
	
		<h1>Unsere köstlichen Menüs</h1>
		<p>Wie unser Team ist auch unsere Speisekarte sehr klein &mdash; aber Donnerwetter, sie hat es wirklich in sich!</p>
		<p><em>Klicken Sie auf einen Menüpunkt, um mehr darüber zu erfahren.</em></p>
		
		<hr>
		
		<ul>

			<?php foreach ($menuItems as $dish => $item) { ?>
				
				<li><a href="dish.php?item=<?php echo $dish; ?>"><?php echo $item["title"]; ?></a> <?php echo $item["price"]; ?> <sup>€</sup></li>
			
			<?php } ?>
		</ul>
		
	</div><!-- team-members -->
	
	<hr>
			
<?php include('includes/footer.php'); ?>
