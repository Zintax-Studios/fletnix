<?php


    $hostname = 'host.docker.internal';

    $dbname = 'FLETNIX_DOCENT';

    $username = 'fletnixwebsite';

    $pw = 'VijfKeerEenVijfPlusEenZeven';

    $dbh = new PDO("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling=0", $username, $pw);

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>