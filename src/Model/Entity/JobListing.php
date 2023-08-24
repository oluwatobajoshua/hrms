<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * JobListing Entity
 *
 * @property int $id
 * @property int $designation_id
 * @property string $job_description
 * @property string $requirements
 * @property \Cake\I18n\FrozenDate $posting_date
 * @property \Cake\I18n\FrozenDate|null $closing_date
 * @property bool $is_active
 * @property int $applicant_count
 *
 * @property \App\Model\Entity\Designation $designation
 * @property \App\Model\Entity\Applicant[] $applicants
 * @property \App\Model\Entity\Stage[] $stages
 */
class JobListing extends Entity
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
        'designation_id' => true,
        'job_description' => true,
        'requirements' => true,
        'posting_date' => true,
        'closing_date' => true,
        'is_active' => true,
        'applicant_count' => true,
        'designation' => true,
        'applicants' => true,
        'stages' => true,
    ];
}
