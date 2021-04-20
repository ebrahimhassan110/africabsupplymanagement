<?php
require('assets/config.php');

$sql = "SELECT q.*,e.requestedby,w.category ,e.project,s.nextstep FROM expenses e
                    JOIN queues q ON e.expenseid = q.expenseid AND q.status = 'A'
                    JOIN workplan w ON w.activity = e.activityid AND e.fiscalyear = w.fiscalyear
                    JOIN steps s ON s.stepno = q.qstep
                    WHERE DATEDIFF(NOW() ,q.createdon) >= 3 AND DATE(q.createdon) < DATE(NOW()) AND q.is_notified = '0'
                    ";

$counter = 1;
function sendEmail($email,$fullname,$qno,$connection,$next){
  //$email = "noel@burhaniinfosys.com";
  $headers  = "From: eRMS @ MDH<workflow@mdh-tz.info>\r\n";
  $headers .= "Reply-To: workflow@mdh-tz.info\r\n";
  $headers .= "Return-Path: workflow@mdh-tz.info\r\n";
  $headers .= "X-Mailer: MDH eRMS\n";
  $headers .= 'MIME-Version: 1.0' . "\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $subject = 'Expense Requisition Reminder';
  $message ="<p>Dear $fullname, <br/> <br/>You have request waiting your approval.
        <br/>
      <br/><br/>Kindly login to http://mdh-tz.info/eRMSv2 to check more details.<br/><br/>
      Thank You!<br/>";

      if($GLOBALS['counter'] <= 100){
        if(mail($email, $subject, $message, $headers)){
          $GLOBALS['counter']++;
          $sql = "UPDATE queues SET is_notified = 1 WHERE qno = '$qno'";
          mysqli_query($connection,$sql);
        }
      }
}

$req = mysqli_query($connection,$sql);
while($row = mysqli_fetch_assoc($req)){
    $rowuestedby = $row['rowuestedby'];
    $category = $row['category'];
    $project = $row['project'];
    $qstep = $row['qstep'];
    $qno = $row['qno'];

    if($row['nextstep']==5 || $row['nextstep'] == 55){
      $sql = "SELECT fullname,email from users WHERE userid = '$requestedby'";
      $row2 = mysqli_query($connection,$sql);
      $info = mysqli_fetch_assoc($row2);
      $fullname = $info['fullname'];
      $email = $info['email'];
      if($email){
        sendEmail($email,$fullname,$qno,$connection,$row['nextstep']);
      }

    }elseif($row['nextstep']==2 || $row['nextstep']==52){
      $sql = "SELECT fullname,email
              FROM users WHERE userid =
              (SELECT manager FROM category WHERE code = '$category')";
      $row2 = mysqli_query($connection,$sql);
      $info = mysqli_fetch_assoc($row2);
      $fullname = $info['fullname'];
      $email = $info['email'];
      if($email){
        sendEmail($email,$fullname,$qno,$connection,$row['nextstep']);
      }

    }elseif ($row['nextstep']==3 || $row['nextstep']==53){
      $sql = "SELECT fullname,email
              FROM users WHERE userid =
              (SELECT manager FROM project WHERE code = '$project')";
      $row2 = mysqli_query($connection,$sql);
      $info = mysqli_fetch_assoc($row2);
      $fullname = $info['fullname'];
      $email = $info['email'];
      if($email){
        sendEmail($email,$fullname,$qno,$connection,$row['nextstep']);
      }
    }
    else{
    //  b.nextstep in (select stepno from stepusers where userid='$userid')
      $sql = "SELECT fullname,email
              FROM users WHERE userid IN
              (SELECT userid  FROM stepusers WHERE
                 userid in (select userid from projectusers where project='$project') AND stepno='$qstep' AND ((stepno > 0 and stepno<16) OR (stepno > 50 and stepno<62)))";

      $row2 = mysqli_query($connection,$sql);
      while($info = mysqli_fetch_assoc($row2)){
        $fullname = $info['fullname'];
        $email = $info['email'];
        if($email){
          sendEmail($email,$fullname,$qno,$connection,$row['nextstep']);
        }
      }
    }
}

?>
