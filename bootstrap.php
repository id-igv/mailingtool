<?php
// autoload.php

require_once "vendor/autoload.php";

use Symfony\Component\Yaml\Yaml;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paramsFile = realpath('%here is ur path%');
$params = [];
$entityManager = null;

try {
	$params = Yaml::parse(file_get_contents($paramsFile));
	
	if (isset($params['parameters'])) {
		$pathsToEntities = array(__DIR__ . "src/Entity");
		$isDevMode = false;

		// the connection configuration
		$dbParams = array(
			'driver'   => 'pdo_mysql',
			'user'     => $params['parameters']['database_user'],
			'password' => $params['parameters']['database_password'],
			'dbname'   => $params['parameters']['database_name'],
			'host'     => $params['parameters']['database_host'],
			'charset'  => 'UTF8',
			'driverOptions' => array(
				1002 => 'SET NAMES utf8'
			)
		);

		$config = Setup::createAnnotationMetadataConfiguration($pathsToEntities, $isDevMode);
		$entityManager = EntityManager::create($dbParams, $config);
	}
	
} catch (ParseException $e) {
	if (isset($logMsg)) {
		$logMsg .= "\n -> "
			. formatted_date() 
			. "Unable to parse {$paramsFile}"
		;
	}
}