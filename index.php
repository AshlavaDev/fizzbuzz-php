<!-- The index to allow for more pages if needed -->
<!-- TODO: Add error checking and style page -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FizzBuzz in PHP</title>
</head>
<body>
  <h1>FizzBuzz PHP</h1>
  <h2>A FizzBuzz program, on the web</h2>
  <p>This program accepts 2 numbers between 0 and 1000, and returns a list of every number between them inclusive, replacing multiples of 3 with "Fizz", multiples of 5 with "Buzz", and multiples of both with "FizzBuzz".</p>
  <form method="post" action="">
    <!-- Add error checking -->
    <div>
      <label for="start">Start:</label>
      <input type="number" id="start" name="start" min="0" max="1000">
    </div>
    <div>
      <label for="end">End:</label>
      <input type="number" id="end" name="end" min="0" max="1000">
    </div>
    <button type="submit">Submit</button>
  </form>
  <?php
    /* 
      This logic uses 2 different arrays rather than just looping between the numbers given,
      for future proof in case I want to do other things with those arrays
     */
    
    $allNumbers = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $start = $_POST['start'];
      $end = $_POST['end'];

      for ($i = $start; $i <= $end; $i++) {
        array_push($allNumbers, $i);
      }
    }

    $fizzBuzzed = [];

    foreach ($allNumbers as $number) {
      if ($number % 3 == 0 && $number % 5 == 0) {
        array_push($fizzBuzzed , "FizzBuzz");
      } elseif ($number % 3 == 0) {
        array_push($fizzBuzzed ,"Fizz");
      } elseif ($number % 5 == 0) {
        array_push($fizzBuzzed, "Buzz");
      } else {
        array_push($fizzBuzzed, $number);
      }
    }

    $finalResult = "";

    foreach ($fizzBuzzed as $index => $result) {
      if ($index == count($fizzBuzzed) - 1) {
        $finalResult .= $result;
      } else {
        $finalResult .= $result . ", ";
      }
    }

    echo "<p>$finalResult</p>";
  ?>
</body>
</html>