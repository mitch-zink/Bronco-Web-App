<?php
require_once("../dbconnect.php");

$projid = filter_input(INPUT_POST, "projid", FILTER_VALIDATE_INT);
$workname = filter_input(INPUT_POST, "workname");
$workdate = filter_input(INPUT_POST, "workdate");
$workdesc = filter_input(INPUT_POST, "workdesc");
$workcomments = filter_input(INPUT_POST, "workcomments");

$addwork = 'INSERT INTO workcompleted
              (projectid, workname, dateperformed, workdesc, workcomments)
            VALUES
              (:projid, :workname, :workdate, :workdesc, :workcomments)';
$stmt1 = $db->prepare($addwork);
$stmt1->bindValue(':projid', $projid);
$stmt1->bindValue(':workname', $workname);
$stmt1->bindValue(':workdate', $workdate);
$stmt1->bindValue(':workdesc', $workdesc);
$stmt1->bindValue(':workcomments', $workcomments);
$stmt1->execute();
$stmt1->closeCursor();

include("workcompleted.php");
?>