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
define('DB_NAME', 'ln20358_Intra');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'cyaniss');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'aUw4u1@1');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost:3306');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '<H?;RpA:0Z<-X$ ]n!80Yx+))*25xduni!LpSBgQ5Rkq@.6HKDhvf-@88D<:R(wp');
define('SECURE_AUTH_KEY',  'D88]X76QoE*O4}|NDZ1jZ0th6WMPZr*=*@rba/B+~~b>|%TeF.H9KN`KE>|u_m]o');
define('LOGGED_IN_KEY',    'nR^Usz_3q])m+kI)JO,h%}10Mc=ft4YR0_$wHv0%:$op/-Ia2p/qE%6V(9X*Jan6');
define('NONCE_KEY',        '>c-br=%p]>0-{!:b,hkG&=+6S9OY^cF@%U^6HJ_xa>qPeO}h.)~?5-.s+0#:Iden');
define('AUTH_SALT',        'enDP..9qCo?iZsdii2$oto{u8WEYUH&]RBw+u?7*B&dA?o5%tw5NnsOXKT n:O*G');
define('SECURE_AUTH_SALT', '7mKQleV,[:kl0ybW N9*AfG%LO,}{%mtPWpvr[S%MyE>&xUI)o<UTZ}z-5@(]#M]');
define('LOGGED_IN_SALT',   'kgtjt] sUpol1nNU%_gc)[xO4=w;S?B;$7.cg86 +CuS_.;C8yq2T2])JopR~+/4');
define('NONCE_SALT',       'X_6&v2BP28h7QgWw!g5GXJ7M,,i1aXRvQ6DD~A+:g)}<bQn-~}jPSs~ix2qI:xl2');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

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

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');