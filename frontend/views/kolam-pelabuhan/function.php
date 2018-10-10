<?php
// declare your function here
function findName($array, $keySearch)
{
	foreach ($array as $key => $item) {
        if ($item['id_kapal'] == $keySearch) {
			return true;
		}
    }
    return false;
}

function getId($array, $keySearch)
{
	foreach ($array as $key => $item) {
        if ($item['id_kapal'] == $keySearch) {
            return $key;
        }
    }
    return null;
}
//findName($dataProviderKapal->models,'BARUNA JAYA');
//var_dump (getId($dataProviderKapal->models,'LANGSUNG JAYA SEJAHTERA'));
//var_dump ($dataProviderKapal->models[getId($dataProviderKapal->models,'LANGSUNG JAYA SEJAHTERA')]['id']);
?>