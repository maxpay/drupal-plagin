-- SUMMARY --

This module is intended to provide MaxPay payment transactions for Drupal Commerce 7.x.
Module is redirecting customer to https://hpp.maxpay.com/hpp where the payment is actually done.
Payment type is set via https://maxpay.com account according to your needs.


-- REQUIREMENTS --

xautoload module (https://www.drupal.org/project/xautoload)


-- INSTALLATION --

* Install as usual, see http://drupal.org/node/1897420 for further information.


-- CONFIGURATION --

After being installed this module automatically adds MaxPay payment method to checkout.

Use "MaxPay" section in Admin panel to configure the module.
This module requires "MaxPay public key" and "MaxPay secret key" which are supposed to be taken from https://my.maxpay.com after registration.
