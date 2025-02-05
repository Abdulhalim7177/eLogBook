<?php
@include_once("../includes/session.php");
@include_once("../includes/zz.php"); 
@include_once("../includes/functions.php");

$matno = $_SESSION['matno'];

@confirm_logged_in();
    
if($_POST['logbookDesc'] == '')
{
        header("Location:../mylogs.php?error=description");
        exit();
}else{
        if(((($_FILES["logbookAttach"]["type"] == "application/msword") 
                || ($_FILES["logbookAttach"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
                || ($_FILES["logbookAttach"]["type"] == "application/vnd.ms-excel")
                || ($_FILES["logbookAttach"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
                || ($_FILES["logbookAttach"]["type"] == "application/pdf")) 
                && ($_FILES["logbookAttach"]["size"] < 3000000)) 
                || ($_FILES['logbookAttach']['name'] == ''))
        {
                if($_FILES['logbookAttach']['name'] != '')
                {
                @move_uploaded_file($_FILES["logbookAttach"]["tmp_name"],"../attachlogs/".$matno.' '.date('Y_m_d').' '.date('H_i_s').' '.$_FILES["logbookAttach"]["name"]);                
                }

                $logbookMat = $matno;
                $logbookDesc = $_POST['logbookDesc'];
                
                if($_FILES['logbookAttach']['name'] != '')
                {
                $logbookAttach = $matno.' '.date('Y_m_d').' '.date('H_i_s').' '.$_FILES['logbookAttach']['name'];
                }else{
                $logbookAttach = '';       
                }

                $logbookDate = date('Y-m-d');
                $logbookTime = date('Y-m-d H:i:s');

                // Insert the new work done
                $newprogress = @mysqli_query($connection, "INSERT INTO logbook (logbookMat, logbookDesc, logbookAttach, logbookDate, logbookTime, logbookDelete) 
                        VALUES ('$logbookMat', '$logbookDesc', '$logbookAttach', '$logbookDate', '$logbookTime', '0')");
                @confirm_query($newprogress);                

                if($newprogress)
                {
                        $newlogprocess = "SELECT * FROM logbook ORDER BY logbookId DESC LIMIT 1";
                        $thelogprocess = @mysqli_query($connection, $newlogprocess);
                        $logrow = @mysqli_fetch_array($thelogprocess);
                        $logbookId = $logrow['logbookId'];
                        $loggingDesc = @html_entity_decode(strip_tags($logrow['logbookDesc']));

                        $pdflogging = '../pdflogs/'.$logbookMat.' '.$logbookDate.' ('.$logbookId.').pdf';

                        // $pdf->AddPage();
                        // $pdf->SetFont('Arial', '', 12);
                        // $pdf->MultiCell(190, 5, $loggingDesc);
                        // @$pdf->Output($pdflogging, 'F');

                        header("Location:../mylogbook.php");
                        exit();
                }else{
                        //not successful
                        header("Location:../mylogs.php?error=failed");
                        exit();
                }
        }else{
                header("Location:../mylogs.php?error=attachment");
                exit();
        }
}
?>