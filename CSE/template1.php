
<?php 

if(isset($_GET['subject_id']))
{
    $sub_id = $_GET['subject_id'];
}



if(isset($_POST['kichi']))
{
    
    $short = $_POST['short'];
    $long = $_POST['long'];


      
    
   

        // Access the input values as an array
        $inputNames = $_POST["inputName"];

        $examtype = $_POST['examtype'];

    
        // Output the values
        // echo "Input Values: ";
        // print_r($inputNames);
        $inputNamesJson = json_encode($inputNames);
        echo "<script>window.open('test3.php?inputArray={$inputNamesJson}&short={$short}&long={$long}&subj_id={$sub_id}&exam={$examtype}', '_self');</script>";
    
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha384-eSLCc7eUqEMsEJpHRqurqJFszhpozZCgFEGrG8RmCGUxn25m45tHt9Zbg27iFNQ3" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
    <style>
        .container{
            width: 100%;
            height: 100vh;
            /* padding-bottom: 200px; */
            overflow-y: scroll;
            display: flex;
            flex-direction: column;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }

        .container::-webkit-scrollbar{
            display: none;
        }
        .head1{
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            color: black;
            font-size: 25px;
            
        }



        .head2,.create{
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            color: black;
            font-size: 20px;
            margin-top: 10px;
            margin-bottom: 5px;
        }
        
        .head a{
            color: black;
            font-size: 18px;
            text-decoration: none;
        }

        .table-input{
            width: 100%;
            background: transparent;
            border: none;
            outline: none;

        
        }
        
        .longque{
            width:100%; border:none; background: transparent; outline:none; border: solid 0.5px black; border-radius: 5px; height: 30px; padding: 5px;
        }

        .create{
            width:400px;
            margin-top: 100px;
            margin-bottom: 30px;
            margin-left:30%;
            color: black;
            border: solid 1px black;
            background: rgb(211, 215, 219);
            padding: 7px;
            border-radius: 7px;
        }
        .create a {
           
            text-decoration: none;
        }

        .savebtn{
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        table {
            width: 514.9pt;
            margin-left: 31.5pt;
            border-collapse: collapse;
            border: none;
        }

        td {
            padding: 0cm 5.4pt;
            height: 5.6pt;
            border: 1pt solid black;
        }
          
        #save{
            width:100px;
            height:30px;
            border-radius: 7px;
            border: none;
            outline: none;
            background: lightgray;
            margin-top: 40px;
            margin-bottom: 20px;
        }

    </style>
    <div class="container">
        <div class="head1">Create Template</div>
        <!-- <div class="head"><select name="examtype" id="examtype" class="exam-select" style="background:linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%) ; width: 100%; border-radius: 5px; height: 30px; outline: none; cursor: pointer; " aria-label="Default select example" required>
            <option selected>Choose Exam type</option>
            <option value="1">Mid-1</option>
            <option value="2">Mid-2</option>
            <option value="3">Semester</option>
    </select></div> -->
        <table style="border-collapse:collapse;border:none; margin-top: 15px; width: 90%;">
            <tbody>
                <tr>
                    <td colspan="2" style="width:122.2pt;border:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:17.9pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Cambria",serif;'><input class="table-input" value="U.G" placeholder="U.G" type="text"></span></p>
                    </td>
                    <td colspan="4" style="width:167.85pt;border:solid black 1.0pt;border-left:none;padding:0cm 5.4pt 0cm 5.4pt;height:17.9pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-family:"Cambria",serif;'><input value="B.Tech" placeholder="B.Tech" type="text" class="table-input"></span></strong></p>
                    </td>
                    <td colspan="2" style="width:64.55pt;border:solid black 1.0pt;border-left:none;padding:0cm 5.4pt 0cm 5.4pt;height:17.9pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-family:"Cambria",serif;'><input value="Degree" class="table-input" placeholder="Degree" type="text"></span></p>
                    </td>
                    <td colspan="4" style="width:156.2pt;border:solid black 1.0pt;border-left:none;padding:0cm 5.4pt 0cm 5.4pt;height:17.9pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'><input value="Bachelor of technology" class="table-input" placeholder="Bachelor of technology" type="text"></span></p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="width:122.2pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:17.9pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Cambria",serif;'><input value="Academic Year" class="table-input" placeholder="Academic Year" type="text"></span></p>
                    </td>
                    <td colspan="4" style="width:167.85pt;border-top:none;border-left:  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:17.9pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'><input  class="table-input" placeholder="2023-24" type="text"></span></p>
                    </td>
                    <td colspan="2" style="width:64.55pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:17.9pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-family:"Cambria",serif;'><input value="Sem" class="table-input" placeholder="Sem" type="text"></span></p>
                    </td>
                    <td colspan="4" style="width:156.2pt;border-top:none;border-left:  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:17.9pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'><input class="table-input" placeholder="5th" type="text"></span></p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" rowspan="2" style="width:122.2pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Cambria",serif;'><input value="Course Code" class="table-input" placeholder="Course Code" type="text"></span></p>
                    </td>
                    <td colspan="2" rowspan="2" style="width:111.1pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-family:"Cambria",serif;'><input class="table-input" placeholder="20CS103" type="text"></span></strong></p>
                    </td>
                    <td colspan="8" style="width:277.5pt;border-top:none;border-left:  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'><input value="Course Title" class="table-input" placeholder="Course Title" type="text"></span></p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" style="width:277.5pt;border-top:none;border-left:  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-family:"Cambria",serif;'><input class="table-input" placeholder="FUNDAMENTALS OF COMPUTER NETWORKS AND OPERATING SYSTEMS" type="text"></span></strong></p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="width:122.2pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Cambria",serif;'><input value="Duration" class="table-input" placeholder="Duration" type="text"></span></p>
                    </td>
                    <td colspan="2" style="width:111.1pt;border-top:none;border-left:  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'><input  class="table-input" placeholder="3 hours" type="text"></span></p>
                    </td>
                    <td colspan="5" style="width:143.95pt;border-top:none;border-left:  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'><input value="Maximum Marks" class="table-input" placeholder="Maximum Marks" type="text"></span></p>
                    </td>
                    <td colspan="3" style="width:133.55pt;border-top:none;border-left:  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'><input  class="table-input" placeholder="SIXTY (60)" type="text"></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:86.75pt;border:solid black 1.0pt;border-top:none;padding:  0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-family:"Cambria",serif;'><input value="Remember %" class="table-input" placeholder="Remember %" type="text"></span></p>
                    </td>
                    <td style="width:35.45pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'><input class="table-input" placeholder="9" type="text"></span></p>
                    </td>
                    <td style="width:86.35pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-family:"Cambria",serif;'><input value="Understand %" class="table-input" placeholder="Understand %" type="text"></span></p>
                    </td>
                    <td colspan="2" style="width:54.2pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'><input class="table-input" placeholder="57" type="text"></span></p>
                    </td>
                    <td colspan="2" style="width:73.9pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-family:"Cambria",serif;'><input value="Apply %" class="table-input" placeholder="Apply %" type="text"></span></p>
                    </td>
                    <td colspan="3" style="width:55.95pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'><input class="table-input" placeholder="34" type="text"></span></p>
                    </td>
                    <td style="width:74.5pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-family:"Cambria",serif;'><input value="Analyse %" class="table-input" placeholder="Analyse %" type="text"></span></p>
                    </td>
                    <td style="width:43.7pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.2pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-family:"Cambria",serif;'><input class="table-input" placeholder="-" type="text"></span></p>
                    </td>
                </tr>
                
            </tbody>
        </table>
        <div class="savebtn"><button id="save" onclick="saveValues()">Save</button></div>
        
        <form id="questionForm"  method="post">
        <div class="short-questions">
            <div class="head2">Short Questions</div>
            <input name="short" type="text" class="short" id="numRows" placeholder="NO OF SHORT QUESTIONS " style="width:100%; border:none; background: transparent; outline:none; border: solid 0.5px black; border-radius: 5px; height: 30px; padding: 5px;" required oninput="generateRows()">
        </div>

        
         
        <table  style="width:514.9pt;margin-left:31.5pt;border-collapse:collapse;border:none; margin-top: 15px;margin-bottom: 10px; margin-left: 160px;">
            <tbody id="tbod">
                <!-- <tr>
                    <td style="width:34.45pt;border:solid black 1.0pt;padding:  0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>1</span></p>
                    </td>
                    <td style="width: 369.35pt;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Cambria",serif;'>Questions</span></p>
                    </td>
                    <td style="width:71.2pt;border:solid black 1.0pt;border-left:none;padding:  0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>RBT Level</span></p>
                    </td>
                    <td style="width:39.9pt;border:solid black 1.0pt;border-left:none;padding:  0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>COs</span></p>
                    </td>
                </tr> -->
            </tbody>
        </table>

        <div class="long-questions">
            <div class="head2">Long Questions</div>
            
            <input name="long" type="number" id="numLongQuestions" onkeyup="generateTable()" placeholder="NO OF LONG QUESTIONS "  name="numInputs" min="1" max="10" required  style="width:100%; border:none; background: transparent; outline:none; border: solid 0.5px black; border-radius: 5px; height: 30px; padding: 5px;" >      
        </div>

        <div id="tableContainer" style="margin-left: 140px; margin-top: 25px; "></div>

       
        
        <div class="head" style="margin-top:50px;"><select name="examtype" id="examtype" class="exam-select" style="background:linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%) ; width: 100%; border-radius: 5px; height: 30px; outline: none; cursor: pointer; " aria-label="Default select example" required>
            <option selected>Choose Exam type</option>
            <option value="1">Mid-1</option>
            <option value="2">Mid-2</option>
            <option value="3">Semester</option>
    </select></div>
    

    <input class="create" type="submit" name="kichi" value="Create Template">
    </form>
    </div>
    
    <script>
window.onbeforeunload = function() {
    return "Are you sure you want to refresh the page?";
};

function showAlert() {
    var userResponse = confirm('Do you want to refresh the page?');
    if (userResponse) {
        // If the user confirms, proceed with refreshing the page
        location.reload();
    } else {
        // If the user cancels, do nothing
        console.log('Refresh cancelled by the user.');
    }
}

var lastNumRows = 0;

function saveValues() {
            // Create an array to store values
            var valuesArray = [];

            // Get all input elements with class "table-input"
            var inputElements = document.getElementsByClassName('table-input');
            
            var examtype = document.getElementById('examtype');
            // Iterate through the input elements and add their values to the array
            for (var i = 0; i < inputElements.length; i++) {
                valuesArray.push(inputElements[i].value);
            }
            valuesArray.push(examtype.value);
            // Convert the array to a JSON string
            var valuesJSON = JSON.stringify(valuesArray);

            // Store the JSON string in localStorage
            localStorage.setItem('savedValues', valuesJSON);
           
            

            alert('Changes Saved');

            // Optionally, you can redirect to another page here
            // window.location.href = 'nextPage.html';
        }

function generateRows() {
    console.log('function called');
    // Get the number of rows from the user
    var numRows = document.getElementById('numRows').value;

    
    // Get the table body
    var tbody = document.getElementById('tbod');

    // Get the current number of rows in the table
    var currentRows = tbody.getElementsByTagName('tr').length ;

    // Determine whether to add or remove rows
    if (numRows > currentRows) {
        // Add new rows
        for (var i = currentRows + 1; i <= numRows; i++) {
            var tr = document.createElement('tr');
            tr.innerHTML = `
                <td style="width:34.45pt;border:solid black 1.0pt;padding:  0cm 5.4pt 0cm 5.4pt;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>${String.fromCharCode(96 + i)}</span></p>
                </td>
                <td style="width: 369.35pt;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Cambria",serif;'>Question </span></p>
                </td>
                <td style="width:71.2pt;border:solid black 1.0pt;border-left:none;padding:  0cm 5.4pt 0cm 5.4pt;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>RBT level</span></p>
                </td>
                <td style="width:39.9pt;border:solid black 1.0pt;border-left:none;padding:  0cm 5.4pt 0cm 5.4pt;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Cambria",serif;'>COs</span></p>
                </td>
            `;
            tbody.appendChild(tr);
        }
    } else if (numRows < currentRows) {
        // Remove excess rows
        for (var i = currentRows; i > numRows; i--) {
            tbody.removeChild(tbody.lastChild);
        }
    }
 lastNumRows = numRows;
    console.log('Updated number of rows: ' + numRows);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'update_last_num_rows.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log('Server response:', xhr.responseText);
        }
    };
    xhr.send('lastNumRows=' + encodeURIComponent(lastNumRows));

}

console.log(lastNumRows);
function generateTable() {
        var numLongQuestions = parseInt(document.getElementById("numLongQuestions").value);

        if(numLongQuestions>8){
            alert('Enter Between 1-5');
        }
         else{
            var longQuestionsWithSub = [];
            var form = document.getElementById("questionForm");
            
        var tableHtml = "<table id='table2' class='table2' ><tbody>";
        
        

        for (var i = 2; i <= numLongQuestions+1; i++) {
            var hasSubQuestions = prompt("Does Long Question " + i + " have subquestions? (Enter '1' for yes, '0' for no)");
            longQuestionsWithSub.push(hasSubQuestions);

            tableHtml += "<tr>";

            // Cell 1
            tableHtml += "<td  colspan='2' rowspan='" + (hasSubQuestions === '1' ? '2' : '1') + "'>" + i + "</td>";

            // Cell 2
            tableHtml += "<td  colspan='2'>(a)</td>";

            // Cell 3
            tableHtml += "<td style='width: 301.2pt;'>" +
                "<p style='font-size: 15px; font-family: \"Calibri\", sans-serif;'>" +
                "<span style='font-family:\"Cambria\",serif;'>Question " + i + "</span></p></td>";

            // Cell 4
            tableHtml += "<td style='width:71.2pt;'>Understand</td>";

            // Cell 5
            tableHtml += "<td style='width:42.35pt;'>CO" + i + "</td>";

            // Cell 6
            tableHtml += "<td style='width:44.2pt;'>8</td>";

            tableHtml += "</tr>";

            if (hasSubQuestions === '1') {
                tableHtml += "<tr>";

                // Cell 2
                tableHtml += "<td colspan='2'>(b)</td>";

                // Cell 3
                tableHtml += "<td style='width: 301.2pt;'>" +
                    "<p style='font-size: 15px; font-family: \"Calibri\", sans-serif;'>" +
                    "<span style='font-family:\"Cambria\",serif;'> Question " + i + "</span></p></td>";

                // Cell 4
                tableHtml += "<td style='width:71.2pt;'>Apply</td>";

                // Cell 5
                tableHtml += "<td style='width:42.35pt;'>CO" + i + "</td>";

                // Cell 6
                tableHtml += "<td style='width:44.2pt;'>6</td>";

                tableHtml += "</tr>";
            }
        }

        tableHtml += "</tbody></table>";

        document.getElementById("tableContainer").innerHTML = tableHtml;
        
        console.log(longQuestionsWithSub);
        for (var j = 0; j < longQuestionsWithSub.length; j++) {
            var input = document.createElement("input");
            input.type = "hidden";
            input.name = "inputName[]";
            input.value = longQuestionsWithSub[j] === '1' ? '1' : '0'; // Set value to '1' if true, '0' otherwise
            form.appendChild(input);
        }

    }
    }

    


    var updatedRowCount = generateRows();
console.log('Updated number of rows: ' + updatedRowCount);




    </script>
</body>
</html>