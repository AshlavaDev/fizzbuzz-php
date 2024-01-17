<!-- The index to allow for more pages if needed -->
<!-- TODO: Add error checking and style page -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FizzBuzz in PHP</title>
  <link rel="stylesheet" href="styles/page.css">
  <link rel="stylesheet" href="styles/fizzbuzz.css">
</head>
<body>
  <h1>FizzBuzz PHP</h1>
  <h2>A FizzBuzz program, on the web</h2>
  <p>This program accepts 2 numbers between 0 and 1000, and returns a list of every number between them inclusive, replacing multiples of 3 with "Fizz", multiples of 5 with "Buzz", and multiples of both with "FizzBuzz".</p>
  <form method="post" action="">
    <!-- Add error checking -->
    <div class="form-group">
      <div class="form-input">
        <label for="start">Start:</label>
        <input type="number" id="start" name="start" min="0" max="1000">
      </div>
      <div class="form-input">
        <label for="end">End:</label>
        <input type="number" id="end" name="end" min="0" max="1000">
      </div>
    </div>
    <button class="button" type="submit">Submit</button>
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

      // Gets every whole number between start and end and adds to array
      for ($i = $start; $i <= $end; $i++) {
        array_push($allNumbers, $i);
      }
    }

    $fizzBuzzed = [];

    // Standard FizzBuzz loop logic, goes through input array and checks result, which is added to output array
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

    // Loops through output array and concatenates results to output string for p tag, checking if the item is the last in the array
    foreach ($fizzBuzzed as $index => $result) {
      if ($index == count($fizzBuzzed) - 1) {
        $finalResult .= $result . ".";
      } else {
        $finalResult .= $result . ", ";
      }
    }

    echo "<p>$finalResult</p>";
  ?>
</body>
</html>