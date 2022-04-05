<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-12-07 05:07:57 --> 404 Page Not Found: Images/customer
ERROR - 2021-12-07 05:07:58 --> 404 Page Not Found: Images/customer
ERROR - 2021-12-07 05:07:58 --> 404 Page Not Found: Service-workerjs/index
ERROR - 2021-12-07 05:08:05 --> 404 Page Not Found: Css/images
ERROR - 2021-12-07 05:16:20 --> 404 Page Not Found: Admin/agent
ERROR - 2021-12-07 05:16:26 --> 404 Page Not Found: Service-workerjs/index
ERROR - 2021-12-07 05:16:38 --> 404 Page Not Found: Agent/img
ERROR - 2021-12-07 05:16:38 --> 404 Page Not Found: Agent/service-worker.js
ERROR - 2021-12-07 05:16:55 --> 404 Page Not Found: Agent/service-worker.js
ERROR - 2021-12-07 05:18:02 --> 404 Page Not Found: Agent/img
ERROR - 2021-12-07 05:18:02 --> 404 Page Not Found: Agent/service-worker.js
ERROR - 2021-12-07 05:18:29 --> Query error: Unknown column 'service' in 'where clause' - Invalid query: SELECT * from product_details where id=service-worker.js and status !='Deleted' 
ERROR - 2021-12-07 05:19:48 --> 404 Page Not Found: Images/customer
ERROR - 2021-12-07 05:19:48 --> 404 Page Not Found: Images/customer
ERROR - 2021-12-07 05:19:48 --> 404 Page Not Found: Service-workerjs/index
ERROR - 2021-12-07 05:19:49 --> 404 Page Not Found: Service-workerjs/index
ERROR - 2021-12-07 05:21:10 --> 404 Page Not Found: Service-workerjs/index
ERROR - 2021-12-07 05:21:20 --> 404 Page Not Found: Agent/img
ERROR - 2021-12-07 05:21:20 --> 404 Page Not Found: Agent/service-worker.js
ERROR - 2021-12-07 05:21:30 --> 404 Page Not Found: Service-workerjs/index
ERROR - 2021-12-07 05:21:56 --> 404 Page Not Found: Images/customer
ERROR - 2021-12-07 05:21:56 --> 404 Page Not Found: Images/customer
ERROR - 2021-12-07 05:21:56 --> 404 Page Not Found: Service-workerjs/index
ERROR - 2021-12-07 05:21:58 --> 404 Page Not Found: Service-workerjs/index
ERROR - 2021-12-07 05:22:16 --> 404 Page Not Found: Service-workerjs/index
ERROR - 2021-12-07 05:23:11 --> 404 Page Not Found: Service-workerjs/index
ERROR - 2021-12-07 07:28:12 --> 404 Page Not Found: Dmin/index
ERROR - 2021-12-07 07:38:03 --> 404 Page Not Found: Images/customer
ERROR - 2021-12-07 07:38:04 --> 404 Page Not Found: Images/customer
ERROR - 2021-12-07 07:38:04 --> 404 Page Not Found: Service-workerjs/index
ERROR - 2021-12-07 07:38:16 --> 404 Page Not Found: Css/images
ERROR - 2021-12-07 09:19:03 --> 404 Page Not Found: Js/admin
ERROR - 2021-12-07 09:19:03 --> 404 Page Not Found: Js/admin
ERROR - 2021-12-07 09:19:03 --> 404 Page Not Found: Css/admin
ERROR - 2021-12-07 09:19:06 --> 404 Page Not Found: Css/images
ERROR - 2021-12-07 09:19:06 --> 404 Page Not Found: Css/admin
ERROR - 2021-12-07 09:19:06 --> 404 Page Not Found: Js/admin
ERROR - 2021-12-07 09:19:06 --> 404 Page Not Found: Js/admin
ERROR - 2021-12-07 09:23:26 --> 404 Page Not Found: Css/images
ERROR - 2021-12-07 09:23:26 --> 404 Page Not Found: Css/admin
ERROR - 2021-12-07 09:23:26 --> 404 Page Not Found: Js/admin
ERROR - 2021-12-07 09:23:26 --> 404 Page Not Found: Js/admin
ERROR - 2021-12-07 09:27:45 --> 404 Page Not Found: Css/images
ERROR - 2021-12-07 09:27:45 --> 404 Page Not Found: Css/admin
ERROR - 2021-12-07 09:27:45 --> 404 Page Not Found: Js/admin
ERROR - 2021-12-07 09:27:45 --> 404 Page Not Found: Js/admin
ERROR - 2021-12-07 09:28:19 --> Query error: Table 'gravigw4_adis.customer_details' doesn't exist - Invalid query: SELECT id,user_id,first_name,last_name,date_of_joining from customer_details where status != 'Deleted'  order by created_on desc limit 5
ERROR - 2021-12-07 09:34:32 --> Query error: Table 'gravigw4_adis.agent_details' doesn't exist - Invalid query: SELECT
		(SELECT COUNT(*) FROM agent_details WHERE status !='Deleted') as agents, 
		(SELECT COUNT(*) FROM customer_details WHERE status !='Deleted') as customers,
		(SELECT COUNT(*) FROM order_details WHERE status !='Deleted') as orders,
		(SELECT COUNT(*) FROM customer_details WHERE status !='Deleted' and created_by='guest')as unregistered_customer
ERROR - 2021-12-07 09:36:13 --> Severity: Notice --> Undefined variable: dash_count C:\xampp\htdocs\adis\application\views\admin\dashboard.php 19
ERROR - 2021-12-07 09:36:13 --> Severity: Notice --> Trying to get property 'customers' of non-object C:\xampp\htdocs\adis\application\views\admin\dashboard.php 19
ERROR - 2021-12-07 09:36:13 --> Severity: Notice --> Undefined variable: dash_count C:\xampp\htdocs\adis\application\views\admin\dashboard.php 34
ERROR - 2021-12-07 09:36:13 --> Severity: Notice --> Trying to get property 'agents' of non-object C:\xampp\htdocs\adis\application\views\admin\dashboard.php 34
ERROR - 2021-12-07 09:36:13 --> Severity: Notice --> Undefined variable: dash_count C:\xampp\htdocs\adis\application\views\admin\dashboard.php 49
ERROR - 2021-12-07 09:36:13 --> Severity: Notice --> Trying to get property 'unregistered_customer' of non-object C:\xampp\htdocs\adis\application\views\admin\dashboard.php 49
ERROR - 2021-12-07 09:36:13 --> Severity: Notice --> Undefined variable: dash_count C:\xampp\htdocs\adis\application\views\admin\dashboard.php 64
ERROR - 2021-12-07 09:36:13 --> Severity: Notice --> Trying to get property 'orders' of non-object C:\xampp\htdocs\adis\application\views\admin\dashboard.php 64
ERROR - 2021-12-07 09:36:13 --> Severity: Notice --> Undefined variable: customer_list C:\xampp\htdocs\adis\application\views\admin\dashboard.php 84
ERROR - 2021-12-07 09:36:13 --> Severity: Notice --> Undefined variable: order_list C:\xampp\htdocs\adis\application\views\admin\dashboard.php 128
ERROR - 2021-12-07 09:36:13 --> Severity: Notice --> Undefined variable: agent_list C:\xampp\htdocs\adis\application\views\admin\dashboard.php 175
ERROR - 2021-12-07 09:36:13 --> Severity: Notice --> Undefined variable: order_list C:\xampp\htdocs\adis\application\views\admin\dashboard.php 242
ERROR - 2021-12-07 09:36:13 --> 404 Page Not Found: Css/admin
ERROR - 2021-12-07 09:36:13 --> 404 Page Not Found: Css/images
ERROR - 2021-12-07 09:36:14 --> 404 Page Not Found: Js/admin
ERROR - 2021-12-07 09:36:14 --> 404 Page Not Found: Js/admin
ERROR - 2021-12-07 09:37:31 --> Severity: Notice --> Undefined variable: customer_list C:\xampp\htdocs\adis\application\views\admin\dashboard.php 84
ERROR - 2021-12-07 09:37:31 --> Severity: Notice --> Undefined variable: order_list C:\xampp\htdocs\adis\application\views\admin\dashboard.php 128
ERROR - 2021-12-07 09:37:31 --> Severity: Notice --> Undefined variable: agent_list C:\xampp\htdocs\adis\application\views\admin\dashboard.php 175
ERROR - 2021-12-07 09:37:31 --> Severity: Notice --> Undefined variable: order_list C:\xampp\htdocs\adis\application\views\admin\dashboard.php 242
ERROR - 2021-12-07 09:37:32 --> 404 Page Not Found: Css/images
ERROR - 2021-12-07 09:38:20 --> Severity: Notice --> Undefined variable: order_list C:\xampp\htdocs\adis\application\views\admin\dashboard.php 242
ERROR - 2021-12-07 09:38:20 --> 404 Page Not Found: Css/images
ERROR - 2021-12-07 09:48:10 --> 404 Page Not Found: Css/images
ERROR - 2021-12-07 09:48:15 --> 404 Page Not Found: Css/images
ERROR - 2021-12-07 09:48:29 --> Query error: Table 'gravigw4_adis.order_details' doesn't exist - Invalid query: SELECT id,customer_id,order_time,order_total,payment_type,delivery_type,items,area,status,parent_id,agent_id,created_by from order_details where status != 'Deleted'  order by created_on desc limit 100
ERROR - 2021-12-07 10:08:57 --> Query error: Table 'gravigw4_adis.cart_details' doesn't exist - Invalid query: SELECT id FROM `cart_details` where user_id='1'
ERROR - 2021-12-07 10:09:08 --> Severity: error --> Exception: Class 'UserAuthController' not found C:\xampp\htdocs\adis\application\controllers\AdminController.php 4
ERROR - 2021-12-07 10:21:01 --> Severity: error --> Exception: Class 'UserAuthController' not found C:\xampp\htdocs\adis\application\controllers\AdminController.php 4
ERROR - 2021-12-07 10:21:02 --> Severity: error --> Exception: Class 'UserAuthController' not found C:\xampp\htdocs\adis\application\controllers\AdminController.php 4
ERROR - 2021-12-07 10:21:33 --> Severity: error --> Exception: Class 'UserAuthController' not found C:\xampp\htdocs\adis\application\controllers\AdminController.php 4
ERROR - 2021-12-07 10:21:34 --> Severity: error --> Exception: Class 'UserAuthController' not found C:\xampp\htdocs\adis\application\controllers\AdminController.php 4
ERROR - 2021-12-07 10:22:02 --> Severity: error --> Exception: Class 'userauth_controller' not found C:\xampp\htdocs\adis\application\controllers\AdminController.php 4
ERROR - 2021-12-07 10:22:57 --> 404 Page Not Found: Css/images
ERROR - 2021-12-07 10:23:22 --> 404 Page Not Found: Js/admin
ERROR - 2021-12-07 10:23:22 --> 404 Page Not Found: Js/admin
ERROR - 2021-12-07 10:23:22 --> 404 Page Not Found: Css/admin
ERROR - 2021-12-07 10:46:45 --> 404 Page Not Found: Css/images
ERROR - 2021-12-07 10:46:45 --> 404 Page Not Found: Js/admin
ERROR - 2021-12-07 10:46:45 --> 404 Page Not Found: Js/admin
ERROR - 2021-12-07 10:46:45 --> 404 Page Not Found: Css/admin
ERROR - 2021-12-07 10:48:44 --> 404 Page Not Found: Css/images
ERROR - 2021-12-07 10:48:44 --> 404 Page Not Found: Css/admin
ERROR - 2021-12-07 10:48:44 --> 404 Page Not Found: Js/admin
ERROR - 2021-12-07 10:48:44 --> 404 Page Not Found: Js/admin
ERROR - 2021-12-07 10:55:58 --> 404 Page Not Found: Css/admin
ERROR - 2021-12-07 10:55:58 --> 404 Page Not Found: Css/images
ERROR - 2021-12-07 10:55:58 --> 404 Page Not Found: Js/admin
ERROR - 2021-12-07 10:55:58 --> 404 Page Not Found: Js/admin
ERROR - 2021-12-07 10:56:02 --> 404 Page Not Found: Css/admin
ERROR - 2021-12-07 10:56:02 --> 404 Page Not Found: Css/images
ERROR - 2021-12-07 10:56:02 --> 404 Page Not Found: Js/admin
ERROR - 2021-12-07 10:56:02 --> 404 Page Not Found: Js/admin
ERROR - 2021-12-07 11:00:19 --> 404 Page Not Found: Css/admin
ERROR - 2021-12-07 11:00:19 --> 404 Page Not Found: Css/images
ERROR - 2021-12-07 11:00:19 --> 404 Page Not Found: Js/admin
ERROR - 2021-12-07 11:00:19 --> 404 Page Not Found: Js/admin
ERROR - 2021-12-07 11:00:25 --> 404 Page Not Found: Admin/hj
ERROR - 2021-12-07 11:00:48 --> 404 Page Not Found: Admin/gjj
ERROR - 2021-12-07 11:02:03 --> 404 Page Not Found: Admin/gjj
ERROR - 2021-12-07 11:02:04 --> 404 Page Not Found: Admin/gjj
ERROR - 2021-12-07 11:02:07 --> 404 Page Not Found: Admin/gjj
