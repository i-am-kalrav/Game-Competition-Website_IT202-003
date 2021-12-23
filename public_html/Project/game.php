<?php

require_once(__DIR__ . "/../../partials/nav.php");
//require_once(__DIR__ . "/api/save_score.php");
if (!is_logged_in()) {
    //die(header("Location: login.php"));
    redirect("login.php");
}

?>

<html>

<head>
    <style>
        #center {
            width: 80%;
            margin-left: auto;
            margin-right: auto;
            align-content: center;
            text-align: center;

            height: 99%;
            padding: 0px;
        }

        canvas,
        body {
            padding: 0px;
            margin: 0px;
        }
    </style>
</head>

<body onload = "init();">
    <h1>Arcade Shooter</h1>
    <h3><a href="index.php">Back</a></h3>
    <div id="center">
        <canvas id="canvas" width="600px" height="400px" style = "border: 1px solid black"></canvas>
    </div>
    <span id="endGame"></span>
    <script>
        // Arcade Shooter game

        // Get a reference to the canvas DOM element
        var canvas = document.getElementById('canvas');//                          <------------ Arcade Shooter Game
        // Get the canvas drawing context
        var context = canvas.getContext('2d');

        // Create an object representing a square on the canvas
        function makeSquare(x, y, length, speed, hit) {
            return  {
                        x: x,
                        y: y,
                        l: length,
                        s: speed,
                        ht: hit,
                        draw: function() {
                            context.fillRect(this.x, this.y, this.l, this.l);
                        }
                    };
        }

        // The ship the user controls
        var shpSpeed = 5;
        var ht = false;
        var ship = makeSquare(50, canvas.height / 2 - 25, 50, shpSpeed, ht);

        // Flags to tracked which keys are pressed
        var up = false;
        var down = false;
        var space = false;

        // Is a bullet already on the canvas?
        var shooting = false;
        // The bullet shot from the ship
        var bx = 0;
        var by = 0;
        var bl = 10;
        var bs = 10;
        var bullet = makeSquare(bx, by, bl, bs);

        // An array for enemies and PowerUps (in case there are more than one)
        var enemies = [];
        var powers = [];

        // Add an enemy object to the array
        var enemyBaseSpeed = 2;
        function makeEnemy() {
            var enemyX = canvas.width;
            var enemySize = Math.round((Math.random() * 15)) + 15;
            var enemyY = Math.round(Math.random() * (canvas.height - enemySize * 2)) + enemySize;
            var enemySpeed = Math.round(Math.random() * enemyBaseSpeed) + enemyBaseSpeed;
            enemies.push(makeSquare(enemyX, enemyY, enemySize, enemySpeed));
        }

        var powerBaseSpeed = 2;
        function makePowerUp() {
            var powerX = canvas.width;
            var powerSize = Math.round((Math.random() * 15)) + 15;
            var powerY = Math.round(Math.random() * (canvas.height - powerSize * 2)) + powerSize;
            var powerSpeed = Math.round(Math.random() * powerBaseSpeed) + powerBaseSpeed;
            powers.push(makeSquare(powerX, powerY, powerSize, powerSpeed));
        }

        // Check if number a is in the range b to c (exclusive)
        function isWithin(a, b, c) {
            return (a > b && a < c);
        }

        // Return true if two squares a and b are colliding, false otherwise
        function isColliding(a, b) {
            var result = false;
            if (isWithin(a.x, b.x, b.x + b.l) || isWithin(a.x + a.l, b.x, b.x + b.l)) {
                if (isWithin(a.y, b.y, b.y + b.l) || isWithin(a.y + a.l, b.y, b.y + b.l)) {
                result = true;
                }
            }
            return result;
        }

        // Track the user's score
        var score = 0;
        var lives = 0;

        var booool = false;

        // The delay between enemies (in milliseconds)
        var timeBetweenEnemies = 5 * 1000;
        var timeBetweenPowers = 25 * 1000;
        // ID to track the spawn timeout
        var enTimeoutId = null;
        var powTimeoutId = null;

        // Show the game menu and instructions
        function menu() {
            erase();
            context.fillStyle = '#000000';
            context.font = '36px Arial';
            context.textAlign = 'center';
            context.fillText('Arcade Shooter', canvas.width / 2, canvas.height / 4);
            context.font = '24px Arial';
            context.fillText('Click to Start', canvas.width / 2, canvas.height / 2);
            context.font = '18px Arial';
            context.fillText('Up/Down to move, Space to shoot.', canvas.width / 2, (canvas.height / 4) * 3);
            context.font = '16px Arial';
            context.fillText('Collect Power Ups (Green), Avoid or Shoot Enemies (Red)', canvas.width / 2, (canvas.height / 8) * 7);
            // Start the game on a click
            canvas.addEventListener('click', startGame);
        }

        // Start the game
        function startGame() {
            // Kick off the enemy spawn interval
            
            canvas.addEventListener('keydown', startGame);
            canvas.removeEventListener('click', startGame);

            enTimeoutId = setInterval(makeEnemy, timeBetweenEnemies);
            powTimeoutId = setInterval(makePowerUp, timeBetweenPowers);
            // Make the first enemy
            setTimeout(makeEnemy, 1000);
            setTimeout(makePowerUp, 7000);
            // Kick off the draw loop
            draw();
            // Stop listening for click events
            canvas.removeEventListener('click', startGame);
        }

        // Show the end game screen
        function endGame() {
            // Stop the spawn interval
            clearInterval(enTimeoutId);
            clearInterval(powTimeoutId);
            // Show the final score
            erase();
            context.fillStyle = '#000000';
            context.font = '24px Arial';
            context.textAlign = 'center';
            context.fillText('Game Over. Final Score: ' + score, canvas.width / 2, canvas.height / 2);
            //return score;
            if (score == -1){
                    score++;
            }
            try{
                let http = new XMLHttpRequest();
                http.onreadystatechange = () => {
                    if (http.readyState == 4) {
                        if (http.status === 200) {
                        let data = JSON.parse(http.responseText);
                        console.log("received data", data);
                        flash(data.message, "success");
                        }
                        console.log(http);
                    }
                }
                http.open("POST", "api/save_score.php", true);
                http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                http.send(`score=${score}`);
                flash("New Score added successfully to your records.", "success");
            }
            catch{
                flash("Error while adding new score to your records. New Score not addes to records.", "warning");
            }
        }

        // Listen for keydown events
        window.addEventListener('keydown', function(event) {
        event.preventDefault();
        if (event.keyCode === 38) { // UP
            up = true;
        }
        if (event.keyCode === 40) { // DOWN
            down = true;
        }
        if (event.keyCode === 32) { // SPACE
            shoot();
        }
        });

        // Listen for keyup events
        window.addEventListener('keyup', function(event) {
        event.preventDefault();
        if (event.keyCode === 38) { // UP 
            up = false;
        }
        if (event.keyCode === 40) { // DOWN
            down = false;
        }
        });

        // Clear the canvas
        function erase() {
            context.fillStyle = '#FFFFFF';
            context.fillRect(0, 0, 600, 400);
        }

        // Shoot the bullet (if not already on screen)
        function shoot() {
            //if (!shooting) {
                shooting = true;
                bullet.x = ship.x + ship.l;
                bullet.y = ship.y + ship.l / 2;
        //}
        }

        // The main draw loop
        function draw() {
            erase();
            var gameOver = false;
            // Move and draw the enemies and powers
            enemies.forEach(function(enemy) {
                enemy.x -= enemy.s;
                if (enemy.x == 0)
                {
                  //gameOver = true;
                  score--;
                  if (score == -1){
                    score++;
                    gameOver = true;
                  }
                }
                context.fillStyle = '#FF0000';
                enemy.draw();
              }
            )
            powers.forEach(function(power) {
                  power.x -= power.s;
                  context.fillStyle = '#00FF00';
                  power.draw();
              }
        );

        // Collide the ship with enemies and powers
        
        enemies.forEach(function(enemy, i) {
            if (isColliding(enemy, ship)) {
                if(!ship.ht){
                    ship.ht = true;
                    enemies.splice(i, 1);
                    lives--;
                }

                if (lives == -1){
                    gameOver = true;
                }

                ship.ht = false;
            }
        });

        powers.forEach(function(power, i) {
            if (isColliding(power, ship)) {
              //PowerUp effects: Increase in ship speed, bullet size and bullet speed
              powers.splice(i, 1);
              lives++;
              /*shpSpeed*=2;
              bl += 10;
              bs += 10;*/
              ship.s++;
              bullet.l+=2;
              bullet.s+=2;
            }
        });
        
        // Collide the bullets with powers
        powers.forEach(function(power, i) {
            if (isColliding(bullet, power)) {
              //PowerUp effects: Increase in ship speed, bullet size and bullet speed
              powers.splice(i, 1);
              lives++;
              shooting = false;
              ship.s++;
              bullet.l+=2;
              bullet.s+=2;
              score++;
            }
        });

        // Move the ship
        if (down) {
            ship.y += ship.s;
        }
        if (up) {
            ship.y -= ship.s;
        }
        // Don't go out of bounds
        if (ship.y < 0) {
            ship.y = 0;
        }
        if (ship.y > canvas.height - ship.l) {
            ship.y = canvas.height - ship.l;
        }
        // Draw the ship
        context.fillStyle = '#00B3FF';
        ship.draw();
        // Move and draw the bullet
        if (shooting) {
            // Move the bullet
            bullet.x += bullet.s;
            // Collide the bullet with enemies
            enemies.forEach(function(enemy, i) {
            if (isColliding(bullet, enemy)) {
                enemies.splice(i, 1);
                score++;
                shooting = false;
                // Make the game harder
                if (score % 10 === 0 && timeBetweenEnemies > 1000 && timeBetweenPowers > 5000)
                {
                  clearInterval(enTimeoutId);
                  clearInterval(powTimeoutId);
                  timeBetweenEnemies -= 1000;
                  timeBetweenPowers -= 5000;
                  enTimeoutId = setInterval(makeEnemy, timeBetweenEnemies);
                  powTimeoutId = setInterval(makePowerUp, timeBetweenPowers);
                }
                else if (score % 5 === 0) {
                  enemyBaseSpeed += 1;
                  powerBaseSpeed += 1;
                }
            }
            });
            // Collide with the wall
            if (bullet.x > canvas.width) {
            shooting = false;
            }
            // Draw the bullet
            context.fillStyle = '#0000FF';
            bullet.draw();
        }
        // Draw the score
        context.fillStyle = '#000000';
        context.font = '24px Arial';
        context.textAlign = 'left';
        context.fillText('Score: ' + score + "\tLives: " + lives , 1, 25)
        if (gameOver) {
            if (score == -1){
                score++;
            }
            endGame();
        } else {
            window.requestAnimationFrame(draw);
        }
        }

        // Start the game
        menu();
        canvas.focus();
    </script>
</body>

</html>
