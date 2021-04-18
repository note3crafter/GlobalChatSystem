<?php

namespace TheNote\GlobalChat\Task;

use pocketmine\Player;
use pocketmine\scheduler\Task;
use pocketmine\utils\Config;
use TheNote\GlobalChat\Main;

class MessagesTask extends Task
{

    public function __construct(Main $plugin)
    {
        $this->plugin = $plugin;

    }

    public function onRun($tick)
    {
        $config = new Config("/home/NL-Cloud/GlobalChat/Chat.json", Config::JSON);
        $cfg = new Config($this->plugin->getDataFolder() . "settings.json", Config::JSON);
        $server = new Config("/home/NL-Cloud/GlobalChat/Server.json", Config::JSON);
        $settings = new Config("/home/NL-Cloud/GlobalChat/settings.json", Config::JSON);
        $message = $config->getNested("NachrrichtSpieler");
        if ($settings->get("LobbySend") === true) {
            if ($cfg->get("Lobby") === true) {
                $this->plugin->getServer()->broadcastMessage($message);
                $settings->set("LobbySend", false);
                $settings->set("CBDiaSend", true);
                $settings->save();
            } elseif ($cfg->get("Lobby") === false) {
                $settings->set("LobbySend", false);
                $settings->set("CBDiaSend", true);
                $settings->save();
            }
        } elseif ($settings->get("CBDiaSend") === true) {
            if ($cfg->get("CBDia") === true) {
                $this->plugin->getServer()->broadcastMessage($message);
                $settings->set("CBDiaSend", false);
                $settings->set("Finished", true);

                $settings->save();
            } elseif ($cfg->get("CBDia") === false) {
                $settings->set("CBDiaSend", false);
                $settings->set("Finished", true);
                $settings->save();
            }
        } elseif ($settings->get("Finished") === true) {
            $settings->set("Finished", false);
            $settings->save();
        }
    }
}

//alte version
/*
 *      if ($settings->get("Kreativ") === true) { //Lobby
            if ($cfg->get("Lobby") === true) {
                $this->plugin->getServer()->broadcastMessage($message);
                $settings->set("Lobby", true);
                $settings->save();
            }
            if ($settings->get("OnlineLobby") === false) {
                $settings->set("Lobby", true);
                $settings->save();
            }
        }

//Alte version v2
         } elseif ($settings->get("Survival") === true) { //Kreativ
                if ($server->get("OfflineKreativ") === true) {
                    $settings->set("Kreativ", true);
                    $settings->save();
                } elseif ($server->get("OfflineKreativ") === false) {
                    if ($cfg->get("globalchat") === true) {
                        $this->plugin->getServer()->broadcastMessage($message);
                        $settings->set("Kreativ", true);
                        $settings->save();
                    } else {
                        $settings->set("Kreativ", true);
                        $settings->save();
                    }
                } else {
                    $settings->set("Kreativ", true);
                    $settings->save();
                }
 */