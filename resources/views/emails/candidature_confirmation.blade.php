<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de candidature</title>
</head>
<body>
    <div class="mail-content">
        <p>Merci pour votre candidature!</p>
        <p>Nous avons bien reçu votre candidature pour l'offre {{ $offre->titre }}.</p>
        <p>Nous vous contacterons dès que possible.</p>
        <br>
        <p>Cordialement,</p>
        <p>L'équipe de {{ config('app.name') }}</p>
    </div>
</body>
</html>
