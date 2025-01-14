=== MkRapel Provincias y Ciudades de Argentina para WC ===
Contributors: Marketing Rapel
Tags: woocommerce, argentina, comunas, wordpress, checkout, ar, currency, tienda, envios, despachos, php, wc, mkrapel, marketing rapel, marketing, rapel, regiones, states, argentina states, city, cities
Requires at least: 5.0
Requires PHP: 5.6 or greater
Tested up to: 5.4
Stable tag: 5.4
MySQL: 5.6 or greater
License: GPLv3

== Description ==

Plugin con las Provincias y Ciudades de Argentina actualizado al 2020, permitiendo usar las ciudades para establecer las Zonas de Despacho en la sección de Envíos de WooCommerce. Retira campos de Código Postal y Línea 2 de la Dirección en el CheckOut, junto con nueva distribución visible.

= País Soportado =
 * Argentina
 
= Zonas de Envío =
Como hemos cambiado el orden de los campos en el CheckOut habitual de WooCommerce, ahora puedes establecer tus zonas de despacho según las Ciudades dentro de la Argentina, permitiendo valores de despacho diferentes entre cada Ciudad, ya sea por cercanía a la tienda o por cualquier otra variable que tú desees.
 
= Actualización v3.5 para Provincia de Buenos Aires =
Para el caso de la Provincia de Buenos Aires, hemos agregado las Localidades que presentan cada uno de los Partidos, quedando de la siguiente forma como apoyo a las Zonas de Envíos:

- Formato Partido: "Alberti"
- Formato Localidad: "Adrogué (Almirante Brown)"

== Installation ==

Para instalar el plugin realice los siguientes pasos:

1. Descargue el plugin 'mkrapel-provincias-ciudades-argentina.zip'.
2. Ingrese a su sitio web y suba el Plugin 'mkrapel-provincias-ciudades-argentina.zip' en la opción Plugins > Agregar Nuevo.
3. Active el plugin a través del menú 'Plugins' en WordPress.

Puedes buscar este plugin directamente en el repositorio de WordPress desde la sección Pugins > Agegar Nuevo, haciendo click en Instalar y luego en Activar para poder usarlo.

= Configuración en WooCommerce =

1. Ingresar a WooCommerce > Ajustes > Envios.
2. Agregar una nueva "Zona de Envío".
3. Completar con los datos solicitados y al momento de seleccionar en "Añadir método de envío" se debe seleccionar la opción "Envío por Ciudad AR", quedando con el título "Despacho a Domicilio AR".
4. Editar Método de Envio "Despacho a Domicilio AR" para agregar las ciudades de la Provincia que estarán con sus respectivos valores de despacho.
5. Seleccionar las ciudades que tendrán valores de despacho según la Provincia seleccionada e ingresada como Zona de Envío principal, recuerda mantener en No la opción de Método de Envío Único por si deseas agregar nuevos métodos de envío a la misma Provincia.
6. Disfruta del plugin.

== Frequently Asked Questions ==

= ¿Cuenta con el listado de las Ciudades de Argentina? =
Para el desarrollo de este plugin fue utilizada la información disponible en los registros de la data disponible por el Gobierno de Argentina.

= ¿Cuenta con el listado de las Provincias de Argentina? =
Para el desarrollo de este plugin fue utilizada la información disponible en los registros de la data disponible por el Gobierno de Argentina.

== Screenshots ==

1. CheckOut con el Plugin instalado y activo.
2. Desglose de las Provincias de Argentina al 2020 con filtro.
3. Desglose de las Ciudades de Argentina al 2020 con filtro.
4. Zonas de Envío establecida para la ciudad seleccionada.
5. Cambio de tipo de envío según la opción seleccionada.
6. Zonas de Envío en WooCommerce.
7. Configuración de la Zona de Envío según Provincia y seleccionando el método "Envío por Ciudad AR".
8. Zona de Envío con el Método "Despacho a Domicilio AR".
9. Configuración del Método "Despacho a Domicilio AR".
10. Ciudades disponibles según la Provincia seleccionada e ingresada como Zona de Envío principal.

== Changelog ==

= v3.5 - 11.09.2020 =
* Setting: Ajuste General en el código del plugin
* Setting: Incorporación de las Localidades de la Provincia de Buenos Aires
* Setting: Configuración para WooCommerce
* Setting: Compatibilidad con WooCommerce
* Tested: Pruebas en WordPress
* Tested: Pruebas en WooCommerce
* Fixed: Zonas de Despacho en CheckOut y Carro de Compra

= v3.0 - 24.08.2020 =
* Setting: Ajuste General en el código del plugin
* Setting: Incorporación de las Provincias/Regiones/Departamentos
* Setting: Incorporación de los Distritos/Ciudades/Municipios
* Setting: Configuración para WooCommerce
* Setting: Compatibilidad con WooCommerce
* Tested: Pruebas en WordPress
* Tested: Pruebas en WooCommerce
* Fixed: Zonas de Despacho en CheckOut y Carro de Compra