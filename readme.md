


## About Restaurant Manager

An app for restaurant management.  Including POS app and stock management.

Developed for "Jong's Latin Fusion" Restaurant and open sourced at their request.  This app is still very much under development.


## Push Notifications

This allows realtime alerts on the app.

Create a pusher.com subscription and create an app.  Add the credentials to:
**config/pusher.php:**

    <?php  
    return [  
      'key' => '<app_key>',  
      'secret' => '<app_secret>',  
      'app_id' => '<app_id>',  
      'cluster' => '<app_cluster>',  
      'channel' => '<channel_string>',  
      'events' => [  
	      'order_received' => 'order_received'  
      ]  
    ];
**resources/js/web-app/config/pusher.js**

    export default {  
        key: "<app_key>",  
        cluster: "<app_cluster>",  
        channel: '<channel_string>',  
        events: {  
            order_received: 'order_received'  
      }  
    };

## POS app ui components

The vue component libraries used both in the web app app and the phone/tablet apps can be found at:

[restaurant-manager-vue-order-library](https://github.com/Nicholas-Westley/restaurant-manager-vue-order-library)
[restaurant-manager-vue-chef-library](https://github.com/Nicholas-Westley/restaurant-manager-vue-chef-library)


## License

Restaurant Manager is licensed under the [MIT license](https://opensource.org/licenses/MIT).
