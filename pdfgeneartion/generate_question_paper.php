<?php

function generateStaticQuestions() {
    $questions = array(
        array(
            'section' => 'Section 1',
            'marks' => 2,
            'questions' => array(
                'What is the capital of France?',
                'Who wrote "Romeo and Juliet"?',
                'What is the formula for water?',
                'Who discovered penicillin?',
                'What is the largest planet in our solar system?'
            )
        ),
        array(
            'section' => 'Section 2',
            'marks' => 2,
            'questions' => array(
                'Who painted the Mona Lisa?',
                'What is the currency of Japan?',
                'What is the powerhouse of the cell?',
                'Who developed the theory of relativity?',
                'What is the chemical symbol for gold?'
            )
        )
    );

    return $questions;
}

// Display questions
$questionPaper = generateStaticQuestions();

echo "<table border='1'>";
echo "<tr>";
foreach ($questionPaper as $section) {
    echo "<th colspan='2'>{$section['section']}: {$section['marks']} Marks Questions</th>";
}
echo "</tr>";

$maxQuestions = max(array_map('count', array_column($questionPaper, 'questions')));

for ($i = 0; $i < $maxQuestions; $i++) {
    echo "<tr>";
    foreach ($questionPaper as $section) {
        $question = isset($section['questions'][$i]) ? $section['questions'][$i] : '';
        echo "<td>{$question}</td>";
    }
    echo "</tr>";
}

echo "</table>";
?>
