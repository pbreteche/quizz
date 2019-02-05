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

<p><?= $data['title'] ?></p>
<ul>
    <li><?= $data['good_choice'] ?></li>
    <li><?= $data['bad_choice_1'] ?></li>
    <li><?= $data['bad_choice_2'] ?></li>
</ul>
</body>
</html>