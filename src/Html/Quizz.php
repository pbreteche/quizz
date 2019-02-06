<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<h1>Question</h1>

<h2><?= $data['title'] ?></h2>

<form method="post">
    <div class="response">
        <input type="radio" name="response" value="good" id="response_good" />
        <label for="response_good"><?= $data['good_choice'] ?></label>
    </div>
    <div class="response">
        <input type="radio" name="response" value="bad" id="response_bad_1" />
        <label for="response_bad_1"><?= $data['bad_choice_1'] ?></label>
    </div>
    <div class="response">
        <input type="radio" name="response" value="bad" id="response_bad_2" />
        <label for="response_bad_2"><?= $data['bad_choice_2'] ?></label>
    </div>
    <button>Go!</button>
</form>
</body>
</html>