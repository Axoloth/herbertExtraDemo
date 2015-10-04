<?php
/**
 * (c) Axoloth
 * herbertExtrademo
 * 
 * this code is call when th plugin is activate in Wordpress.
 * Here we create the table using the Doctrine SchemaTool
 * and our entities definitions.
 * 
 * Schema will be drop when the plugin will be desactivate in Wordpress: see desactivate.php
 */

use Axoloth\HerbertExtra\Doctrine\Doctrine;
use Doctrine\ORM\Tools\SchemaTool;

$em = Doctrine::getInstance()->getEntityManager();

$tool = new SchemaTool($em);
$classes = array(
		$em->getClassMetadata('HerbertExtraDemo\Models\Entity\Author')
);
$tool->createSchema($classes);
