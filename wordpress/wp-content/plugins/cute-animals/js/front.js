//console.log(parameters);

var wp_anim_classes = ['wp_animal_left', 'wp_animal_right', 'wp_animal_up', 'wp_animal_down'];
var moving_duration = 50000;

function set_wp_animal_anim(animal, direction, speed, position) {

		//positionne l'animal en fonction de la direction 
		if(direction == 0)
		{
			var anim_duration = window.innerWidth/speed*1000;

			jQuery(animal).css('left', window.innerWidth);
			jQuery(animal).css('top', position+'px');
			jQuery(animal).animate({
			    left: "-="+(window.innerWidth+32),
			}, anim_duration, "linear", function() {
				jQuery(animal).css('left', window.innerWidth);
			    set_wp_animal_anim(animal, direction, speed, position);
			});
		}
		else if(direction == 1)
		{
			var anim_duration = window.innerWidth/speed*1000;

			jQuery(animal).css('left', -32+'px');
			jQuery(animal).css('top', position+'px');
			jQuery(animal).animate({
			    left: "+="+window.innerWidth,
			}, anim_duration, "linear", function() {
			    jQuery(animal).css('right', -32+'px');
			    set_wp_animal_anim(animal, direction, speed, position);
			});
		}
		else if(direction == 2)
		{
			var anim_duration = document.body.scrollHeight/speed*1000;

			jQuery(animal).css('left', position+'px');
			jQuery(animal).css('top', document.body.scrollHeight+64);
			jQuery(animal).animate({
			    top: "-="+(document.body.scrollHeight+32),
			}, anim_duration, "linear", function() {
			    jQuery(animal).css('bottom', -32+'px');
			    set_wp_animal_anim(animal, direction, speed, position);
			});
		}
		else
		{
			var anim_duration = document.body.scrollHeight/speed*1000;

			jQuery(animal).css('left', position+'px');
			jQuery(animal).css('top', -32+'px');
			jQuery(animal).animate({
			    top: "+="+(document.body.scrollHeight+64),
			}, anim_duration, "linear", function() {
			    jQuery(animal).css('top', document.body.scrollHeight);
			    set_wp_animal_anim(animal, direction, speed, position);
			});
		}

}

jQuery(document).ready(function(){

	for(var i in parameters)
	{
		jQuery('body').append('<div class="wp_animals" data-sprite="'+parameters[i].sprite+'" data-position="'+parameters[i].position+'" data-direction="'+parameters[i].direction+'" data-speed="'+parameters[i].speed+'"></div>');
	}

	jQuery('.wp_animals').each(function(){

		var sprite = jQuery(this).data('sprite'); 
		console.log(sprite);
		var speed = jQuery(this).data('speed');
		var direction = jQuery(this).data('direction');
		var position = jQuery(this).data('position');

		//ajoupte le sprite et l'animatiopn suivant la direction
		jQuery(this).css('background-image', 'url('+sprite+')');
		jQuery(this).addClass(wp_anim_classes[direction]);

		set_wp_animal_anim(this, direction, speed, position);

	});

});

