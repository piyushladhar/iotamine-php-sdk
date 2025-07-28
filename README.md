# 🌐 Iotamine PHP SDK

The **Iotamine PHP SDK** allows developers to easily interact with the [Iotamine Cloud API](https://iotamine.com).  
Create, manage, and automate your Virtual Machines (VPS) and cloud infrastructure using PHP.

---

## 🚀 Features

- 🔐 Authenticate using API Key
- 💻 Create and manage VPS instances
- 🔁 Start, stop, restart, power off, or rebuild VMs
- 🧱 List available OS templates and POP (regions)
- 📦 Fully Composer-compatible and PSR-4 autoloaded

---

## 📦 Installation

```bash
composer require iotamine/sdk
````

> If not published yet, clone the repo and add to your project's `composer.json` manually using `"repositories"` and `"path"` keys.

---

## 🛠 Usage

### Initialize Client

```php
require 'vendor/autoload.php';

use Iotamine\IotamineClient;
use Iotamine\VM;
use Iotamine\Core;

$client = new IotamineClient("your-api-key");
$vm = new VM($client);
$core = new Core($client);
```

---

## 🔧 Examples

### List OS & POPs

```php
$osList = $core->listOS();
$popList = $core->listPOP();
print_r($osList);
print_r($popList);
```

### Create a VM

```php
$response = $vm->create(
    "my-server",
    "StrongPass@123",
    $osList[0]['id'],
    $popList[0]['id'],
    2,      // CPU cores
    4096,   // RAM in MB
    80      // Disk in GB
);
print_r($response);
```

### Start/Stop VM

```php
$vm->start($vpsId);
$vm->stop($vpsId);
```

### Destroy VM

```php
$vm->destroy($vpsId);
```

---

## 📂 Folder Structure

```
iotamine-php-sdk/
├── src/
│   ├── IotamineClient.php  # Core HTTP client
│   ├── VM.php              # VPS operations
│   └── Core.php            # List OS / POP
├── composer.json
├── README.md
```

---

## ✅ Requirements

* PHP 7.4 or later
* Composer
* OpenSSL enabled in PHP
* [Guzzle HTTP client](https://github.com/guzzle/guzzle) (auto-installed)

---

## 🔒 Authentication

All API requests require a valid **API Key** which can be generated from the [Iotamine Control Panel](https://iotamine.com/control).

> The key is passed using the header:
> `Authorization: Api-Key <your-key>`

---

## 🧪 Development

Clone this repository and run:

```bash
composer install
php test.php
```

---

## 🪪 License

This SDK is licensed under the [MIT License](LICENSE).

---

## 🌐 Resources

* 🌍 [Iotamine Website](https://iotamine.com)
* 🧑‍💻 [Iotamine Control Panel](https://iotamine.com/control)

---

## 🤝 Contributing

Pull requests and issue reports are welcome. Feel free to fork the repo and submit a PR.

---

## 🙋 Need Help?

If you have any questions or want to suggest improvements, feel free to reach out via [corporate@iotamine.com](mailto:corporate@iotamine.com).

```