<?php

$students = [
    "Chowa" => 87,
    "Fahim" => 80,
    "Meghla" => 84,
    "Nahian" => 70,
    "Raju"  => 50
];


$maxScore = 0;
$topStudent = "";

foreach ($students as $name => $score) {
    if ($score > $maxScore) {
        $maxScore = $score;
        $topStudent = $name;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        table { border-collapse: collapse; width: 50%; margin: 20px 0; font-family: sans-serif; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #f4f4f4; }
        .highlight { background-color: #8eb8f7; font-weight: bold; }
    </style>
</head>
<body>

    <h2>Student Result Sheet</h2>

    
    <table border="1">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $name => $score) : ?>
                <tr class="<?php echo ($name == $topStudent) ? 'highlight' : ''; ?>">
                    <td><?php echo $name; ?></td>
                    <td><?php echo $score; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    
    <p>
        <strong>Maximum Score:</strong> <?php echo $maxScore; ?> <br>
        <strong>Student Name:</strong> <?php echo $topStudent; ?>
    </p>

</body>
</html>