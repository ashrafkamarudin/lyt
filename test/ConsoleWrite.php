<?php

/**
* Simple helper to debug to the console
* 
* @param  object, array, string $data
* @return string
*/
function console_write( $data ) {
		
	$output = '';

	if ( is_array( $data ) ) {
		$str = '';
	    foreach($data as $key=>$item) {
	        $str .= $key.':'.$item.'\n\n';
	    }
	    rtrim($str, ',');
		$output .= "<script>console.warn( 'Debug Objects with Array.' ); console.log( '" . $str . "' );</script>";
	} else if ( is_object( $data ) ) {
		$data    = var_export( $data, TRUE );
		$data    = explode( "\n", $data );

		foreach( $data as $line ) {
			if ( trim( $line ) ) {
				$line    = addslashes( $line );
				$output .= "console.log( '{$line}' );";
			}
		}
			$output = "<script>console.warn( 'Debug Objects with Object.' ); $output</script>";
	} else {
		$output .= "<script>console.log( `Debug Objects: {$data}` );</script>";
	}
		
		echo $output;

}