<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Machines
 *
 * @ORM\Table(name="machines")
 * @ORM\Entity
 */
class Machines
{
    /**
     * @var integer
     *
     * @ORM\Column(name="machine_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $machineId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="display_name", type="string", length=100, nullable=false)
     */
    private $displayName;



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
     * Set name
     *
     * @param string $name
     *
     * @return Machines
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set displayName
     *
     * @param string $displayName
     *
     * @return Machines
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;

        return $this;
    }

    /**
     * Get displayName
     *
     * @return string
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }
}
