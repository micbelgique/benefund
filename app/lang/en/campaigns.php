<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Password Reminder Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines are the default lines which match reasons
	| that are given by the password broker for a password update attempt
	| has failed, such as for an invalid token or invalid new password.
	|
	*/

	'form' => array(
		'labels' => array(
			'title' => 'Title',
			'description' => 'Description',
			'date_start' => 'From',
			'date_end' => 'To',
			'item_title' => 'Name',
			'item_description' => 'Description',
			'item_price' => 'Price',
			'item_price' => 'Price',
			'target_title' => 'Name',
			'target_adress_street' => 'Adress',
			'target_adress_street2' => '',
			'target_adress_zip' => 'City code',
			'target_adress_city' => 'City',
			'target_adress_country' => 'Country',
			'target_description' => 'Description',
			'recipient' => 'Recipient',
			'item' => 'Item',
			'category' => 'Category',
			'introduction' => 'Introduction',
			'thumb' => 'Thumbnail',
			'cover' => 'Cover'
		),
		'placeholders' => array(
			'title' => 'Campaign\'s title',
			'date_start' => 'Campaign\'s start date',
			'date_end' => 'Campaign\'s end date',
			'item_title' => 'Item\'s name',
			'item_price' => 'Item\'s price',
			'target_title' => 'Name of destination museum/association',
			'target_adress_street'  => 'Adress of destination museum/association',
			'target_adress_street2' => 'Adress of destination museum/association',
			'target_adress_zip' => 'City code',
			'target_adress_city' => 'City of destination museum/association',
			'target_adress_country' => 'Country of destination museum/association',
			'target_description' => 'Description of destination museum/association',
		),

		'new' => array(
			'submit' => 'Create'
		),

		'edit' => array(
			'submit' => 'Edit'
		),

		'buttons' => array(
			'new' => 'New',
			'edit' => 'Edit',
			'remove' => 'Delete'
		),

		'search' => array(
			'title' => 'Researched campaigns',
			'placeholder' => 'Search a campaign',
			'button' => 'Search',
		),
	),

	'title' => 'Campaigns',
	'list' => 'Campaigns',
	'new.title' => 'New campaign',
	'empty' => 'No campaigns',

	'index' => array(
		'like' => 'Like',
		'view' => 'View',
		'fund' => 'Fund',
		'current_progress' => ':current of :max $ funded'
	),

	'new' => array(
		'error' => 'Some errors have been detected'
	),

	'edit' => array(
		'title' => 'Campaign edit',
		'error' => 'Some erros have been detected',
		'message' => 'The campaign has been edited',
		'unauthorized' => 'You can\'t edit this campaign'
	),

	'delete' => array(
		'message' => 'Campaign deleted'
	),

	'pledges' => array(
		'title' => 'Pledges',
		'empty' => 'No pledges',
		'buttons' => array(
			'add' => 'Ajouter'
		)
	),

	'details' => array(
		'vendor' => 'Vendor',
		'address' => 'Address',
		'geolocation' => 'Location'
	),

	'buttons' => array(
		'edit' => 'Edit',
		'delete' => 'Delete'
	),

	'sidebar' => array(
		'pledges' => array(
			'title' => 'Pledges',
			'description' => 'Add some pledges'
		)
	),

	'manage' => array(
		'title' => 'Manage campaigns',
		'table' => array(
			'title' => 'Campaign title'
		)
	)
);