<?php



include 'core/Bootstrap.php';

$app = new Bootstrap();

$moduleManager = new ModuleManager();
$modName = $moduleManager->getModName();
if($modName) {
    $moduleManager->loadModule($modName);
} else {
    echo 'Module not found';
}