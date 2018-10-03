
<?php include 'top_page.php' ?>
                <!-- Today -->
                <div>
                    <span class = "title-op">Today</span><span id = "time-now"> <?php   
                        echo $dt->format('D d M');
                        ?></span>
                </div>
                <div>
                    <?php
                     $i = 0;
                     if(isset($depot2)){
                        echo "<form method = 'POST'>";
                            foreach($depot2 as &$value){
                                if($value['stt']==1 &&$date == $value['date']){
                                    $id = $value['id'];
                                    echo "<hr>";
                                    echo "<input class = 'select' type = 'submit' name = 'select$i' value = '' >"."   <span class = 'task'>". $value['task']."</span>";
                                    echo "<hr>";
                                    if(isset($_POST['select'.$i])){
                                        $sqlU = "update $userName set stt = 0 where id = '$id'"; 
                                        mysqli_query($conn, $sqlU);	
                                        header('Location: index.php');    
                                    }
                                    $i++;
                                }