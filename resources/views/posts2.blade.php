<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #aadbf7;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .post {
            margin-bottom: 20px;
        }
        .post h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }
        .post img {
            max-width: 10%;
            height: auto;
            margin-bottom: 15px;
        }
        .post p {
            font-size: 16px;
            line-height: 1.6;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Posts✨</h1>

        <div class="post">
            <h2>Rose</h2>
            <img src="{{ asset('images/gambar2.jpeg') }}" alt="Gambar Postingan 1">
            <p>Ready to hang out and have some fun! 🎉 Whether it's grabbing coffee with friends, 
                exploring new places, or simply enjoying each other's company, I'm looking forward 
                to a fantastic time ahead. Let's make memories and cherish every moment together! 🌟 
                #HangOut #Friends #GoodTimes</p>
        </div>

        <div class="post">
            <h2>Lisa</h2>
            <img src="{{ asset('images/gambar3.jpeg') }}" alt="Gambar Postingan 2">
            <p>To truly thrive, we must learn to quiet the chaos within. Excited to attend the grand 
                opening of the new coffee shop! ☕️✨ It's not just about the delicious brews and cozy 
                ambiance, but also about celebrating a dream turned into reality. Can't wait to be a part 
                of this special moment and toast to success with great coffee and even better company! 🎉 
                #GrandOpening #CoffeeShop #Celebration</p>
        </div>

    </div>
</body>
</html>