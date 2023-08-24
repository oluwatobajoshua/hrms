<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Applicant Entity
 *
 * @property int $id
 * @property int $job_listing_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property \Cake\I18n\FrozenDate $date_of_birth
 * @property int $gender_id
 * @property int $marital_status_id
 * @property \Cake\I18n\FrozenDate $application_date
 * @property string $nationality
 * @property string $resume_file_url
 * @property int $highest_education_id
 *
 * @property \App\Model\Entity\JobListing $job_listing
 * @property \App\Model\Entity\Gender $gender
 * @property \App\Model\Entity\MaritalStatus $marital_status
 * @property \App\Model\Entity\HighestEducation $highest_education
 */
class Applicant extends Entity
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
        'first_name' => true,
        'last_name' => true,
        'email' => true,
        'phone' => true,
        'address' => true,
        'date_of_birth' => true,
        'gender_id' => true,
        'marital_status_id' => true,
        'application_date' => true,
        'nationality' => true,
        'resume_file_url' => true,
        'highest_education_id' => true,
        'job_listing' => true,
        'gender' => true,
        'marital_status' => true,
        'highest_education' => true,
    ];
}
