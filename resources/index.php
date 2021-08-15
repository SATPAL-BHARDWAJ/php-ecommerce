<?php
    layout( 'header' );
?>

<?php
    if ( isset($uri) ) {
        $url = substr($uri, strpos($uri, BASE_PATH)+strlen(BASE_PATH));
        require_once $Routes[$url];
    }
?>


<?php
    layout( 'footer' );
?>