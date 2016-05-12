<?php

namespace DarkWav\EAC;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\plugin\PluginDescription;
use pocketmine\plugin\EventExecutor;
use pocketmine\plugin\MethodEventExecutor;
use pocketmine\event\player\PlayerAnimationEvent;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\event\player\PlayerCreationEvent;
use pocketmine\event\player\PlayerEvent;
use pocketmine\event\player\PlayerGameModeChangeEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerKickEvent;
use pocketmine\event\player\PlayerLoginEvent;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\player\PlayerPreLoginEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\event\Cancellable;
use pocketmine\permission\Permission;
use pocketmine\permission\Permissible;
use pocketmine\permission\PermissibleBase;
use pocketmine\event\Listener;
use pocketmine\entity\Effect;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\entity\Damageable;
use pocketmine\utils\Config;
use pocketmine\event\entity\EntityDamageEvent;

class EAC extends PluginBase implements Listener{

    public function onEnable(){
	$this->saveDefaultConfig();
    $yml = new Config($this->getDataFolder() . "config.yml", Config::YAML);
    $this->yml = $yml->getAll();
  	$this->getServer()->getLogger()->info(TextFormat::RED."[EAC] > EvilAntiCheat Activated");
    $this->getServer()->getLogger()->info(TextFormat::RED."[EAC] > Shield Activated");
	$this->getServer()->getLogger()->info(TextFormat::RED."[EAC] > EvilAntiCheat v1.1 [Racoon]");
	if($this->yml["ForceGameMode"] == "true"){$this->getServer()->getLogger()->info(TextFormat::RED."[EAC] > Enabling AntiForceGameMode");}
	if($this->yml["ForceField"] == "true"){$this->getServer()->getLogger()->info(TextFormat::RED."[EAC] > Enabling AntiForceField");}
	if($this->yml["OneHit"] == "true"){$this->getServer()->getLogger()->info(TextFormat::RED."[EAC] > Enabling AntiOneHit");}
	if($this->yml["Unkillable"] == "true"){$this->getServer()->getLogger()->info(TextFormat::RED."[EAC] > Enabling AntiUnkillable");}
	if($this->yml["AntiKnockBack"] == "true"){$this->getServer()->getLogger()->info(TextFormat::RED."[EAC] > Enabling AntiAntiKnockBack");}
	if($this->yml["KillAura"] == "true"){$this->getServer()->getLogger()->info(TextFormat::RED."[EAC] > Enabling AntiAura");}

    }

    public function onDisable(){

    $this->getServer()->getLogger()->info(TextFormat::RED."[EAC] > You are no longer protected from cheats!");
    $this->getServer()->getLogger()->info(TextFormat::RED."[EAC] > Shield Deactivated");
	$this->getServer()->getLogger()->info(TextFormat::RED."[EAC] > EvilAntiCheat Deactivated");

    }
    
   public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
    
    if ($cmd->getName() == "eac"){
    
          if(!isset($args[0])){
          
             $sender->sendMessage(TextFormat::RED."[EAC] > EvilAntiCheat v1.1 [Racoon] ~ DarkWav (Darku)");
              
            }

			}

			}


    public function onGameModeChange(PlayerKickEvent $k, Player $player, PlayerGameModeChangeEvent $c, Permission $permission, NewGameMode $newGamemode) {

	if ($player->changeGameMode()){

	$player->getPlayer()->getPermissions();

	$player->getPlayer()->getName();

	$c->getPlayer();

	}

	if($this->yml["ForceGameMode"] == "true"){

	//Checks permissions.

	           if($player !== $player and !$player->hasPermission("none")){
              
               $k->kickPlayer($c->getPlayer)->kickMessage(TextFormat::RED."[EAC] > You were kicked for hacking ForceGameMode!");

			   $this->getServer()->getLogger()->info(TextFormat::RED."[EAC] > $k->getPlayer() is hacking ForceGameMode!");
   
    }
	
	
	            elseif($player !== $player and !$player->hasPermission("moderator")){

    //Moderator hook.
           
               $player->sendMessage(TextFormat::RED."[EAC] > You passed Gamemode changeing!");
              
    }

	            elseif($target !== $player and !$sender->hasPermission("anticheat")){

    //EssentialsPE hook.
           
               $player->sendMessage(TextFormat::RED."[EAC] > You passed Gamemode changeing [Hooked into EssentialsPE]!");
              
    }

	            elseif($player !== $player and !$player->hasPermission("command.gamemode")){

    //Extra permission hook.
           
               $player->sendMessage(TextFormat::RED."[EAC] > You passed Gamemode changeing!");
              
    }

	            elseif($player !== $player and !$player->hasPermission("anticheat.bypass")){

    //AntiCheat permission hook.
           
               $player->sendMessage(TextFormat::RED."[EAC] > You passed Gamemode changeing!");
              
    }

    }

	}
	
	//Combat-Hack-Detection  (API extends 1.1)

    public function onDamage(EntityDamageEvent $d, EntityDamageByEntityEvent $e, Damager $damager, PlayerKickEvent $k){

	$d->getDamage();
	$d->getEntity();
	$e->getDamager();
	$e->getEntity();
	$e->getKnockBack();

	//Unkillable-Detection

	if($e->getEntity() instanceof Player){

	     if($this->yml["Unkillable"] == "true"){

	     if($d->getDamage() < 1) {

	     $k->kickPlayer($e->getEntity())->kickMessage(TextFormat::RED."[EAC] > You were kicked for hacking Unkillable!");

		 $this->getServer()->getLogger()->info(TextFormat::RED."[EAC] > $k->getPlayer() is hacking Unkillable!");

	     }

	     }

		 }

	//OneHit-Detection

	elseif($e->getDamager() instanceof Player){

	  if($this->yml["OneHit"] == "true"){

	     if($d->getDamage() > 19) {

	     //Kicks the Hacker.

	     $k->kickPlayer($e->getDamager())->kickMessage(TextFormat::RED."[EAC] > You were kicked for hacking OneHit!");

		 $this->getServer()->getLogger()->info(TextFormat::RED."[EAC] > $k->getPlayer() is hacking OneHit!");

	     }

		 }

         }

	//AntiKnockBack-Detection

    elseif($e->getEntity() instanceof Player){

	if($this->yml["AntiKnockBack"] == "true"){

	     if($e->getKnockBack() < 0.7) {

	     $k->kickPlayer($e->getEntity())->kickMessage(TextFormat::RED."[EAC] > You were kicked for hacking AntiKnockBack!");

		 $this->getServer()->getLogger()->info(TextFormat::RED."[EAC] > $k->getPlayer() is hacking AntiKnockback!");

	     }

	     }

		 }

    //ForceField-Detection

    elseif($e->getDamager() instanceof Player){

	if($this->yml["ForceField"] == "true"){

	     if($e->getEntity() > 1) {

	     $k->kickPlayer($e->getDamager())->kickMessage(TextFormat::RED."[EAC] > You were kicked for hacking ForceField!");

		 $e->getDamager->kickPlayer()->kickMessage(TextFormat::RED."[EAC] > You were kicked for hacking ForceField!");

		 $this->getServer()->getLogger()->info(TextFormat::RED."[EAC] > $k->getPlayer() is hacking ForceField!");

	     }

	     }

		 }

	//KillAura-Detection

    elseif($e->getDamager() instanceof Player){

	if($this->yml["ForceField"] == "true"){

	     if($d->getEntity() > 1) {

	     $k->kickPlayer($e->getDamager())->kickMessage(TextFormat::RED."[EAC] > You were kicked for hacking ForceField!");

		 $e->getDamager->kickPlayer()->kickMessage(TextFormat::RED."[EAC] > You were kicked for hacking ForceField!");

		 $this->getServer()->getLogger()->info(TextFormat::RED."[EAC] > $k->getPlayer() is hacking ForceField!");

	     }

	     }

		 }

}

}

//////////////////////////////////////////////////////
//                                                  //
//     EvilAntiCheat by DarkWav.                    //
//     Distributed under the ImagicalMine License.  //
//     Do not redistribute in modyfied form!        //
//     All rights reserved.                         //
//                                                  //
//////////////////////////////////////////////////////
