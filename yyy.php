<?php
  <?php

  /*define( "TIMEBEFORE_NOW",         'now' );
   
    define( "TIMEBEFORE_MINUTE",      '{num} minute ago' );
    
    define( "TIMEBEFORE_MINUTES",     '{num} minutes ago' );
    
    define( "TIMEBEFORE_HOUR",        '{num} hour ago' );
    
    define( "TIMEBEFORE_HOURS",       '{num} hours ago' );
    
    define( "TIMEBEFORE_YESTERDAY",   'yesterday' );
    
    define( "TIMEBEFORE_FORMAT",      '%e %b' );
    
    define( "TIMEBEFORE_FORMAT_YEAR", '%e %b, %Y' );

    function time_ago( $time )
    {
        $out    = ''; // what we will print out
        $now    = time(); // current time
        $diff   = $now - $time; // difference between the current and the provided dates

        if( $diff < 60 ) // it happened now
            return TIMEBEFORE_NOW;

        elseif( $diff < 3600 ) // it happened X minutes ago
            return str_replace( '{num}', ( $out = round( $diff / 60 ) ), $out == 1 ? TIMEBEFORE_MINUTE : TIMEBEFORE_MINUTES );

        elseif( $diff < 3600 * 24 ) // it happened X hours ago
            return str_replace( '{num}', ( $out = round( $diff / 3600 ) ), $out == 1 ? TIMEBEFORE_HOUR : TIMEBEFORE_HOURS );

        elseif( $diff < 3600 * 24 * 2 ) // it happened yesterday
            return TIMEBEFORE_YESTERDAY;

        else // falling back on a usual date format as it happened later than yesterday
            return strftime( date( 'Y', $time ) == date( 'Y' ) ? TIMEBEFORE_FORMAT : TIMEBEFORE_FORMAT_YEAR, $time );
    }


  <?=time_ago( 1447571705 )?>
  
  Published <time 
    datetime="<?=date( 'Y-m-d', $time )?>" 
    title="<?=strftime( date( 'Y', $time ) == 
        date( 'Y' ) ? TIMEBEFORE_FORMAT : TIMEBEFORE_FORMAT_YEAR, $time )?>">
    <?=time_ago( $time )?>
    </time>
    
  */
  
  
  
/*

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

echo time_elapsed_string('2013-05-01 00:22:35');
echo time_elapsed_string('@1367367755'); # timestamp input
echo time_elapsed_string('2013-05-01 00:22:35', true);
*/