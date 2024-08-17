<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aati | Blood Alcohol</title>
  <link rel="stylesheet" href="style.css">

</head>

<body>
  <div class="container">
    <h2>Blood Alcohol Concentration Calculator</h2>
    <!-- <form action="calculate_bac.php" method="POST"> -->
      <form method = "GET">
      <label for="weight">Weight:</label>
      <input type="number" id="weight" name="weight" placeholder="Enter your weight" required>

      <label for="unit">Weight Unit:</label>
      <select id="unit" name="unit" required>
        <option value="kg">Kilograms (kg)</option>
        <option value="lbs">Pounds (lbs)</option>
      </select>
      <label for="gender">Gender:</label>
      <select id="gender" name="gender" required>
        <option value="male">Male</option>
        <option value="female">Female</option>
      </select>

      <label for="drinks">Number of Drinks:</label>
      <input type="number" id="drinks" name="drinks" placeholder="Enter number of drinks" required>

      <label for="alcohol_content">Alcohol Content per Drink (grams):</label>
      <input type="number" id="alcohol_content" name="alcohol_content" placeholder="Enter alcohol content per drink"
        required>

      <label for="time_elapsed">Time Elapsed (hours):</label>
      <input type="number" id="time_elapsed" name="time_elapsed" placeholder="Enter time elapsed since drinking started"
        required>

      <button type="submit">Calculate BAC</button>
    </form>

    <div class="output-wrapper">
    <!-- <div> Your Blood Concentration is: <span> </span></div>
    <div>safe to drive </div> -->
  

  <?php 
$weight = $_GET['weight'];
$unit = $_GET['unit'];
$gender = $_GET['gender'];
$drinks = $_GET['drinks'];
$alcohol_content = $_GET['alcohol_content'];
$time_elapsed = $_GET['time_elapsed'];

if ($unit == "kg") {
    $weight = $weight * 2.20462;
}


if($gender=="male"){
    $gender_constant=0.73;
}
else{
    $gender_constant=0.66;
}

$alcohol_consumed=$drinks*$alcohol_content;

//  echo "alcohol consumed=$alcohol_consumed<br>";


$BAC = (($alcohol_consumed * 5.14) / ($weight * $gender_constant)) - 0.015 * $time_elapsed;

$BAC_roundedoff=round($BAC,2);


if($BAC_roundedoff<0){
    $BAC_roundedoff=0;
    $result="Safe to Drive";
}

if ($BAC_roundedoff<=0.08){

   $result="Safe to Drive";
}
else{

    $result="Not Safe to Drive";
}

// echo"BAC=$BAC_roundedoff%";

// echo"<br>$result";
echo"<div> Your Blood Concentration is: <span>  $BAC_roundedoff %</span></div>";
echo"<div> $result</div>";
      
    
?>
    </div>
    </div>
  </div>
</body>

</html>












