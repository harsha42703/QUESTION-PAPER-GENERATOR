<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Table Generator</title>
    <style>
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
    </style>
</head>
<body>

<div>
    <label for="numLongQuestions">Enter the number of long questions:</label>
    <input type="number" id="numLongQuestions" onkeyup="generateTable()">
    <!-- <button onclick="generateTable()">Generate Table</button> -->
</div>

<div id="tableContainer"></div>

<script>
    function generateTable() {
        var numLongQuestions = parseInt(document.getElementById("numLongQuestions").value);

        var tableHtml = "<table><tbody>";

        for (var i = 1; i <= numLongQuestions; i++) {
            var hasSubQuestions = prompt("Does Long Question " + i + " have subquestions? (Enter '1' for yes, '0' for no)");

            tableHtml += "<tr>";

            // Cell 1
            tableHtml += "<td colspan='2' rowspan='" + (hasSubQuestions === '1' ? '2' : '1') + "'>" + i + "</td>";

            // Cell 2
            tableHtml += "<td colspan='2'>(a)</td>";

            // Cell 3
            tableHtml += "<td style='width: 301.2pt;'>" +
                "<p style='font-size: 15px; font-family: \"Calibri\", sans-serif;'>" +
                "<span style='font-family:\"Cambria\",serif;'>Long Question " + i + "</span></p></td>";

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
                    "<span style='font-family:\"Cambria\",serif;'>Choice Question " + i + "</span></p></td>";

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
    }
</script>

</body>
</html>
