<?php
/**
 * Market functions
 */

class marketFns
{
    static function getMarketDateAndTime($postId)
    {
        $marketString   = get_post_meta( $postId, 'market_date_time', TRUE );
        if( empty( $marketString ) ) return '';

        $marketArray    = explode( "\n", $marketString );
        $o              = [];
        foreach( $marketArray as $marketDateString )
        {
            $marketDateArray    = explode( '|', $marketDateString );
            $marketDateEnd      = date( 'F j, Y,', $marketDateArray[0] ) . ' ' . date( 'g:i a', strtotime($marketDateArray[2]) ); 
            if( strtotime( $marketDateEnd ) < strtotime('- 1 day') ) continue;
            $o[]    = $marketDateArray;
        }

        return $o;
    }
}