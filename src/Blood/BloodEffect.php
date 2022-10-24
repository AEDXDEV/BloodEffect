<?php

namespace Blood;

use pocketmine\block\Block;
use pocketmine\block\BlockFactory;
use pocketmine\block\VanillaBlocks;
use pocketmine\entity\Entity;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\math\Vector3;
use pocketmine\player\Player;
use pocketmine\world\particle\BlockBreakParticle;

class BloodEffect extends PluginBase implements Listener{
    public function onEnable(): void{
        $this->getServer()->getLogger()->info("BloodEffect => Enabled!");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
   public function onDamaging(EntityDamageEvent $e){
    if($e instanceof EntityDamageByEntityEvent){
    $player = $e->getEntity();
    $cause = $e->getCause();
    if($cause !== EntityDamageByEntityEvent::CAUSE_ENTITY_ATTACK)return;
    if($player instanceof Player){
        $player->getWorld()->addParticle(new Vector3($player->getPosition()->x, $player->getPosition()->y, $player->getPosition()->z), new BlockBreakParticle(VanillaBlocks::REDSTONE()));
    }    
    }
   }
    
}
