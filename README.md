# Common PHP Components for WordPress

🚧 This is experimental.

# Installation

```
composer require wearerequired/common-php
```

## Example

```php
/**
 * Bootstraps post type integrations.
 */
function bootstrap(): void {
	add_action( 'init', __NAMESPACE__ . '\register_post_types' );
	add_action( 'init', __NAMESPACE__ . '\register_post_meta' );
	add_action( 'init', __NAMESPACE__ . '\register_taxonomies' );
	add_action( 'init', __NAMESPACE__ . '\register_taxonomy_for_object_types', 11 );
}

/**
 * Registers custom post types.
 */
function register_post_types() {
	$post_types = new Container();

	$post_types->add( Profession::NAME, new Profession() );
	$post_types->add( School::NAME, new School() );
	$post_types->add( Office::NAME, new Office() );
	$post_types->add( Event::NAME, new Event() );
	$post_types->add( Apprenticeship::NAME, new Apprenticeship() );
	$post_types->add( TrialApprenticeship::NAME, new TrialApprenticeship() );
	$post_types->add( Organization::NAME, new Organization() );

	$post_types->bootstrap();
}

/**
 * Registers post meta.
 */
function register_post_meta() {
	$post_meta = new Container();

	$post_meta->add( PostMeta\ImportID::KEY, new PostMeta\ImportID() );
	$post_meta->add( PostMeta\ImportTimestamp::KEY, new PostMeta\ImportTimestamp() );

	$post_meta->add( PostMeta\SchoolOfficeID::KEY, new PostMeta\SchoolOfficeID() );
	$post_meta->add( PostMeta\SchoolTelNumber::KEY, new PostMeta\SchoolTelNumber() );
	$post_meta->add( PostMeta\SchoolEmail::KEY, new PostMeta\SchoolEmail() );

	$post_meta->add( PostMeta\OfficeStreet::KEY, new PostMeta\OfficeStreet() );
	$post_meta->add( PostMeta\OfficePOBox::KEY, new PostMeta\OfficePOBox() );
	$post_meta->add( PostMeta\OfficeEmail::KEY, new PostMeta\OfficeEmail() );
	$post_meta->add( PostMeta\OfficeTelNumber::KEY, new PostMeta\OfficeTelNumber() );
	$post_meta->add( PostMeta\OfficeFax::KEY, new PostMeta\OfficeFax() );
	$post_meta->add( PostMeta\OfficeContactURL::KEY, new PostMeta\OfficeContactURL() );
	$post_meta->add( PostMeta\OfficeOpeningHours::KEY, new PostMeta\OfficeOpeningHours() );
	$post_meta->add( PostMeta\OfficeSendCopyToConsultant::KEY, new PostMeta\OfficeSendCopyToConsultant() );

	$post_meta->add( PostMeta\EventAdditionalInfo::KEY, new PostMeta\EventAdditionalInfo() );
	$post_meta->add( PostMeta\EventAddress::KEY, new PostMeta\EventAddress() );
	$post_meta->add( PostMeta\EventAuthor::KEY, new PostMeta\EventAuthor() );
	$post_meta->add( PostMeta\EventCity::KEY, new PostMeta\EventCity() );
	$post_meta->add( PostMeta\EventCode::KEY, new PostMeta\EventCode() );
	$post_meta->add( PostMeta\EventCreator::KEY, new PostMeta\EventCreator() );
	$post_meta->add( PostMeta\EventDepartment::KEY, new PostMeta\EventDepartment() );
	$post_meta->add( PostMeta\EventFeeInfoNoFees::KEY, new PostMeta\EventFeeInfoNoFees() );
	$post_meta->add( PostMeta\EventFeeInfoFee::KEY, new PostMeta\EventFeeInfoFee() );
	$post_meta->add( PostMeta\EventFeeInfoCurrency::KEY, new PostMeta\EventFeeInfoCurrency() );
	$post_meta->add( PostMeta\EventFeeInfoDescription::KEY, new PostMeta\EventFeeInfoDescription() );
	$post_meta->add( PostMeta\EventGuideDescr::KEY, new PostMeta\EventGuideDescr() );
	$post_meta->add( PostMeta\EventGuideFirstname::KEY, new PostMeta\EventGuideFirstname() );
	$post_meta->add( PostMeta\EventGuideLastname::KEY, new PostMeta\EventGuideLastname() );
	$post_meta->add( PostMeta\EventHostCity::KEY, new PostMeta\EventHostCity() );
	$post_meta->add( PostMeta\EventHostLastname::KEY, new PostMeta\EventHostLastname() );
	$post_meta->add( PostMeta\EventHostRegion::KEY, new PostMeta\EventHostRegion() );
	$post_meta->add( PostMeta\EventHostType::KEY, new PostMeta\EventHostType() );
	$post_meta->add( PostMeta\EventHostZip::KEY, new PostMeta\EventHostZip() );
	$post_meta->add( PostMeta\EventHostPhone::KEY, new PostMeta\EventHostPhone() );
	$post_meta->add( PostMeta\EventHostMail::KEY, new PostMeta\EventHostMail() );
	$post_meta->add( PostMeta\EventHostWebsite::KEY, new PostMeta\EventHostWebsite() );
	$post_meta->add( PostMeta\EventLocation::KEY, new PostMeta\EventLocation() );
	$post_meta->add( PostMeta\EventOrgDepartment::KEY, new PostMeta\EventOrgDepartment() );
	$post_meta->add( PostMeta\EventRegion::KEY, new PostMeta\EventRegion() );
	$post_meta->add( PostMeta\EventRegistrationLink::KEY, new PostMeta\EventRegistrationLink() );
	$post_meta->add( PostMeta\EventRegistrationMail::KEY, new PostMeta\EventRegistrationMail() );
	$post_meta->add( PostMeta\EventRegistrationName::KEY, new PostMeta\EventRegistrationName() );
	$post_meta->add( PostMeta\EventHasRegistration::KEY, new PostMeta\EventHasRegistration() );
	$post_meta->add( PostMeta\EventRegistrationPhone::KEY, new PostMeta\EventRegistrationPhone() );
	$post_meta->add( PostMeta\EventSeatsMax::KEY, new PostMeta\EventSeatsMax() );
	$post_meta->add( PostMeta\EventSeatsMin::KEY, new PostMeta\EventSeatsMin() );
	$post_meta->add( PostMeta\EventSeatsAvailable::KEY, new PostMeta\EventSeatsAvailable() );
	$post_meta->add( PostMeta\EventSpeakers::KEY, new PostMeta\EventSpeakers() );
	$post_meta->add( PostMeta\EventUnid::KEY, new PostMeta\EventUnid() );
	$post_meta->add( PostMeta\EventZip::KEY, new PostMeta\EventZip() );
	$post_meta->add( PostMeta\EventDateStart::KEY, new PostMeta\EventDateStart() );
	$post_meta->add( PostMeta\EventDateEnd::KEY, new PostMeta\EventDateEnd() );
	$post_meta->add( PostMeta\EventDates::KEY, new PostMeta\EventDates() );
	$post_meta->add( PostMeta\EventIsOnline::KEY, new PostMeta\EventIsOnline() );
	$post_meta->add( PostMeta\EventTargetAudience::KEY, new PostMeta\EventTargetAudience() );
	$post_meta->add( PostMeta\EventSwissdocIDs::KEY, new PostMeta\EventSwissdocIDs() );

	$post_meta->add( PostMeta\SwissdocNumber::KEY, new PostMeta\SwissdocNumber() );

	$post_meta->add( PostMeta\Zip::KEY, new PostMeta\Zip() );
	$post_meta->add( PostMeta\City::KEY, new PostMeta\City() );
	$post_meta->add( PostMeta\Lat::KEY, new PostMeta\Lat() );
	$post_meta->add( PostMeta\Lng::KEY, new PostMeta\Lng() );

	$post_meta->add( PostMeta\ProfessionSNI::KEY, new PostMeta\ProfessionSNI() );
	$post_meta->add( PostMeta\ProfessionCompletedApprenticeshipContracts::KEY, new PostMeta\ProfessionCompletedApprenticeshipContracts() );
	$post_meta->add( PostMeta\ProfessionVideoURLs::KEY, new PostMeta\ProfessionVideoURLs() );
	$post_meta->add( PostMeta\ProfessionPodcastURLs::KEY, new PostMeta\ProfessionPodcastURLs() );
	$post_meta->add( PostMeta\ProfessionSkipImport::KEY, new PostMeta\ProfessionSkipImport() );
	$post_meta->add( PostMeta\ProfessionSchoolRequirementsURL::KEY, new PostMeta\ProfessionSchoolRequirementsURL() );
	$post_meta->add( PostMeta\ProfessionHint::KEY, new PostMeta\ProfessionHint() );
	$post_meta->add( PostMeta\ProfessionForeignLanguage::KEY, new PostMeta\ProfessionForeignLanguage() );

	$post_meta->add( PostMeta\OrganizationLogoURL::KEY, new PostMeta\OrganizationLogoURL() );

	$post_meta->bootstrap();
}

/**
 * Registers custom taxonomies.
 */
function register_taxonomies(): void {
	$taxonomies = new Container();

	$taxonomies->add( ProfessionField::NAME, new ProfessionField() );
	$taxonomies->add( ProfessionInterest::NAME, new ProfessionInterest() );
	$taxonomies->add( ProfessionSector::NAME, new ProfessionSector() );
	$taxonomies->add( ProfessionAlternativeTitle::NAME, new ProfessionAlternativeTitle() );
	$taxonomies->add( ProfessionDuration::NAME, new ProfessionDuration() );
	$taxonomies->add( ProfessionQualification::NAME, new ProfessionQualification() );
	$taxonomies->add( ProfessionBilingualEducation::NAME, new ProfessionBilingualEducation() );
	$taxonomies->add( EventSpeaker::NAME, new EventSpeaker() );
	$taxonomies->add( EventAudience::NAME, new EventAudience() );
	$taxonomies->add( EventTopic::NAME, new EventTopic() );
	$taxonomies->add( EventStatus::NAME, new EventStatus() );
	$taxonomies->add( Swissdoc::NAME, new Swissdoc() );
	$taxonomies->add( ApprenticeshipOrganization::NAME, new ApprenticeshipOrganization() );
	$taxonomies->add( UserNationality::NAME, new UserNationality() );
	$taxonomies->add( UserLanguage::NAME, new UserLanguage() );
	$taxonomies->add( ApprenticeshipYear::NAME, new ApprenticeshipYear() );
	$taxonomies->add( LinkDistrictOrganizationApprenticeship::NAME, new LinkDistrictOrganizationApprenticeship() );
	$taxonomies->add( LinkDistrictOrganizationTrialApprenticeship::NAME, new LinkDistrictOrganizationTrialApprenticeship() );
	$taxonomies->add( LinkSwissdocOrganizationApprenticeship::NAME, new LinkSwissdocOrganizationApprenticeship() );
	$taxonomies->add( LinkSwissdocOrganizationTrialApprenticeship::NAME, new LinkSwissdocOrganizationTrialApprenticeship() );
	$taxonomies->add( OrganizationEmail::NAME, new OrganizationEmail() );

	$district = new District();
	$taxonomies->add( District::NAME, $district );

	$meta_position = new TermMeta\Position();
	$meta_position->register();
	add_action(
		'admin_init',
		static function () use ( $district, $meta_position ): void {
			$meta_position_ui = new Admin\PositionTermUI(
				$district,
				$meta_position
			);
			$meta_position_ui->register();
		}
	);

	$meta_zip = new TermMeta\Zip();
	$meta_zip->register();
	add_action(
		'admin_init',
		static function () use ( $district, $meta_zip ): void {
			$meta_zip_ui = new Admin\ZipTermUI(
				$district,
				$meta_zip
			);
			$meta_zip_ui->register();
		}
	);

	$meta_city = new TermMeta\City();
	$meta_city->register();
	add_action(
		'admin_init',
		static function () use ( $district, $meta_city ): void {
			$meta_city_ui = new Admin\CityTermUI(
				$district,
				$meta_city
			);
			$meta_city_ui->register();
		}
	);

	$taxonomies->bootstrap();
}

/**
 * Registers taxonomies for object types.
 */
function register_taxonomy_for_object_types(): void {
	register_taxonomy_for_object_type( ProfessionField::NAME, PostType\Profession::NAME );
	register_taxonomy_for_object_type( ProfessionField::NAME, PostType\Event::NAME );

	register_taxonomy_for_object_type( ProfessionInterest::NAME, PostType\Profession::NAME );
	register_taxonomy_for_object_type( ProfessionSector::NAME, PostType\Profession::NAME );
	register_taxonomy_for_object_type( ProfessionAlternativeTitle::NAME, PostType\Profession::NAME );
	register_taxonomy_for_object_type( ProfessionDuration::NAME, PostType\Profession::NAME );
	register_taxonomy_for_object_type( ProfessionQualification::NAME, PostType\Profession::NAME );
	register_taxonomy_for_object_type( ProfessionBilingualEducation::NAME, PostType\Profession::NAME );
	register_taxonomy_for_object_type( EventSpeaker::NAME, PostType\Event::NAME );
	register_taxonomy_for_object_type( EventAudience::NAME, PostType\Event::NAME );
	register_taxonomy_for_object_type( EventTopic::NAME, PostType\Event::NAME );
	register_taxonomy_for_object_type( EventStatus::NAME, PostType\Event::NAME );

	register_taxonomy_for_object_type( District::NAME, PostType\School::NAME );
	register_taxonomy_for_object_type( District::NAME, PostType\Office::NAME );
	register_taxonomy_for_object_type( District::NAME, PostType\Apprenticeship::NAME );
	register_taxonomy_for_object_type( District::NAME, PostType\TrialApprenticeship::NAME );
	register_taxonomy_for_object_type( District::NAME, PostType\Event::NAME );
	register_taxonomy_for_object_type( District::NAME, PostType\Organization::NAME );

	register_taxonomy_for_object_type( Swissdoc::NAME, PostType\Profession::NAME );
	register_taxonomy_for_object_type( Swissdoc::NAME, PostType\Apprenticeship::NAME );
	register_taxonomy_for_object_type( Swissdoc::NAME, PostType\TrialApprenticeship::NAME );

	register_taxonomy_for_object_type( ApprenticeshipOrganization::NAME, PostType\Apprenticeship::NAME );
	register_taxonomy_for_object_type( ApprenticeshipOrganization::NAME, PostType\TrialApprenticeship::NAME );
	register_taxonomy_for_object_type( ApprenticeshipOrganization::NAME, PostType\Organization::NAME );
	register_taxonomy_for_object_type( ApprenticeshipOrganization::NAME, PostType\Event::NAME );

	register_taxonomy_for_object_type( LinkDistrictOrganizationApprenticeship::NAME, PostType\Organization::NAME );
	register_taxonomy_for_object_type( LinkDistrictOrganizationTrialApprenticeship::NAME, PostType\Organization::NAME );
	register_taxonomy_for_object_type( LinkSwissdocOrganizationApprenticeship::NAME, PostType\Organization::NAME );
	register_taxonomy_for_object_type( LinkSwissdocOrganizationTrialApprenticeship::NAME, PostType\Organization::NAME );

	register_taxonomy_for_object_type( OrganizationEmail::NAME, PostType\Organization::NAME );

	register_taxonomy_for_object_type( ApprenticeshipYear::NAME, PostType\Apprenticeship::NAME );

	register_taxonomy_for_object_type( UserNationality::NAME, 'user' );
	register_taxonomy_for_object_type( UserLanguage::NAME, 'user' );
}
```
