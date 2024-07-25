<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha384-eSLCc7eUqEMsEJpHRqurqJFszhpozZCgFEGrG8RmCGUxn25m45tHt9Zbg27iFNQ3" crossorigin="anonymous"></script> -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    
</head>
<body>
<?php

include('../includes/db.php');




if(isset($_GET['inputArray']) and isset($_GET['short']) and isset($_GET['long'])) {
    // Decode the JSON string to an array
    $short_que = $_GET['short'];
    $long = $_GET['long'];
    $lng = $long/2;
  
    $inputNames = json_decode($_GET['inputArray'], true);

    $typeexam = $_GET['exam'];


    // Output the array values
    // echo "Input Values: ";
    // echo $short;
    // echo $long;
    // print_r($inputNames);
}



 
?>
<?php 


if(isset($_GET['subj_id'])){
    $subj_id = $_GET['subj_id'];
}


  
//   $get_short_que = "SELECT que_desc FROM questions WHERE sub_id=$subj_id and que_marks=$short_que ORDER BY RAND() LIMIT 5";
//   $ques_exe = mysqli_query($con,$get_short_que);
  
//   $questionsArray = array();

// while ($row = mysqli_fetch_assoc($ques_exe)) {
//     // Add each question to the array
//     $questionsArray[] = $row['que_desc'];
// }



// $get_long_que = "SELECT que_desc FROM questions WHERE sub_id=$subj_id and que_marks!=$short_que ORDER BY RAND() LIMIT 16";

// $long_que = mysqli_query($con,$get_long_que);

// $long_questions = array();
// while ($long = mysqli_fetch_assoc($long_que)) {
//     // Add each question to the array
//     $long_questions[] = $long['que_desc'];
// }



  
?>

<?php 
   
      
        $pushque = array();

        if($typeexam==1)
        {
            
            
            $short_q1 = "SELECT exaque_count ,que_desc FROM questions WHERE sub_id=$subj_id and que_marks=2 and unit_no=1 and que_mode!=4  ORDER BY RAND() LIMIT 1";
            $shortq1_exe = mysqli_query($con,$short_q1);
            $short1 = mysqli_fetch_assoc($shortq1_exe);
            $ques1 = $short1['que_desc'];
            array_push($pushque, $ques1);
            $ques1_id = $short1['exaque_count'];

            $short_q2 = "SELECT que_desc,exaque_count FROM questions WHERE sub_id=$subj_id and que_marks=2 and unit_no=2 and que_mode!=4 ORDER BY RAND() LIMIT 1";
            $shortq2_exe = mysqli_query($con,$short_q2);
            $short2 = mysqli_fetch_assoc($shortq2_exe);
            $ques2 = $short2['que_desc'];
            array_push($pushque, $ques2);
            $ques2_id = $short2['exaque_count'];

            $short_q3 = "SELECT que_desc FROM questions WHERE sub_id=$subj_id and que_marks=2 and (unit_no=1 or unit_no=2) and que_mode!=4 and exaque_count!= $ques1_id and exaque_count!= $ques2_id   ORDER BY RAND() LIMIT 1";
            $shortq3_exe = mysqli_query($con,$short_q3);
            $short3 = mysqli_fetch_assoc($shortq3_exe);
            $ques3 = $short3['que_desc'];
            array_push($pushque, $ques3);

            $short_q4 = "SELECT que_desc FROM questions WHERE sub_id=$subj_id and que_mode=4 and  unit_no=1  ORDER BY RAND() LIMIT 1";
            $shortq4_exe = mysqli_query($con,$short_q4);
            $short4 = mysqli_fetch_assoc($shortq4_exe);
            $ques4 = $short4['que_desc'];
            array_push($pushque, $ques4);

            $short_q5 = "SELECT que_desc FROM questions WHERE sub_id=$subj_id and que_mode=4 and  unit_no=2  ORDER BY RAND() LIMIT 1";
            $shortq5_exe = mysqli_query($con,$short_q5);
            $short5 = mysqli_fetch_assoc($shortq5_exe);
            $ques5 = $short5['que_desc'];
            array_push($pushque, $ques5);

            $count1 = 0;
            $count2 = 0;

            for ($i = 0; $i < count($inputNames); $i++) {
                $count = ($inputNames[$i] == 1) ? 2 : 1;

                if ($i < 3) {
                    $count1 += $count;
                } else {
                    $count2 += $count;
                }
            }
             

            $unit1_ques = "SELECT que_desc FROM questions where sub_id=$subj_id and que_marks!=2 and que_mode!=4 and unit_no=1
            ORDER BY RAND() LIMIT $count1  ";
            $long_q1_exe = mysqli_query($con,$unit1_ques);
            while ($row = mysqli_fetch_assoc($long_q1_exe)) {
                // Extract the question description and push it to the array
                $pushque[] = $row['que_desc'];
            }


            $unit2_ques = "SELECT que_desc FROM questions where sub_id=$subj_id and que_marks!=2 and que_mode!=4 and unit_no=2
            ORDER BY RAND() LIMIT $count2  ";
            $long_q2_exe = mysqli_query($con,$unit2_ques);
            while ($row2 = mysqli_fetch_assoc($long_q2_exe)) {
                // Extract the question description and push it to the array
                $pushque[] = $row2['que_desc'];
            }        

        }
        else if($typeexam==2)
        {
            $short_q1 = "SELECT exaque_count ,que_desc FROM questions WHERE sub_id=$subj_id and que_marks=2 and unit_no=3 and que_mode!=4  ORDER BY RAND() LIMIT 1";
            $shortq1_exe = mysqli_query($con,$short_q1);
            $short1 = mysqli_fetch_assoc($shortq1_exe);
            $ques1 = $short1['que_desc'];
            array_push($pushque, $ques1);
            $ques1_id = $short1['exaque_count'];

            $short_q2 = "SELECT que_desc,exaque_count FROM questions WHERE sub_id=$subj_id and que_marks=2 and unit_no=4 and que_mode!=4 ORDER BY RAND() LIMIT 1";
            $shortq2_exe = mysqli_query($con,$short_q2);
            $short2 = mysqli_fetch_assoc($shortq2_exe);
            $ques2 = $short2['que_desc'];
            array_push($pushque, $ques2);
            $ques2_id = $short2['exaque_count'];

            $short_q3 = "SELECT que_desc FROM questions WHERE sub_id=$subj_id and que_marks=2 and (unit_no=3 or unit_no=4) and que_mode!=4 and exaque_count!= $ques1_id and exaque_count!= $ques2_id   ORDER BY RAND() LIMIT 1";
            $shortq3_exe = mysqli_query($con,$short_q3);
            $short3 = mysqli_fetch_assoc($shortq3_exe);
            $ques3 = $short3['que_desc'];
            array_push($pushque, $ques3);

            $short_q4 = "SELECT que_desc FROM questions WHERE sub_id=$subj_id and que_mode=4 and  unit_no=3  ORDER BY RAND() LIMIT 1";
            $shortq4_exe = mysqli_query($con,$short_q4);
            $short4 = mysqli_fetch_assoc($shortq4_exe);
            $ques4 = $short4['que_desc'];
            array_push($pushque, $ques4);

            $short_q5 = "SELECT que_desc FROM questions WHERE sub_id=$subj_id and que_mode=4 and  unit_no=4  ORDER BY RAND() LIMIT 1";
            $shortq5_exe = mysqli_query($con,$short_q5);
            $short5 = mysqli_fetch_assoc($shortq5_exe);
            $ques5 = $short5['que_desc'];
            array_push($pushque, $ques5);



            $count3 = 0;
            $count4 = 0;

            for ($i = 0; $i < count($inputNames); $i++) {
                $count = ($inputNames[$i] == 1) ? 2 : 1;

                if ($i < 3) {
                    $count3 += $count;
                } else {
                    $count4 += $count;
                }
            }
             

            $unit3_ques = "SELECT que_desc FROM questions where sub_id=$subj_id and que_marks!=2 and que_mode!=4 and unit_no=3
            ORDER BY RAND() LIMIT $count3  ";
            $long_q3_exe = mysqli_query($con,$unit3_ques);
            while ($row3 = mysqli_fetch_assoc($long_q3_exe)) {
                // Extract the question description and push it to the array
                $pushque[] = $row3['que_desc'];
            }


            $unit4_ques = "SELECT que_desc FROM questions where sub_id=$subj_id and que_marks!=2 and que_mode!=4 and unit_no=4
            ORDER BY RAND() LIMIT $count4  ";
            $long_q4_exe = mysqli_query($con,$unit4_ques);
            while ($row4 = mysqli_fetch_assoc($long_q4_exe)) {
                // Extract the question description and push it to the array
                $pushque[] = $row4['que_desc'];
            } 
                
        }
        else{
            $short_q1 = "SELECT exaque_count ,que_desc FROM questions WHERE sub_id=$subj_id and que_marks=2 and unit_no=1 and que_mode!=4  ORDER BY RAND() LIMIT 1";
            $shortq1_exe = mysqli_query($con,$short_q1);
            $short1 = mysqli_fetch_assoc($shortq1_exe);
            $ques1 = $short1['que_desc'];
            array_push($pushque, $ques1);
            $ques1_id = $short1['exaque_count'];

            $short_q2 = "SELECT que_desc,exaque_count FROM questions WHERE sub_id=$subj_id and que_marks=2 and unit_no=2 and que_mode!=4 ORDER BY RAND() LIMIT 1";
            $shortq2_exe = mysqli_query($con,$short_q2);
            $short2 = mysqli_fetch_assoc($shortq2_exe);
            $ques2 = $short2['que_desc'];
            array_push($pushque, $ques2);
            $ques2_id = $short2['exaque_count'];

            $short_q3 = "SELECT que_desc,exaque_count FROM questions WHERE sub_id=$subj_id and que_marks=2 and unit_no=3 and que_mode!=4 ORDER BY RAND() LIMIT 1";
            $shortq3_exe = mysqli_query($con,$short_q3);
            $short3 = mysqli_fetch_assoc($shortq3_exe);
            $ques3 = $short3['que_desc'];
            array_push($pushque, $ques3);
            $ques3_id = $short3['exaque_count'];

            $short_q4 = "SELECT que_desc,exaque_count FROM questions WHERE sub_id=$subj_id and que_marks=2 and unit_no=4 and que_mode!=4 ORDER BY RAND() LIMIT 1";
            $shortq4_exe = mysqli_query($con,$short_q4);
            $short4 = mysqli_fetch_assoc($shortq4_exe);
            $ques4 = $short4['que_desc'];
            array_push($pushque, $ques4);
            $ques4_id = $short4['exaque_count'];

            $short_q5 = "SELECT que_desc,exaque_count FROM questions WHERE sub_id=$subj_id and que_marks=2 and (unit_no=1 or unit_no=2 ) and que_mode!=4 and exaque_count!= $ques1_id and exaque_count!= $ques2_id   ORDER BY RAND() LIMIT 1";
            $shortq5_exe = mysqli_query($con,$short_q5);
            $short5 = mysqli_fetch_assoc($shortq5_exe);
            $ques5 = $short5['que_desc'];
            
            $ques5_id = $short5['exaque_count'];
            array_push($pushque, $ques5);
            

            $short_q6 = "SELECT que_desc,exaque_count FROM questions WHERE sub_id=$subj_id and que_marks=2 and ( unit_no=2  or unit_no=3) and que_mode!=4 and exaque_count!= $ques1_id and exaque_count!= $ques2_id and exaque_count!= $ques3_id and exaque_count!= $ques4_id and exaque_count!= $ques5_id  ORDER BY RAND() LIMIT 1";
            $shortq6_exe = mysqli_query($con,$short_q6);
            $short6 = mysqli_fetch_assoc($shortq6_exe);
            $ques6 = $short6['que_desc'];
            $ques6_id = $short6['exaque_count'];
            array_push($pushque, $ques6);

            $short_q7 = "SELECT que_desc,exaque_count FROM questions WHERE sub_id=$subj_id and que_marks=2 and ( unit_no=3  or unit_no=4) and que_mode!=4 and exaque_count!= $ques1_id and exaque_count!= $ques2_id and exaque_count!= $ques3_id and exaque_count!= $ques4_id and exaque_count!= $ques5_id and exaque_count!= $ques6_id   ORDER BY RAND() LIMIT 1";
            $shortq7_exe = mysqli_query($con,$short_q7);
            $short7 = mysqli_fetch_assoc($shortq7_exe);
            $ques7 = $short7['que_desc'];
            array_push($pushque, $ques7);

            // $short_q6 = "SELECT que_desc FROM questions WHERE sub_id=$subj_id and que_mode=4 and  (unit_no=1 or unit_no=2)  ORDER BY RAND() LIMIT 1";
            // $shortq6_exe = mysqli_query($con,$short_q6);
            // $short6 = mysqli_fetch_assoc($shortq6_exe);
            // $ques6 = $short6['que_desc'];
            // array_push($pushque, $ques6);

            // $short_q7 = "SELECT que_desc FROM questions WHERE sub_id=$subj_id and que_mode=4 and  (unit_no=3 or unit_no=4)  ORDER BY RAND() LIMIT 1";
            // $shortq7_exe = mysqli_query($con,$short_q7);
            // $short7 = mysqli_fetch_assoc($shortq7_exe);
            // $ques7 = $short7['que_desc'];
            // array_push($pushque, $ques7);


            $count1 = 0;
            $count2 = 0;
            $count3 = 0;
            $count4 = 0;

            for ($i = 0; $i < count($inputNames); $i++) {
                $count = ($inputNames[$i] == 1) ? 2 : 1;

                if ($i < 2) {
                    $count1 += $count;
                } elseif ($i < 4) {
                    $count2 += $count;
                } elseif ($i < 6) {
                    $count3 += $count;
                } else {
                    $count4 += $count;
                }
            }
            $subcount1 = $count1/2;
            $unit1_ques = "SELECT que_desc FROM questions where sub_id=$subj_id and que_marks=6 and que_mode!=4 and unit_no=1
            ORDER BY RAND() LIMIT $subcount1  ";
            $unit1_ques_8 = "SELECT que_desc FROM questions where sub_id=$subj_id and que_marks=8 and que_mode!=4 and unit_no=1
            ORDER BY RAND() LIMIT $subcount1  ";
            $long_q1_exe = mysqli_query($con,$unit1_ques);
            $long_q1_exe_8 = mysqli_query($con,$unit1_ques_8);

            

            
            while (($row1 = mysqli_fetch_assoc($long_q1_exe)) && ($row2 = mysqli_fetch_assoc($long_q1_exe_8))) {
                
                $pushque[] = $row1['que_desc'];

                $pushque[] = $row2['que_desc'];

                
                


            }
            

            $subcount2 = $count2/2;
            $unit2_ques = "SELECT que_desc FROM questions where sub_id=$subj_id and que_marks=6 and que_mode!=4 and unit_no=2
            ORDER BY RAND() LIMIT $subcount2  ";
            $unit2_ques_8 = "SELECT que_desc FROM questions where sub_id=$subj_id and que_marks=8 and que_mode!=4 and unit_no=2
            ORDER BY RAND() LIMIT $subcount2  ";
            $long_q2_exe = mysqli_query($con,$unit2_ques);
            $long_q2_exe_8 = mysqli_query($con,$unit2_ques_8);

            $count111 = mysqli_num_rows($long_q2_exe);
            $count222 =mysqli_num_rows($long_q2_exe_8);

            
            while (($row3 = mysqli_fetch_assoc($long_q2_exe)) && ($row4 = mysqli_fetch_assoc($long_q2_exe_8))) {
                
                $pushque[] = $row3['que_desc'];
                $pushque[] = $row4['que_desc'];

                


            }

            $subcount3 = $count3/2;
            $unit3_ques = "SELECT que_desc FROM questions where sub_id=$subj_id and que_marks=6 and que_mode!=4 and unit_no=3
            ORDER BY RAND() LIMIT $subcount3  ";
            $unit3_ques_8 = "SELECT que_desc FROM questions where sub_id=$subj_id and que_marks=8 and que_mode!=4 and unit_no=3
            ORDER BY RAND() LIMIT $subcount3  ";
            $long_q3_exe = mysqli_query($con,$unit3_ques);
            $long_q3_exe_8 = mysqli_query($con,$unit3_ques_8);
            while (($row5 = mysqli_fetch_assoc($long_q3_exe)) && ($row6 = mysqli_fetch_assoc($long_q3_exe_8))) {
                
                $pushque[] = $row5['que_desc'];
                $pushque[] = $row6['que_desc'];


            }

            $subcount4 = $count4/2;
            $unit4_ques = "SELECT que_desc FROM questions where sub_id=$subj_id and que_marks=6 and que_mode!=4 and unit_no=4
            ORDER BY RAND() LIMIT $subcount4  ";
            $unit4_ques_8 = "SELECT que_desc FROM questions where sub_id=$subj_id and que_marks=8 and que_mode!=4 and unit_no=4
            ORDER BY RAND() LIMIT $subcount4  ";
            $long_q4_exe = mysqli_query($con,$unit4_ques);
            $long_q4_exe_8 = mysqli_query($con,$unit4_ques_8);
            while (($row7 = mysqli_fetch_assoc($long_q4_exe)) && ($row8 = mysqli_fetch_assoc($long_q4_exe_8))) {
                
                $pushque[] = $row7['que_desc'];
                $pushque[] = $row8['que_desc'];


            }

            
            // while ($row = mysqli_fetch_assoc($long_q1_exe_8)) {
            //     // Extract the question description and push it to the array
            //     $pushque[] = $row['que_desc'];
            // }


            // $unit2_ques = "SELECT que_desc FROM questions where sub_id=$subj_id and que_marks=6 and que_mode!=4 and unit_no=2
            // ORDER BY RAND() LIMIT $count2  ";
            // $unit2_ques_8 = "SELECT que_desc FROM questions where sub_id=$subj_id and que_marks=8 and que_mode!=4 and unit_no=2
            // ORDER BY RAND() LIMIT $count2  ";
            // $long_q2_exe = mysqli_query($con,$unit2_ques);
            // while ($row2 = mysqli_fetch_assoc($long_q2_exe)) {
            //     // Extract the question description and push it to the array
            //     $pushque[] = $row2['que_desc'];
            // }  

            // $unit3_ques = "SELECT que_desc FROM questions where sub_id=$subj_id and que_marks!=2 and que_mode!=4 and unit_no=3
            // ORDER BY RAND() LIMIT $count3  ";
            // $long_q3_exe = mysqli_query($con,$unit3_ques);
            // while ($row3 = mysqli_fetch_assoc($long_q3_exe)) {
            //     // Extract the question description and push it to the array
            //     $pushque[] = $row3['que_desc'];
            // }


            // $unit4_ques = "SELECT que_desc FROM questions where sub_id=$subj_id and que_marks!=2 and que_mode!=4 and unit_no=4
            // ORDER BY RAND() LIMIT $count4  ";
            // $long_q4_exe = mysqli_query($con,$unit4_ques);
            // while ($row4 = mysqli_fetch_assoc($long_q4_exe)) {
            //     // Extract the question description and push it to the array
            //     $pushque[] = $row4['que_desc'];
            // } 

           

        }
        // echo $typeexam;
    
    
    
    ?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Paper</title>
    
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .a4-content {
            width: 21cm;
            min-height: 29.7cm;
            /* height: 34.5cm; */
            margin: 1cm auto;
            border: 1px solid #ccc;
            overflow: hidden;
            padding: 20px;
            display: flex;
            flex-direction: column;
            
        }
        #content {
            display: none;
        }

        #loading{
            width:100%;
            height:100vh;
            display: flex;
            align-items:center ;
            justify-content: center;
            font-size: 32px;
        }

        #loading img{
            width: 400px;
            height: 400px;
            filter: contrast(130%);
        }
        .head1{
            width: 100%;
            font-size: 17px;
            display: flex;
            align-items: center;
            justify-content: center;
            
        }
        
    </style>
</head>
<body>
    

<!-- <div id="output"></div> -->


    <div id="content" class="a4-content">
        <img src="paperlogo.png" alt="" style="width:19cm; height:2cm; margin-top:10px;margin-bottom:10px; margin-left:30px;">
        <div class="paper-heading" style="width:100%; display: flex; align-items: center; justify-content: center; margin-top: 13px; margin-bottom: 15px;"><strong>SEMESTER END REGULAR EXAMINATIONS (AR23), Month-Year</strong></div>
        <div align="center" style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <table style="border-collapse:collapse;border:none;">
                <tbody>
                    <tr>
                        <td colspan="2" style="width:122.2pt;border:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:17.9pt;">
                            <p  style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Cambria",serif;' id="input1"></span></p>
                        </td>
                        <td colspan="4" style="width:167.85pt;border:solid black 1.0pt;border-left:none;padding:0cm 5.4pt 0cm 5.4pt;height:17.9pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span id="input2" style='font-family:"Cambria",serif;'></span></strong></p>
                        </td>
                        <td colspan="2" style="width:64.55pt;border:solid black 1.0pt;border-left:none;padding:0cm 5.4pt 0cm 5.4pt;height:17.9pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span id="input3" style='font-family:"Cambria",serif;'></span></p>
                        </td>
                        <td colspan="4" style="width:156.2pt;border:solid black 1.0pt;border-left:none;padding:0cm 5.4pt 0cm 5.4pt;height:17.9pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span id="input4" style='font-family:"Cambria",serif;'></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="width:122.2pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:17.9pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span id="input5" style='font-family:"Cambria",serif;'></span></p>
                        </td>
                        <td colspan="4" style="width:167.85pt;border-top:none;border-left:  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:17.9pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span id="input6" style='font-family:"Cambria",serif;'></span></p>
                        </td>
                        <td colspan="2" style="width:64.55pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:17.9pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span id="input7" style='font-family:"Cambria",serif;'></span></p>
                        </td>
                        <td colspan="4" style="width:156.2pt;border-top:none;border-left:  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:17.9pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span id="input8" style='font-family:"Cambria",serif;'></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" rowspan="2" style="width:122.2pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span id="input9" style='font-family:"Cambria",serif;'></span></p>
                        </td>
                        <td colspan="2" rowspan="2" style="width:111.1pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span id="input10" style='font-family:"Cambria",serif;'></span></strong></p>
                        </td>
                        <td colspan="8" style="width:277.5pt;border-top:none;border-left:  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span id="input11" style='font-family:"Cambria",serif;'></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="8" style="width:277.5pt;border-top:none;border-left:  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span id="input12" style='font-family:"Cambria",serif;'></span></strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="width:122.2pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span id="input13" style='font-family:"Cambria",serif;'></span></p>
                        </td>
                        <td colspan="2" style="width:111.1pt;border-top:none;border-left:  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span id="input14" style='font-family:"Cambria",serif;'></span></p>
                        </td>
                        <td colspan="5" style="width:143.95pt;border-top:none;border-left:  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span id="input15" style='font-family:"Cambria",serif;'></span></p>
                        </td>
                        <td colspan="3" style="width:133.55pt;border-top:none;border-left:  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span id="input16" style='font-family:"Cambria",serif;'></span></p>
                        </td>
                    </tr>
                    <!-- <tr>
                        <td style="width:86.75pt;border:solid black 1.0pt;border-top:none;padding:  0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span id="input17" style='font-family:"Cambria",serif;'></span></p>
                        </td>
                        <td style="width:35.45pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span id="input18" style='font-family:"Cambria",serif;'></span></p>
                        </td>
                        <td style="width:86.35pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span id="input19" style='font-family:"Cambria",serif;'></span></p>
                        </td>
                        <td colspan="2" style="width:54.2pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span id="input20" style='font-family:"Cambria",serif;'></span></p>
                        </td>
                        <td colspan="2" style="width:73.9pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span id="input21" style='font-family:"Cambria",serif;'></span></p>
                        </td>
                        <td colspan="3" style="width:55.95pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span id="input22" style='font-family:"Cambria",serif;'></span></p>
                        </td>
                        <td style="width:74.5pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span id="input23" style='font-family:"Cambria",serif;'></span></p>
                        </td>
                        <td style="width:43.7pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span id="input24" style='font-family:"Cambria",serif;'></span></p>
                        </td>
                    </tr> -->
                    <tr>
                        <td style="border:none;"><br></td>
                        <td style="border:none;"><br></td>
                        <td style="border:none;"><br></td>
                        <td style="border:none;"><br></td>
                        <td style="border:none;"><br></td>
                        <td style="border:none;"><br></td>
                        <td style="border:none;"><br></td>
                        <td style="border:none;"><br></td>
                        <td style="border:none;"><br></td>
                        <td style="border:none;"><br></td>
                        <td style="border:none;"><br></td>
                        <td style="border:none;"><br></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-family:"Cambria",serif;'>&nbsp;</span></strong></p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-family:"Cambria",serif;'>SECTION-I&nbsp;</span></strong></p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'><?php echo $short_que?> x 2 = <?php echo $short_que*2;?> Marks</span></p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>&nbsp;</span></p>
<table style="width:514.9pt;margin-left:31.5pt;border-collapse:collapse;border:none;">
    <tbody>
        <tr>
            <td style="width:34.45pt;border:solid black 1.0pt;padding:  0cm 5.4pt 0cm 5.4pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>No.1</span></p>
            </td>
            <td style="width: 369.35pt;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;padding: 0cm 5.4pt;vertical-align: top;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Cambria",serif;'>Questions (a to f)</span></p>
            </td>
            <!-- <td style="width:71.2pt;border:solid black 1.0pt;border-left:none;padding:  0cm 5.4pt 0cm 5.4pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>RBT Level</span></p>
            </td> -->
            <td style="width:39.9pt;border:solid black 1.0pt;border-left:none;padding:  0cm 5.4pt 0cm 5.4pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>COs</span></p>
            </td>
        </tr>
  
        <?php 
        
        $j=0;
        $coarray = ['1','1','3','3','4','4','6'];
        $longcoarray =['1','2','1','2','3','2','3','2','4','5','4','5','6','5','6','5'];
for ($i = 1; $i <= $short_que; $i++) {
    $char = chr(96 + $i);
    
    echo "<tr>
    <td style='width:34.45pt;border:solid black 1.0pt;border-top:none;padding:  0cm 5.4pt 0cm 5.4pt;'>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:sans-serif;text-align:center;'><span style='font-family:serif;'>{$char}</span></p>
    </td>
    <td style='width: 369.35pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;vertical-align: top;'>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:sans-serif;text-align:justify;'><span style='font-family:serif;'>{$pushque[$j]} </span></p>
    </td>
    
    <td style='width:39.9pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;'>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:sans-serif;text-align:center;'><span style='font-family:serif;'>$coarray[$j]</span></p>
    </td>
</tr>";
 $j++;
   
}
        
        
        
        ?>
        
    </tbody>
</table>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-family:"Cambria",serif;'>&nbsp;</span></strong></p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-family:"Cambria",serif;'>SECTION-II&nbsp;</span></strong></p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'><?php echo count($inputNames)?> x 14 = <?php echo count($inputNames)/2*14;?> Marks</span></p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>&nbsp;</span></p>
<table style="width:514.9pt;margin-left:31.5pt;border-collapse:collapse;border:none;">
    <tbody>
        <tr>
            <td colspan="2" style="width:28.45pt;border:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>No.</span></p>
            </td>
            <td colspan="3" style="width:328.7pt;border:solid black 1.0pt;border-left:none;padding:0cm 5.4pt 0cm 5.4pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Cambria",serif;'>Questions (2 to 9)</span></p>
            </td>
            <!-- <td style="width:71.2pt;border:solid black 1.0pt;border-left:none;padding:  0cm 5.4pt 0cm 5.4pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>RBT Level</span></p>
            </td> -->
            <td style="width:42.35pt;border:solid black 1.0pt;border-left:none;padding:  0cm 5.4pt 0cm 5.4pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>COs</span></p>
            </td>
            <td style="width:44.2pt;border:solid black 1.0pt;border-left:none;padding:  0cm 5.4pt 0cm 5.4pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>Marks</span></p>
            </td>
        </tr>
<?php 

$count=2;
$lq =5;
$lqco =0;
if($typeexam==3){
    $lq =7;
    $lqco =0;
}
for ($j = 0; $j < count($inputNames) / 2; $j++) {
    // Get the two values for each iteration
    $value1 = $inputNames[$j * 2];
    $value2 = $inputNames[$j * 2 + 1];
    
    // Check if the values are 0 or 1 and echo the corresponding div
    if ($value1 == 0) {
        echo "<tr>
        <td colspan='2' rowspan='1' style='width:28.45pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;'><span style='font-size:15px;font-family:Cambria,serif;'><br>&nbsp;</span>&nbsp;<p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:Calibri,sans-serif;text-align:center;'><span style='font-family:Cambria,serif;'>{$count}</span></p>
        </td>
        <td colspan='2' style='width:27.5pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;'>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:Calibri,sans-serif;text-align:center;'><span style='font-family:Cambria,serif;'></span></p>
        </td>
        <td style='width: 301.2pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 5.6pt;vertical-align: top;'>
            <p style='margin-top:0.3cm;margin-right:0cm;margin-bottom:0.3cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:Calibri,sans-serif;text-align:justify;'><span style='font-family:Cambria,serif;'>  {$pushque[$lq]} </span></p>
        </td>
        
        <td style='width:42.35pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;'>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:Calibri,sans-serif;text-align:center;'><span style='font-family:Cambria,serif;'>{$longcoarray[$lqco]}</span></p>
        </td>
        <td style='width:44.2pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;'>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:Calibri,sans-serif;text-align:center;'><span style='font-family:Cambria,serif;'>14</span></p>
        </td>
    </tr>
    <tr>
            <td colspan='8' style='width:514.9pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;'>
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:Calibri,sans-serif;text-align:center;'><strong><span style='font-family:Cambria,serif;'>OR</span></strong></p>
            </td>
        </tr>
    ";
    $lq+=1;
    $lqco+=1;
    } else {
        echo "<tr>
        <td colspan='2' rowspan='2' style='width:28.45pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;'><span style='font-size:15px;font-family:Cambria,serif;'><br>&nbsp;</span>&nbsp;<p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:Calibri,sans-serif;text-align:center;'><span style='font-family:Cambria,serif;'>{$count}</span></p>
        </td>
        <td colspan='2' style='width:27.5pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;'>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:Calibri,sans-serif;text-align:center;'><span style='font-family:Cambria,serif;'>(a)</span></p>
        </td>
        <td style='width: 301.2pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 5.6pt;vertical-align: top;'>
            <p style='margin-top:0.2cm;margin-right:0cm;margin-bottom:0.2cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:Calibri,sans-serif;text-align:justify;'><span style='font-family:Cambria,serif;'> {$pushque[$lq]} </span></p>
        </td>
       
        <td style='width:42.35pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;'>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:Calibri,sans-serif;text-align:center;'><span style='font-family:Cambria,serif;'>{$longcoarray[$lqco]}</span></p>
        </td>
        <td style='width:44.2pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;'>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:Calibri,sans-serif;text-align:center;'><span style='font-family:Cambria,serif;'>6</span></p>
        </td>
    </tr>
    <tr>
        <td colspan='2' style='width:27.5pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;'>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:Calibri,sans-serif;text-align:center;'><span style='font-family:Cambria,serif;'>(b)</span></p>
        </td>
        <td style='width: 301.2pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 5.6pt;vertical-align: top;'>
            <p style='margin-top:0.2cm;margin-right:0cm;margin-bottom:0.2cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:Calibri,sans-serif;text-align:justify;'><span style='font-family:Cambria,serif;'>{$pushque[$lq+1]}</span></p>
        </td>
        
        <td style='width:42.35pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;'>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:Calibri,sans-serif;text-align:center;'><span style='font-family:Cambria,serif;'>{$longcoarray[$lqco+1]}</span></p>
        </td>
        <td style='width:44.2pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;'>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:Calibri,sans-serif;text-align:center;'><span style='font-family:Cambria,serif;'>8</span></p>
        </td>
    </tr>
    <tr>
            <td colspan='8' style='width:514.9pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;'>
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:Calibri,sans-serif;text-align:center;'><strong><span style='font-family:Cambria,serif;'>OR</span></strong></p>
            </td>
        </tr>";
        $lq+=2;
        $lqco+=2;
    }
   $count++;
    if ($value2 == 0) {
        echo "<tr>
        <td colspan='2' rowspan='1' style='width:28.45pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;'><span style='font-size:15px;font-family:Cambria,serif;'><br>&nbsp;</span>&nbsp;<p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:Calibri,sans-serif;text-align:center;'><span style='font-family:Cambria,serif;'>{$count}</span></p>
        </td>
        <td colspan='2' style='width:27.5pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;'>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:Calibri,sans-serif;text-align:center;'><span style='font-family:Cambria,serif;'></span></p>
        </td>
        <td style='width: 301.2pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 5.6pt;vertical-align: top;'>
            <p style='margin-top:0.3cm;margin-right:0cm;margin-bottom:0.3cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:Calibri,sans-serif;text-align:justify;'><span style='font-family:Cambria,serif;'> 
             {$pushque[$lq]} </span></p>
        </td>
        
        <td style='width:42.35pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;'>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:Calibri,sans-serif;text-align:center;'><span style='font-family:Cambria,serif;'>{$longcoarray[$lqco]}</span></p>
        </td>
        <td style='width:44.2pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;'>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:Calibri,sans-serif;text-align:center;'><span style='font-family:Cambria,serif;'>14</span></p>
        </td>
    </tr>";
    $lq+=1;
    $lqco+=1;
    } else {
        echo "<tr>
        <td colspan='2' rowspan='2' style='width:28.45pt;border:solid black 1.0pt;border-bottom:solid black 1.6pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;'><span style='font-size:15px;font-family:Cambria,serif;'><br>&nbsp;</span>&nbsp;<p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:Calibri,sans-serif;text-align:center;'><span style='font-family:Cambria,serif;'>{$count}</span></p>
        </td>
        <td colspan='2' style='width:27.5pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;'>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:Calibri,sans-serif;text-align:center;'><span style='font-family:Cambria,serif;'>(a)</span></p>
        </td>
        <td style='width: 301.2pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 5.6pt;vertical-align: top;'>
            <p style='margin-top:0.2cm;margin-right:0cm;margin-bottom:0.2cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:Calibri,sans-serif;text-align:justify;'><span style='font-family:Cambria,serif;'> {$pushque[$lq]}  </span></p>
        </td>
        
        <td style='width:42.35pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;'>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:Calibri,sans-serif;text-align:center;'><span style='font-family:Cambria,serif;'>{$longcoarray[$lqco]}</span></p>
        </td>
        <td style='width:44.2pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;'>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:Calibri,sans-serif;text-align:center;'><span style='font-family:Cambria,serif;'>6</span></p>
        </td>
    </tr>
    <tr>
        <td colspan='2' style='width:27.5pt;border-top:none;border-left:none;border-bottom:solid black 1.6pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;'>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:Calibri,sans-serif;text-align:center;'><span style='font-family:Cambria,serif;'>(b)</span></p>
        </td>
        <td style='width: 301.2pt;border-top: none;border-left: none;border-bottom: 1.6pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 5.6pt;vertical-align: top;'>
            <p style='margin-top:0.2cm;margin-right:0cm;margin-bottom:0.2cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:Calibri,sans-serif;text-align:justify;'><span style='font-family:Cambria,serif;'>{$pushque[$lq+1]} </span></p>
        </td>
        
        <td style='width:42.35pt;border-top:none;border-left:none;border-bottom:solid black 1.6pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;'>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:Calibri,sans-serif;text-align:center;'><span style='font-family:Cambria,serif;'>{$longcoarray[$lqco+1]}</span></p>
        </td>
        <td style='width:44.2pt;border-top:none;border-left:none;border-bottom:  solid black 1.6pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;'>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:Calibri,sans-serif;text-align:center;'><span style='font-family:Cambria,serif;'>8</span></p>
        </td>
    </tr>";
    $lq+=2;
    $lqco+=2;
    
    }
    $count++;
}



?>
        
        
       
    </tbody>
</table>
<p style='margin-top:1cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:1cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>**********</span></p>


    </div>

    <style>
        #downloadBtn,#btn{
            width:200px;
            font-size: 18px;
            border-radius: 8px;
            height:50px;
            /* background: rgba(0, 0, 0, 0.895); */
            border: solid 1px black;
            color: black;
            margin-left: 500px;
            margin-bottom: 100px;
            cursor: pointer;
            /* margin:0 auto; */
        }
        @media print {
            /* Hide the button */
            button {
                display: none;
            }

            /* Hide header and footer */
            header, footer {
                display: none;
            }
            body {
                margin: 0;
              /* Adjust the scale as needed */
                transform-origin: top left;
            }
        }
    </style>
    <div id="loading">
        <!-- Loading message goes here -->
        <img src="loading.svg" alt="">
    </div>
    <!-- <button  id="downloadBtn" onclick="generateImage()">Download</button> -->
    <button onclick="printContent()"  id="downloadBtn" onclick="generateImage()">Download</button>
    <form action="" method="post">
        <input name="examtype" type="hidden" id="load">
        <!-- <input type="submit" name="loadq"> -->
    </form>
    <!-- <button class="badge bg-primary my-2 ms-3 btn btn-primary" id="btn">Download Excel format</button> -->
    <table class="table" id="table" style="display:none;">
        <thead>
          <tr>
            <th scope='col'>Questions</th>
           
            
          </tr>
        </thead>
        <tbody>

            <?php 
            foreach ($pushque as $value) {
                echo "<tr><td>{$value}</td></tr>";
            }
            
            
            ?>
          
          
        </tbody>
      </table>

   
    <!-- <a href="https://pdf2doc.com/">PDF TO DOC CONVERTER</a> -->
    <!-- <button >Download as PDF</button> -->

    <script src=
    "//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js">
    </script>

    <script>


        var currentdate = new Date(); 
        var datetime = currentdate.getDate() + "-"
                    + (currentdate.getMonth()+1)  + "-" 
                    + currentdate.getFullYear() + " "  
                    + currentdate.getHours() + "_"  
                    + currentdate.getMinutes() + "_" 
                    + currentdate.getSeconds();
        $('#btn').click(function() {
        $("#table").table2excel({
            exclude: ".noExport",
            filename: "Question paper " + datetime,
        });
    });

    function printContent() {
            window.print();
        }


    </script>

    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

    <script>
        function showContent() {
        document.getElementById('loading').style.display = 'none';
        document.getElementById('content').style.display = 'block';
    }

    // Show loading message initially
    document.addEventListener('DOMContentLoaded', function () {
        // Set a timeout to show content after 5 seconds
        setTimeout(showContent, 5000);
    });

        function generateImage() {
            const content = document.getElementById('content');

            // Use html2canvas to capture the content as an image
            html2canvas(content).then(canvas => {
                // Convert the canvas to a data URL
                const imageData = canvas.toDataURL('image/png');

                // Create a temporary link element
                const link = document.createElement('a');
                link.href = imageData;
                link.download = 'output.png';

                // Trigger a click on the link to start the download
                link.click();
            });
        }
    </script>

<script>
    
    
    var valuesJSON = localStorage.getItem('savedValues');
    var valuesArray = JSON.parse(valuesJSON);
    
    
    var hinput = document.getElementById('load');
    console.log(valuesArray[24]);
    hinput.value = valuesArray[24] ;

    for (var i = 0; i < 16; i++) {
        j=i+1;
        var id = 'input' + j;
        var element = document.getElementById(id);

        // Check if the element exists before setting its content
        if (element) {
            element.innerHTML = valuesArray[i];
        }
    }



   
    
</script>
</body>
</html>


</body>
</html>








