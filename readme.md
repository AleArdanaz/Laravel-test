Correr composer install para instalar carpeta vendor y archivo .env.

-php artisan migrate

-php artisan db:seed para crear los usuarios y los servicios

-Las rutas api son : localhost:8000/api/subscription (POST) para crear la suscripcion y localhost:8000/api/cancelsubscription/{id} (PUT) para cancelar la subscripcion.
Cancelar la suscripcion le da el status "cancel" a la suscripcion activa que fue creada. El status active en una suscripcion es por defecto cuando se crea. 
Para crear la suscripcion hay que mandar 2 parametros: user_id y servicio_id.
(Se pueden probar en Postman, no hice nada de view/front-end)

php artisan subscriptions:list (YYYY-MM-DD) comando para ver las suscripciones hechas.
