<?php
require(ADODB_PATH. "/adodb-xmlschema03.inc.php" );

$platform = 'mysql';
$schema = new adoSchema( $db );
$schema_file = ROOT_PATH."/install/citeCRM-db_schema.xml";



$xml = $schema->ExtractSchema( $data = true);

$fh = fopen($schema_file, 'w');

fwrite($fh, $xml);
fclose($fh);



?>