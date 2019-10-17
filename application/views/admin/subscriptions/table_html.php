<?php defined('BASEPATH') or exit('No direct script access allowed');
$table_data = array(
  array(
    'name'=>_l('the_number_sign'),
    'th_attrs'=>array('class'=>'toggleable', 'id'=>'th-id')
  ),
  array(
    'name'=>_l('subscription_name'),
    'th_attrs'=>array('class'=>'toggleable', 'id'=>'th-subscription-name')
  ),
  array(
    'name'=>_l('monthly costs'),
    'th_attrs'=>array('class'=>'toggleable', 'id'=>'th-monthly_costs')
  ),
  array(
    'name'=>_l('subscription_status'),
    'th_attrs'=>array('class'=>'toggleable', 'id'=>'th-status')
  ),
  array(
    'name'=>_l('date_subscribed'),
    'th_attrs'=>array('class'=>'toggleable', 'id'=>'th-date-subscribed')
  ),
);
render_datatable($table_data,'subscriptions',
  array(),
  array(
    'id'=>'table-subscriptions',
    'data-url'=>$url,
    'data-last-order-identifier' => 'subscriptions',
    'data-default-order'         => get_table_last_order('subscriptions'),
  ));

hooks()->add_action('app_admin_footer', function(){
  ?>
    <script>
    $(function(){
      var SubscriptionsServerParams = {};
      $.each($('._hidden_inputs._filters input'),function(){
        SubscriptionsServerParams[$(this).attr('name')] = '[name="'+$(this).attr('name')+'"]';
      });
      var url = $('#table-subscriptions').data('url');
      // console.log(SubscriptionsServerParams);
      initDataTable('.table-subscriptions', url, undefined, undefined, SubscriptionsServerParams, <?php //echo hooks()->apply_filters('subscriptions_table_default_order', json_encode(array(5,'desc'))); ?>);
    });
  </script>
  <?php
});
?>