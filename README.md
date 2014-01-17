# A skeleton app for php-opencloud-zf2

This is a skeleton app that provides an example implementation of an app that uses [php-opencloud-zf2](https://github.com/jamiehannaford/php-opencloud-zf2), a ZF2 module for the Rackspace PHP SDK. This example app acts as a rudimentary control panel - but you can easily adapt it to fit your needs.

This repo was originally a fork of the official [ZF2 skeleton app](https://github.com/zendframework/ZendSkeletonApplication).

## Installation

### Step 1: Create project

Create the directory that your app will sit in, and then install the skeleton app:

```bash
mkdir zf2-app
php composer.phar create-project -sdev jamiehannaford/zf2-opencloud-skeleton-app zf2-app/
```

### Step 2: Install dependencies

```bash
cd zf2-app
php composer.phar install
```

### Step 3: Configuration

Execute this command and then populate the file with your credentials:

```bash
cp ./vendor/jamiehannaford/php-opencloud-zf2/config/opencloud.local.php.dist ./config/autoload/opencloud.local.php
```
