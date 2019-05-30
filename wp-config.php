<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wordPressTest' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'I(BZ*G$L6:K %Fj5)?pm,IF:R Tq-(;Rv8t[ziDXw{Goh5`@eeo+S~vqaz3sk:h2' );
define( 'SECURE_AUTH_KEY',  'gEYtu)u,=zRk:]SKqI`&~b%?{gg9%aDWE1s1j_+.Rc:,HRX.P7SiB[rlYRqkvIL|' );
define( 'LOGGED_IN_KEY',    '6R>(x/9GiXR%Im2%B<w16g!&: :br(N}+C[gmGvbj18Eqi9>?LxI<pb,KPNvm{_.' );
define( 'NONCE_KEY',        'u;/hg;^/|z$@{rO1a/ kzT)+~BiCn!2NAw$)]gn#LMs]/u%9uq%>}%8uK.lUqQv7' );
define( 'AUTH_SALT',        'I6Qu:%BrtV.3TV)+Vhx~Bf.*1]B|bGS<4qG38b<`yLl[_^kyL9 3kugm{T!b[/GB' );
define( 'SECURE_AUTH_SALT', 'yaC#Xc)L MG :_IR1WDZ:KwNjo=q.uN}R7){>6x1v}ys8(GMuC>TGOe)u 8>]@mP' );
define( 'LOGGED_IN_SALT',   'APti0jHLct2<JP=^&5qp77msPuJBbdc(^19.4g|JKo >xf&X}ir`uBo5CEk]qmNP' );
define( 'NONCE_SALT',       'j|$VIbz@&ra8?#Y6lbmi?%Yec2/FfMN|ddRAfv(43&S?@[X_eb~b^aVbY48`mu#o' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
