<?php
require_once("../dbconnect.php");

$projid = filter_input(INPUT_POST, "projid", FILTER_VALIDATE_INT);
$workid = filter_input(INPUT_POST, "workid", FILTER_VALIDATE_INT);
$workname = filter_input(INPUT_POST, "workname");
$workdate = filter_input(INPUT_POST, "workdate");
$workdesc = filter_input(INPUT_POST, "workdesc");
$workcomments = filter_input(INPUT_POST, "workcomments");

$update = "UPDATE workcompleted
           SET workname = :workname,
               dateperformed = :workdate,
               workdesc = :workdesc,
               workcomments = :workcomments
           WHERE workid = :workid";
$stmt = $db->prepare($update);
$stmt->bindValue(":workname", $workname);
$stmt->bindValue(":workdate", $workdate);
$stmt->bindValue(":workdesc", $workdesc);
$stmt->bindValue(":workcomments", $workcomments);
$stmt->bindValue(":workid", $workid);
$stmt->execute();
$stmt->closeCursor();

include("workcompleted.php");