<?php

namespace App\Entity\Traits;

use Gedmo\Mapping\Annotation as Gedmo;

trait SortablePositionTrait
{
    /**
     * @Gedmo\SortablePosition
     * @ORM\Column(name="position", type="integer")
     */
    private $position;

    /**
     * @return mixed
     */
    public function getPosition(): ?int
    {
        return $this->position;
    }

    /**
     * @param mixed $position
     * @return SortablePositionTrait
     */
    public function setPosition(int $position): ?self
    {
        $this->position = $position;
        return $this;
    }
}