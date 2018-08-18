<?php
/**
 * @package FOB
 * @version 1.0
 */
/*
Plugin Name: Fall Out Bot
Plugin URI: http://wordpress.org/plugins/
Description: Lyrics
Author: Alicia
Version: 1.0
Author URI: aliciapressley.com
*/

function fob_get_lyric() {
	/** These are the lyrics to Hello Dolly */
	$lyrics = "I was gonna say something that would solve all our problems
But then I got drunk and I forgot what I was talking about
I forgot what I was talking about
Don't you, don't you, don't you know
There's nothing more cruel than to be loved by everybody
There's nothing more cruel than to be loved by everybody but you
Than to be loved by everybody but you, but you
If I could get my shit together
I'm gonna run away and never see any of you again
Never see any of you again
I hope the roof flies off and we get blown out into space
I always make such expensive mistakes
I know it's just a number but you're the 8th wonder
I'll stop wearing black when they make a darker color
Woke up on the wrong side of p-p-paradise
And when I say I'm sorry I'm late
I wasn't showing up at all
I really mean I didn't plan on showing up at all
Don't you, don't you, don't you know
I hate all my friends, I miss the days when I pretended
I hate all my friends, I miss the days when I pretended with you
I miss the days when I pretended with you, with you
If I can get my shit together
I'm gonna run away and never see any of you again
Never see any of you again
I hope the roof flies off and we get blown out into space
I always make such expensive mistakes
I know it's just a number but you're the 8th wonder
I'll stop wearing black when they make a darker color
If we hadn't done this thing
I think I'd be a medicine man
So I could get high on our own supply whenever I can
I became such a strange shape
Such a strange shape from trying to fit in
I became such a strange shape
I hope the roof flies off and we get blown out into space
I always make such expensive mistakes
I know it's just a number but you're the 8th wonder
I'll stop wearing black when they make a darker color";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function fob_header() {
	$chosen = fob_get_lyric();
	echo "<p id='petewentz'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'fob_header' );

// We need some CSS to position the paragraph
function fob_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#dolly {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'dolly_css' );

?>
