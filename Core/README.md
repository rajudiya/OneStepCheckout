# Seofeb Core for Magento 2

## How to install Seofeb_Core


#### Install via composer

Run the following command in Magento 2 root folder

```
composer require seofeb/module-core
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
```

Run compile if your store in Product mode:

```
php bin/magento setup:di:compile
```
