<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php require 'dashnav/dashnav.php';?>
    <div class="container mt-5">
        <h1 class="text-center"><?= $title; ?></h1>
        <form class="login-form bg-white p-4 rounded shadow">
            <div class="question mb-4">
                <p class="font-weight-bold">1. What is the capital of France?</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q1" id="q1_paris" value="paris">
                    <label class="form-check-label" for="q1_paris">Paris</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q1" id="q1_london" value="london">
                    <label class="form-check-label" for="q1_london">London</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q1" id="q1_berlin" value="berlin">
                    <label class="form-check-label" for="q1_berlin">Berlin</label>
                </div>
            </div>
            <div class="question mb-4">
                <p class="font-weight-bold">2. What is the largest planet in our solar system?</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q2" id="q2_earth" value="earth">
                    <label class="form-check-label" for="q2_earth">Earth</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q2" id="q2_venus" value="venus">
                    <label class="form-check-label" for="q2_venus">Venus</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q2" id="q2_jupiter" value="jupiter">
                    <label class="form-check-label" for="q2_jupiter">Jupiter</label>
                </div>
            </div>
            <div class="question mb-4">
                <p class="font-weight-bold">3. Which gas do plants absorb from the atmosphere?</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q3" id="q3_oxygen" value="oxygen">
                    <label class="form-check-label" for="q3_oxygen">Oxygen</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q3" id="q3_carbon_dioxide" value="carbon_dioxide">
                    <label class="form-check-label" for="q3_carbon_dioxide">Carbon dioxide</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q3" id="q3_nitrogen" value="nitrogen">
                    <label class="form-check-label" for="q3_nitrogen">Nitrogen</label>
                </div>
            </div>
            <button type="button" onclick="checkAnswers()" class="btn btn-primary">Submit</button>
            <p id="result" class="text-center mt-4"></p>
        </form>
        <a href="<?= site_url('dashboard/index') ?>" class="btn btn-secondary mt-3">Test End</a>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function checkAnswers() {
            const answers = {
                q1: "paris",
                q2: "jupiter",
                q3: "carbon_dioxide"
            };
            let score = 0;

            for (const question in answers) {
                const selectedAnswer = document.querySelector(`input[name="${question}"]:checked`);
                if (selectedAnswer && selectedAnswer.value === answers[question]) {
                    score++;
                }
            }

            const result = document.getElementById("result");
            result.innerHTML = `You got ${score} out of ${Object.keys(answers).length} questions correct.`;
        }
    </script>
</body>
</html>
