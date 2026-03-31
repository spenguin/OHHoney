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
            $marketDateArray  = explode( '|', $marketDateString );
            if( $marketDateArray[0] < time() ) continue;
            $o[]    = $marketDateArray;
        }

        return $o;
    }
}