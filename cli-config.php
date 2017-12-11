<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use WebDrinkAPI\Utils\Database;

include 'vendor/autoload.php';

require_once 'utils/Database.php';

// replace with mechanism to retrieve EntityManager in your app
$entityManager = Database::GetEntityManager();

return ConsoleRunner::createHelperSet($entityManager);
