<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * MachineAliases
 *
 * @ORM\Table(name="machine_aliases")
 * @ORM\Entity
 */
class MachineAliases
{
    /**
     * @var integer
     *
     * @ORM\Column(name="alias_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $aliasId;

    /**
     * @var integer
     *
     * @ORM\Column(name="machine_id", type="integer", nullable=false)
     */
    private $machineId;

    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=10, nullable=false)
     */
    private $alias;



    /**
     * Get aliasId
     *
     * @return integer
     */
    public function getAliasId()
    {
        return $this->aliasId;
    }

    /**
     * Set machineId
     *
     * @param integer $machineId
     *
     * @return MachineAliases
     */
    public function setMachineId($machineId)
    {
        $this->machineId = $machineId;

        return $this;
    }

    /**
     * Get machineId
     *
     * @return integer
     */
    public function getMachineId()
    {
        return $this->machineId;
    }

    /**
     * Set alias
     *
     * @param string $alias
     *
     * @return MachineAliases
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias
     *
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }
}
