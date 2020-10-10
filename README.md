# API Bilemo - P7
</br>
Création d'une API pour l'entreprise BileMo qui propose un catalogue de téléphone mobile, dans le cadre de la formation OpenClassroom Développeur d'application - PHP/Symfony.</br>
</br>
<H2> Installation </h2>
</br>
<code>git clone https://github.com/nixehooked/Bilemo.git</code></br>
</br>
Installer les dépendances :</br>
</br>
<code>composer install</code></br>
</br>
Créer la base de données :</br>
</br>
<code>php bin/console doctrine:database:create</code></br>
</br>
Créer les tables (Modifier votre base de données dans le .env) :</br>
</br>
<code>php bin/console doctrine:schema:create</code></br>
</br>
Installer la Fixture (démo de données fictives) :</br>
</br>
<code>php bin/console doctrine:fixture:load</code></br>
</br>
URL de la documentation :</br>
</br>
<code>http://127.0.0.1:8000/api</code></br>
</br>
Tester les requêtes avec un compte Client :</br>
</br>
<code>login: bilemo@gmail.com

password: admin</code>
