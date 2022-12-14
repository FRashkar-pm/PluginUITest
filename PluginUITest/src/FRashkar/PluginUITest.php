<?php

namespace FRashkar;

use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use Vecnavium\FormsUI\SimpleForm;
use pocketmine\event\Listener;
use pocketmine\form\FormValidationException;

class PluginUITest extends PluginBase implements Listener {
    
    public function onEnable(): void {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->Info("Plugin Enabled! =FRashkar=");
    }
    
    public function onCommand(CommandSender $sender, command $command, string $label, array $args): bool {
        $commandname = $command->getName();
        if($commandname == "ui"){
            if($sender instanceof Player){
                $this->ui($sender);
            }
        } else {
            $sender->sendMessage("Please use this in-game!");
        }
        return true;
    }
    public function ui(Player $player) {
        $form = new SimpleForm(function(Player $player, int $data = null){
            if($data === null){
                return;
            }
            switch ($data) {
                    case 0:
                    //Make ui feature
                        $player->sendMessage("Hola!");
                    break;
                
                    case 1:
                        $player->sendMessage("Thanks for using this plugin!");
                    //Still learning, sorry for the mistake
                    break;
            }
        });
        //Make FormAPI ui
        $form->setTitle("Title here");
        $form->setContent("Content here");
        $form->addToggle("Button 1");
        $form->addToggle("Button 2");
        $player->sendForm($form);
        return $form;
    }
}
