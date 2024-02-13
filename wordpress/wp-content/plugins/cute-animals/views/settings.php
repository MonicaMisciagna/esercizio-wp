<h2>Cute Animals settings</h2>
<form action="" method="post" id="wp_animals_form">

	<?php wp_nonce_field( 'wpa_settings' ); ?>
	<label>Animal: </label>
	<?php

		global $WPA_SPRITES;

		foreach($WPA_SPRITES as $animal)
		{
			echo '<input type="radio" name="sprite" value="'.$animal['sprite'].'" '.($current_animal->sprite == $animal['sprite'] ? 'checked' : '').' /> <span class="wpa_sprite wpa_anim_left" style="background-image: url('.$animal['sprite'].'); width: '.$animal['width'].'px; height: '.$animal['height'].'px"></span>';
		}

	?><br />
	<label>Direction</label>
	<select name="direction">
		<option value="0" <?php echo ($current_animal->direction == 0 ? 'selected' : '') ?>>Left</option>
		<option value="1" <?php echo ($current_animal->direction == 1 ? 'selected' : '') ?>>Right</option>
		<option value="2" <?php echo ($current_animal->direction == 2 ? 'selected' : '') ?>>Up</option>
		<option value="3" <?php echo ($current_animal->direction == 3 ? 'selected' : '') ?>>Down</option>
	</select><br />
	<label>Speed</label>
	<input type="range" name="speed" min="10" max="100" value="<?php echo $current_animal->speed ?>"><br />
	<label>Offset</label>
	<input type="number" name="position" value="<?php echo ($current_animal->position ? $current_animal->position : 50) ?>" />px<br />
	<input type="image" src="<?php echo plugins_url('images/save.png', dirname(__FILE__)) ?>" />

</form>

<h3><br />Need help? <a href="http://www.info-d-74.com" target="_blank">Click for support</a> <br/>
and like InfoD74 to discover my new plugins: <a href="https://www.facebook.com/infod74/" target="_blank"><img src="<?php echo plugins_url( 'images/fb.png', dirname(__FILE__)) ?>" alt="" /></a></h3>