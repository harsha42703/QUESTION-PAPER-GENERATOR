<?php 
include('../includes/db.php');

if(isset($_GET['subj_id'])){
    $subj_id = $_GET['subj_id'];
}
$subj_id=1;
  $short =2;
  $get_short_que = "SELECT que_desc FROM questions WHERE sub_id=$subj_id and que_marks=$short ORDER BY RAND() LIMIT 5";
  $ques_exe = mysqli_query($con,$get_short_que);
  
  $questionsArray = array();

while ($row = mysqli_fetch_assoc($ques_exe)) {
    // Add each question to the array
    $questionsArray[] = $row['que_desc'];
}



$get_long_que = "SELECT que_desc FROM questions WHERE sub_id=$subj_id and que_marks!=$short ORDER BY RAND() LIMIT 16";

$long_que = mysqli_query($con,$get_long_que);

$long_questions = array();
while ($long = mysqli_fetch_assoc($long_que)) {
    // Add each question to the array
    $long_questions[] = $long['que_desc'];
}



  
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
            /* height: 29.7cm; */
            height: 34.5cm;
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
    <?php 
    while($row=mysqli_fetch_assoc($ques_exe))
    {
      print_r($row['que_desc']);
    }
    
    ?>
    <div id="content" class="a4-content">
        <div class="head1"><p>Semester Paper</p></div>
        <div align="center" style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <table style="border-collapse:collapse;border:none;">
                <tbody>
                    <tr>
                        <td colspan="2" style="width:122.2pt;border:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:17.9pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Cambria",serif;'>U.G.</span></p>
                        </td>
                        <td colspan="4" style="width:167.85pt;border:solid black 1.0pt;border-left:none;padding:0cm 5.4pt 0cm 5.4pt;height:17.9pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-family:"Cambria",serif;'>B. Tech</span></strong></p>
                        </td>
                        <td colspan="2" style="width:64.55pt;border:solid black 1.0pt;border-left:none;padding:0cm 5.4pt 0cm 5.4pt;height:17.9pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-family:"Cambria",serif;'>Degree</span></p>
                        </td>
                        <td colspan="4" style="width:156.2pt;border:solid black 1.0pt;border-left:none;padding:0cm 5.4pt 0cm 5.4pt;height:17.9pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>Bachelor of Technology</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="width:122.2pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:17.9pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Cambria",serif;'>Academic Year</span></p>
                        </td>
                        <td colspan="4" style="width:167.85pt;border-top:none;border-left:  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:17.9pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>2023-24</span></p>
                        </td>
                        <td colspan="2" style="width:64.55pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:17.9pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-family:"Cambria",serif;'>Sem.</span></p>
                        </td>
                        <td colspan="4" style="width:156.2pt;border-top:none;border-left:  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:17.9pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>7<sup>th</sup>&nbsp;</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" rowspan="2" style="width:122.2pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Cambria",serif;'>Course Code</span></p>
                        </td>
                        <td colspan="2" rowspan="2" style="width:111.1pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-family:"Cambria",serif;'>20CSM44</span></strong></p>
                        </td>
                        <td colspan="8" style="width:277.5pt;border-top:none;border-left:  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>Course Title</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="8" style="width:277.5pt;border-top:none;border-left:  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-family:"Cambria",serif;'>FUNDAMENTALS OF COMPUTER NETWORKS AND OPERATING SYSTEMS</span></strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="width:122.2pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Cambria",serif;'>Duration&nbsp;</span></p>
                        </td>
                        <td colspan="2" style="width:111.1pt;border-top:none;border-left:  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>3 Hours</span></p>
                        </td>
                        <td colspan="5" style="width:143.95pt;border-top:none;border-left:  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>Maximum Marks</span></p>
                        </td>
                        <td colspan="3" style="width:133.55pt;border-top:none;border-left:  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>60 (SIXTY)</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:86.75pt;border:solid black 1.0pt;border-top:none;padding:  0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-family:"Cambria",serif;'>Remember %</span></p>
                        </td>
                        <td style="width:35.45pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>9</span></p>
                        </td>
                        <td style="width:86.35pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-family:"Cambria",serif;'>Understand %</span></p>
                        </td>
                        <td colspan="2" style="width:54.2pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>57</span></p>
                        </td>
                        <td colspan="2" style="width:73.9pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-family:"Cambria",serif;'>Apply %</span></p>
                        </td>
                        <td colspan="3" style="width:55.95pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>34</span></p>
                        </td>
                        <td style="width:74.5pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-family:"Cambria",serif;'>Analyse %</span></p>
                        </td>
                        <td style="width:43.7pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-family:"Cambria",serif;'>-</span></p>
                        </td>
                    </tr>
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
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>6 x 2 = 12 Marks</span></p>
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
            <td style="width:71.2pt;border:solid black 1.0pt;border-left:none;padding:  0cm 5.4pt 0cm 5.4pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>RBT Level</span></p>
            </td>
            <td style="width:39.9pt;border:solid black 1.0pt;border-left:none;padding:  0cm 5.4pt 0cm 5.4pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>COs</span></p>
            </td>
        </tr>
        <tr>
            <td style="width:34.45pt;border:solid black 1.0pt;border-top:none;padding:  0cm 5.4pt 0cm 5.4pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>a</span></p>
            </td>
            <td style="width: 369.35pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;vertical-align: top;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-family:"Cambria",serif;'><?php echo $questionsArray[0];?></span></p>
            </td>
            <td style="width: 71.2pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;vertical-align: top;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>Remember</span></p>
            </td>
            <td style="width:39.9pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>CO1</span></p>
            </td>
        </tr>
        <tr>
            <td style="width:34.45pt;border:solid black 1.0pt;border-top:none;padding:  0cm 5.4pt 0cm 5.4pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>b</span></p>
            </td>
            <td style="width: 369.35pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;vertical-align: top;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-family:"Cambria",serif;'><?php echo $questionsArray[1];?></span></p>
            </td>
            <td style="width:71.2pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>Understand</span></p>
            </td>
            <td style="width:39.9pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>CO2</span></p>
            </td>
        </tr>
        <tr>
            <td style="width:34.45pt;border:solid black 1.0pt;border-top:none;padding:  0cm 5.4pt 0cm 5.4pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>c</span></p>
            </td>
            <td style="width: 369.35pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;vertical-align: top;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-family:"Cambria",serif;'><?php echo $questionsArray[2];?></span></p>
            </td>
            <td style="width: 71.2pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;vertical-align: top;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>Remember</span></p>
            </td>
            <td style="width:39.9pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>CO3</span></p>
            </td>
        </tr>
        <tr>
            <td style="width:34.45pt;border:solid black 1.0pt;border-top:none;padding:  0cm 5.4pt 0cm 5.4pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>d</span></p>
            </td>
            <td style="width: 369.35pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;vertical-align: top;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-family:"Cambria",serif;'><?php echo $questionsArray[3];?></span></p>
            </td>
            <td style="width: 71.2pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;vertical-align: top;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>Remember</span></p>
            </td>
            <td style="width:39.9pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>CO4</span></p>
            </td>
        </tr>
        <tr>
            <td style="width:34.45pt;border:solid black 1.0pt;border-top:none;padding:  0cm 5.4pt 0cm 5.4pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>e</span></p>
            </td>
            <td style="width: 369.35pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;vertical-align: top;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-family:"Cambria",serif;color:#202124;'><?php echo $questionsArray[4];?></span></p>
            </td>
            <td style="width: 71.2pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;vertical-align: top;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>Remember</span></p>
            </td>
            <td style="width:39.9pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>CO5</span></p>
            </td>
        </tr>
        <tr>
            <td style="width:34.45pt;border:solid black 1.0pt;border-top:none;padding:  0cm 5.4pt 0cm 5.4pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>f</span></p>
            </td>
            <td style="width: 369.35pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;vertical-align: top;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-family:"Cambria",serif;color:#202124;'>What are types of deadlocks?</span></p>
            </td>
            <td style="width: 71.2pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;vertical-align: top;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>Remember</span></p>
            </td>
            <td style="width:39.9pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>CO6</span></p>
            </td>
        </tr>
    </tbody>
</table>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-family:"Cambria",serif;'>&nbsp;</span></strong></p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-family:"Cambria",serif;'>SECTION-II&nbsp;</span></strong></p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>4 x 12 = 48 Marks</span></p>
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
            <td style="width:71.2pt;border:solid black 1.0pt;border-left:none;padding:  0cm 5.4pt 0cm 5.4pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>RBT Level</span></p>
            </td>
            <td style="width:42.35pt;border:solid black 1.0pt;border-left:none;padding:  0cm 5.4pt 0cm 5.4pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>COs</span></p>
            </td>
            <td style="width:44.2pt;border:solid black 1.0pt;border-left:none;padding:  0cm 5.4pt 0cm 5.4pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>Marks</span></p>
            </td>
        </tr>
        <tr>
            <td colspan="2" rowspan="2" style="width:28.45pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>2</span></p>
            </td>
            <td colspan="2" style="width:27.5pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>(a)</span></p>
            </td>
            <td style="width: 301.2pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 5.6pt;vertical-align: top;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-family:"Cambria",serif;'><?php echo $long_questions[0] ?></span></p>
            </td>
            <td style="width:71.2pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>Understand</span></p>
            </td>
            <td style="width:42.35pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>CO1</span></p>
            </td>
            <td style="width:44.2pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>8</span></p>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="width:27.5pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>(b)</span></p>
            </td>
            <td style="width: 301.2pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 5.6pt;vertical-align: top;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-family:"Cambria",serif;'><?php echo $long_questions[1] ?></span></p>
            </td>
            <td style="width:71.2pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>Understand</span></p>
            </td>
            <td style="width:42.35pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>CO1</span></p>
            </td>
            <td style="width:44.2pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>4</span></p>
            </td>
        </tr>
        <tr>
            <td colspan="8" style="width:514.9pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-family:"Cambria",serif;'>OR</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="2" rowspan="2" style="width:28.45pt;border-top:none;border-left:solid black 1.0pt;border-bottom:  solid black 2.25pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>3</span></p>
            </td>
            <td colspan="2" style="width:27.5pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>(a)</span></p>
            </td>
            <td style="width: 301.2pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 5.6pt;vertical-align: top;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-family:"Cambria",serif;'><?php echo $long_questions[2] ?></span></p>
            </td>
            <td style="width:71.2pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>Understand</span></p>
            </td>
            <td style="width:42.35pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>CO2</span></p>
            </td>
            <td style="width:44.2pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>6</span></p>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="width:27.5pt;border-top:none;border-left:none;border-bottom:solid black 2.25pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>(b)</span></p>
            </td>
            <td style="width: 301.2pt;border-top: none;border-left: none;border-bottom: 2.25pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 5.6pt;vertical-align: top;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-family:"Cambria",serif;'><?php echo $long_questions[3] ?></span></p>
            </td>
            <td style="width:71.2pt;border-top:none;border-left:none;border-bottom:  solid black 2.25pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>Apply</span></p>
            </td>
            <td style="width:42.35pt;border-top:none;border-left:none;border-bottom:solid black 2.25pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>CO2</span></p>
            </td>
            <td style="width:44.2pt;border-top:none;border-left:none;border-bottom:  solid black 2.25pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>6</span></p>
            </td>
        </tr>
        <tr>
            <td colspan="2" rowspan="2" style="width:28.45pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;"><span style='font-size:15px;font-family:"Cambria",serif;'><br>&nbsp;</span>&nbsp;<p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>4</span></p>
            </td>
            <td colspan="2" style="width:27.5pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>(a)</span></p>
            </td>
            <td style="width: 301.2pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 5.6pt;vertical-align: top;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-family:"Cambria",serif;'><?php echo $long_questions[4] ?></span></p>
            </td>
            <td style="width:71.2pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>Understand</span></p>
            </td>
            <td style="width:42.35pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>CO2</span></p>
            </td>
            <td style="width:44.2pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>4</span></p>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="width:27.5pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>(b)</span></p>
            </td>
            <td style="width: 301.2pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 5.6pt;vertical-align: top;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-family:"Cambria",serif;'><?php echo $long_questions[5] ?></span></p>
            </td>
            <td style="width:71.2pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>Apply</span></p>
            </td>
            <td style="width:42.35pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>CO2</span></p>
            </td>
            <td style="width:44.2pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>8</span></p>
            </td>
        </tr>
        <tr>
            <td colspan="8" style="width:514.9pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-family:"Cambria",serif;'>OR</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="2" rowspan="2" style="width:28.45pt;border-top:none;border-left:solid black 1.0pt;border-bottom:  solid black 2.25pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:19.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>5</span></p>
            </td>
            <td style="width:26.75pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:19.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>(a)</span></p>
            </td>
            <td colspan="2" style="width: 301.95pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 19.6pt;vertical-align: top;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-family:"Cambria",serif;'><?php echo $long_questions[6] ?></span></p>
            </td>
            <td style="width:71.2pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:19.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>Understand</span></p>
            </td>
            <td style="width:42.35pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:19.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>CO3</span></p>
            </td>
            <td style="width:44.2pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:19.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>8</span></p>
            </td>
        </tr>
        <tr>
            <td style="width:26.75pt;border-top:none;border-left:none;border-bottom:solid black 2.25pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>(b)</span></p>
            </td>
            <td colspan="2" style="width: 301.95pt;border-top: none;border-left: none;border-bottom: 2.25pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 5.6pt;vertical-align: top;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-family:"Cambria",serif;'><?php echo $long_questions[7] ?></span></p>
            </td>
            <td style="width:71.2pt;border-top:none;border-left:none;border-bottom:  solid black 2.25pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>Understand</span></p>
            </td>
            <td style="width:42.35pt;border-top:none;border-left:none;border-bottom:solid black 2.25pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>CO3</span></p>
            </td>
            <td style="width:44.2pt;border-top:none;border-left:none;border-bottom:  solid black 2.25pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>4</span></p>
            </td>
        </tr>
        <tr>
            <td colspan="2" rowspan="2" style="width:28.45pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>6</span></p>
            </td>
            <td style="width:26.75pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>(a)</span></p>
            </td>
            <td colspan="2" style="width: 301.95pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 5.6pt;vertical-align: top;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-family:"Cambria",serif;'><?php echo $long_questions[8] ?></span></p>
            </td>
            <td style="width:71.2pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Cambria",serif;'>Understand</span></p>
            </td>
            <td style="width:42.35pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>CO4</span></p>
            </td>
            <td style="width:44.2pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>8</span></p>
            </td>
        </tr>
        <tr>
            <td style="width:26.75pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>(b)</span></p>
            </td>
            <td colspan="2" style="width: 301.95pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 5.6pt;vertical-align: top;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-family:"Cambria",serif;'><?php echo $long_questions[9] ?></span></p>
            </td>
            <td style="width:71.2pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>Understand</span></p>
            </td>
            <td style="width:42.35pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>CO4</span></p>
            </td>
            <td style="width:44.2pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>4</span></p>
            </td>
        </tr>
        <tr>
            <td colspan="8" style="width:514.9pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-family:"Cambria",serif;'>OR</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="2" rowspan="2" style="width:28.45pt;border-top:none;border-left:solid black 1.0pt;border-bottom:  solid black 2.25pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;"><span style='font-size:15px;font-family:"Cambria",serif;'><br>&nbsp;</span>&nbsp;<p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>7</span></p>
            </td>
            <td colspan="2" style="width:27.5pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>(a)</span></p>
            </td>
            <td style="width:301.2pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-family:"Cambria",serif;'><?php echo $long_questions[10] ?></span></p>
            </td>
            <td style="width:71.2pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>Apply</span></p>
            </td>
            <td style="width:42.35pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>CO6</span></p>
            </td>
            <td style="width:44.2pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>6</span></p>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="width:27.5pt;border-top:none;border-left:none;border-bottom:solid black 2.25pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>(b)</span></p>
            </td>
            <td style="width:301.2pt;border-top:none;border-left:none;border-bottom:solid black 2.25pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-family:"Cambria",serif;'><?php echo $long_questions[11] ?></span></p>
                
            </td>
            <td style="width:71.2pt;border-top:none;border-left:none;border-bottom:  solid black 2.25pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>Apply</span></p>
            </td>
            <td style="width:42.35pt;border-top:none;border-left:none;border-bottom:solid black 2.25pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>CO5</span></p>
            </td>
            <td style="width:44.2pt;border-top:none;border-left:none;border-bottom:  solid black 2.25pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>6</span></p>
            </td>
        </tr>
        <tr>
            <td colspan="2" rowspan="2" style="width:28.45pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:13.35pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>&nbsp;</span></p>
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>8</span></p>
            </td>
            <td colspan="2" style="width:27.5pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:13.35pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>(a)</span></p>
            </td>
            <td style="width:301.2pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:13.35pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Cambria",serif;'><?php echo $long_questions[12] ?></span></p>
            </td>
            <td style="width:71.2pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:13.35pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>Understand</span></p>
            </td>
            <td style="width:42.35pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:13.35pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>CO6</span></p>
            </td>
            <td style="width:44.2pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:13.35pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>6</span></p>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="width:27.5pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>(b)</span></p>
            </td>
            <td style="width:301.2pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-family:"Cambria",serif;'><?php echo $long_questions[13] ?></span></p>
            </td>
            <td style="width:71.2pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>Understand</span></p>
            </td>
            <td style="width:42.35pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>CO6</span></p>
            </td>
            <td style="width:44.2pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>6</span></p>
            </td>
        </tr>
        <tr>
            <td colspan="8" style="width:514.9pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:7.6pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-family:"Cambria",serif;'>OR</span></strong></p>
            </td>
        </tr>
        <tr>
            <td rowspan="2" style="width:26.75pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.5pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>9</span></p>
            </td>
            <td colspan="3" style="width:29.2pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:11.5pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>(a)</span></p>
            </td>
            <td style="width:301.2pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:11.5pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-family:"Cambria",serif;'><?php echo $long_questions[14] ?></span></p>
            </td>
            <td style="width:71.2pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:11.5pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>Understand</span></p>
            </td>
            <td style="width:42.35pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:11.5pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>CO6</span></p>
            </td>
            <td style="width:44.2pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:11.5pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>6</span></p>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="width:29.2pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:11.5pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>(b)</span></p>
            </td>
            <td style="width:301.2pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:11.5pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-family:"Cambria",serif;'><?php echo $long_questions[15] ?></p>
            </td>
            <td style="width:71.2pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:11.5pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>Apply</span></p>
            </td>
            <td style="width:42.35pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:11.5pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>CO6</span></p>
            </td>
            <td style="width:44.2pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:11.5pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>6</span></p>
            </td>
        </tr>
        <tr>
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
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:1cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>**********</span></p>
    </div>

    <style>
        #downloadBtn{
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
    </style>
    <div id="loading">
        <!-- Loading message goes here -->
        <img src="loading.gif" alt="">
    </div>
    <button  id="downloadBtn" onclick="generateImage()">Download</button>
    <!-- <button >Download as PDF</button> -->

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
</body>
</html>
