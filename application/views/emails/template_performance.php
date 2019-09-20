<!DOCTYPE html>
<html>
<body>
<div>
    <p>&nbsp;</p>
    <p> Dear <?php echo ucfirst($userName); ?>, </p>
    <p> Your performance report is as follows: </p>
    <p>&nbsp;</p>
    
<table id="example" class="cell-border" cellspacing="0" width="100%" border="1">
    <thead>
            <tr>
                <th style="width:10%; text-align: center">Sno</th>
                <th style="width:50%; text-align: center">Quiz</th>
                <th style="width:10%; text-align: center">Date</th>
                <th style="width:10%; text-align: center">Score</th>
                <th style="width:10%; text-align: center">Median Score</th>
                <th style="width:10%; text-align: center">Percentile</th>
            </tr>
    </thead>

        <tbody>

        <?php  
        
//        echo "<pre>";
//        print_r($report);
//        exit;
        
        if(count($report)>0) { 
                $i=1;
                foreach($report as $row)
                {
                    ?>

                    <tr>
                            <td style="width:10%; text-align: center"><?php echo $i++;?></td>
                            <td style="width:50%; text-align: center"><?php echo $row['name']; ?></td>
                            <td style="width:10%; text-align: center"><?php echo $row['dateoftest']; ?></td>
                            <td style="width:10%; text-align: center"><?php echo $row['score']; ?> / <?php echo $row['total_questions']; ?></td>
                            <td style="width:10%; text-align: center"><?php echo $row['median']; ?></td>
                            <td style="width:10%; text-align: center"><?php echo $row['percentile']; ?></td>
                    </tr>

            	<?php } 
                
            } else { ?> 
                    <tr><td colspan='4'>No Data Available.</td></tr>
            <?php } ?>        
                                        

            </tbody>
    </table>

    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>Regards,<br>
    <?php echo $this->config->item('site_name') . ' team'; ?></p>  
    </div>

</div>
</body>
</html>