<?php
/**
 * (c) Axoloth
 * herbertExtrademo
 *
 * this code is call when th plugin is desactivate in Wordpress.
 * Here we drop the tables create for our plugin.
 * 
 */

use Axoloth\HerbertExtra\Doctrine\Doctrine;
use Doctrine\ORM\Tools\SchemaTool;

$em = Doctrine::getInstance()->getEntityManager();

$tool = new SchemaTool($em);
$classes = array(
		$em->getClassMetadata('HerbertExtraDemo\Models\Entity\Author')
);
$tool->dropSchema($classes);