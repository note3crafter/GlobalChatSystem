<?php

namespace TheNote\GlobalChat;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use TheNote\GlobalChat\Task\MessagesTask;
use TheNote\GlobalChat\Listener\MessagesListener;

class Main extends PluginBase implements Listener {

    public function onEnable()
    {
        $this->getScheduler()->scheduleRepeatingTask(new MessagesTask($this), 1);
        $this->getServer()->getPluginManager()->registerEvents(new MessagesListener($this), $this);
        $this->saveResource("settings.json", false);
    }
}