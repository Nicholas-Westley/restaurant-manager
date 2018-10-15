

## About Restaurant Manager

Developed for "Jong's Latin Fusion" Restaurant and open sourced at their request.  This app is still very much under development.

An app for front and back of house communication in a restaurant.  Especially useful if staff speak different languages

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
        key: "4cf4abf2413c0c3719ac",  
        cluster: "ap1",  
        channel: 'jongs',  
        events: {  
            order_received: 'order_received'  
      }  
    };



## License

Restaurant Manager is licensed under the [MIT license](https://opensource.org/licenses/MIT).
