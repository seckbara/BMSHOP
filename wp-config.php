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
define('DB_NAME', 'bmshop');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'mamadou');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'u+g.!<3&fvPoeYY{#c2^`W.8|_TdN@BbsxU$K)#(@kCOZ#Gr_AX ~M%Xjhp$e8;T');
define('SECURE_AUTH_KEY',  '):I3)OEMCEW7(z6jbPF;;+S*B;DF8VD;?qV5V*,G] 1fSv#{YP>+04g>1H*Z+@uz');
define('LOGGED_IN_KEY',    'C#}^HGm$nz33-x]G;7$Qy^pJz(/@LKl<-v`6k&N.:a71,b7JH$;2:7;am9_tn]S7');
define('NONCE_KEY',        'PDr]AuWs2:f8gIaLKzgcop6p!vD-^M #v^4q$8mVN1W&{D^(2.FiCld=!>X;<`]G');
define('AUTH_SALT',        'r&n}N!s2w}_tNtqeh{Nz@;]UCor2G<HxI/=*J>qR]?lqPi(:vFz@vn]#be.v.oCB');
define('SECURE_AUTH_SALT', 'Qh<-Ek%,?k:vP^m$@2r$;DM{jor`w/sFQ$mbGo4UQ*k&t2/]4QDLC6w-Tb/ jioV');
define('LOGGED_IN_SALT',   '%_Q-(b|}0$K(T 2XPTXy.t,Fz1  79ZMpmo$Lr+F&ZGygcusBgA#)82!ma?on]lk');
define('NONCE_SALT',       'f&f#%})3{q$Vh2nkS7/6dChTP*UFBmF8cK%zqS@^>JI@]Ou GMJX{Q=TPJjoul_I');
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
