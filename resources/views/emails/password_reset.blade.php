<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>R&eacute;initialisation du  mot de passe de {{ $passwordResetDetails['email'] }}</h2>
    <p>Vous recevez ce mail à la suite d'une demande de r&eacute;initialisation d votre mot de passe sur la plateforme LaraBlog</p>
    <p>Clicquez sur le lien ci-dessous et suivez les étapes indiquées :</p>
    <a  href="http://blog_laravel.test/password/reset/{{ $passwordResetDetails['token'] }}">
        http://blog_laravel.test/password/reset/{{ $passwordResetDetails['token'] }}
    </a>
    <p>Ce lien de réinitialisation de mot de passe va expirer dans 30 minutes !</p>
    <p>Cordialement,</p>
    <p>LaraBlog</p>
</body>
</html>
