<?php

function cesky_mesic($mesic) {
    static $nazvy = array(1 => 'leden', 'Ăşnor', 'bĹ™ezen', 'duben', 'kvÄ›ten', 'ÄŤerven', 'ÄŤervenec', 'srpen', 'zĂˇĹ™Ă­', 'Ĺ™Ă­jen', 'listopad', 'prosinec');
    return $nazvy[$mesic];
}

function cesky_den($den) {
    static $nazvy = array('nedÄ›le', 'pondÄ›lĂ­', 'ĂşterĂ˝', 'stĹ™eda', 'ÄŤtvrtek', 'pĂˇtek', 'sobota');
    return $nazvy[$den];
}

?>