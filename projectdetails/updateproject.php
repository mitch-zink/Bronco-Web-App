<?php
require_once("../dbconnect.php");

$action = filter_input(INPUT_POST, 'action');
$projid = filter_input(INPUT_POST, 'projid', FILTER_VALIDATE_INT);
$projectname =filter_input(INPUT_POST, 'projectname');
$make =filter_input(INPUT_POST, 'make');
$model = filter_input(INPUT_POST, 'model');
$trim_pkg = filter_input(INPUT_POST, 'trim_pkg');
$projectdesc = filter_input(INPUT_POST, 'projectdesc');
$purchdate = filter_input(INPUT_POST, 'purchdate');
$purchprice = filter_input(INPUT_POST, 'purchprice');
$sellprice = filter_input(INPUT_POST, 'sellprice');
$selldate = filter_input(INPUT_POST, 'selldate');
$projectcomments =filter_input(INPUT_POST, 'projectcomments');

$sql = "UPDATE projects
        SET projectname = :projectname,
            make = :make,
            model = :model,
            trim_pkg = :trimpkg,
            projectdesc = :projectdesc,
            purchdate = :purchdate,
            purchprice = :purchprice,
            selldate = :selldate,
            sellprice = :sellprice,
            projectcomments = :projectcomments
        WHERE projectid = :projectid";
$stmt = $db->prepare($sql);
$stmt->bindValue(':projectname', $projectname);
$stmt->bindValue(':make', $make);
$stmt->bindValue(':model', $model);
$stmt->bindValue(':trimpkg', $trim_pkg);
$stmt->bindValue(':projectdesc', $projectdesc);
$stmt->bindValue(':purchdate', $purchdate);
$stmt->bindValue(':purchprice', $purchprice);
$stmt->bindValue(':selldate', $selldate);
$stmt->bindValue(':sellprice', $sellprice);
$stmt->bindValue(':projectcomments', $projectcomments);
$stmt->bindValue(':projectid', $projid);
$stmt->execute();
$stmt->closeCursor();

include("updateprojectform.php");
?>
