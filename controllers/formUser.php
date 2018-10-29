<?php
include_once path::getModelsPath().'userTypes.php';
include_once path::getModelsPath().'civility.php';
//intanciation de civility
$getCivility = NEW civility();
$showCivility = $getCivility->showCivility();
//intanciation de UserType
$getUserType = NEW userType();
$showType = $getUserType->showType();
