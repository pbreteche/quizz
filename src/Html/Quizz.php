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

<h2><?= $data['question']->getTitle() ?></h2>

<form method="post">
    <?php $choices = $data['question']->getChoices() ?>
    <?php for ($i=0; $i < count($choices); $i++): ?>
    <div class="response">
        <input type="radio" name="response" value="<?= $choices[$i]['good'] ? 'good' : 'bad'?>" id="response_<?= $i ?>" />
        <label for="response_good"><?= $choices[$i]['label'] ?></label>
    </div>
    <?php endfor; ?>
    <button>Go!</button>
</form>
</body>
</html>