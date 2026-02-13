# Design Patterns in Laravel

A collection of common **design patterns** implemented in PHP using a Laravel application. Each pattern lives under `app/Services/` in its own directory with clean, self-contained examples.

---

## Patterns

### 1. Strategy Pattern

**Location:** `app/Services/Strategy/`

Defines a family of interchangeable algorithms and lets the client switch between them at runtime.

| File | Purpose |
|------|---------|
| `PaymentMethodInterface.php` | Strategy interface — `pay()` and `getName()` |
| `CreditCardPayment.php` | Pays via credit card with masked card output |
| `PaypalPayment.php` | Pays via PayPal using an email address |
| `AfterPayPayment.php` | Pays via AfterPay with configurable instalments |
| `PaymentContext.php` | Context that delegates to the selected strategy |

```php
$context = new PaymentContext();
$context->setPaymentMethod(new CreditCardPayment('4111111111111111', '12/28', '123'));
echo $context->checkout(99.95);
```

---

### 2. Factory Pattern

**Location:** `app/Services/Factory/`

Encapsulates object creation logic so the client doesn't need to know the concrete class.

| File | Purpose |
|------|---------|
| `NotificationInterface.php` | Product interface — `send()` and `getChannel()` |
| `EmailNotification.php` | Sends notifications via email |
| `SmsNotification.php` | Sends notifications via SMS |
| `PushNotification.php` | Sends push notifications |
| `NotificationFactory.php` | Factory that creates the correct notification by channel name |

```php
$notification = NotificationFactory::create('email');
echo $notification->send('user@example.com', 'Welcome!');
```

---

### 3. Facade Pattern

**Location:** `app/Services/Facade/`

Provides a simplified interface to a complex subsystem of classes.

| File | Purpose |
|------|---------|
| `FileDownloader.php` | Subsystem — downloads a file from a URL |
| `ConvertService.php` | Subsystem — converts a file to a target format |
| `FileSaver.php` | Subsystem — saves a file to a destination |
| `FileConverterFacade.php` | Facade — orchestrates download, convert, and save in one static call |

```php
$result = FileConverterFacade::convertFromUrl(
    'https://example.com/report.csv', 'pdf', '/storage/reports'
);
```

---

### 4. Iterator Pattern

**Location:** `app/Services/Iterator/`

Provides a way to sequentially access elements of a collection without exposing its underlying structure.

| File | Purpose |
|------|---------|
| `File.php` | Element class with name, content, and size |
| `FileIterator.php` | Implements PHP's `\Iterator` to traverse files |
| `FileCollection.php` | Implements `\IteratorAggregate` — add, remove, and iterate files |

```php
$collection = new FileCollection();
$collection->addFile(new File('readme.md', '# Hello', 512))
           ->addFile(new File('config.json', '{}', 128));

foreach ($collection as $file) {
    echo $file->getName();
}
```

---

### 5. Observer Pattern

**Location:** `app/Services/Observer/`

Defines a one-to-many dependency so that when an event occurs, all subscribed observers are notified automatically.

| File | Purpose |
|------|---------|
| `ObserverInterface.php` | Observer contract — `handle()` |
| `EmailObserver.php` | Sends an email on event |
| `LogObserver.php` | Logs the event and payload |
| `SlackObserver.php` | Posts to a Slack channel on event |
| `EventNotification.php` | Subject — manages subscriptions and dispatches events |

```php
$dispatcher = new EventNotification();
$dispatcher->subscribe('user.registered', new EmailObserver())
           ->subscribe('user.registered', new LogObserver());

$results = $dispatcher->notify('user.registered', ['email' => 'john@example.com']);
```

---

### 6. Singleton Pattern

**Location:** `app/Services/Singleton/`

Ensures a class has only one instance and provides a global point of access to it.

| File | Purpose |
|------|---------|
| `AppConfig.php` | Singleton with private constructor, `getInstance()`, and key-value settings |

```php
$config = AppConfig::getInstance();
$config->set('app.name', 'My App');

// Anywhere else — same instance
$same = AppConfig::getInstance();
echo $same->get('app.name'); // "My App"
```

---

## Project Structure

```
app/Services/
├── Facade/
├── Factory/
├── Iterator/
├── Observer/
├── Singleton/
└── Strategy/
```

## Requirements

- PHP 8.2+
- Composer
- Laravel 12.x

## Getting Started

```bash
git clone <repo-url>
cd design-patterns-laravel
composer install
cp .env.example .env
php artisan key:generate
```


## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
