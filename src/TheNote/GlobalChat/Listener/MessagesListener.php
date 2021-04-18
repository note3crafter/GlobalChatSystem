<?php

namespace TheNote\GlobalChat\Listener;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\Player;

use pocketmine\utils\Config;
use TheNote\GlobalChat\Main;

class MessagesListener implements Listener
{

    public function __construct(Main $plugin)
    {
        $this->plugin = $plugin;

    }

    public function onChat(PlayerChatEvent $event)
    {
        $msg = $event->getMessage();
        $player = $event->getPlayer();
        $name = $player->getName();
        $hei = $player->getLowerCaseName();
        $config = new Config("/home/NL-Cloud/GlobalChat/Chat.json", Config::JSON);
        $settings = new Config("/home/NL-Cloud/GlobalChat/settings.json");
        $clans = new Config("/home/NL-Cloud/players/Gruppe/$name.json", Config::JSON);
        $hei = new Config("/home/NL-Cloud/players/Heiraten/$hei.json", Config::JSON);
        $clan = $clans->get("Clan");
        $clanst = $clans->get("ClanStatus");
        $heist = $hei->get("heistatus");
        $nick = $clans->get("Nickname");
        $stats = new Config("/home/NL-Cloud/players/Stats/" . $player->getLowerCaseName() . ".json", Config::JSON);
        if ($stats->get("votes") > 1) {
            if ($clans->get("Default") === true) {
                if ($clanst === true) {
                    if ($heist === true) {
                        $config->set("NachrrichtSpieler", "§f[§eSpieler§f] §f[§ao§f] §f[§d" . $clan . "§r§f] §7$nick §r§f| §7$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    } elseif ($heist === false or null) {
                        $config->set("NachrrichtSpieler", "§f[§eSpieler§f] §f[§d" . $clan . "§r§f] §7$nick §r§f| §7$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    }
                } else if ($clanst === false or null) {
                    if ($heist === true) {
                        $config->set("NachrrichtSpieler", "§f[§eSpieler§f] §f[§ao§f] §7$nick §r§f| §7$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    } elseif ($heist === false or null) {
                        $config->set("NachrrichtSpieler", "§f[§eSpieler§f] §7$nick §r§f| §7$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    }
                }
            } elseif ($clans->get("Owner") === true) {
                if ($clanst === true) {
                    if ($heist === true) {
                        $config->set("NachrrichtSpieler", "§f[§4Owner§f] §f[§ao§f] §f[§d" . $clan . "§r§f] §c$nick §r§f| §c$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();

                    } elseif ($heist === false or null) {
                        $config->set("NachrrichtSpieler", "§f[§4Owner§f] §f[§d" . $clan . "§r§f] §c$nick §r§f| §c$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    }
                } else if ($clanst === false or null) {
                    if ($heist === true) {
                        $config->set("NachrrichtSpieler", "§f[§4Owner§f] §f[§ao§f] §c$nick §r§f| §c$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    } elseif ($heist === false or null) {
                        $config->set("NachrrichtSpieler", "§f[§4Owner§f] §c$nick §r§f| §c$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    }
                }
            } elseif ($clans->get("Admin") === true) {
                if ($clanst === true) {
                    if ($heist === true) {
                        $config->set("NachrrichtSpieler", "§f[§cAdmin§f] §f[§ao§f] §f[§d" . $clan . "§r§f] §c$nick §r§f| §c$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    } elseif ($heist === false or null) {
                        $config->set("NachrrichtSpieler", "§f[§cAdmin§f] §f[§d" . $clan . "§r§f] §c$nick §r§f| §c$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    }
                } else if ($clanst === false or null) {
                    if ($heist === true) {
                        $config->set("NachrrichtSpieler", "§f[§cAdmin§f] §f[§ao§f] §c$nick §r§f| §c$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    } elseif ($heist === false or null) {
                        $config->set("NachrrichtSpieler", "§f[§cAdmin§f] §c$nick §r§f| §c$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    }
                }
            } elseif ($clans->get("Developer") === true) {
                if ($clanst === true) {
                    if ($heist === true) {
                        $config->set("NachrrichtSpieler", "§f[§5Developer§f] §f[§ao§f] §f[§d" . $clan . "§r§f] §d$nick §r§f| §d$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    } elseif ($heist === false or null) {
                        $config->set("NachrrichtSpieler", "§f[§5Developer§f] §f[§d" . $clan . "§r§f] §d$nick §r§f| §d$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    }
                } else if ($clanst === false or null) {
                    if ($heist === true) {
                        $config->set("NachrrichtSpieler", "§f[§5Developer§f] §f[§ao§f] §d$nick §r§f| §d$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    } elseif ($heist === false or null) {
                        $config->set("NachrrichtSpieler", "§f[§5Developer§f] §d$nick §r§f| §d$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    }
                }
            } elseif ($clans->get("Moderator") === true) {
                if ($clanst === true) {
                    if ($heist === true) {
                        $config->set("NachrrichtSpieler", "§f[§1Moderator§f] §f[§ao§f] §f[§d" . $clan . "§r§f] §b$nick §r§f| §b$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    } elseif ($heist === false or null) {
                        $config->set("NachrrichtSpieler", "§f[§1Moderator§f] §f[§d" . $clan . "§r§f] §b$nick §r§f| §b$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    }
                } else if ($clanst === false or null) {
                    if ($heist === true) {
                        $config->set("NachrrichtSpieler", "§f[§1Moderator§f] §f[§ao§f] §b$nick §r§f| §b$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    } elseif ($heist === false or null) {
                        $config->set("NachrrichtSpieler", "§f[§1Moderator§f] §b$nick §r§f| §b$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    }
                }
            } elseif ($clans->get("Supporter") === true) {
                if ($clanst === true) {
                    if ($heist === true) {
                        $config->set("NachrrichtSpieler", "§f[§bSupporter§f] §f[§ao§f] §f[§d" . $clan . "§r§f] §b$nick §r§f| §b$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    } elseif ($heist === false or null) {
                        $config->set("NachrrichtSpieler", "§f[§bSupporter§f] §f[§d" . $clan . "§r§f] §b$nick §r§f| §b$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    }
                } else if ($clanst === false or null) {
                    if ($heist === true) {
                        $config->set("NachrrichtSpieler", "§f[§bSupporter§f] §f[§ao§f] §b$nick §r§f| §b$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    } elseif ($heist === false or null) {
                        $config->set("NachrrichtSpieler", "§f[§bSupporter§f] §b$nick §r§f| §b$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    }
                }
            } elseif ($clans->get("Builder") === true) {
                if ($clanst === true) {
                    if ($heist === true) {
                        $config->set("NachrrichtSpieler", "§f[§aBuilder§f] §f[§ao§f] §f[§d" . $clan . "§r§f] §a$nick §r§f| §a$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    } elseif ($heist === false or null) {
                        $config->set("NachrrichtSpieler", "§f[§aBuilder§f] §f[§d" . $clan . "§r§f] §a$nick §r§f| §a$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    }
                } else if ($clanst === false or null) {
                    if ($heist === true) {
                        $config->set("NachrrichtSpieler", "§f[§aBuilder§f] §f[§ao§f] §a$nick §r§f| §a$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    } elseif ($heist === false or null) {
                        $config->set("NachrrichtSpieler", "§f[§aBuilder§f] §a$nick §r§f| §a$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    }
                }
            } elseif ($clans->get("Hero") === true) {
                if ($clanst === true) {
                    if ($heist === true) {
                        $config->set("NachrrichtSpieler", "§f[§dHero§f] §f[§ao§f] §f[§d" . $clan . "§r§f] §d$nick §r§f| §d$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    } elseif ($heist === false or null) {
                        $config->set("NachrrichtSpieler", "§f[§dHero§f] §f[§d" . $clan . "§r§f] §d$nick §r§f| §d$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    }
                } else if ($clanst === false or null) {
                    if ($heist === true) {
                        $config->set("NachrrichtSpieler", "§f[§dHero§f] §f[§ao§f] §d$nick §r§f| §d$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    } elseif ($heist === false or null) {
                        $config->set("NachrrichtSpieler", "§f[§dHero§f] §d$nick §r§f| §d$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    }
                }
            } elseif ($clans->get("YouTuber") === true) {
                if ($clanst === true) {
                    if ($heist === true) {
                        $config->set("NachrrichtSpieler", "§f[§cYou§fTuber§f] §f[§ao§f] §f[§d" . $clan . "§r§f] §f$nick §r§f| §f$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    } elseif ($heist === false or null) {
                        $config->set("NachrrichtSpieler", "§f[§cYou§fTuber§f] §f[§d" . $clan . "§r§f] §f$nick §r§f| §f$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    }
                } else if ($clanst === false or null) {
                    if ($heist === true) {
                        $config->set("NachrrichtSpieler", "§f[§cYou§fTuber§f] §f[§ao§f] §f$nick §r§f| §f$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    } elseif ($heist === false or null) {
                        $config->set("NachrrichtSpieler", "§f[§cYou§fTuber§f] §f$nick §r§f| §f$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    }
                }
            } elseif ($clans->get("Suppremium") === true) {
                if ($clanst === true) {
                    if ($heist === true) {
                        $config->set("NachrrichtSpieler", "§f[§trueSuppremium§f] §f[§ao§f] §f[§d" . $clan . "§r§f] §true$nick §r§f| §true$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    } elseif ($heist === false or null) {
                        $config->set("NachrrichtSpieler", "§f[§trueSuppremium§f] §f[§d" . $clan . "§r§f] §true$nick §r§f| §true$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    }
                } else if ($clanst === false or null) {
                    if ($heist === true) {
                        $config->set("NachrrichtSpieler", "§f[§trueSuppremium§f] §f[§ao§f] §true$nick §r§f| §true$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    } elseif ($heist === false or null) {
                        $config->set("NachrrichtSpieler", "§f[§trueSuppremium§f] §true$nick §r§f| §true$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    }
                }
            } elseif ($clans->get("Premium") === true) {
                if ($clanst === true) {
                    if ($heist === true) {
                        $config->set("NachrrichtSpieler", "§f[§6Premium§f] §f[§ao§f] §f[§d" . $clan . "§r§f] §6$nick §r§f| §6$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    } elseif ($heist === false or null) {
                        $config->set("NachrrichtSpieler", "§f[§6Premium§f] §f[§d" . $clan . "§r§f] §6$nick §r§f| §6$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    }
                } else if ($clanst === false or null) {
                    if ($heist === true) {
                        $config->set("NachrrichtSpieler", "§f[§6Premium§f] §f[§ao§f] §6$nick §r§f| §6$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    } elseif ($heist === false or null) {
                        $config->set("NachrrichtSpieler", "§f[§6Premium§f] §6$nick §r§f| §6$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    }
                }
            } else {
                if ($clanst === true) {
                    if ($heist === true) {
                        $config->set("NachrrichtSpieler", "§f[§eSpieler§f] §f[§ao§f] §f[§d" . $clan . "§r§f] §7$nick §r§f| §7$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    } elseif ($heist === false or null) {
                        $config->set("NachrrichtSpieler", "§f[§eSpieler§f] §f[§d" . $clan . "§r§f] §7$nick §r§f| §7$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    }
                } else if ($clanst === false or null) {
                    if ($heist === true) {
                        $config->set("NachrrichtSpieler", "§f[§eSpieler§f] §f[§ao§f] §7$nick §r§f| §7$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    } elseif ($heist === false or null) {
                        $config->set("NachrrichtSpieler", "§f[§eSpieler§f] §7$nick §r§f| §7$msg");
                        $config->save();

                        $settings->set("LobbySend", true);
                        $settings->save();
                    }
                }
            }
        }
    }
}