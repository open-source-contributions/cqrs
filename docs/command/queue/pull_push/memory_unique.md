Memory unique queue
===================

It works just like the [Memory queue](memory.md), but it only allows storing unique commands. All duplicates will
be ignored.

```php
use GpsLab\Component\Command\Bus\HandlerLocatedCommandBus;
use GpsLab\Component\Command\Handler\Locator\DirectBindingCommandHandlerLocator;
use GpsLab\Component\Command\Queue\PullPush\MemoryUniqueCommandQueue;

$locator = new DirectBindingCommandHandlerLocator();
$bus = new HandlerLocatedCommandBus($locator);
$queue = new MemoryUniqueCommandQueue();

$command = new RenameArticleCommand();
$command->new_name = $new_name;

$queue->push($command);


// in latter
while ($command = $queue->pull()) {
    $bus->handle($command);
}
```