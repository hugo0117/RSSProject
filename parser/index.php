<?php

require_once(__DIR__.'/../config/config.php');

require_once(__DIR__ . '/AutoloadParser.php');
AutoloadParser::charger();


ModelNews::delAllNews();

$flux=ModelFlux::getFlux();

foreach ($flux as $toParse) {
    $parser = new XmlParser($toParse->getUrl());
    $parser->parse();
}
?>

<script>
    window.location= '../index.php?action=flux';
</script>
