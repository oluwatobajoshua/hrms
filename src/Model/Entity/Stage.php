<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Stage Entity
 *
 * @property int $id
 * @property int $job_listing_id
 * @property string $name
 * @property int $description
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 *
 * @property \App\Model\Entity\JobListing $job_listing
 */
class Stage extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'job_listing_id' => true,
        'name' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'job_listing' => true,
    ];
}
